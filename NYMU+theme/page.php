<?php
get_header();
	if(have_posts()):
		while(have_posts()):the_post(); ?>

			<article class="post">
			<span class="parent-link">
				<a href="<?php echo get_the_permalink(get_top_ancestor_id());?>"><?php echo get_the_title(get_top_ancestor_id());?></a>
			</span>
			

			<?php
				$args = array(
					'child_of' =>get_top_ancestor_id(),
					'title_li'=>'' );
			?>

			<?php wp_list_pages($args);?>

				<h2><?php the_title();?></h2>
				<?php the_content();?>
			</article>
	<?php endwhile;
	else:
		echo'<p>No content found</p>';
	endif;
get_footer();
?>