<?php
/**
 * File was created 12.10.2015 06:49
 */

namespace PeekAndPoke\Component\Slumber\Helper;

use PeekAndPoke\Component\Slumber\Data\Addon\PublicReference\PublicReferenceGenerator;
use PeekAndPoke\Component\Slumber\Data\Addon\UserRecord\UserRecordProvider;
use PeekAndPoke\Component\Slumber\StaticServiceProvider;

/**
 * @author Karsten J. Gerber <kontakt@karsten-gerber.de>
 */
class UnitTestServiceProvider extends StaticServiceProvider
{
    public function __construct()
    {
        $this->set(PublicReferenceGenerator::SERVICE_ID, new UnitTestPublicReferenceGenerator());

        $this->set(UserRecordProvider::SERVICE_ID, new UnitTestUserRecordProvider());
    }
}
