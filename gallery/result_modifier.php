<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["ITEMS"] as $key => $arItem) {

    $images = [];

    foreach ($arItem["PROPERTIES"]["IMAGES"]["VALUE"] as $arImage) {
        //$big = CFile::ResizeImageGet($arImage, array('width'=>1200, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $small = CFile::ResizeImageGet($arImage, array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_PROPORTIONAL, true);
        $images[] = array(
            "BIG" => CFile::GetPath($arImage),
            "SMALL" => $small["src"],
        );
    }

    $arResult["ITEMS"][$key]["IMAGES"] = $images;

}