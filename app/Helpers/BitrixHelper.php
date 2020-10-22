<?php

namespace App\Helpers;

use App\Models\Entry;

class BitrixHelper
{
    /**
     * @param Entry $entry
     * @return array
     */
    public static function setDataAddLead(Entry $entry)
    {
        return ['fields' => [
            'TITLE' => 'Заявка от: ' . $entry->name . ' ' . $entry->lastname,
            'LAST_NAME' => $entry->lastname,
            'NAME' => $entry->name,
            'PHONE' => array(array('VALUE' => $entry->phone, 'VALUE_TYPE' => 'WORK')),
            'EMAIL' => array(array('VALUE' => $entry->email, 'VALUE_TYPE' => 'WORK')),
            env('BITRIX_CUSTOM_FIELD_DEPARTMENT') => $entry->department,
            env('BITRIX_CUSTOM_FIELD_NAME_OF_THESIS') => $entry->nameOfThesis,
            env('BITRIX_CUSTOM_FIELD_CONFERENCE_TITLE') => $entry->events->title,
            'SOURCE_DESCRIPTION' => 'CRM-форма',
        ],
            'params' => array('REGISTER_SONET_EVENT' => 'Y'),
        ];
    }
}


