<?php
 session_start();
 if(!isset($_SESSION['user_id'])){
	 header("Location: login.php");
 }
include_once "header.php";
?>
<body>
    <div class="wrapper">
	<header>
		<?php
			include_once "php/config.php";
			$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
			$sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = '$user_id'");

			if(mysqli_num_rows($sql) > 0){
			$row = mysqli_fetch_assoc($sql);
			}
		?>
		<a href="users.php">&#8678</a>
		<img src="php/profileimg/<?php echo $row['user_img']; ?>" alt="Profile image">
		<div class="active_user">
		<label><?php echo $row['user_uid']?></label>
		<label><?php echo $row['status']?> &#9673</label>
		</div>
	</header>
	
	<div class="chat-box">
	
	</div>
	<div class="typing-area">
	<form action="#" class="typing-area1" autocomplete="off">
		<input type="text" name="outgoing_id" value="<?php echo $_SESSION['user_id'];?>" hidden>
		<input type="text" name="incoming_id" value="<?php echo $user_id;?>" hidden>
		<input type="text" name="message" class="input-field" placeholder="Type a messsge..." class="text_area" autocomplete="off">
		<button type="submit" name="send" class="btn_send">&#10147</button>
	</form>	
	</div>
	
	</div>
	<script src="Javascript/chat.js"></script>
</body>
</html>
