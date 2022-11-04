<?php
include_once "header.php";
?>
<body>
    <div class="signup signup">

	<h2>Bro Chat</h2>
	<form action="#" method="post" enctype="multipart/form-data">
		
	<div class="field error">
		<label class="errorTxt"></label>
	</div>
	<div class="user_name">
	<div class="field">
		<label>Firstname:</label>
	<input type="text" name="user_fname" placeholder="Firstname" required>
	</div>
	<div class="field">
		<label>Lastname:</label>
		<input type="text" name="user_lname" placeholder="Lastname" required>
		</div>
	</div>
	<div class="field">
		<label>Email:</label>
		<input type="text" name="user_email" placeholder="Email" required>
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
	<div class="field">
		<label>Select profile image:</label>
		<input type="file" name="user_img">
	</div>
	
	  <button type="submit" name="submit" class="btn">Sign Up</button>
	<center>
		<p>Already signed up? <a href="login.php">Login</a>
	</center>
				
	</form>

	</div>
	<script src="Javascript/pass-show-hide.js"></script>
	<script src="Javascript/signup.js"></script>
</body>
</html>
