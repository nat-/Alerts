<?php require 'libs/alerts.php';
session_start();


ALERTS::init();

function checkMessage($msg){
	if($msg == "ALERTS::") return true;
	else return ALERTS::setError("No match and this function returned false thanks to ALERTS::setError()");
}

if(isset($_GET['FormSent'])){
	if(empty($_GET['FormSent'])){
		//set error
		ALERTS::setError("No Message Sent");
	}
	else{
		if(checkMessage($_GET['FormSent'])){
			ALERTS::setMessage("This was a match");
		}
	}

	if(ALERTS::errorCount()==0){
		header('location: /alerts');
		die();
	}
}

	ALERTS::setMessage("Success Onload");
	ALERTS::setWarning("Warning On Load");
	ALERTS::setError("Error On Load");


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<script type="text/javascript" src="js/alerts.js"></script>

	<link rel="stylesheet" type="text/css" href="css/alerts.css">

	<script type="text/javascript">

	function CheckFieldWithJS(e){
		
	}

	



		_alerts = new Alerts();
	</script>

</head>
<body>


<div style="width: 25%;">

Onload:

	<form action="" method="GET">
		<fieldset>
		<legend>Form Submit:</legend>
			<input type="text" name="FormSent">
			<input type="submit" value="Send">;
		</fieldset>
	</form>



		<fieldset>
		<legend>Through Javascript/HTML:</legend>

<button onclick="_alerts.error('Oh no');">Pretty sure google wants to buy this</button><br>
<button onclick="_alerts.warning('Maybe');">Yahoo also</button><br>
<button onclick="_alerts.message('Yes, now your thinking');">But ill put it on GutHub</button><br>
		</fieldset>


</div>



<ul id="alertsContainer"></ul><!-- JS will write these files into this box -->
<script type="text/javascript">

	
	_alerts.setMessages(<?php echo json_encode(ALERTS::getMessages()); ?>)
	_alerts.setWarnings(<?php echo json_encode(ALERTS::getWarnings()); ?>)
	_alerts.setErrors(<?php echo json_encode(ALERTS::getErrors()); ?>)


	
	

</script>
</body>
</html>



<?php
	ALERTS::destroy();