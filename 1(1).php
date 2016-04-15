<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");




?><?$APPLICATION->IncludeComponent(
	"coffeediz:question.form", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"CORRECT_UNSWERS_ID" => "",
		"CORRECT_UNSWERS_XML_ID" => array(
			0 => "mMe9BjX3",
			1 => "9y9H1fwq",
			2 => "",
		),
		"FORM_ID" => "0",
		"HIGHLOAD_ID" => "2",
		"NOTFULL_UNSWERS_ID" => "",
		"NOTFULL_UNSWERS_XML_ID" => array(
		),
		"REQUIRED_FIELDS" => array(
			0 => "MESSAGE",
		),
		"UF_ID" => "",
		"UNCORRECT_UNSWERS_ID" => "",
		"UNCORRECT_UNSWERS_XML_ID" => array(
		),
		"USE_CAPTCHA" => "Y",
		"OK_TEXT" => "Спасибо, ваше сообщение принято."
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>