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
	<main>
		<div class="projects_wrap">
			<?php 
				foreach ($projects as $project) {
					echo '
					<div class="project">
						<img class="project-cover" src="'. $project['covers']['404'] .'" alt="'. $project['name'] .'" data-project-id="'. $project['id'] .'">

						<div class="project_info">
							<!-- <h3>'. $project['name'] .'</h3> -->
							<a target="_blank" href="'. $project['url'] .'">'. $project['name'] .'</a>
							<ul>';

								foreach ($project['fields'] as $field) {
									echo '<li>'. $field .'</li>';
								}

						echo'</ul>
						</div>
					</div>';
				}
			?>
		</div>
	</main>
	<footer>
		<p>Powered By</p> <a target="_blank" href="<?php echo $user['url'] ?>"><i class="fi-social-behance"></i></a>
	</footer>
	<script src="app/view/js/requests-handler.js"></script>
</body>
</html>