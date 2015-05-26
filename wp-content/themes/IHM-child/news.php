<?php 
/*
Template Name: News
*/ 
?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$sidebar = get_post_meta($id, "qode_show-sidebar", true);  

$enable_page_comments = false;
if(get_post_meta($id, "qode_enable-page-comments", true) == 'yes') {
	$enable_page_comments = true;
}

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
	$background_color = "";
}

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

?>
	<?php get_header(); ?>
		<?php if(get_post_meta($id, "qode_page_scroll_amount_for_sticky", true)) { ?>
			<script>
			var page_scroll_amount_for_sticky = <?php echo get_post_meta($id, "qode_page_scroll_amount_for_sticky", true); ?>;
			</script>
		<?php } ?>
			<?php get_template_part( 'title' ); ?>
		<?php
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){ ?>
			<div class="q_slider"><div class="q_slider_inner">
			<?php echo do_shortcode($revslider); ?>
			</div></div>
		<?php
		}
		?>

	<div class="full_width"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
		<div class="full_width_inner">

			<div class="header_featured_image">
				<img src="<?php the_field('header_featured_image'); ?>" />
			</div>

			<div class="container_inner">

				<?php if (have_posts()) : 
					while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

					<?php endwhile; ?>
				<?php endif; ?>

				<div class="vc_row">

					<div class="vc_col-lg-12">

						<h1 class="homepage_header">In the News</h1>

					</div>

				</div>

				<!-- News Posts Query -->

				<?php
				$i = 1;
				echo '<div class="vc_row">';
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$args1 = array( 'post_type' => 'post', 'cat' => '12', 'posts_per_page' => 20, 'order' => 'DESC', 'orderby' => 'date', 'paged' => $paged);
				$loop1 = new WP_Query( $args1 );
				if ( $loop1->have_posts() ) : while ( $loop1->have_posts() ) : $loop1->the_post();
				?>

				<div class="vc_col-sm-3">

					<div class="news_piece">

						<a href="<?php the_field('link_url'); ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
						<h5><?php the_title(); ?></h5>
						<?php the_content(); ?>
						<p><a href="<?php the_field('link_url'); ?>" target="_blank"><?php the_field('link_title'); ?></a></p>

					</div>

				</div>

				<?php if($i % 4 == 0) {echo '</div><div class="vc_row">';} ?>

				<?php $i++; endwhile; else: ?>

				<?php wp_pagenavi(array('query' => $loop1)); ?> 
				
				<?php endif; ?>
				</div>

			</div>

		</div>
	</div>	
	<?php get_footer(); ?>