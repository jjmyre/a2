<?php require('billSplitterLogic.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/libhanddis" type="text/css"/>
	<script type="text/javascript" src="js/validate.js"></script>
	<title>Bill Splitter and Tip Calculator</title>
</head>

<body>
	<h1>Bill Splitter &amp; Tip Calculator</h1>
    <div class="wrapper">
        <form action="index.php" method='GET' >
        	<fieldset id="bill">
        		<legend>Bill Information</legend>
				<label for="bill">Bill Total<span class='currency'>&#36;</span></label></br>
				<span>*Required</span> 
            	<input type="number" name="bill" id="bill" min='1' required/><br>

            	<label for="split">Split how many ways?</label></br>
            	<span>*Required</span>
            	<input type="number" name="split" id="split" min='2' required/><br>
			</fieldset>
			<fieldset id="tip">
				<legend>Tip?</legend>
    			<label><input type='radio' name='tipPercent' value='0' />No Tip</label>
    			<label><input type='radio' name='tipPercent' value='.10'/>10</label>
    			<label><input type='radio' name='tipPercent' value='.15'/>15</label>
    			<label><input type='radio' name='tipPercent' value='.18'/>18</label>
    			<label><input type='radio' name='tipPercent' value='.20'/>20</label>
    			<label><input type='radio' name='tipPercent' value='.25'/>25</label><br/>
    			<label for="combineTip">Split tip?</label>
    			<input type="checkbox" id="combineTip" name="combineTip" value="combineTip_yes"/><br/>
			</fieldset>	
			<fieldset>
				<legend>Options</legend>
				<label for="round_Yes">Round up totals?</label>
            	<input type="checkbox" id="round" name="round" value="round_Yes"/><br/>
            </fieldset>
            
			<input type="submit" name="action" value="calculate" id="submit_btn"/>
			
			<?php if($errors): ?>
				<div class="errors">
					<ul>
						<?php foreach($errors as $error): ?>
							<li><?=$error?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>


			<div class="result">
				<span><strong><?='Tip Amount: $'.$tipAmount ?><strong></span></br>
            	<span><strong><?='Bill (including tip): $'.$bill ?><strong></span></br>
            	<span><strong><?='Each Person Pays: $'.$eachPersonPays ?><strong></span>
       		</div>

		</form>
		
		

		


    </div>
</body>

</html>


