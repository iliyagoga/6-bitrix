<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Loader;
use Bitrix\Iblock;

class MyComponent extends CBitrixComponent{

    protected function getIblockIds($iblockType, $iblockId){
        $iblockids=[];
        $arFilter = [
            'IBLOCK_TYPE_ID' => $iblockType,
            'ACTIVE' => 'Y',
        ];
        if(empty($iblockId)){
            $is=Iblock\IblockTable::getList([
               'filter'=>$arFilter,
               'select'=>['ID']
              
            ]);
            while($el = $is->fetch()){
                array_push($iblockids,$el['ID']);
            }
        }
        else{
            array_push($iblockids,$iblockId);
        }
        return $iblockids;
    
    }
    protected function getElements($iblockType, $iblockId = null, $filter = [])
    {
    
        $elements = [];
        $iblockids=$this->getIblockIds($iblockType, $iblockId);

        $filter['IBLOCK_ID']=$iblockids;
        $dbElements = Iblock\ElementTable::getList([
            'filter'=>$filter
        ]);
        while ($element = $dbElements->fetch()) {
            $elements[$element['IBLOCK_ID']][] = $element;
        }

        return $elements;
    }

    public function start($iblockType, $iblockId = null, $filter = []){
        $res=$this->getElements($iblockType, $iblockId, $filter);
        return $res;
    }

    public function onPrepareComponentParams($arParams) {
        if (empty($arParams["IBLOCK_TYPE"])) {
            ShowError('IBLOCK_TYPE не может быь пустым');
        }
        if (!empty($arParams["IBLOCK_ID"]) && !preg_match('/^[0-9]+$/',$arParams["IBLOCK_ID"]) ) {
            ShowError('IBLOCK_ID может быть только числом');
        }
        
        return $arParams;
    }
}