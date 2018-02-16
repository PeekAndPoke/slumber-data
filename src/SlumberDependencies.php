<?php
/**
 * File was created 08.10.2015 21:23
 */

namespace PeekAndPoke\Component\Slumber;

use PeekAndPoke\Component\Slumber\Data\Addon\PublicReference\PublicReferenceGenerator;
use PeekAndPoke\Component\Slumber\Data\Addon\UserRecord\UserRecordProvider;

/**
 * @deprecated
 *
 * @author Karsten J. Gerber <kontakt@karsten-gerber.de>
 */
class SlumberDependencies
{
    /**
     * Key of the service for providing public references
     */
    public const PUBLIC_REFERENCE_GENERATOR = PublicReferenceGenerator::SERVICE_ID;
    /**
     * The expected type of the service
     *
     * @see \PeekAndPoke\Component\Slumber\Data\Addon\PublicReference\PublicReferenceGenerator
     */
    public const PUBLIC_REFERENCE_GENERATOR_CLASS = PublicReferenceGenerator::class;

    /**
     * Key of the service providing info about the currently logged in user
     */
    public const USER_RECORD_PROVIDER = UserRecordProvider::SERVICE_ID;
    /**
     * The expected type of the service
     *
     * @see UserRecordProvider
     */
    public const USER_RECORD_PROVIDER_CLASS = UserRecordProvider::class;
}
