<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
use Bitrix\Main\Localization\Loc;
$arComponentParameters = array(
    "PARAMETERS" => array(
       "IBLOCK_TYPE" => [
        "PARENT" => "BASE",
        "NAME" => GetMessage('IBLOCK_TYPE_NAME'),
        "TYPE" => "STRING",
        "MULTILINE" => "N",
        "DEFAULT" => "",
    ],
    "IBLOCK_ID" => [
        "PARENT" => "BASE",
        "NAME" => GetMessage('IBLOCK_ID_NAME'),
        "TYPE" => "STRING",
        "MULTILINE" => "N",
        "DEFAULT" => "",
    ],

    ),
);