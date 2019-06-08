/* ********************************************************************************
 * The content of this file is subject to the Custom Header/Bills ("License");
 * You may not use this file except in compliance with the License
 * The Initial Developer of the Original Code is VTExperts.com
 * Portions created by VTExperts.com. are Copyright(C) VTExperts.com.
 * All Rights Reserved.
 * ****************************************************************************** */

Vtiger.Class("CurrencyWidget_Js", {
    instance: false,
    getInstance: function () {
        if (CurrencyWidget_Js.instance == false) {
            var instance = new CurrencyWidget_Js();
            CurrencyWidget.instance = instance;
            return instance;
        }
        return CurrencyWidget.instance;
    }
},{
    registerShowButton:function(){
        var self = this;
        if (app.getModuleName() != 'Currency') {
            return false;
        }
        var params = {};
        params['module'] = 'CurrencyWidget';
        params['view'] = 'HeaderButton';
        params['moduleSelected'] = app.getModuleName();
        app.request.post({data:params}).then(
            function(err,data) {
                if(err == null){
                    var detailview_header = jQuery('#appnav .navbar-nav:first');
                    detailview_header.append(data);
                    $("#div_buttons").fadeIn(700);
                    self.registerButtonsPostLoadEvents();
                }
            },
            function(error) {
            }
        );

    },

    registerButtonsPostLoadEvents: function() {
        var thisInstance = this;
        var params = {};
        params['module'] = 'CurrencyWidget';
        params['action'] = 'ActionAjax';
        params['mode'] = 'getCurrencies';
        jQuery('#appnav').on('click', '#getCurrencies', function(e) {
           app.helper.showProgress();
           e.preventDefault();
           app.request.post({data: params}).then(
               function (err,data) {
                   if(!err){
                        app.helper.showSuccessNotification({message: 'Курсы были успешно обновлены'});
                        location.reload();
                   } else {
                       app.helper.showErrorNotification({'message' : 'Ошибка получения данных с сервера ЦБ'});
                       // app.helper.showErrorMessage('Ошибка получения данных с сервера ЦБ');
                   }
                   app.helper.hideProgress();
               },
           )
        });
    },
    registerEvents: function(){
        this.registerShowButton();

    }
});

jQuery(document).ready(function () {

    var moduleName = app.getModuleName();
    var viewName = app.getViewName();
    if(moduleName == 'Currency'){
        var instance = new CurrencyWidget_Js();
        instance.registerEvents();
    }
});

