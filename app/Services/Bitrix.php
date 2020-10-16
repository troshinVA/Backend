<?php

namespace App\Services;
use App\Helpers\BitrixHelper;


/**
 * Class Bitrix
 *
 * @package App\Services
 */
class Bitrix
{
    /**
     * @param $queryDataInput
     */
    public function addLead($queryDataInput)
    {

        $action = 'crm.lead.add.json';
        $this->curlBitrixConnect($queryDataInput, $action);

    }

    /**
     * @param  $id
     * @return mixed
     */
    public function getLead($id)
    {
        $action = 'crm.lead.get.json';
        $queryDataInput = ['id' => $id];

        return $this->curlBitrixConnect($queryDataInput, $action);
    }

    /**
     * @return mixed
     */
    public function getLeadList()
    {
        $action = 'crm.lead.list.json';
        $queryDataInput = ['id'];

        return $this->curlBitrixConnect($queryDataInput, $action);

    }


    public function deleteLead($id)
    {

        $action = 'crm.lead.delete.json';
        $queryDataInput = ['id' => $id];

        return $this->curlBitrixConnect($queryDataInput, $action);

    }

    /**
     * @param $speakers
     * @return mixed
     */
    public function checkLeadStatus($speakers)
    {
        $leadList = $this->getLeadList();
        $count = 0;
//        $this->deleteLead('121');
//        dd($leadList);
        foreach ($leadList['result'] as $lead) {
            $leadInfo = $this->getLead($lead['ID']);

            if ($leadInfo['result']['STATUS_ID'] == 'CONVERTED') {

                $speakers[strval($count)]['status'] = '1';

            }

            $count++;
        }
        return $speakers;
    }

    /**
     * @param array $queryDataInput
     * @param string $action
     * @return mixed
     */
    public function curlBitrixConnect(array $queryDataInput, string $action)
    {
        $queryData = http_build_query($queryDataInput);
        $queryUrl = env('BITRIX_URL') . $action;

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
}
