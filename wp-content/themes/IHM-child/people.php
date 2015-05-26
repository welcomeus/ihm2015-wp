<?php 
/*
Template Name: People
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

				<div class="vc_row">

					<div class="vc_col-lg-12">

						<h1 class="homepage_header">Honorary Board</h1>

					</div>

				</div>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php 
					$i = 1;
					echo '<div class="vc_row">';
					if( have_rows('honorary_board') ): ?>

						<?php while ( have_rows('honorary_board') ) : the_row(); ?>

						<div class="vc_col-sm-2">

							<div class="people_container">

								<img src="<?php the_sub_field('honorary_board_image'); ?>" />
								<p class="honorary_board_name"><?php the_sub_field('honorary_board_name'); ?></p>
								<p class="honorary_board_title"><?php the_sub_field('honorary_board_title'); ?></p>

							</div>

						</div>

						<?php if($i % 6 == 0) {echo '</div><div class="vc_row">';} ?>

						<?php $i++; endwhile; ?>

					<?php else: ?>

					<?php endif; ?>

					</div>

				<div class="vc_row">

					<div class="vc_col-lg-12">

						<h1 class="homepage_header">Founding Team</h1>

					</div>

				</div>

				<?php 
				$i = 1;
				echo '<div class="vc_row team_box_wrap">';
				if( have_rows('founding_team') ): ?>

					<?php while ( have_rows('founding_team') ) : the_row(); ?>

					<div class="vc_col-sm-2">

						<div class="people_container">

							<img src="<?php the_sub_field('founding_team_image'); ?>" />
							<p class="honorary_board_name"><?php the_sub_field('founding_team_name'); ?></p>
							<p class="honorary_board_title"><?php the_sub_field('founding_team_title'); ?></p>

						</div>

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