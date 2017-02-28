<?php
require('form.php');

#Instaniate Form class
$form = new DWA\Form($_GET);

if($form->isSubmitted()) {

	# Input Values
	$bill = $form->get('bill','');
	$splitNumber = $form->get('split','');
	$tipPercent = $form->get('tipPercent','0');
	$combineTip = $form->isChosen('combineTip');
	$roundUp = $form->isChosen('roundUp');
	
	# Bill split/tip calculator logic
	$tipAmount = number_format(($bill * $tipPercent), 2, '.', '');
	$billTotal = number_format(($bill + $tipAmount), 2, '.', '');
	$eachPersonPays;

	if($combineTip) {
		$eachPersonPays = number_format(($billTotal/$splitNumber), 2, '.', '');
	}
	elseif(!$combineTip) {
		$eachPersonPays = number_format(($bill/$splitNumber), 2, '.', '');
	}

	if($roundUp) {
		$eachPersonPays = ceil($eachPersonPays);
	}
	
	# Validation
	$errors = $form->validate([
		'bill' => 'required|money',
		'split' => 'required|numeric|min:1'
		]);
	return $errors;
}












