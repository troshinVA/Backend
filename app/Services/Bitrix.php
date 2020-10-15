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
    public function addLead($input)
    {

        $queryUrl = env('BITRIX_URL') . 'crm.lead.add.json';
        $queryData = http_build_query(
            array(
                'fields' => array(

                    'TITLE' => 'Заявка от: ' . $input['name'] . ' ' . $input['lastname'],
                    'LAST_NAME' => $input['lastname'],
                    'NAME' => $input['name'],
                    'PHONE' => array(array('VALUE' => $input['phone'], 'VALUE_TYPE' => 'WORK')),
                    'EMAIL' => array(array('VALUE' => $input['emailAddress'], 'VALUE_TYPE' => 'WORK')),
                    'UF_CRM_1599747566' => $input['department'],
                    'UF_CRM_1599747582' => $input['nameOfThesis'],
                    'SOURCE_DESCRIPTION' => 'CRM-форма',
                ),
                'params' => array('REGISTER_SONET_EVENT' => 'Y')
            )
        );

        $this->curlBitrixConnect($queryData, $queryUrl);

    }

    /**
     * @param  $id
     * @return mixed
     */
    public function getLead($id)
    {
        $queryUrl = env('BITRIX_URL') . 'crm.lead.get.json';
        $queryData = http_build_query(
            [
                'id' => $id
            ]
        );

        return $this->curlBitrixConnect($queryData, $queryUrl);
    }

    /**
     * @return mixed
     */
    public function getLeadList()
    {
        $queryUrl = env('BITRIX_URL') . 'crm.lead.list.json';
        $queryData = http_build_query(
            array(

                'filter' => array(),

                'select' => ['ID','UF_CRM_1599747582']
            )
        );

        return $this->curlBitrixConnect($queryData, $queryUrl);

    }

    /**
     * @param  $queryData
     * @param  $queryUrl
     * @return mixed
     */
    public function curlBitrixConnect($queryData, $queryUrl)
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

        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, true);
    }

    /**
     * @param $speakers
     * @return mixed
     */
    public function checkLeadStatus($speakers)
    {

        $leadList = $this->getLeadList();

        $count = 0;

        foreach ($leadList['result'] as $lead) {

            $leadInfo = $this->getLead($lead['ID']);

            if ($leadInfo['result']['STATUS_ID'] == 'CONVERTED') {

                $speakers[strval($count)]['status'] = 'Принят';

            }

            $count++;
        }
        return $speakers;
    }
}
