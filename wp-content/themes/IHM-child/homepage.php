<?php
/*
Template Name: Homepage
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

				<!-- IHM Loading Sprite -->

				<!-- <div class="biggif_parent">
					<div class="biggif"></div>
				</div> -->

				<!-- Stories Featured Slider -->

				<div id="IHM_Stories_Home">

					<div id="IHM_Stories" class="flexslider">

						<ul class="slides">

							<!-- First Slide Content. Editted on the Homepage in the WP Backend -->

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<li style="background: url('<?php the_field('homepage_slider_image') ; ?>');">

								<span class="homepage_story_slider_image_overlay"></span>

								<div class="homepage_first_slide_information fade-in">
									<p><?php the_field('homepage_slider_text'); ?></p>
								</div>

							</li>

							<?php endwhile; ?>
							<?php endif; ?>

							<!-- Loop through stories tagged as 'Homepage Slider' -->

							<?php
							$args1 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'featured-slider', 'posts_per_page' => 3, 'orderby' => 'rand' );
							$loop1 = new WP_Query( $args1 );
							if ( $loop1->have_posts() ) : while ( $loop1->have_posts() ) : $loop1->the_post();
							?>

								<?php if( have_rows('story_slides') ): ?>

									<?php while ( have_rows('story_slides') ) : the_row(); ?>

										<li style="background: url('<?php the_sub_field('slide_image'); ?>');">

									<?php break; ?>

									<?php endwhile; ?>

								<?php endif; ?>

										<a href="<?php the_permalink(); ?>">

											<span class="homepage_story_slider_image_overlay"></span>

											<div class="featured_slide_caption">
												<p class="featured_slide_story_name"><?php the_title(); ?></p>
												<p class="featured_slide_story_location"><?php the_field('story_location', $post->ID) ?></p>
											</div>

										</a>

										<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>

										</li>


							<?php endwhile; else: ?>

							<?php endif; ?>

						</ul>

						<a href="#first_section_homepage" class="slide_anchor_button anchor">

							<img class="slide_to_arrow" src="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/wp-content/uploads/2015/05/Assets-19.png'); ?>" />

						</a>

					</div>

				</div>

				<div class="container_inner">

					<div data-q_id="#first_section_homepage" class="vc_row">

						<div class="vc_col-lg-12">

							<h1 class="homepage_header">Our stories make up the American story</h1>

						</div>

					</div>

					<!-- Homepage First Row -->

					<div class="vc_row">

						<!-- Featured Story 1 -->

						<?php
						$args1 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'homepage-featured-box-1', 'posts_per_page' => 1, 'order' => 'ASC' );
						$loop1 = new WP_Query( $args1 );
						if ( $loop1->have_posts() ) : while ( $loop1->have_posts() ) : $loop1->the_post();
						?>

							<div class="vc_col-sm-3">
					           	<div class="story_thumb">
					           		<a href="<?php the_permalink(); ?>">
					           			<span class="story_thumb_image">
							       			<?php the_post_thumbnail(); ?>
							       		</span>
							       		<div class="story_thumb_information">
								           	<p class="story_thumb_title"><?php the_title(); ?></p>
								           	<p class="story_thumb_location"><?php the_field('story_location', $post->ID); ?></p>
								        </div>
							        </a>
							        <div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
							    </div>
					         </div>

						<?php endwhile; else: ?>

						<?php endif; ?>


				        <!-- Featured Story 2 -->

						<?php
						$args2 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'homepage-featured-box-2', 'posts_per_page' => 1, 'order' => 'ASC' );
						$loop2 = new WP_Query( $args2 );
						if ( $loop2->have_posts() ) : while ( $loop2->have_posts() ) : $loop2->the_post();
						?>

							<div class="vc_col-sm-3">
					           	<div class="story_thumb">
					           		<a href="<?php the_permalink(); ?>">
					           			<span class="story_thumb_image">
							       			<?php the_post_thumbnail(); ?>
							       		</span>
							       		<div class="story_thumb_information">
								           	<p class="story_thumb_title"><?php the_title(); ?></p>
								           	<p class="story_thumb_location"><?php the_field('story_location', $post->ID); ?></p>
								        </div>
							        </a>
							        <div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
							    </div>
					         </div>

						<?php endwhile; else: ?>

						<?php endif; ?>

						<!-- Featured Story 3 -->

						<?php
						$args3 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'homepage-featured-box-3', 'posts_per_page' => 1, 'order' => 'ASC' );
						$loop3 = new WP_Query( $args3 );
						if ( $loop3->have_posts() ) : while ( $loop3->have_posts() ) : $loop3->the_post();
						?>

							<div class="vc_col-sm-3">
					           	<div class="story_thumb">
					           		<a href="<?php the_permalink(); ?>">
					           			<span class="story_thumb_image">
							       			<?php the_post_thumbnail(); ?>
							       		</span>
							       		<div class="story_thumb_information">
								           	<p class="story_thumb_title"><?php the_title(); ?></p>
								           	<p class="story_thumb_location"><?php the_field('story_location', $post->ID); ?></p>
								        </div>
							        </a>
							        <div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
							    </div>
					         </div>

						<?php endwhile; else: ?>

						<?php endif; ?>

						<!-- Follow Us CTA -->

						<div class="vc_col-sm-3">
							<div class="follow_cta_block">
				           		<div class="cta_block_image">
				           			<img src="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/wp-content/uploads/2015/04/follow_us_block.png'); ?>" />
				           		</div>
				           		<div class="cta_block_text">
					           		<p>Follow Us</p>
					           		<ul class="social_holder">
					           			<li>
					           				<a href="https://www.facebook.com/welcomeus" target="_blank"><img src="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/wp-content/uploads/2015/05/IHM_Assets_large-02.png'); ?>" /></a>
					           			</li>
					           			<li>
					           				<a href="https://instagram.com/welcome_us/" target="_blank"><img src="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/wp-content/uploads/2015/05/IHM_Assets_large-03.png'); ?>" /></a>
					           			</li>
					           			<li>
					           				<a href="https://twitter.com/welcome_us" target="_blank"><img src="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/wp-content/uploads/2015/05/IHM_Assets_large-04.png'); ?>" /></a>
					           			</li>
					           			<li>
					           				<a href="https://www.youtube.com/user/WelcomeIHM" target="_blank"><img src="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/wp-content/uploads/2015/05/IHM_Assets_large-05.png'); ?>" /></a>
					           			</li>
					           		</ul>
					           	</div>
							</div>
				        </div>

					<!-- </div> -->

					<!-- Homepage Second Row -->

					<!-- <div class="vc_row"> -->

						<!-- Featured Story 4 -->

						<?php
						$args4 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'homepage-featured-box-4', 'posts_per_page' => 1, 'order' => 'ASC' );
						$loop4 = new WP_Query( $args4 );
						if ( $loop4->have_posts() ) : while ( $loop4->have_posts() ) : $loop4->the_post();
						?>

							<div class="vc_col-sm-4">
					           	<div class="story_thumb">
					           		<a href="<?php the_permalink(); ?>">
					           			<span class="story_thumb_image">
							       			<?php the_post_thumbnail(); ?>
							       		</span>
							       		<div class="story_thumb_information">
								           	<p class="story_thumb_title"><?php the_title(); ?></p>
								           	<p class="story_thumb_location"><?php the_field('story_location', $post->ID); ?></p>
								        </div>
							        </a>
							        <div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
							    </div>
					         </div>

						<?php endwhile; else: ?>

						<?php endif; ?>

						<!-- Featured Story 5 -->

						<?php
						$args5 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'homepage-featured-box-5', 'posts_per_page' => 1, 'order' => 'ASC' );
						$loop5 = new WP_Query( $args5 );
						if ( $loop5->have_posts() ) : while ( $loop5->have_posts() ) : $loop5->the_post();
						?>

							<div class="vc_col-sm-4">
					           	<div class="story_thumb">
					           		<a href="<?php the_permalink(); ?>">
					           			<span class="story_thumb_image">
							       			<?php the_post_thumbnail(); ?>
							       		</span>
							       		<div class="story_thumb_information">
								           	<p class="story_thumb_title"><?php the_title(); ?></p>
								           	<p class="story_thumb_location"><?php the_field('story_location', $post->ID); ?></p>
								        </div>
							        </a>
							        <div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
							    </div>
					         </div>

						<?php endwhile; else: ?>

						<?php endif; ?>

						<!-- Newsletter CTA -->

						<div class="vc_col-sm-4">
							<div class="newsletter_cta_block">
					           	<a href="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/IHM/sign-up/'); ?>" class="IHM_popup">
					           		<div class="cta_block_image">
					           			<img src="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/wp-content/uploads/2015/04/newsletter_block.png'); ?>" />
					           		</div>
					           		<div class="cta_block_text">
						           		<p>Sign Up For</p>
						           		<p>Updates</p>
						           	</div>
							    </a>
							</div>
				        </div>

					</div>

				</div>

				<!-- Video Slider -->

				<div id="IHM_Videos" class="flexslider">

					<ul class="slides">

						<?php if(get_field('video_embed', 37)): ?>

							<?php while(has_sub_field('video_embed', 37)): ?>

								<li>

									<!-- If the slide type is Vimeo -->

									<?php if(get_sub_field('video_type') == "vimeo"): ?>

										<iframe src="http://player.vimeo.com/video/<?php the_sub_field('video_id'); ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>

									<!-- If the video type is Youtube-->

									<?php elseif(get_sub_field('video_type') == "youtube"): ?>

										<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php the_sub_field('video_id'); ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>

									<?php endif; ?>

								</li>

							<?php endwhile; ?>

						<?php endif; ?>

					</ul>

				</div>


				<div class="container_inner">

					<!-- Video List -->

					<div class="vc_row">

						<div class="vc_col-lg-12">

							<div class="video_list_mobile">

								<?php if(get_field('video_embed', 37)): ?>

									<?php while(has_sub_field('video_embed', 37)): ?>

										<!-- If the slide type is Vimeo -->

										<?php if(get_sub_field('video_type') == "vimeo"): ?>

											<iframe src="http://player.vimeo.com/video/<?php the_sub_field('video_id'); ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>

										<!-- If the video type is Youtube-->

										<?php elseif(get_sub_field('video_type') == "youtube"): ?>

											<iframe width="100%" height="300" src="https://www.youtube.com/embed/<?php the_sub_field('video_id'); ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>

										<?php endif; ?>

									<?php endwhile; ?>

								<?php endif; ?>

							</div>

						</div>

					</div>


					<div class="vc_row">

						<div class="vc_col-sm-12 center">

							<a href="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/stories/'); ?>" class="homepage_read_more">Read More</a>

						</div>

					</div>

					<div class="vc_row">

						<div class="vc_col-lg-12">

							<h1 class="homepage_header">What's your story? <a href="https://instagram.com/explore/tags/immigrantheritagemonth/" target="_blank">#ImmigrantHeritageMonth</a></h1>

							<!-- Tint Social Feed Featured -->

							<script async src="https://d36hc0p18k1aoc.cloudfront.net/pages/a5b5e4.js"></script>
							<div class="a5b5e4" data-id="welcomeus" data-columns="" data-expand="false" data-query=""   data-infinitescroll="true" style="height:500px;width:100%;"></div>

						</div>

					</div>

					<!-- Events -->

					<div class="vc_row">

						<div class="vc_col-lg-12">

							<h1 class="homepage_header">IHM Events</h1>

						</div>

					</div>

					<!-- Recent Events Query -->

					<div class="homepage_events_feed">

						<div class="vc_row">

							<?php
							$args5 = array( 'post_type' => 'ai1ec_event', 'posts_per_page' => 4, 'meta_key' => 'full_event_date', 'orderby' => 'meta_value_num', 'order' => 'ASC');
							$loop5 = new WP_Query( $args5 );
							if ( $loop5->have_posts() ) : while ( $loop5->have_posts() ) : $loop5->the_post();
							?>

							<div class="vc_col-sm-3">
								<div class="event_thumb">
									<a href="<?php the_permalink(); ?>">
										<?php
											$img = get_field('event_featured_image');
											if (empty($img)) {
												$img = get_template_directory() . 'img/event-bg.png';
											}
										?>
					           			<span class="event_thumb_image">
        	    							<img src="<?php echo $img ?>" />
								       		<div class="event_thumb_information">
									           	<p class="event_thumb_date"><?php the_field('short_event_date', $post->ID); ?></p>
									           	<hr/>
									           	<p class="event_thumb_title"><?php the_title(); ?></p>
									        </div>
									        <div class="event_thumb_location">
									        	<p><?php the_field('event_location', $post->ID); ?></p>
									        </div>
									    </span>
									</a>
							        <p class="event_thumb_excerpt"><?php the_field('event_excerpt', $post->ID); ?></p>
							        <a href="<?php the_permalink(); ?>">View Event Details</a>
							    </div>

							</div>

							<?php endwhile; else: ?>

							<?php endif; ?>

						</div>

						<div class="vc_row">

							<div class="vc_col-sm-12 center">

								<a href="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/events/'); ?>" class="homepage_read_more">View All Events</a>

							</div>

						</div>
					</div>

				</div>
		</div>
	</div>
	<?php get_footer(); ?>
