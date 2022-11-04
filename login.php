
<?php
include_once "header.php";
?>
<body>
    <div class="signup login">
		
	<h2>Bro Chat</h2>
	<form action="#" method="post" enctype="multipart/form-data">
	
	<div class="field error">
		<label class="errorTxt"></label>
	</div>
	
	<div class="field">
		<label>Username:</label>
		<input type="text" name="user_uid" placeholder="Username" required>
	</div>
	<div class="field">
		<label>Set Password:</label>
		<input type="password" name="user_pwd" placeholder="Password" required>
		<span class="show_pass">&#9673</span>
	</div>
	
	  <button type="submit" name="submit" class="btn">LOGIN</button>
	<center>
	<p>Not yet signed up? <a href="signup.php">Sign up</a>	
	</center>
	</p>
	</form>
	</div>
	<script src="Javascript/pass-show-hide.js"></script>
	<script src="Javascript/login.js"></script>
</body>
</html>
