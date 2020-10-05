<?php

namespace App\Services;
/**
 * Class Bitrix
 *
 * @package App\Services
 */
class Bitrix
{
    /**
     * Generate URL-encoded query string with lead's data
     *
     * @param  $input
     * @return string $queryData
     */
    public function setData($input)
    {
        $queryData = http_build_query(
            array(
                'fields' => array(

                    "TITLE" => "Заявка от: " . $input["name"] . " " . $input["lastname"],
                    "LAST_NAME" => $input["lastname"],
                    "NAME" => $input["name"],
                    "PHONE" => array(array("VALUE" => $input["phone"], "VALUE_TYPE" => "WORK")),
                    "EMAIL" => array(array("VALUE" => $input["emailAddress"], "VALUE_TYPE" => "WORK")),
                    "UF_CRM_1599747566" => $input["department"],
                    "UF_CRM_1599747582" => $input["nameOfThesis"],
                    "SOURCE_DESCRIPTION" => "CRM-форма",
                ),
                'params' => array("REGISTER_SONET_EVENT" => "Y")
            )
        );
        return ($queryData);
    }

    /**
     *  Initialize - Set options of - Perform - Close a cURL session
     *
     * @param  $queryData
     * @param  $queryUrl
     * @return void
     */
    public function createLead($queryData, $queryUrl)
    {

        $curl = curl_init();
        curl_setopt_array(
            $curl, array(
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_POST => 1,
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $queryUrl,
                CURLOPT_POSTFIELDS => $queryData,
            )
        );

        curl_exec($curl);
        curl_close($curl);
    }

}

