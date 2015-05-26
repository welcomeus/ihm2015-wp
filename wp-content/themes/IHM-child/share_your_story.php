<?php 
/*
Template Name: Share Your Story
*/ 
?>

<?php get_header(); ?>
		
	<?php if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php 
			$args_pages = array(
				'before'           => '<p class="single_links_pages">',
				'after'            => '</p>',
				'pagelink'         => '<span>%</span>'
			);
			wp_link_pages($args_pages);
		?>
		<?php endwhile; ?>
	<?php endif; ?>
				
<?php get_footer('slim'); ?>