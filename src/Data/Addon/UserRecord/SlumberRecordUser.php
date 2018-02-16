<?php
/**
 * File was created 26.04.2016 07:24
 */

namespace PeekAndPoke\Component\Slumber\Data\Addon\UserRecord;

use PeekAndPoke\Component\Slumber\Annotation\Slumber;

/**
 * @author Karsten J. Gerber <kontakt@karsten-gerber.de>
 */
trait SlumberRecordUser
{
    /**
     * @see \PeekAndPoke\Component\Slumber\Data\Addon\UserRecord\UserRecordProvider
     *
     * @Slumber\AsObject(\PeekAndPoke\Component\Slumber\Data\Addon\UserRecord\UserRecord::class)
     *
     * @Slumber\Store\AsUserRecord(
     *     service = \PeekAndPoke\Component\Slumber\Data\Addon\UserRecord\UserRecordProvider::SERVICE_ID,
     *     ofClass = \PeekAndPoke\Component\Slumber\Data\Addon\UserRecord\UserRecordProvider::class,
     * )
     */
    protected $createdBy;

    /**
     * @return UserRecord
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
