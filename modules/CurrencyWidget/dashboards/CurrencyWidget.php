<?php
require_once 'modules/CurrencyWidget/vendor/autoload.php';
class CurrencyWidget_CurrencyWidget_Dashboard extends Vtiger_IndexAjax_View {

    public $rates = array();

    public function process(Vtiger_Request $request) {
        global $currentModule;
        global $timeZone;
        $createdtime = $request->get('createdtime');
        $currencies = $request->get('currencies');
        $allCurrencies = Settings_Currency_Record_Model::getAll();
        $array_rates = array();
        if (count($allCurrencies) > 1) {
            foreach ($allCurrencies as $current) {
                if ($current->get('currency_code') == 'RUB') {
                    continue;
                }
                $array_rates[] = $current->get('currency_code');
            }
        } else {
            $array_rates[] = 'USD';
        }
        $this->rates = $array_rates;
        $date = date('Y-m-d H:i:s');
        if ($createdtime) {
            $endDate = explode(' ', $createdtime['start']);
            $endTime = explode(' ', $date);
            $fixDate = date_create($endDate[0]);
            date_add($fixDate, date_interval_create_from_date_string('1 day'));
            $fixDate = date_format($fixDate, 'Y-m-d');
            $date = $fixDate . ' ' . $endTime[1];
        }
//        var_dump($date);die;
        if ($currencies) {
            $this->rates = $currencies;
        }
        $rows = $request->get('rows');
        $linkId = $request->get('linkid');
        if (!$rows) {
            $rows = 25;
        }
        $rate = new AndyDune\CurrencyRateCbr\DailyRate();
        $rate->setDate(new \DateTime($date)); // не обязательно - по умолчанию используется текущая дата
        $isOk = $rate->retrieve(); // true если данные успешно получены

        // Извлекаем курс доллара
        /*        if ($isOk) {
                    $item = $rate->get('usd');
                    var_dump($item);die;
                }*/
        $currentUser = Users_Record_Model::getCurrentUserModel();

        $qualifiedModuleName = $request->get("module");
        $qualifiedModuleModel = Vtiger_Module_Model::getInstance($qualifiedModuleName);
        $widget = Vtiger_Widget_Model::getInstance($linkId, $currentUser->getId());
        $viewer = $this->getViewer($request);
        $accessibleUsers = $currentUser->getAccessibleUsersForModule($qualifiedModuleName);
        $viewer->assign('ACCESSIBLE_USERS', $accessibleUsers);
        $viewer->assign('WIDGET', $widget);
        $viewer->assign("ISOK", $isOk);
        $viewer->assign("MODULE", $qualifiedModuleName);
        $viewer->assign("CREATEDTIME", $createdtime);
        $viewer->assign("CURDATE", DateTimeField::convertToUserFormat(date('Y-m-d')));
        $viewer->assign("QUALIFIED_MODEL", $qualifiedModuleModel);
        $viewer->assign("MODULE_NAME", $qualifiedModuleName);
        $viewer->assign("RATES", $this->rates);
        $viewer->assign("FULLRATES", $rate->data);
        $viewer->assign("RATEMODEL", $rate);
        $content = $request->get('content');
        if(!empty($content)) {
            $viewer->view('dashboards/CurrencyContents.tpl', $qualifiedModuleName);
        } else {
            $viewer->view('dashboards/CurrencyWidget.tpl', $qualifiedModuleName);
        }

    }


    protected function getGroupsIdsForUsers($userId)
    {
        vimport("~~/include/utils/GetUserGroups.php");
        $userGroupInstance = new GetUserGroups();
        $userGroupInstance->getAllUserGroups($userId);
        return $userGroupInstance->user_groups;
    }

}