<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Custom Behance Portfolio</title>
	<link rel="stylesheet" href="app/view/css/style.css">
	<link rel="stylesheet" href="app/view/css/foundation-icons.css">
</head>
<body>
	<header>
		 <div class="header-content">
		 	<img src="<?php echo $user['images']['100'] ?>" alt="Profile Image">

		 	<div class="user-info">
		 		<h2><?php echo $user['display_name'] ?></h2>
		 		<ul>
					<?php  
						foreach ($user['fields'] as $key) {
							echo '<li>'. $key .'</li>';
						}
					?>
		 		</ul>
		 		<p class="fi-marker"><?php echo $user['location'] ?></p>
		 	</div>
		 </div>
	</header>
</body>
</html>