<?php 
/*
Template Name: Events
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

			<!-- Stories Featured Slider -->

			<div id="IHM_Stories" class="flexslider">
									
				<ul class="slides">

					<?php
					$args1 = array( 'post_type' => 'ai1ec_event', 'posts_per_page' => 4, 'meta_key' => 'full_event_date', 'orderby' => 'meta_value_num', 'order' => 'ASC');
					$loop1 = new WP_Query( $args1 );
					if ( $loop1->have_posts() ) : while ( $loop1->have_posts() ) : $loop1->the_post();
					?>

					<li>

						<a href="<?php the_permalink(); ?>">
							<span class="story_slider_image_overlay">
								<?php the_post_thumbnail(); ?>
							</span>
							<div class="event_slider_information">
								<p class="event_slider_date"><?php the_field('short_event_date', $post->ID); ?></p>
					           	<span class="event_slider_seperator"></span>
					           	<p class="event_slider_title"><?php the_title(); ?></p>
					           	<p class="event_slider_location"><?php the_field('event_location', $post->ID); ?></p>
							</div>
						</a>

					</li>

					<?php endwhile; else: ?>
					
					<?php endif; ?>

				</ul>

			</div>

			<div class="container_inner">

			<?php if (have_posts()) : 
				while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>
			<?php endif; ?>

			</div>

		</div>
	</div>	
	<?php get_footer(); ?>