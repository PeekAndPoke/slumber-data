<?php
/**
 * File was created 12.10.2015 06:34
 */

namespace PeekAndPoke\Component\Slumber\Stubs;

use PeekAndPoke\Component\GeoJson\Point;
use PeekAndPoke\Component\Slumber\Annotation\Slumber;
use PeekAndPoke\Component\Slumber\Data\Addon\PublicReference\SlumberUniquelyReferenced;
use PeekAndPoke\Component\Slumber\Data\Addon\SlumberId;
use PeekAndPoke\Component\Slumber\Data\Addon\SlumberTimestamped;
use PeekAndPoke\Component\Slumber\Data\Addon\UserRecord\SlumberRecordUser;
use PeekAndPoke\Component\Slumber\Data\LazyDbReference;
use PeekAndPoke\Component\Slumber\Data\LazyDbReferenceCollection;
use PeekAndPoke\Types\LocalDate;

/**
 * @author Karsten J. Gerber <kontakt@karsten-gerber.de>
 */
class UnitTestDataMainClass
{
    use SlumberId;
    use SlumberUniquelyReferenced;
    use SlumberTimestamped;
    use SlumberRecordUser;

    /**
     * @var UnitTestDataAggregatedClass
     *
     * @Slumber\AsObject(UnitTestDataAggregatedClass::class)
     */
    private $anObject;

    /**
     * @var UnitTestDataPolyParent[]
     *
     * @Slumber\AsList(
     *     @Slumber\AsObject(UnitTestDataPolyParent::class)
     * )
     */
    private $aListOfPolymorphics;

    /**
     * @var UnitTestDataAggregatedClass
     *
     * @Slumber\AsObject(UnitTestDataAggregatedClass::class)
     * @Slumber\Store\AsDbReference(lazy = true)
     */
    private $aReferencedObject;

    /**
     * @var UnitTestDataAggregatedClass[]
     *
     * @see LazyDbReferenceCollection
     *
     * @Slumber\AsList(
     *     @Slumber\AsObject(UnitTestDataAggregatedClass::class),
     * )
     * @Slumber\Store\AsDbReference(lazy = true)
     */
    private $aListOfReferencedObjects;

    /**
     * @var UnitTestDataAggregatedClass[][]
     *
     * @Slumber\AsList(
     *     @Slumber\AsMap(
     *         @Slumber\AsObject(UnitTestDataAggregatedClass::class)
     *     )
     * )
     * @Slumber\Store\AsDbReference(lazy = true)
     */
    private $aListOfMapsOfReferencedObjects;

    /**
     * @var string[]
     *
     * @Slumber\AsMap(@Slumber\AsString())
     */
    private $aMapOfStrings = [];

    /**
     * @var int[]
     *
     * @Slumber\AsMap(@Slumber\AsInteger())
     */
    private $aMapOfIntegers = [];

    /**
     * @var mixed[]
     *
     * @Slumber\AsMap(@Slumber\AsIs())
     */
    private $aMapOfMixed = [];

    /**
     * @var UnitTestDataAggregatedClass[]
     *
     * @Slumber\AsMap(
     *     @Slumber\AsObject(UnitTestDataAggregatedClass::class)
     * )
     */
    private $aMapOfObjects = [];

    /**
     * @var UnitTestDataCollection
     *
     * @see UnitTestDataCollection
     *
     * @Slumber\AsList(
     *     @Slumber\AsString(),
     *     collection = UnitTestDataCollection::class
     * )
     */
    private $aListOfStringWrappedInACollClass;

    /**
     * @var string[][]
     *
     * @Slumber\AsList(
     *     @Slumber\AsList(
     *         @Slumber\AsString()
     *     )
     * )
     */
    private $aListOfListsOfStrings = [];

    /**
     * @var int[][]
     *
     * @Slumber\AsList(
     *     @Slumber\AsList(
     *         @Slumber\AsInteger()
     *     )
     * )
     */
    private $aListOfListsOfIntegers = [];

    /**
     * @var int[][]
     *
     * @Slumber\AsMap(
     *     @Slumber\AsList(
     *         @Slumber\AsInteger()
     *     )
     * )
     */
    private $aMapOfListsOfIntegers = [];

    /**
     * @var int[][]
     *
     * @Slumber\AsMap(
     *     @Slumber\AsMap(
     *         @Slumber\AsInteger()
     *     )
     * )
     */
    private $aMapOfMapsOfIntegers = [];

    /**
     * @var int[][]
     *
     * @Slumber\AsList(
     *     @Slumber\AsList(
     *         @Slumber\AsIs()
     *     )
     * )
     */
    private $aListOfListsOfMixed = [];

    /**
     * @var UnitTestDataAggregatedClass[][]
     *
     * @Slumber\AsList(
     *     @Slumber\AsList(
     *         @Slumber\AsObject(UnitTestDataAggregatedClass::class)
     *     )
     * )
     */
    private $aListOfListsOfObjects = [];

    /**
     * @var bool
     *
     * @Slumber\AsBool()
     */
    private $aBool;

    /**
     * @var bool
     *
     * @Slumber\AsBool()
     */
    private $anotherBool;

    /**
     * @var float
     *
     * @Slumber\AsDecimal()
     */
    private $aDecimal;

    /**
     * @var int
     *
     * @Slumber\AsInteger()
     */
    private $anInteger;

    /**
     * @var string
     *
     * @Slumber\AsString()
     */
    private $aString;

    /**
     * @var string|null
     *
     * @Slumber\AsString()
     */
    private $aStringContainingNull;

    /**
     * @var \DateTime
     *
     * @Slumber\AsSimpleDate()
     */
    private $aSimpleDate;

    /**
     * @var LocalDate
     *
     * @Slumber\AsLocalDate()
     */
    private $aLocalDate;

    /**
     * @var string
     *
     * @Slumber\AsIs()
     */
    private $aSomethingAsIs;

    /**
     * @var float
     *
     * @Slumber\AsIs()
     */
    private $aSomethingElseAsIs;

    /**
     * @var Point
     *
     * @Slumber\GeoJson\AsPoint()
     */
    private $aGeoJsonPoint;

    /**
     * UnitTestMainClass constructor.
     */
    public function __construct()
    {
        $this->aListOfStringWrappedInACollClass = new UnitTestDataCollection();
    }

    /**
     * @return UnitTestDataAggregatedClass
     */
    public function getAnObject()
    {
        return $this->anObject;
    }

    /**
     * @param UnitTestDataAggregatedClass $anObject
     *
     * @return $this
     */
    public function setAnObject($anObject)
    {
        $this->anObject = $anObject;

        return $this;
    }

    /**
     * @return UnitTestDataPolyParent[]
     */
    public function getAListOfPolymorphics()
    {
        return $this->aListOfPolymorphics;
    }

    /**
     * @param UnitTestDataPolyParent[] $aListOfPolymorphics
     *
     * @return $this
     */
    public function setAListOfPolymorphics($aListOfPolymorphics)
    {
        $this->aListOfPolymorphics = $aListOfPolymorphics;

        return $this;
    }

    /**
     * @return UnitTestDataAggregatedClass
     */
    public function getAReferencedObject()
    {
        return LazyDbReference::unwrap($this->aReferencedObject);
    }

    /**
     * @param UnitTestDataAggregatedClass $aReferencedObject
     *
     * @return $this
     */
    public function setAReferencedObject($aReferencedObject)
    {
        $this->aReferencedObject = $aReferencedObject;

        return $this;
    }

    /**
     * @return UnitTestDataAggregatedClass[]
     */
    public function getAListOfReferencedObjects()
    {
        return $this->aListOfReferencedObjects;
    }

    /**
     * @param UnitTestDataAggregatedClass[] $aListOfReferencedObjects
     *
     * @return $this
     */
    public function setAListOfReferencedObjects($aListOfReferencedObjects)
    {
        $this->aListOfReferencedObjects = $aListOfReferencedObjects;

        return $this;
    }

    /**
     * @return UnitTestDataAggregatedClass[][]
     */
    public function getAListOfMapsOfReferencedObjects()
    {
        return $this->aListOfMapsOfReferencedObjects;
    }

    /**
     * @param UnitTestDataAggregatedClass[][] $aListOfMapsOfReferencedObjects
     *
     * @return $this
     */
    public function setAListOfMapsOfReferencedObjects($aListOfMapsOfReferencedObjects)
    {
        $this->aListOfMapsOfReferencedObjects = $aListOfMapsOfReferencedObjects;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getAMapOfStrings()
    {
        return $this->aMapOfStrings;
    }

    /**
     * @param string[] $aMapOfStrings
     *
     * @return $this
     */
    public function setAMapOfStrings($aMapOfStrings)
    {
        $this->aMapOfStrings = $aMapOfStrings;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getAMapOfIntegers()
    {
        return $this->aMapOfIntegers;
    }

    /**
     * @param int[] $aMapOfIntegers
     *
     * @return $this
     */
    public function setAMapOfIntegers($aMapOfIntegers)
    {
        $this->aMapOfIntegers = $aMapOfIntegers;

        return $this;
    }

    /**
     * @return mixed[]
     */
    public function getAMapOfMixed()
    {
        return $this->aMapOfMixed;
    }

    /**
     * @param mixed[] $aMapOfMixed
     *
     * @return $this
     */
    public function setAMapOfMixed($aMapOfMixed)
    {
        $this->aMapOfMixed = $aMapOfMixed;

        return $this;
    }

    /**
     * @return UnitTestDataAggregatedClass[]
     */
    public function getAMapOfObjects()
    {
        return $this->aMapOfObjects;
    }

    /**
     * @param mixed $aMapOfObjects
     *
     * @return $this
     */
    public function setAMapOfObjects($aMapOfObjects)
    {
        $this->aMapOfObjects = $aMapOfObjects;

        return $this;
    }

    /**
     * @return UnitTestDataCollection
     */
    public function getAListOfStringWrappedInACollClass()
    {
        return $this->aListOfStringWrappedInACollClass;
    }

    /**
     * @param UnitTestDataCollection $aListOfStringWrappedInACollClass
     *
     * @return $this
     */
    public function setAListOfStringWrappedInACollClass(UnitTestDataCollection $aListOfStringWrappedInACollClass)
    {
        $this->aListOfStringWrappedInACollClass = $aListOfStringWrappedInACollClass;

        return $this;
    }

    /**
     * @return \string[][]
     */
    public function getAListOfListsOfStrings()
    {
        return $this->aListOfListsOfStrings;
    }

    /**
     * @param \string[][] $aListOfListsOfStrings
     *
     * @return $this
     */
    public function setAListOfListsOfStrings($aListOfListsOfStrings)
    {
        $this->aListOfListsOfStrings = $aListOfListsOfStrings;

        return $this;
    }

    /**
     * @return \int[][]
     */
    public function getAListOfListsOfIntegers()
    {
        return $this->aListOfListsOfIntegers;
    }

    /**
     * @param \int[][] $aListOfListsOfIntegers
     *
     * @return $this
     */
    public function setAListOfListsOfIntegers($aListOfListsOfIntegers)
    {
        $this->aListOfListsOfIntegers = $aListOfListsOfIntegers;

        return $this;
    }

    /**
     * @return \int[][]
     */
    public function getAMapOfListsOfIntegers()
    {
        return $this->aMapOfListsOfIntegers;
    }

    /**
     * @param \int[][] $aMapOfListsOfIntegers
     *
     * @return $this
     */
    public function setAMapOfListsOfIntegers($aMapOfListsOfIntegers)
    {
        $this->aMapOfListsOfIntegers = $aMapOfListsOfIntegers;

        return $this;
    }

    /**
     * @return \int[][]
     */
    public function getAMapOfMapsOfIntegers()
    {
        return $this->aMapOfMapsOfIntegers;
    }

    /**
     * @param \int[][] $aMapOfMapsOfIntegers
     *
     * @return $this
     */
    public function setAMapOfMapsOfIntegers($aMapOfMapsOfIntegers)
    {
        $this->aMapOfMapsOfIntegers = $aMapOfMapsOfIntegers;

        return $this;
    }

    /**
     * @return \int[][]
     */
    public function getAListOfListsOfMixed()
    {
        return $this->aListOfListsOfMixed;
    }

    /**
     * @param \int[][] $aListOfListsOfMixed
     *
     * @return $this
     */
    public function setAListOfListsOfMixed($aListOfListsOfMixed)
    {
        $this->aListOfListsOfMixed = $aListOfListsOfMixed;

        return $this;
    }

    /**
     * @return UnitTestDataAggregatedClass[][]
     */
    public function getAListOfListsOfObjects()
    {
        return $this->aListOfListsOfObjects;
    }

    /**
     * @param UnitTestDataAggregatedClass[][] $aListOfListsOfObjects
     *
     * @return $this
     */
    public function setAListOfListsOfObjects($aListOfListsOfObjects)
    {
        $this->aListOfListsOfObjects = $aListOfListsOfObjects;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getABool()
    {
        return $this->aBool;
    }

    /**
     * @param boolean $aBool
     *
     * @return $this
     */
    public function setABool($aBool)
    {
        $this->aBool = $aBool;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getAnotherBool()
    {
        return $this->anotherBool;
    }

    /**
     * @param boolean $anotherBool
     *
     * @return $this
     */
    public function setAnotherBool($anotherBool)
    {
        $this->anotherBool = $anotherBool;

        return $this;
    }

    /**
     * @return float
     */
    public function getADecimal()
    {
        return $this->aDecimal;
    }

    /**
     * @param float $aDecimal
     *
     * @return $this
     */
    public function setADecimal($aDecimal)
    {
        $this->aDecimal = $aDecimal;

        return $this;
    }

    /**
     * @return int
     */
    public function getAnInteger()
    {
        return $this->anInteger;
    }

    /**
     * @param int $anInteger
     *
     * @return $this
     */
    public function setAnInteger($anInteger)
    {
        $this->anInteger = $anInteger;

        return $this;
    }

    /**
     * @return string
     */
    public function getAString()
    {
        return $this->aString;
    }

    /**
     * @param string $aString
     *
     * @return $this
     */
    public function setAString($aString)
    {
        $this->aString = $aString;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getAStringContainingNull()
    {
        return $this->aStringContainingNull;
    }

    /**
     * @param null|string $aStringContainingNull
     *
     * @return $this
     */
    public function setAStringContainingNull($aStringContainingNull)
    {
        $this->aStringContainingNull = $aStringContainingNull;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getASimpleDate()
    {
        return $this->aSimpleDate;
    }

    /**
     * @param \DateTime $aSimpleDate
     *
     * @return $this
     */
    public function setASimpleDate($aSimpleDate)
    {
        $this->aSimpleDate = $aSimpleDate;

        return $this;
    }

    /**
     * @return LocalDate
     */
    public function getALocalDate()
    {
        return $this->aLocalDate;
    }

    /**
     * @param LocalDate $aLocalDate
     *
     * @return $this
     */
    public function setALocalDate($aLocalDate)
    {
        $this->aLocalDate = $aLocalDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getASomethingAsIs()
    {
        return $this->aSomethingAsIs;
    }

    /**
     * @param string $aSomethingAsIs
     *
     * @return $this
     */
    public function setASomethingAsIs($aSomethingAsIs)
    {
        $this->aSomethingAsIs = $aSomethingAsIs;

        return $this;
    }

    /**
     * @return float
     */
    public function getASomethingElseAsIs()
    {
        return $this->aSomethingElseAsIs;
    }

    /**
     * @param float $aSomethingElseAsIs
     *
     * @return $this
     */
    public function setASomethingElseAsIs($aSomethingElseAsIs)
    {
        $this->aSomethingElseAsIs = $aSomethingElseAsIs;

        return $this;
    }

    /**
     * @return Point
     */
    public function getAGeoJsonPoint()
    {
        return $this->aGeoJsonPoint;
    }

    /**
     * @param Point $aGeoJsonPoint
     *
     * @return $this
     */
    public function setAGeoJsonPoint(Point $aGeoJsonPoint)
    {
        $this->aGeoJsonPoint = $aGeoJsonPoint;

        return $this;
    }
}
