<?php 
/*
Template Name: Stories
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

			<div class="on_load_container">

				<!-- Stories Featured Slider -->

				<div id="IHM_Stories" class="flexslider">
										
					<ul class="slides">

						<?php
						$args1 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'featured-slider', 'posts_per_page' => 3, 'orderby' => 'rand' );
						$loop1 = new WP_Query( $args1 );
						if ( $loop1->have_posts() ) : while ( $loop1->have_posts() ) : $loop1->the_post();
						?>

						<li>

							<a href="<?php the_permalink(); ?>">

								<?php if (get_field('story_slides')) : while(has_sub_field('story_slides')): ?>
									<span class="story_slider_image_overlay">
										<img src="<?php echo get_sub_field('slide_image', $post->ID); ?>" />
									</span>
								<?php break; endwhile; endif; ?>

								<div class="featured_slide_caption">
									<p class="featured_slide_story_name"><?php the_title(); ?></p> 
									<p class="featured_slide_story_location"><?php the_field('story_location', $post->ID) ?></p>
								</div>

								<p class="slide_caption"><?php the_field('featured_text'); ?></p>

							</a>

							<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>

						</li>

						<?php endwhile; else: ?>
						
						<?php endif; ?>

					</ul>

				</div>

			</div>

				<div class="container_inner">

					<div class="vc_row">

						<div class="vc_col-lg-12">

							<h1 class="homepage_header">Our stories make up the American story</h1>

						</div>

					</div>

					<div class="vc_row">

						<!-- Homepage First Row -->

						<!-- Featured Story 1 -->

						<?php
						$args1 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'story-featured-box-1', 'posts_per_page' => 1, 'order' => 'ASC' );
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

						<!-- Logo GIF -->

						<div class="vc_col-sm-3">

							<img src="http://welcome.us/wp-content/uploads/2015/05/IHM-GIF_2x3_loop.gif" />
							
				        </div>

				        <!-- Featured Story 2 -->

						<?php
						$args2 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'story-featured-box-2', 'posts_per_page' => 1, 'order' => 'ASC' );
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
						$args3 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'story-featured-box-3', 'posts_per_page' => 1, 'order' => 'ASC' );
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

						<!-- Homepage Second Row -->

						<!-- Featured Story 4 -->

						<?php
						$args4 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'story-featured-box-4', 'posts_per_page' => 1, 'order' => 'ASC' );
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
						$args5 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'story-featured-box-5', 'posts_per_page' => 1, 'order' => 'ASC' );
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
					           	<a href="http://welcome.us/IHM/sign-up/" class="IHM_popup">
					           		<div class="cta_block_image">
					           			<img src="http://welcome.us/wp-content/uploads/2015/04/newsletter_block.png" />
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

					<!-- Homepage Fourth Row -->

					<div class="stories_special_row_1">

						<div class="vc_row">

							<!-- Featured Story 7 -->

							<?php
							$args7 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'story-featured-box-7', 'posts_per_page' => 1, 'order' => 'ASC' );
							$loop7 = new WP_Query( $args7 );
							if ( $loop7->have_posts() ) : while ( $loop7->have_posts() ) : $loop7->the_post();
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

							<!-- Featured Story 8 -->

							<?php
							$args8 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'story-featured-box-8', 'posts_per_page' => 1, 'order' => 'ASC' );
							$loop8 = new WP_Query( $args8 );
							if ( $loop8->have_posts() ) : while ( $loop8->have_posts() ) : $loop8->the_post();
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

					        <!-- Featured Story 9 -->

							<?php
							$args9 = array( 'post_type' => 'portfolio_page', 'portfolio_category' => 'story-featured-box-9', 'posts_per_page' => 1, 'order' => 'ASC' );
							$loop9 = new WP_Query( $args9 );
							if ( $loop9->have_posts() ) : while ( $loop9->have_posts() ) : $loop9->the_post();
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
					           			<img src="http://welcome.us/wp-content/uploads/2015/04/follow_us_block.png" />
					           		</div>
					           		<div class="cta_block_text">
						           		<p>Follow Us</p>
						           		<ul class="social_holder">
						           			<li>
						           				<a href="https://www.facebook.com/welcomeus" target="_blank"><img src="http://welcome.us/wp-content/uploads/2015/05/IHM_Assets_large-02.png" /></a>
						           			</li>
						           			<li>
						           				<a href="https://instagram.com/welcome_us/" target="_blank"><img src="http://welcome.us/wp-content/uploads/2015/05/IHM_Assets_large-03.png" /></a>
						           			</li>
						           			<li>
						           				<a href="https://twitter.com/welcome_us" target="_blank"><img src="http://welcome.us/wp-content/uploads/2015/05/IHM_Assets_large-04.png" /></a>
						           			</li>
						           			<li>
						           				<a href="https://www.youtube.com/user/WelcomeIHM" target="_blank"><img src="http://welcome.us/wp-content/uploads/2015/05/IHM_Assets_large-05.png" /></a>
						           			</li>
						           		</ul>
						           	</div>
								</div>
					        </div>
					    </div>
					</div>

					<div class="stories_special_row_2">

					    <div class="vc_row">

							<!-- Additional Stories Not Featured -->

							<?php
							$args9 = array( 
								'post_type' => 'portfolio_page', 
								'posts_per_page' => -1, 
								'order' => 'ASC',
								'tax_query' => array(
									array(
										'taxonomy' => 'portfolio_category',
										'field'    => 'term_id',
										'terms'    => array( 28, 18, 29, 26, 27, 30, 22, 23, 24 ),
										'operator' => 'NOT IN',
									),
								),

								);

							$loop9 = new WP_Query( $args9 );
							if ( $loop9->have_posts() ) : while ( $loop9->have_posts() ) : $loop9->the_post();
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

						</div>
						 
					</div>

				</div>

				<div class="row">

					<div class="vc_col-lg-12">

						<h1 class="homepage_header">What's your story? <a href="https://instagram.com/explore/tags/immigrantheritagemonth/" target="_blank">#ImmigrantHeritageMonth</a></h1>

						<!-- Tint Social Feed -->

						<script async src="https://d36hc0p18k1aoc.cloudfront.net/pages/a5b5e4.js"></script>
						<div class="a5b5e4 stories_page_tint_feed" data-id="welcomeus" data-columns="" data-expand="true" data-clickformore="true" style="height:500px;width:100%;"></div>

					</div>

				</div>

		</div>
	</div>	
	<?php get_footer(); ?>