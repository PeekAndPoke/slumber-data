<?php
/**
 * File was created 14.05.2016 22:28
 */

namespace PeekAndPoke\Component\Slumber\Stubs;

use PeekAndPoke\Component\Slumber\Annotation\Slumber;

/**
 * @author Karsten J. Gerber <kontakt@karsten-gerber.de>
 */
class UnitTestDataPolyChildA extends UnitTestDataPolyParent
{
    /**
     * @var string
     *
     * @Slumber\AsString()
     */
    private $type = 'a';

    /**
     * @var string
     *
     * @Slumber\AsString()
     */
    private $propOnA;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getPropOnA()
    {
        return $this->propOnA;
    }

    /**
     * @param string $propOnA
     *
     * @return $this
     */
    public function setPropOnA($propOnA)
    {
        $this->propOnA = $propOnA;

        return $this;
    }
}
