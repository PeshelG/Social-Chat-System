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
			$sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}");

			if(mysqli_num_rows($sql) > 0){
			$row = mysqli_fetch_assoc($sql);
			}
		?>
		<!--<a href="#">&#8678</a>-->
		<img src="php/profileimg/<?php echo $row['user_img']; ?>" alt="Profile image">
		<div class="active_user">
		<label><?php echo $row['user_uid']?></label>
		<label><?php echo $row['status']?> &#9673</label>
		</div>
		<a href="php/logout.php" class="log_out">Log out</a>
	</header>
	<div class="search">
	<span>Select a user to chat with</span>
	<input type="text" name="search" placeholder="Search friends...." autocomplete="off">
	<button type="submit" name="btn_search">	&#128270</button>
	</div>
	<div class="list">
	
	</div>
	</div>
	<script src="Javascript/users.js"></script>
</body>
</html>
