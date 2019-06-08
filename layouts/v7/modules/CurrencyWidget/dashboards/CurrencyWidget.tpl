<script type="text/javascript">
    Vtiger_Barchat_Widget_Js('Vtiger_Currencywidget_Widget_Js',{},{});
</script>
<style>
    {literal}
    ul.select2-choices {
        max-width: 200px;
    }
    {/literal}
</style>

<div class="dashboardWidgetHeader">
    {include file="dashboards/WidgetHeader.tpl"|@vtemplate_path:$MODULE_NAME}
</div>

<div class="dashboardWidgetContent">
    {include file="dashboards/CurrencyContents.tpl"|@vtemplate_path:$MODULE_NAME}
</div>
<div class="widgeticons dashBoardWidgetFooter">
    <div class="filterContainer">
        <div class="row">
            <div class="col-sm-12">
                <span class="col-lg-4">
                    <span>
                        <strong>{vtranslate('Created Time', $MODULE_NAME)}</strong>
                    </span>
                </span>
                <div class="col-lg-7">
                    <div class="input-daterange input-group dateRange widgetFilter" data-date-multidate="false" data-date-end-date="0d" id="datepicker" name="createdtime">
                        <input type="text" class="input-sm form-control" data-date-multidate="false" data-date-end-date="0d" name="start" style="height:30px;"  value="{$CURDATE}" />
                        {*<span class="input-group-addon"></span>*}
                        <input type="text" class="" name="end" data-date-end-date="0d" data-date-multidate="false" style="height:0px; width: 0px;" hidden/>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-sm-12">
                <span class="col-lg-4">
                        <span>
                            <strong>{vtranslate('Choose Currency', $MODULE_NAME)}</strong>
                        </span>
                </span>
                <span class="col-lg-7">
                    <select class="select2 col-sm-12 widgetFilter reloadOnChange" multiple name="currencies">
                        {foreach from=$FULLRATES key=KEY item=RATE}
                            {assign var=CURCURRENCY value=$RATEMODEL->get($KEY)}
                            <option value="{$KEY}"  {if $KEY|in_array:$RATES} selected {/if}>{$CURCURRENCY->getName()}</option>
                        {/foreach}
                    </select>
                </span>
            </div>
        </div>
    </div>
    <div class="widgeticons dashBoardWidgetFooter">
        <div class="footerIcons pull-right">
            {include file="dashboards/DashboardFooterIcons.tpl"|@vtemplate_path:$MODULE_NAME SETTING_EXIST=true}
        </div>
    </div>
    {literal}
    <script>
        function setDateParams() {

            jQuery('.select2-search-field').prop('hidden', true)
        }

        setTimeout(setDateParams, 3000);
    </script>
{/literal}