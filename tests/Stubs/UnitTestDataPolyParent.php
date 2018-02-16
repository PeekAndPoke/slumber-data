<?php
/**
 * File was created 14.05.2016 22:26
 */

namespace PeekAndPoke\Component\Slumber\Stubs;

use PeekAndPoke\Component\Slumber\Annotation\Slumber;

/**
 * @Slumber\Polymorphic(
 *     {
 *          "a": UnitTestDataPolyChildA::class,
 *          "b": UnitTestDataPolyChildB::class
 *     },
 *     tellBy = "type",
 *     default = UnitTestDataPolyChildC::class
 * )
 *
 * @author Karsten J. Gerber <kontakt@karsten-gerber.de>
 */
abstract class UnitTestDataPolyParent
{
    /**
     * @var string
     *
     * @Slumber\AsString()
     */
    protected $common;

    /**
     * @return string
     */
    public function getCommon()
    {
        return $this->common;
    }

    /**
     * @param string $common
     *
     * @return $this
     */
    public function setCommon($common)
    {
        $this->common = $common;

        return $this;
    }
}
