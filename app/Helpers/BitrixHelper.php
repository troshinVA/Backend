<?php

namespace App\Helpers;

use App\Member;

class BitrixHelper
{
    /**
     * @param Member $member
     * @return array
     */
    public static function setDataAddLead(Member $member)
    {
        return ['fields' => [
                'TITLE' => 'Заявка от: ' . $member->name . ' ' . $member->lastname,
                'LAST_NAME' => $member->lastname,
                'NAME' => $member->name,
                'PHONE' => array(array('VALUE' => $member->phone, 'VALUE_TYPE' => 'WORK')),
                'EMAIL' => array(array('VALUE' => $member->emailAddress, 'VALUE_TYPE' => 'WORK')),
                'UF_CRM_1599747566' => $member->department,
                'UF_CRM_1599747582' => $member->nameOfThesis,
                'SOURCE_DESCRIPTION' => 'CRM-форма',
            ],
            'params' => array('REGISTER_SONET_EVENT' => 'Y'),
        ];
    }
}
