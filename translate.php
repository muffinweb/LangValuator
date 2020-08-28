<?php 

/**
 * @author Ugur Cengiz
 * @link ugurcengiz.com
 *
 */

require 'vendor/autoload.php';

use Stichoza\GoogleTranslate\GoogleTranslate;

$tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
$tr->setSource('en'); // Translate from English
$tr->setTarget('tr'); // Translate to Turkish

function convertWordsToArray($langArray, $recursiveMode = false){
	global $tr;
	$responseArr = [];
	foreach($langArray as $index => $value){
		if(gettype($value) == 'array'){
			$responseArr[$index] = convertWordsToArray($value, true);
		}else{
			$responseArr[$index] = $tr->translate($value);
		}
		
	}

    if($recursiveMode){
        return $responseArr;
    }else{
        return var_export($responseArr);
    }
}

if(isset($_POST['translateRequest'])){
    extract($_POST);

     eval("
        if(is_array($translateRequest)){
            echo convertWordsToArray($translateRequest);
        }
    ");
}

?>