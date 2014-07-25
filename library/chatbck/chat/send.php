	
	<div id="sendfrm">
		<input id="sendinp" type="text" name="msg" value="" onkeyup="postMsg();">
		<input id="sendid" type="hidden" name="id" value="<?php echo $room; ?>">
		<input id="senduser" type="hidden" name="user" value="<?php echo $_SESSION['student_id']; ?>">
		<div class="clear"></div>

	</div>
	<div id="hint">
		Type your message and hit 'ENTER' key
	</div>