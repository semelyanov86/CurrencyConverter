<?php

require_once 'modules/Settings/Currency/models/Record.php';
require_once 'modules/CurrencyWidget/vendor/autoload.php';

class CurrencyWidget_ActionAjax_Action extends Vtiger_Action_Controller
{
    public function checkPermission(Vtiger_Request $request)
    {
    }
    public function __construct()
    {
        parent::__construct();
        $this->exposeMethod("getCurrencies");
    }

    public function process(Vtiger_Request $request)
    {
        $mode = $request->get("mode");
        if (!empty($mode)) {
            $this->invokeExposedMethod($mode, $request);
        }
    }
    public function getCurrencies(Vtiger_Request $request)
    {
        global $adb;
        $allCurrencies = Settings_Currency_Record_Model::getAll();
        $rate = new AndyDune\CurrencyRateCbr\DailyRate();
        $isOk = $rate->retrieve();
        $response = new Vtiger_Response();
        $response->setEmitType(Vtiger_Response::$EMIT_JSON);
        if ($isOk) {
            foreach ($allCurrencies as $current) {
                if ($current->get('currency_code') == 'RUB') {
                    continue;
                }
                $item = $rate->get($current->get('currency_code'));
                $current->set('conversion_rate', $item->getValue());
                $current->save();
            }
            $response->setResult(array("result" => "success"));
            $response->emit();
        } else {
            $response->setError('No response from CB', "Ошибка получения данных с сервера ЦБ");
            $response->emit();
        }

    }

}

?>