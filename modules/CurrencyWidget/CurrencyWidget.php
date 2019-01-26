<?php

include_once('vtlib/Vtiger/Module.php');

class CurrencyWidget {

	function vtlib_handler($moduleName, $eventType) {
		$adb = PearDatabase::getInstance();
		
		
		if ($eventType == 'module.postinstall') {
			$potentials = Vtiger_Module::getInstance('Home');
			$potentials->addLink('DASHBOARDWIDGET', 'Курс валют', 'index.php?module=CurrencyWidget&view=ShowWidget&name=CurrencyWidget','', '7');          
		}
		else if ($eventType == 'module.disabled') {
            $potentials = Vtiger_Module::getInstance('Home');
			$potentials->deleteLink('DASHBOARDWIDGET', 'Курс валют', 'index.php?module=CurrencyWidget&view=ShowWidget&name=CurrencyWidget');
		}
		else if ($eventType == 'module.enabled') {
            $potentials = Vtiger_Module::getInstance('Home');
			$potentials->addLink('DASHBOARDWIDGET', 'Курс валют', 'index.php?module=CurrencyWidget&view=ShowWidget&name=CurrencyWidget','', '7');            
		}
		else if ($eventType == 'module.preuninstall') {
			$potentials = Vtiger_Module::getInstance('Home');
			$potentials->deleteLink('DASHBOARDWIDGET', 'Курс валют', 'index.php?module=CurrencyWidget&view=ShowWidget&name=CurrencyWidget');
		}
		else if ($eventType == 'module.postupdate') {
			$potentials = Vtiger_Module::getInstance('Home');
			$potentials->addLink('DASHBOARDWIDGET', 'Курс валют', 'index.php?module=CurrencyWidget&view=ShowWidget&name=CurrencyWidget','', '7');            
		}
	}

}
