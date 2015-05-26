<?php 
/*
Template Name: Partners
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

			<div class="container_inner">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

					<?php 
					$i = 1;
					echo '<div class="vc_row">';
					if( have_rows('partners') ): ?>

						<?php while ( have_rows('partners') ) : the_row(); ?>

						<div class="vc_col-sm-2">

							<a href="<?php the_sub_field('partner_link'); ?>" target="_blank">	

								<img src="<?php the_sub_field('partner_logo'); ?>" />

							</a>

						</div>

						<?php if($i % 6 == 0) {echo '</div><div class="vc_row">';} ?>

						<?php $i++; endwhile; ?>

					<?php else: ?>

					<?php endif; ?>

				</div>

				<?php endwhile; ?>
				<?php endif; ?>

			</div>

		</div>
	</div>	
	<?php get_footer(); ?>