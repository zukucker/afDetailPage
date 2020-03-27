{extends file="parent:frontend/detail/content/buy_container.tpl"}
{block name="frontend_detail_data_ordernumber"}
{$smarty.block.parent}
{if $af_dp_image}
    <img src="{$af_dp_image}">
{/if}
{/block}

