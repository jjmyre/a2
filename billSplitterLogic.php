<?php
require('Form.php');
include('Tools.php');

#create object from Form class
$form = new DWA\Form($_GET);

if($form->isSubmitted()) {
	
	#Values/sanitization
	$bill = $form->get('bill','');
	$bill = $form->sanitize($bill);

	$split = $form->get('split','');
	$split = $form->sanitize($split);
	
	$tipPercent = $form->get('tipPercent','0');
	
	$combineTip = $form->isChosen('combineTip');
	$roundUp = $form->isChosen('roundUp');

	$tipAmount = $bill * $tipPercent;

	# Bill Split/tip calculator logic
	if($combineTip) {
		$eachPersonPays = ($tipAmount + $bill) / $split;
		return $eachPersonPays;
	}
	else if(!$combineTip) {
		$eachPersonPays = $bill / $split;
		return $eachPersonPays;  
	}
	
	if($roundUp) {
		$eachPersonPays = round($eachPersonPays);
		return $eachPersonPays;
	}
	else if(!$roundUp) {
		return $eachPersonPays;
	}

	# Validation
	$errors = $form->validate([
		'bill' => 'required|numeric|min:1',
		'split' => 'required|numeric|min:2'
		]);
}












