<?php
$family=$_SESSION['family_username'];

	$q1="(SELECT `id` FROM `user` where `family_username`='$family')";
    $sq2="SELECT sum(t.amount) as amt FROM `transaction` as `t` left join `user` as `u` on t.user_id=u.id where t.user_id in ".$q1;

    $result = $conn->query($sq2);

	if ($result->num_rows > 0)
	{
    $row = $result->fetch_assoc();
	$spend = $row['amt'];
	$safe = 27000 - $row['amt'];
	
	echo "<script> var safespend=".$safe."; var spend= ".$spend."; </script>";
    }

?>
	<div class="startchat">
	
	<div id="container" class="container1">
		<h5 class="text-light">Need Help?</h5>
		<div id="chat" class="chat">
			<div id="messages" class="messages"></div>
			<input id="input" type="text" placeholder="Say something..." autocomplete="off" autofocus="true" />
		</div>
	</div>
	</div>
<script type="text/javascript" src="chatbot/index.js" ></script>
<script type="text/javascript" src="chatbot/constants.js" ></script>
<script type="text/javascript" src="chatbot/speech.js" ></script>
