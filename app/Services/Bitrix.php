<?php

namespace App\Services;

class Bitrix
{

    public static function setLeadParameters($input)
    {

// setLead and putLead defined in app\helpers.php

        $queryUrl = env('BITRIX_URL');
        $queryData = setLead($input);
        putLead($queryUrl,$queryData);

    }

}



