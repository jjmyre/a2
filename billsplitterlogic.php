<?php
require('form.php');

#Instaniate Form class
$form = new DWA\Form($_GET);

if($form->isSubmitted()) {
	
	# Input Values
	$bill = $form->get('bill','');

	$split = $form->get('split','');

	$tipPercent = $form->get('tipPercent','0');
	
	$combineTip = $form->isChosen('combineTip');
	
	$roundUp = $form->isChosen('roundUp');

	# Bill split/tip calculator logic

	$tipAmount = number_format(($bill * $tipPercent), 2, '.', '');
	$billTotal = number_format(($bill + $tipAmount), 2, '.', '');
	

	if($combineTip) {
		$eachPersonPays = number_format(($billTotal / $split), 2, '.', '');
	}
	elseif(!$combineTip) {
		$eachPersonPays = number_format(($bill / $split), 2, '.', '');
	}
	
	if($roundUp) {
		$eachPersonPays = ceil($eachPersonPays);
	}
	
	# Validation
	$errors = $form->validate([
		'bill' => 'required',
		'split' => 'required|numeric'
		]);
	return $errors;

}  

# Sanitize Function (instead of including tools.php, I copied it over)
    
function sanitize($mixed = null) {
    if(!is_array($mixed)) {
        return convertHtmlEntities($mixed);
    }

    function array_map_recursive($callback, $array) {
        $func = function ($item) use (&$func, &$callback) {
            return is_array($item) ? array_map($func, $item) : call_user_func($callback, $item);
        };
        return array_map($func, $array);
    }

    return array_map_recursive('convertHtmlEntities', $mixed);
}   
    
function convertHtmlEntities($mixed) {
    return htmlentities($mixed, ENT_QUOTES, "UTF-8");
}














