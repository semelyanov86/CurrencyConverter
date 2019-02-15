<?php

class CurrencyWidget_HeaderButton_View extends Vtiger_IndexAjax_View
{
    public function __construct()
    {
        parent::__construct();
    }

    public function process(Vtiger_Request $request)
    {
        $moduleSelected = $request->get("moduleSelected");
        $module = "CurrencyWidget";
        $viewer = $this->getViewer($request);
        global $adb;

        echo $viewer->view("HeaderButton.tpl", $module, true);
    }

}

?>