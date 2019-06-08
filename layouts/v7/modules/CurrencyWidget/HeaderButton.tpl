{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}
{strip}
    <style>
        .buttonQuickUpdate {
            border-radius: 2px;
            background-image: none !important;
            box-shadow: none !important;
            line-height: 18px;
            cursor: pointer;
            font-weight: 400;
            padding: 6px 16px !important;
            margin: 4px 4px!important;
            background-color: green !important;
        }
        .vtebuttons-header-block{
            float: left;
            width: 25%;
        }
        .c-header{
            padding-top: 5px;
            margin-left: -22%;
        }
        #div_buttons{
            display: none;
        }
         .p-o-btn:hover {
             background-color: white!important;
             color: black!important;
         }
        </style>
    <li><button id="getCurrencies" class="buttonQuickUpdate p-o-btn" style="color: white;border: thin solid green !important; "><i class="fa fa-refresh"></i>&nbsp;&nbsp;Обновить валюты</button></li>
{/strip}