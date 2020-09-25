<?php

namespace App\Services;

class Bitrix
{

    public static function setLeadParameters($input)
    {

        $queryUrl = env('BITRIX_URL');
        $queryData = setLead($input);
        putLead($queryUrl,$queryData);

    }


}



