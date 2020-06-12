<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true); ?>

<div class="lite-gallery loading">
    <div class="lite-gallery_tab">

    <? foreach ($arResult["ITEMS"] as $arItem): ?>
         <div class="lite-gallery_title tab-title_js" data-target="<?=$arItem["ID"];?>">
             <?=$arItem["NAME"];?>
         </div>
    <? endforeach; ?>

    </div>

    <div class="lite-gallery_content">

    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <div class="lite-gallery_box" data-id="<?=$arItem["ID"];?>">
            <div class="flex-row">
                <div class="col-sm-6">
                    <div class="lite-gallery_view">
                        <a data-fancybox href="<?=$arItem["IMAGES"][0]["BIG"];?>">
                            <img src="<?=$arItem["IMAGES"][0]["BIG"];?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="lite-gallery_wrapper">
                    <? $count = count($arItem["IMAGES"]);
                    foreach ($arItem["IMAGES"] as $image): ?>
                        <div class="lite-gallery_item" data-view="<?=$image["BIG"];?>">
                            <picture>
                                <img data-src="<?=$image["SMALL"];?>" alt="">
                            </picture>
                        </div>
                    <? endforeach; ?>
                    </div>
                    <? if($count > 20): ?>
                        <div class="lite-gallery_show-hidden">
                            <span></span>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    <? endforeach; ?>

    </div>
</div>
