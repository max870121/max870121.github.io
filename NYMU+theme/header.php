<!DOCTYPE html>
<html <?php language_attributes();?>>
	<head>
		<meta charset="<?php bloginfo('charset');?>">
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name');?></title>
		
		<?php wp_head(); ?>
	
	</head>

	<body <?php body_class(); ?>>
	<div class="fluid-container">

		<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top" style="background-color: #e3f2fd;">
  			<a class="navbar-brand" href="#">首頁</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
 			</button>
			<?php
				wp_nav_menu( array(
				'theme_location'  => 'primary',
				'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
				'container'       => 'div',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'bs-example-navbar-collapse-1',
				'menu_class'      => 'navbar-nav mr-auto',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
				));
			?>
		</nav>
	
