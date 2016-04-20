<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");

if (!CModule::IncludeModule("coffeediz.git")) 
    return; //подключаем модуль

$repo = Git::open('/home/a/a92661qd/coursera/public_html/');
$log = $repo->log($format="Commit::: %H\n%P\n%cn\n%B\n%N");
$commits = explode("Commit::: ", $log);
array_shift($commits);

$line_count = 1;
foreach ($commits as $id => &$commit) {
	$strings = explode("\n", $commit);
	$hash = array_shift($strings);
	$GitLog[$hash]['HASH'] = $hash;
	if($id == 0) $GitLog[$hash]['LINE_NUMBER'] =0;
	else $GitLog[$hash]['LINE_NUMBER'] = $hash_line_number[$hash];
	$parrents = explode(" ", array_shift($strings));
	foreach ($parrents as $i => &$parrent) {
		$GitLog[$hash]['PARRENTS'][] = $parrent;
		$Parrent_Child[$parrent][] = $GitLog[$hash]['HASH'];
		if (empty($parrent)) echo"!!!!%";
		if ($i==0  & !empty($hash_line_number[$parrent])) $hash_line_number[$parrent] = $GitLog[$hash]['LINE_NUMBER'];
		if ($i>0 & empty($hash_line_number[$parrent])) $line_count +=1;
	}
	$GitLog[$hash]['AUTHOR_NAME'] = array_shift($strings);
	$GitLog[$hash]['SUBJECT'] = array_shift($strings);
	$GitLog[$hash]['NOTES'] = array_shift($strings);

	if(!empty($Parrent_Child[$GitLog[$hash]['HASH']])){
		$GitLog[$hash]['CHILDS'] = $Parrent_Child[$GitLog[$hash]['HASH']];
		if (empty($GitLog[$hash]['PARRENTS'][0])){
			echo '&&&';
			$line_count += -count($GitLog[$hash]['CHILDS']);
		}
	}

	$GitLog[$hash]['LINES_COUNT'] = $line_count;

	//if($id == 0) $GitLog[$hash]['LINE_NUMBER'] =0;
	//else $GitLog[$hash]['LINE_NUMBER'] = $hash_line_number[$hash];


}

foreach ($GitLog as $hash => &$commit) {
	print_r ('<p>*'.$hash.'</p>');
}

echo'<pre>';
print_r($GitLog);
//print_r($hash_line_number);
echo'</pre>';

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>