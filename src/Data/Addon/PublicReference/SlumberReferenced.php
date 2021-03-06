<?php
/**
 * File was created 05.10.2015 17:18
 */

namespace PeekAndPoke\Component\Slumber\Data\Addon\PublicReference;

use PeekAndPoke\Component\Slumber\Annotation\Slumber;

/**
 * Use this to auto fill the public reference of a persisted object when it is saved.
 *
 * This is handy if one does NOT want to expose internal database ids or similar.
 *
 * The implementation depends on a service being present.
 *
 * @see    SlumberDependencies
 * @see    PublicReferenceGenerator
 *
 * @author Karsten J. Gerber <kontakt@karsten-gerber.de>
 */
trait SlumberReferenced
{
    /**
     * @var string
     *
     * @see PublicReferenceGenerator
     *
     * @Slumber\AsString()
     *
     * @Slumber\Store\AsPublicReference(
     *      service = \PeekAndPoke\Component\Slumber\Data\Addon\PublicReference\PublicReferenceGenerator::SERVICE_ID,
     *      ofClass = \PeekAndPoke\Component\Slumber\Data\Addon\PublicReference\PublicReferenceGenerator::class,
     * )
     *
     * @Slumber\Store\Indexed(
     *     unique     = false,
     *     background = true,
     *     direction  = "ASC",
     *     sparse     = false,
     * )
     */
    protected $reference;

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     *
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }
}
