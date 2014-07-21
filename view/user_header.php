<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome to home page</title>
<link rel="stylesheet" type="text/css" href="../main.css" />
<link rel="shortcut icon" href="../images/user.jpg">
</head>
<body>


<header>
			<img src="../images/user.jpg" alt="user Logo" width="50">
			<h1>Welcome <?php echo $userID;?></h1>
			<section>
			<a href="../controller/normal_user.php?userID=<?php echo $userID;?>&count=<?php echo $count;?>&action=normal_user" class="left">Home</a>
			<a href="../controller/normal_user.php?userID=<?php echo $userID;?>&count=<?php echo $count;?>&action=user_profile_info" class="left">User Info</a>			
			<a href="../controller/normal_user.php?userID=<?php echo $userID;?>&count=<?php echo $count;?>&action=edit_profile" class="left">Edit Profile</a>
			<a href="../controller/normal_user.php?userID=<?php echo $userID;?>&count=<?php echo $count;?>&action=logout" class="left">Logout</a>
			</section>
</header>

</body>
</html>