<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<?global $APPLICATION; $fields = CSite::GetByID(SITE_ID)->Fetch();?>
	<?IncludeTemplateLangFile(__FILE__);?>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/media.css');?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/colors.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/jquery.fancybox-1.3.4.css');?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/css/flexslider.css');?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.7.1.min.js',true)?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.elastislide.js',true)?> 
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jqModal.js',true)?> 
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.fancybox-1.3.4.pack.js',true)?> 
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.ui-slider.js',true)?> 
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/slides.min.js',true)?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/screen.js',true)?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.flexslider-min.js',true)?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.maskedinput-1.2.2.js',true)?> 
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.easing.1.3.js',true)?> 
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.validate.js',true)?>
    <!-- << --> <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/general.js',true)?> <!-- >> -->
	<?$APPLICATION->AddheadString("<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,500italic,700,700italic&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>")?>
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/fonts/pf/stylesheet.css');?>
	<?$APPLICATION->ShowHead()?>

	<script>
		jQuery.extend(jQuery.validator.messages, {
			required: "<?=GetMessage('VALIDATOR_REQUIRED')?>",
			remote: "<?=GetMessage('VALIDATOR_REMOTE')?>",
			email: "<?=GetMessage('VALIDATOR_EMAIL')?>",
			url: "<?=GetMessage('VALIDATOR_URL')?>",
			date: "<?=GetMessage('VALIDATOR_DATE')?>",
			dateISO: "<?=GetMessage('VALIDATOR_DATEISO')?>",
			number: "<?=GetMessage('VALIDATOR_NUMBER')?>",
			digits: "<?=GetMessage('VALIDATOR_DIGITS')?>",
			creditcard: "<?=GetMessage('VALIDATOR_CREDITCARD')?>",
			equalTo: "<?=GetMessage('VALIDATOR_EQUALtO')?>",
			accept: "<?=GetMessage('VALIDATOR_ACCEPT')?>",
			maxlength: jQuery.validator.format("<?=GetMessage('VALIDATOR_MAXLENGTH')?>"),
			minlength: jQuery.validator.format("<?=GetMessage('VALIDATOR_MINLENGTH')?>"),
			rangelength: jQuery.validator.format("<?=GetMessage('VALIDATOR_RANGELENGTH')?>"),
			range: jQuery.validator.format("<?=GetMessage('VALIDATOR_RANGE')?>"),
			max: jQuery.validator.format("<?=GetMessage('VALIDATOR_MAX')?>"),
			min: jQuery.validator.format("<?=GetMessage('VALIDATOR_MIN')?>")
		});
	</script>
	<?
		if (CSite::InDir('/index.php')){ $isFrontPage = true; } 
		$isAdv = false;
		if (CSite::InDir('/catalog/sale/') || CSite::InDir('/catalog/hit/') || CSite::InDir('/catalog/recommend/') || CSite::InDir('/catalog/new/') || CSite::InDir('/company/') || CSite::InDir('/info/') || CSite::InDir('/personal/index.php') || CSite::InDir('/personal/profile/') || CSite::InDir('/help/')){
			$isAdv = true; }
		if( CSite::InDir('/stores/') ){ $isStores = true; }
		if( CSite::InDir('/catalog/') ){ $isCatalog = true; }
    if( CSite::InDir('/info/') ){ $isInfo = true; }
		if( CSite::InDir('/contacts/') ){ $isContacts = true; }
		$issale =  false;
		if( CSite::InDir('/sale/index.php') ){ $issale=true; }
    if ( CSite::InDir('/company/blog/') || CSite::InDir('/company/films/') ) $isblog=true; else $isblog=false;
		
	?>
</head>

<body> 	<?CAjax::Init();?> 	
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
 <div class="grey_bar">
    <div class="grey_content">
        <?$APPLICATION->IncludeComponent("bitrix:menu", "top_menu", array(
                "ROOT_MENU_TYPE" => "top",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_TIME" => "6000000",
                "MENU_CACHE_USE_GROUPS" => "N",
                "MENU_CACHE_GET_VARS" => array( ),
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "left",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N",
                "IBLOCK_CATALOG_TYPE" => "disney_catalog",
                "IBLOCK_CATALOG_ID" => "16",
                "IBLOCK_CATALOG_DIR" => "/catalog/"
            ), false
        );?> 	
<div class="wrapper"> 
  <div class="top_bg"> 
    <div class="top_block"> <?$APPLICATION->IncludeComponent(
	"bitrix:search.title",
	"shop",
	Array(
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "5",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES" => "N",
		"SHOW_OTHERS" => "N",
		"PAGE" => "/catalog/",
		"CATEGORY_0_TITLE" => GetMessage("ITEMS"),
		"CATEGORY_0" => array(0=>"iblock_disney_catalog",),
		"CATEGORY_0_iblock_disney_catalog" => array(0=>"all",),
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-input",
		"CONTAINER_ID" => "title-search"
	)
);?> 
      <div class="shop_description"> <?$APPLICATION->IncludeFile("/include/description.php", Array(), Array( "MODE"      => "html","NAME"      => GetMessage("DESCRIPTION"), ) );?> </div>
     <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"top",
	Array(
		"REGISTER_URL" => "/auth/",
		"FORGOT_PASSWORD_URL" => "/auth/",
		"PROFILE_URL" => "/personal/",
		"SHOW_ERRORS" => "Y"
	)
);?> 
      <div class="clearboth"></div>
     </div>
   </div>
 		
  <div class="header"> 			
    <div class="logo"> 				<?$APPLICATION->IncludeFile("/include/logo.php", Array(), Array( "MODE"      => "html", "NAME"      => GetMessage("LOGO"), 	) );?> 			</div>
   
    <div class="phone_feedback"> <?$APPLICATION->IncludeFile("/include/phone_feedback.php", Array(), Array( "MODE" => "html", "NAME" => GetMessage("PHONE"), ) );?> 
      <div class="addressline"> <?$APPLICATION->IncludeFile("/include/header_store.php", Array(), Array( "MODE" => "html", "NAME" => GetMessage("PHONE"), ) );?> </div>
     </div>
   			
    <div id="basket_small" class="basket"> 				<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.small",
	"small-basket",
	Array(
		"PATH_TO_BASKET" => "/basket/",
		"PATH_TO_ORDER" => "/order/"
	)
);?> 			</div>
   			
    <div class="clearboth"></div>
   			<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"cat_menu",
	Array(
		"ROOT_MENU_TYPE" => "top",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "6000000",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"IBLOCK_CATALOG_TYPE" => "disney_catalog",
		"IBLOCK_CATALOG_ID" => "16",
		"IBLOCK_CATALOG_DIR" => "/catalog/"
	)
);?> 		</div>
 		 		
  <div class="content &lt;img id=" bxid_954784"="" src="/bitrix/images/fileman/htmledit2/php.gif" border="0">&quot;&gt; 			<?if( $isCatalog ):?>
    <div id="ajax_catalog"><?endif;?> 			<?if( $issale ): ?> 			<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"front_slider",
	Array(
		"IBLOCK_TYPE" => "disney_content",
		"IBLOCK_ID" => "20",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
		"PROPERTY_CODE" => array(0=>"LINK",1=>"",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "189",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "�������",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 			<?endif;?> 			<?if( $isAdv ):?> 				
      <div class="container left"> 					
        <div class="inner_left no_right_side"> 			<?endif;?> 			 			<?if( !$isFrontPage && !$isCatalog && !$issale):?> 				<?if (!$isInfo):?> 
          <h1 class="title"><?$APPLICATION->ShowTitle(false)?></h1>
         <?else:?> 
          <h1 class="title" />
         <?endif;?> 				<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"content",
	Array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => ""
	)
);?> 				
          <div class="shadow-item_info"><img border="0" src="<?=SITE_TEMPLATE_PATH?>/img/shadow-item_info.png"  /></div>
         			<?endif;?> 			 			<?if( !$isCatalog ):?> 				
          <div class="content_menu_mini"> 					<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"inner_menu",
	Array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600000",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);?> 				</div>
         				<?if (!$isFrontPage&&!$issale&&!$isStores&&!$isContacts):?> 					
          <div class="left_block"> <?if($isblog): /* hiding standart menu, showing somespecial content */?> <?$APPLICATION->ShowViewContent("left_sidebar");?> <?else;?> 						<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"inner_menu_vertical",
	Array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600000",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => "",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);?> <?endif;?> 						<?if( $isAdv ):?> 							<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"advt",
	Array(
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "disney_content",
		"IBLOCK_ID" => "20",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",),
		"PROPERTY_CODE" => array(0=>"LINK",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "40",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "�������",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N"
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);?> 						<?endif;?> 					</div>
         				<?endif;?> 			<?endif;?> 		 				 			 	<?if( $isCatalog && $_REQUEST["mode"] == "ajax" ){ $APPLICATION->RestartBuffer();}?>#WORK_AREA#<?if( $isCatalog && $_REQUEST["mode"] == "ajax" ){
				die();
			}?>			<?if( $isAdv ):?> 					</div>
       
<!-- end inner_left -->
 				</div>
     
<!-- end container -->
 			<?endif;?> 			<?if( $isCatalog ):?> 				</div>
   			<?endif;?> 			
    <div class="clearboth"></div>
   		</div>

  <div class="clearboth"></div>
 	</div>
 	
<div class="footer_wr"> 		
  <div class="footer_inner"> 			
    <div class="left_col"> 				
      <div class="copy"> 					<?$APPLICATION->IncludeFile("/include/copy.php", Array(), Array( "MODE"  => "html", "NAME" => GetMessage("COPY"), ));?> 				</div>
     				<?/*
				    <div class="social_link">
    					<?$APPLICATION->IncludeComponent("aspro:social.info", ".default", array(
    						"CACHE_TYPE" => "A",
    						"CACHE_TIME" => "36000000",
    						"CACHE_GROUPS" => "Y",
    						"VK" => COption::GetOptionString("ishop", "shopVk", "", SITE_ID),
    						"FACE" => COption::GetOptionString("ishop", "shopFacebook", "", SITE_ID),
    						"TWIT" => COption::GetOptionString("ishop", "shopTwitter", "", SITE_ID)
    						),
    						false
    					);?> 				</div>
   				?&gt;*/ ?>
    <div class="page__social"> <a class="social__icon icon-vk" title="Toy House ВКонтакте" href="http://vk.com/toyhouse_tmn" ></a> <a class="social__icon icon-fb" title="Toy House в Facebook" href="http://www.facebook.com/ToyHouse.tmn" ></a> <a class="social__icon icon-ig" title="Toy House в Instagram" href="http://instagram.com/toyhouse_tmn" ></a> <a class="social__icon icon-gp" title="Toy House в Google+" href="http://plus.google.com/u/0/118336718914821891359/posts" ></a> <?/*<a id="bxid_549140" class="social__icon icon-fb" title="LEGO в Facebook" href="http://www.facebook.com/pages/Go-Lego/200727050112701" ></a>
                    <a id="bxid_23322" class="social__icon icon-ok" title="LEGO в Одноклассниках" href="http://www.odnoklassniki.ru/group/54316567822342" ></a>
                    <a id="bxid_227932" class="social__icon icon-ig" title="LEGO в Instagram" href="http://instagram.com/lego_tmn" ></a>
                    <a id="bxid_642079" class="social__icon icon-gp" title="LEGO в Google+" href="http://plus.google.com/u/0/109347097956960773348/posts" ></a>*/?> </div>
   
    <div class="payment"> <?$APPLICATION->IncludeFile("/include/payment.php", Array(), Array( "MODE"      => "html", "NAME"      => GetMessage("PAYMENT"), ) );?> </div>
   			</div>
 			
  <div class="center_col"> <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"leftbottom",
	Array(
		"ROOT_MENU_TYPE" => "leftbottom",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "600000",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => "",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"bottom_menu",
	Array(
		"ROOT_MENU_TYPE" => "bottom",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "600000",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	)
);?> <?/*$APPLICATION->IncludeComponent("bitrix:menu", "bottom_menu", array(
                        "ROOT_MENU_TYPE" => "left",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "600000",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ), false
                );*/?> 			</div>
 			
  <div class="right_col"> 				
    <div class="phone_feedback"> 					<?$APPLICATION->IncludeFile("/include/phone_feedback.php", Array(), Array( "MODE"      => "html", "NAME"      => GetMessage("PHONE"), ) );?> 				</div>
   
    <div id="remark-copy"> <a href="http://remark72.ru" >Интернет-магазин создан</a>
      <br />
     в интерактивном агентстве Ремарк </div>
   			</div>
 		</div>
 		<?$APPLICATION->IncludeFile("/include/bottom_include1.php", Array(), Array( "MODE"      => "text", "NAME"      => GetMessage("ARBITRARY_2"), )); ?> 		<?$APPLICATION->IncludeFile("/include/bottom_include2.php", Array(), Array( "MODE"      => "text", "NAME"      => GetMessage("ARBITRARY_2"), )); ?> 	 	 	
<div class="found_cheaper_frame popup"></div>
 	
<div class="staff_send_frame popup"></div>
 	
<div class="resume_send_frame popup"></div>
 	
<div class="compare_frame popup"></div>
 	
<div class="add_item_frame popup"></div>
 	
<div class="one_click_buy_frame popup"></div>
 	
<div class="offers_stores_frame popup"></div>
 	 <?/*	<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter23382955 = new Ya.Metrika({id:23382955, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img id="bxid_315006" src="//mc.yandex.ru/watch/23382955" style="position:absolute; left:-9999px;" alt=""  /></div></noscript><!-- /Yandex.Metrika counter --> */?>
<!-- Yandex.Metrika counter -->
 
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter38635965 = new Ya.Metrika({
                    id:38635965,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
 <noscript>
  <div><img src="https://mc.yandex.ru/watch/38635965" style="position:absolute; left:-9999px;"  /></div>
</noscript> 
<!-- /Yandex.Metrika counter -->

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = '168904';
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->

<script type="text/javascript">
                    /* <![CDATA[ */
                    var google_conversion_id = 971090005;
                    var google_custom_params = window.google_tag_params;
                    var google_remarketing_only = true;
                    /* ]]> */
                </script>
 
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
                </script>
 <noscript> 
  <div style="display: inline;"> <img height="1" width="1" style="border-style:none;" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/971090005/?value=0&amp;guid=ON&amp;script=0"  /> </div>
 </noscript> 
<script type='text/javascript'>
var ssa = 'c4a68c3472fd7dad';
var ssaUrl = ('https:' == document.location.protocol ? 'https://' : 'http://') + 
'pixel.sitescout.com/iap/' + ssa;
new Image().src=ssaUrl;
</script>
 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58234010-1', 'auto');
  ga('send', 'pageview');

</script>
 
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=NsfZMp*rt2JmNpUL3q27ikUPqo7Coeb8OBOIirzDD0rV5k6QNIpHcG3fEuPqyTyJodkgCIAwSX9YjM0y17iRT9/WglSLRA6E3SARVw7ZiKgQypL8LyBNNl*6JzF78LXqP31yYnIM26*qhN7S6z06JX7Fgrwj2apJ0hF0KSkLjsQ-';</script>
 </body>
</html>