<?php 
/*
Template Name: Sign Up
*/ 
?>

<?php get_header(); ?>
		
	<?php if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>

		<h2>Sign up for Updates</h2>

		<?php echo yksemeProcessSnippet( "40fcad8428" , "Submit" ); ?>

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