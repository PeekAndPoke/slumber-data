<?php
/**
 * File was created 11.02.2016 17:26
 */

namespace PeekAndPoke\Component\Slumber\Data\MongoDb;

use PeekAndPoke\Component\Slumber\Core\LookUp\EntityConfigReader;

/**
 * @author Karsten J. Gerber <kontakt@karsten-gerber.de>
 */
class MongoDbEntityConfigReaderImpl implements MongoDbEntityConfigReader
{
    /** @var EntityConfigReader */
    private $delegate;

    public function __construct(EntityConfigReader $delegate)
    {
        $this->delegate = $delegate;
    }

    /**
     * @param \ReflectionClass $subject
     *
     * @return MongoDbEntityConfig
     */
    public function getEntityConfig(\ReflectionClass $subject)
    {
        $parent = $this->delegate->getEntityConfig($subject);

        return MongoDbEntityConfig::from($parent);
    }
}
