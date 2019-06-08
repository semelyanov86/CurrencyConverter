{strip}
    <div>
        {if !$ISOK}
        {vtranslate('LBL_NO_RECORDS', $MODULE)}
        {else}
        {foreach item=RATE from=$RATES}
            <div style="padding-bottom:6px;">
                {assign var=CURRATE value=$RATEMODEL->get($RATE)}
                <span class="pull-right">{$CURRATE->getValue()}</span>
                <a href="#">{$CURRATE->getName()}</a>
            </div>
        {/foreach}
        {/if}
    </div>
{/strip}