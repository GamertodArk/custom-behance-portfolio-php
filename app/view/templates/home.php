<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Custom Behance Portfolio</title>
	<link rel="stylesheet" href="app/view/css/style.css">
</head>
<body>
	<header>
		 <div class="header-content">
		 	<img src="<?php echo $user['images']['138'] ?>" alt="Profile Image">

		 	<div class="user-info">
		 		<h2><?php echo $user['display_name'] ?></h2>
		 		<ul>
					<?php  
						foreach ($user['fields'] as $key) {
							echo '<li>'. $key .'</li>';
						}
					?>
		 		</ul>
		 		<p><?php echo $user['location'] ?></p>
		 	</div>
		 </div>
	</header>
</body>
</html>