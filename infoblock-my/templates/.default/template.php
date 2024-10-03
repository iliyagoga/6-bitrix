<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$APPLICATION->SetAdditionalCSS('/local/components/bitrix/infoblock-my/templates/.default/template_styles.css');
?>

<div class="list">

<?
foreach($arResult['ITEMS'] as $group):
    foreach($group as $gr=>$item):
?>
<div class="item">

<?
    foreach($item as $k=>$v):
?>
<span>
    <? if($k=='SEARCHABLE_CONTENT'){
        echo $v;
        }?>
</span>
<?
    endforeach;

    ?>
</div>
<?
endforeach;
endforeach;
?>

</div>

