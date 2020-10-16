<?php

namespace App\Helpers;

use App\Members;

class BitrixHelper
{
    /**
     * @param Members $members
     * @return array
     */
    public static function setDataAddLead(Members $members){

        return ['fields' => [

            'TITLE' => 'Заявка от: ' . $members['name'] . ' ' . $members['lastname'],
            'LAST_NAME' => $members['lastname'],
            'NAME' => $members['name'],
            'PHONE' => array(array('VALUE' => $members['phone'], 'VALUE_TYPE' => 'WORK')),
            'EMAIL' => array(array('VALUE' => $members['emailAddress'], 'VALUE_TYPE' => 'WORK')),
            'UF_CRM_1599747566' => $members['department'],
            'UF_CRM_1599747582' => $members['nameOfThesis'],
            'SOURCE_DESCRIPTION' => 'CRM-форма',
        ],
            'params' => array('REGISTER_SONET_EVENT' => 'Y'),
        ];

    }

}
