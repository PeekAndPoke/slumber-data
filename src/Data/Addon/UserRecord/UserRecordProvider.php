<?php
/**
 * File was created 08.10.2015 19:11
 */

namespace PeekAndPoke\Component\Slumber\Data\Addon\UserRecord;

/**
 * @author Karsten J. Gerber <kontakt@karsten-gerber.de>
 */
interface UserRecordProvider
{
    public const SERVICE_ID = 'slumber.data.addon.user_record.provider';

    /**
     * @return UserRecord
     */
    public function getUserRecord();
}
