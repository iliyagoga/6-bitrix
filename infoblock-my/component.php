<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$res= $this->start($arParams['IBLOCK_TYPE'], $arParams['IBLOCK_ID'], $arParams['FILTER']);
$arResult['ITEMS']=$res;
$this->IncludeComponentTemplate()
?>