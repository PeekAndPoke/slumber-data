<?php
/**
 * Created by gerk on 30.10.17 06:27
 */

namespace PeekAndPoke\Component\Slumber\Functional\MongoDb;

use PeekAndPoke\Component\Slumber\Data\EntityRepository;
use PeekAndPoke\Component\Slumber\Data\Error\DuplicateError;
use PeekAndPoke\Component\Slumber\Data\MongoDb\MongoDbStorageDriver;
use PeekAndPoke\Component\Slumber\Data\RepositoryRegistryImpl;
use PeekAndPoke\Component\Slumber\Data\StorageImpl;
use PeekAndPoke\Component\Slumber\Stubs\UnitTestDataAggregatedClass;
use PeekAndPoke\Component\Slumber\Stubs\UnitTestDataMainClass;

/**
 *
 *
 * @author Karsten J. Gerber <kontakt@karsten-gerber.de>
 */
class DuplicateKeysFeatureTest extends SlumberMongoDbTestBase
{
    public const MAIN_COLLECTION       = 'main_class';
    public const REFERENCED_COLLECTION = 'ref_class';

    /** @var StorageImpl */
    static protected $storage;
    /** @var EntityRepository */
    static protected $mainRepo;
    /** @var EntityRepository */
    static protected $referencedRepo;

    public static function setUpBeforeClass()
    {
        $entityPool = static::createEntityPool();
        $registry   = new RepositoryRegistryImpl();

        self::$storage = new StorageImpl($entityPool, $registry);

        $codecSet = static::createCodecSet(self::$storage);

        $registry->registerProvider(self::MAIN_COLLECTION, [UnitTestDataMainClass::class], function () use ($entityPool, $codecSet) {

            $collection = static::createDatabase()->selectCollection(self::MAIN_COLLECTION);
            $reflect    = new \ReflectionClass(UnitTestDataMainClass::class);

            return new EntityRepository(self::MAIN_COLLECTION, new MongoDbStorageDriver($entityPool, $codecSet, $collection, $reflect));
        });

        $registry->registerProvider(self::REFERENCED_COLLECTION, [UnitTestDataAggregatedClass::class], function () use ($entityPool, $codecSet) {

            $collection = static::createDatabase()->selectCollection(self::REFERENCED_COLLECTION);
            $reflect    = new \ReflectionClass(UnitTestDataAggregatedClass::class);

            return new EntityRepository(self::REFERENCED_COLLECTION, new MongoDbStorageDriver($entityPool, $codecSet, $collection, $reflect));
        });

        // get the repos for use in the tests
        self::$mainRepo = self::$storage->getRepositoryByName(self::MAIN_COLLECTION);
        self::$mainRepo->buildIndexes();

        self::$referencedRepo = self::$storage->getRepositoryByName(self::REFERENCED_COLLECTION);
        self::$referencedRepo->buildIndexes();
    }

    public function setUp()
    {
        // clear the repo before every test
        self::$mainRepo->removeAll([]);
        self::$referencedRepo->removeAll([]);
    }

    public function testDuplicateInsertMustFailOnDuplicateId()
    {
        $first = new UnitTestDataMainClass();
        $first->setId('ID');

        self::$mainRepo->insert($first);

        $second = new UnitTestDataMainClass();
        $second->setId('ID');

        // Try inserting the same again and it must raise an exception.
        try {
            self::$mainRepo->insert($second);

            self::fail('Inserting a duplicate must fail');

        } catch (DuplicateError $e) {

            self::assertSame(
                self::DB_NAME . '.' . self::MAIN_COLLECTION,
                $e->getTable(),
                'The duplicate error must have the correct table'
            );

            self::assertSame(
                '_id_',
                $e->getIndex(),
                'The duplicate error must have the correct index'
            );

            self::assertSame(
                '{ : "ID" }',
                $e->getData(),
                'The duplicate error must have the correct data'
            );
        }
    }

    public function testDuplicateInsertMustFailOnDuplicateReference()
    {
        $first = new UnitTestDataMainClass();
        $first->setReference('REF');

        self::$mainRepo->insert($first);

        $second = new UnitTestDataMainClass();
        $second->setReference('REF');

        // Try inserting the same again and it must raise an exception.
        try {
            self::$mainRepo->insert($second);

            self::fail('Inserting a duplicate on a unique field like "reference" must fail. Did you forget to set up the indexes?');

        } catch (DuplicateError $e) {

            self::assertSame(
                self::DB_NAME . '.' . self::MAIN_COLLECTION,
                $e->getTable(),
                'The duplicate error must have the correct table'
            );

            self::assertSame(
                'reference_1',
                $e->getIndex(),
                'The duplicate error must have the correct index'
            );

            self::assertSame(
                '{ : "REF" }',
                $e->getData(),
                'The duplicate error must have the correct data'
            );
        }
    }
}
