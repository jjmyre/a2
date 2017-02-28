<?php require('billsplitterlogic.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="images/favicon.png"/>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/glacial-indifference" type="text/css"/>
	<title>Bill Splitter and Tip Calculator</title>
</head>

<body>
	<h1>Bill Splitter &amp; Tip Calculator</h1>
    <div class="wrapper">
        <form action="index.php" method='GET' id="billForm">
        	<div><span><span class='required'>*</span><em>required</em></span></div>
        	<fieldset id="billInfo">
				<label for="bill"><span class="required">*</span>Bill:</label> 
            	<span class="currency">$<input type="text" name="bill" id="bill" value='<?=sanitize($bill)?>' required/></span><br/>
            	
            	<label for="split"><span class="required">*</span>Split how many ways?</label> 
            	<input type="number" name="split" id="split" min='2' value='<?=sanitize($splitNumber)?>' required /><br/>
    		</fieldset>
    		<fieldset id="tip">
    			<legend>Tip</legend>
    			<label><input type='radio' name='tipPercent' value='0' <?php if($tipPercent == null || $tipPercent == '0') echo 'CHECKED'?>/>0</label>
    			<label><input type='radio' name='tipPercent' value='.10' <?php if($tipPercent == '.10') echo 'CHECKED'?>/>10%</label>
    			<label><input type='radio' name='tipPercent' value='.15' <?php if($tipPercent == '.15') echo 'CHECKED'?>/>15%</label>
    			<label><input type='radio' name='tipPercent' value='.18' <?php if($tipPercent == '.18') echo 'CHECKED'?>/>18%</label>
    			<label><input type='radio' name='tipPercent' value='.20' <?php if($tipPercent == '.20') echo 'CHECKED'?>/>20%</label>
    			<label><input type='radio' name='tipPercent' value='.25' <?php if($tipPercent == '.25') echo 'CHECKED'?>/>25%</label><br/><br/>
    			<label for="combineTip">Split tip?</label>
    			<input type="checkbox" id="combineTip" name="combineTip" value="combineTip_Yes" <?php if($combineTip) echo "CHECKED"?>/>
			</fieldset><br/>
			
			<fieldset id='round'>
				<label for="roundUp">Round up to nearest dollar?</label>
            	<input type="checkbox" name="roundUp" id="roundUp" value="round_Yes" <?php if($roundUp) echo "CHECKED"?>/>
            </fieldset>  

            <input type="reset" value="Reset" id="reset_btn"/> 
			<input type="submit" name="action" value="Calculate" id="submit_btn"/>
		</form>
	
		<?php if($errors): ?>
			<div class="errors">
				<ul> 
					<?php foreach($errors as $error): ?>
                    	<li><?= $error; ?></li>
					<?php endforeach; ?>
				 </ul>
			</div>	
		<?php endif; ?>
		
		<?php if(!$errors && $form->isSubmitted()): ?>			
			<div class="results">			
				<span><?='Tip Amount: $'.sanitize($tipAmount)?></span><br/>
				<span><?='Bill Total: $'.sanitize($billTotal)?></span><br/>
                <span><strong><?='Each Person Pays: $'.sanitize($eachPersonPays)?></strong></span>
			</div>
        <?php endif; ?> 			
    </div>
</body>

</html>