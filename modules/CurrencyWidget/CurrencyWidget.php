<?php

include_once('vtlib/Vtiger/Module.php');

class CurrencyWidget {

	function vtlib_handler($moduleName, $eventType) {
		$adb = PearDatabase::getInstance();
		
		
		if ($eventType == 'module.postinstall') {
			$potentials = Vtiger_Module::getInstance('Home');
			$potentials->addLink('DASHBOARDWIDGET', 'Курс валют', 'index.php?module=CurrencyWidget&view=ShowWidget&name=CurrencyWidget','', '7');
            global $vtiger_current_version;
            $widgetType = "HEADERSCRIPT";
            $widgetName = "CurrencyWidgetJs";
            if (version_compare($vtiger_current_version, "7.0.0", "<")) {
                $template_folder = "layouts/vlayout";
            } else {
                $template_folder = "layouts/v7";
            }
            $link = $template_folder . "/modules/CurrencyWidget/resources/CurrencyWidget.js";
            include_once "vtlib/Vtiger/Module.php";
            $moduleNames = array("CurrencyWidget");
            foreach ($moduleNames as $moduleName) {
                $module = Vtiger_Module::getInstance($moduleName);
                if ($module) {
                    $module->addLink($widgetType, $widgetName, $link);
                }
            }
            $adb = PearDatabase::getInstance();
            $sql = "SELECT id FROM `vtiger_cron_task` WHERE `module` = 'CurrencyWidget'";
            $res = $adb->pquery($sql, array());
            if (!$adb->num_rows($res)) {
                $adb->pquery("INSERT INTO `vtiger_cron_task` (`name`, `handler_file`, `frequency`, `status`, `module`, `sequence`) VALUES ('Currency Widget', 'modules/CurrencyWidget/cron/Currency.service', '1800', '1', 'CurrencyWidget', '100')", array());
            }
		}
		else if ($eventType == 'module.disabled') {
            $potentials = Vtiger_Module::getInstance('Home');
			$potentials->deleteLink('DASHBOARDWIDGET', 'Курс валют', 'index.php?module=CurrencyWidget&view=ShowWidget&name=CurrencyWidget');
            global $vtiger_current_version;
            $widgetType = "HEADERSCRIPT";
            $widgetName = "CurrencyWidgetJs";
            if (version_compare($vtiger_current_version, "7.0.0", "<")) {
                $template_folder = "layouts/vlayout";
            } else {
                $template_folder = "layouts/v7";
            }
            $link = $template_folder . "/modules/CurrencyWidget/resources/CurrencyWidget.js";
            include_once "vtlib/Vtiger/Module.php";
            $moduleNames = array("CurrencyWidget");
            foreach ($moduleNames as $moduleName) {
                $module = Vtiger_Module::getInstance($moduleName);
                if ($module) {
                    $module->deleteLink($widgetType, $widgetName, $link);
                }
            }
            $adb = PearDatabase::getInstance();
            $adb->pquery("DELETE FROM `vtiger_cron_task` WHERE (`module`='CurrencyWidget')", array());
		}
		else if ($eventType == 'module.enabled') {
            $potentials = Vtiger_Module::getInstance('Home');
			$potentials->addLink('DASHBOARDWIDGET', 'Курс валют', 'index.php?module=CurrencyWidget&view=ShowWidget&name=CurrencyWidget','', '7');
            global $vtiger_current_version;
            $widgetType = "HEADERSCRIPT";
            $widgetName = "CurrencyWidgetJs";
            if (version_compare($vtiger_current_version, "7.0.0", "<")) {
                $template_folder = "layouts/vlayout";
            } else {
                $template_folder = "layouts/v7";
            }
            $link = $template_folder . "/modules/CurrencyWidget/resources/CurrencyWidget.js";
            include_once "vtlib/Vtiger/Module.php";
            $moduleNames = array("CurrencyWidget");
            foreach ($moduleNames as $moduleName) {
                $module = Vtiger_Module::getInstance($moduleName);
                if ($module) {
                    $module->addLink($widgetType, $widgetName, $link);
                }
            }
            $adb = PearDatabase::getInstance();
            $sql = "SELECT id FROM `vtiger_cron_task` WHERE `module` = 'CurrencyWidget'";
            $res = $adb->pquery($sql, array());
            if (!$adb->num_rows($res)) {
                $adb->pquery("INSERT INTO `vtiger_cron_task` (`name`, `handler_file`, `frequency`, `status`, `module`, `sequence`) VALUES ('Currency Widget', 'modules/CurrencyWidget/cron/Currency.service', '1800', '1', 'CurrencyWidget', '100')", array());
            }
		}
		else if ($eventType == 'module.preuninstall') {
			$potentials = Vtiger_Module::getInstance('Home');
			$potentials->deleteLink('DASHBOARDWIDGET', 'Курс валют', 'index.php?module=CurrencyWidget&view=ShowWidget&name=CurrencyWidget');
            global $vtiger_current_version;
            $widgetType = "HEADERSCRIPT";
            $widgetName = "CurrencyWidgetJs";
            if (version_compare($vtiger_current_version, "7.0.0", "<")) {
                $template_folder = "layouts/vlayout";
            } else {
                $template_folder = "layouts/v7";
            }
            $link = $template_folder . "/modules/CurrencyWidget/resources/CurrencyWidget.js";
            include_once "vtlib/Vtiger/Module.php";
            $moduleNames = array("CurrencyWidget");
            foreach ($moduleNames as $moduleName) {
                $module = Vtiger_Module::getInstance($moduleName);
                if ($module) {
                    $module->deleteLink($widgetType, $widgetName, $link);
                }
            }
            $adb = PearDatabase::getInstance();
            $adb->pquery("DELETE FROM `vtiger_cron_task` WHERE (`module`='CurrencyWidget')", array());
		}
		else if ($eventType == 'module.postupdate') {
			$potentials = Vtiger_Module::getInstance('Home');
			$potentials->addLink('DASHBOARDWIDGET', 'Курс валют', 'index.php?module=CurrencyWidget&view=ShowWidget&name=CurrencyWidget','', '7');
            global $vtiger_current_version;
            $widgetType = "HEADERSCRIPT";
            $widgetName = "CurrencyWidgetJs";
            if (version_compare($vtiger_current_version, "7.0.0", "<")) {
                $template_folder = "layouts/vlayout";
            } else {
                $template_folder = "layouts/v7";
            }
            $link = $template_folder . "/modules/CurrencyWidget/resources/CurrencyWidget.js";
            include_once "vtlib/Vtiger/Module.php";
            $moduleNames = array("CurrencyWidget");
            foreach ($moduleNames as $moduleName) {
                $module = Vtiger_Module::getInstance($moduleName);
                if ($module) {
                    $module->addLink($widgetType, $widgetName, $link);
                }
            }
            $adb = PearDatabase::getInstance();
            $sql = "SELECT id FROM `vtiger_cron_task` WHERE `module` = 'CurrencyWidget'";
            $res = $adb->pquery($sql, array());
            if (!$adb->num_rows($res)) {
                $adb->pquery("INSERT INTO `vtiger_cron_task` (`name`, `handler_file`, `frequency`, `status`, `module`, `sequence`) VALUES ('Currency Widget', 'modules/CurrencyWidget/cron/Currency.service', '1800', '1', 'CurrencyWidget', '100')", array());
            }
		}
	}

}
