<?php
global $qode_options_proya;
$id = get_the_ID();


$portfolio_qode_like = "on";
if (isset($qode_options_proya['portfolio_qode_like'])) {
	$portfolio_qode_like = $qode_options_proya['portfolio_qode_like'];
}

$lightbox_single_project = "no";
if (isset($qode_options_proya['lightbox_single_project']))
	$lightbox_single_project = $qode_options_proya['lightbox_single_project'];

if(get_post_meta($id, "qode_page_background_color", true) != ""){
	$background_color = get_post_meta($id, "qode_page_background_color", true);
}else{
	$background_color = "";
}

$portfolio_text_follow = "portfolio_single_follow";
if (isset($qode_options_proya['portfolio_text_follow'])) {
    $portfolio_text_follow = $qode_options_proya['portfolio_text_follow'];
}

$porftolio_template = 1;
if(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) != ""){
	if(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 1){
		$porftolio_template = 1;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 2){
		$porftolio_template = 2;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 3){
		$porftolio_template = 3;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 4){
		$porftolio_template = 4;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 5){
		$porftolio_template = 5;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 6){
		$porftolio_template = 6;
	}elseif(get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true) == 7){
		$porftolio_template = 7;
	}
}elseif(isset($qode_options_proya['portfolio_style'])){
	if($qode_options_proya['portfolio_style'] == 1){
		$porftolio_template = 1;
	}elseif($qode_options_proya['portfolio_style'] == 2){
		$porftolio_template = 2;
	}elseif($qode_options_proya['portfolio_style'] == 3){
		$porftolio_template = 3;
	}elseif($qode_options_proya['portfolio_style'] == 4){
		$porftolio_template = 4;
	}elseif($qode_options_proya['portfolio_style'] == 5){
		$porftolio_template = 5;
	}elseif($qode_options_proya['portfolio_style'] == 6){
		$porftolio_template = 6;
	}elseif($qode_options_proya['portfolio_style'] == 7){
		$porftolio_template = 7;
	}
}

$porftolio_single_template = get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true);

$columns_number = "v4";
if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) != ""){
	if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 2){
		$columns_number = "v2";
	} else if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 3){
		$columns_number = "v3";
	} else if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 4){
		$columns_number = "v4";
	}
}else{
	if(isset($qode_options_proya['portfolio_columns_number'])){
		if($qode_options_proya['portfolio_columns_number'] == 2){
			$columns_number = "v2";
		} else if($qode_options_proya['portfolio_columns_number'] == 3) {
			$columns_number = "v3";
		} else if($qode_options_proya['portfolio_columns_number'] == 4) {
			$columns_number = "v4";
		}
	}
}


?>
<?php if(post_password_required()) {
	echo get_the_password_form();
} else { ?>

	<?php if($porftolio_template != "7"){

	?>
	<div class="portfolio_single">
	<?php switch ($porftolio_template) {
		case 1: ?>
			<div class="two_columns_66_33 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="portfolio_images">
							<?php

							$portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
							if ($portfolio_m_images){
								$portfolio_image_gallery_array=explode(',',$portfolio_m_images);
								foreach($portfolio_image_gallery_array as $gimg_id){
									$title = get_the_title($gimg_id);
									$alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
									$image_src = wp_get_attachment_image_src( $gimg_id, 'full' );
									if (is_array($image_src)) $image_src = $image_src[0];
									?>
									<?php if($lightbox_single_project == "yes"){ ?>
										<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo $image_src; ?>" data-rel="prettyPhoto[single_pretty_photo]">
											<img src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
										</a>
									<?php } else { ?>
										<img src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
								<?php }
								}
							}
							$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
							if ($portfolio_images){
								usort($portfolio_images, "comparePortfolioImages");
								foreach($portfolio_images as $portfolio_image){
									?>

									<?php if($portfolio_image['portfolioimg'] != ""){ ?>
										<?php
										global $wpdb;
										$image_src = $portfolio_image['portfolioimg'];
										$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
										$id = $wpdb->get_var($query);
										$title = get_the_title($id);
										$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
										?>
										<?php if($lightbox_single_project == "yes"){ ?>
											<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
												<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
											</a>
										<?php } else { ?>
											<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
										<?php } ?>

									<?php }else{ ?>

										<?php
										$portfoliovideotype = "";
										if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
										switch ($portfoliovideotype){
											case "youtube": ?>
												<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
												<?php	break;
											case "vimeo": ?>
												<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
												<?php break;
											case "self": ?>
												<div class="video">
													<div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
													<div class="video-wrap"  >
														<video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
															<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
															<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
															<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
															<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
																<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
																<param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
																<img src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
															</object>
														</video>
													</div></div>
												<?php break;
										} ?>

									<?php } ?>
								<?php
								}
							}
							?>
						</div>
					</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_detail <?php echo $portfolio_text_follow; ?> clearfix">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){
									?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								<?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
								</div>
							<?php } ?>
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}

								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
                                                        <span class="category">
                                                            <?php echo implode(', ', $portfolio_tags_array) ?>
                                                        </span>
								</div>

							<?php } ?>

							<h6><?php echo _e('About This Project','qode'); ?></h6>
							<div class="info portfolio_content">
								<?php the_content(); ?>
							</div>
							<div class="portfolio_social_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($portfolio_qode_like == "on") { ?>
									<span class="dots"><i class="fa fa-square"></i></span>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="portfolio_navigation">
				<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?></div>
				<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
					<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
				<?php } ?>
				<div class="portfolio_next"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>'); ?></div>
			</div>

			<?php	break;
		case 2: ?>
			<div class="two_columns_66_33 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="flexslider">
							<ul class="slides">
								<?php
								$portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
								if ($portfolio_m_images){
									$portfolio_image_gallery_array=explode(',',$portfolio_m_images);
									foreach($portfolio_image_gallery_array as $gimg_id){
										$title = get_the_title($gimg_id);
										$alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
									$image_src = wp_get_attachment_image_src( $gimg_id, 'full' );
									if (is_array($image_src)) $image_src = $image_src[0];
										?>
											<li class="slide">
												<img src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
											</li>
									<?php
									}
								}
								$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
								if ($portfolio_images){
									usort($portfolio_images, "comparePortfolioImages");
									foreach($portfolio_images as $portfolio_image){
										?>

										<?php if($portfolio_image['portfolioimg'] != ""){ ?>
											<?php
											global $wpdb;
											$image_src = $portfolio_image['portfolioimg'];
											$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
											$id = $wpdb->get_var($query);
											$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
											?>
											<li class="slide">
												<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
											</li>
										<?php }else{ ?>

											<?php
											$portfoliovideotype = "";
											if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
											switch ($portfoliovideotype){
												case "youtube": ?>
													<li class="slide">
														<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
													</li>
													<?php	break;
												case "vimeo": ?>
													<li class="slide">
														<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
													</li>
													<?php break;
												case "self": ?>
													<li class="slide">
														<div class="video">
															<div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
															<div class="video-wrap"  >
																<video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
																	<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
																	<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
																	<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
																	<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
																		<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
																		<param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
																		<img src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
																	</object>
																</video>
															</div></div>
													</li>
													<?php break;

											} ?>

										<?php } ?>

									<?php
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_detail">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){

									?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								<?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
								</div>
							<?php } ?>
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}

								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
                                                        <span class="category">
                                                            <?php echo implode(', ', $portfolio_tags_array) ?>
                                                        </span>
								</div>

							<?php } ?>
							<div class="info portfolio_content">
								<h6><?php echo _e('About This Project','qode'); ?></h6>
								<?php the_content(); ?>
							</div>
							<div class="portfolio_social_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($portfolio_qode_like == "on") { ?>
									<span class="dots"><i class="fa fa-square"></i></span>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="portfolio_navigation">
				<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?></div>
				<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
					<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
				<?php } ?>
				<div class="portfolio_next"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>'); ?></div>
			</div>

			<?php	break;
		case 3: ?>
			<div class="flexslider">
				<ul class="slides">
					<?php
					$portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
					if ($portfolio_m_images){
						$portfolio_image_gallery_array=explode(',',$portfolio_m_images);
						foreach($portfolio_image_gallery_array as $gimg_id){
							$title = get_the_title($gimg_id);
							$alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
									$image_src = wp_get_attachment_image_src( $gimg_id, 'full' );
									if (is_array($image_src)) $image_src = $image_src[0];
							?>
								<li class="slide">
									<img src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
								</li>
						<?php
						}
					}
					$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
					if ($portfolio_images){
						foreach($portfolio_images as $portfolio_image){
							usort($portfolio_images, "comparePortfolioImages");
							?>

							<?php if($portfolio_image['portfolioimg'] != ""){ ?>
								<?php
								global $wpdb;
								$image_src = $portfolio_image['portfolioimg'];
								$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
								$id = $wpdb->get_var($query);
								$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
								?>
								<li class="slide">
									<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
								</li>
							<?php }else{ ?>

								<?php
								$portfoliovideotype = "";
								if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
								switch ($portfoliovideotype){
									case "youtube": ?>
										<li class="slide">
											<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
										</li>
										<?php	break;
									case "vimeo": ?>
										<li class="slide">
											<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
										</li>
										<?php break;
									case "self": ?>
										<div class="video">
											<div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
											<div class="video-wrap"  >
												<video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
													<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
													<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
													<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
													<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
														<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
														<param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
														<img src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
													</object>
												</video>
											</div></div>
										<?php break;
								} ?>

							<?php } ?>

						<?php
						}
					}
					?>
				</ul>
			</div>
			<div class="two_columns_75_25 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="portfolio_single_text_holder">
							<h3><?php echo _e('About This Project','qode'); ?></h3>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_detail">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){
									?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								<?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
								</div>
							<?php } ?>
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}

								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
                                                        <span class="category">
                                                            <?php echo implode(', ', $portfolio_tags_array) ?>
                                                        </span>
								</div>

							<?php } ?>
							<div class="portfolio_social_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($portfolio_qode_like == "on") { ?>
									<span class="dots"><i class="fa fa-square"></i></span>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="portfolio_navigation">
				<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?></div>
				<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
					<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
				<?php } ?>
				<div class="portfolio_next"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>'); ?></div>
			</div>

			<?php	break;
		case 4: ?>
			<?php the_content(); ?>

			<div class="portfolio_navigation">
				<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?></div>
				<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
					<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
				<?php } ?>
				<div class="portfolio_next"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>'); ?></div>
			</div>
			<?php	break;
		case 5: ?>
			<div class="portfolio_images">
				<?php
				$portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
				if ($portfolio_m_images){
					$portfolio_image_gallery_array=explode(',',$portfolio_m_images);
					foreach($portfolio_image_gallery_array as $gimg_id){
						$title = get_the_title($gimg_id);
						$alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
									$image_src = wp_get_attachment_image_src( $gimg_id, 'full' );
									if (is_array($image_src)) $image_src = $image_src[0];
						?>
						<?php if($lightbox_single_project == "yes"){ ?>
							<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo $image_src; ?>" data-rel="prettyPhoto[single_pretty_photo]">
								<img src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
							</a>
						<?php } else { ?>
							<img src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
					<?php }
					}
				}
				$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
				if ($portfolio_images){
					usort($portfolio_images, "comparePortfolioImages");
					foreach($portfolio_images as $portfolio_image){
						?>

						<?php if($portfolio_image['portfolioimg'] != ""){ ?>

							<?php
							global $wpdb;
							$image_src = $portfolio_image['portfolioimg'];
							$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
							$id = $wpdb->get_var($query);
							$title = get_the_title($id);
							$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
							?>

							<?php if($lightbox_single_project == "yes"){ ?>
								<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
									<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
								</a>
							<?php } else { ?>
								<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
							<?php } ?>

						<?php }else{ ?>

							<?php
							$portfoliovideotype = "";
							if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
							switch ($portfoliovideotype){
								case "youtube": ?>
									<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
									<?php	break;
								case "vimeo": ?>
									<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
									<?php break;
								case "self": ?>
									<div class="video">
										<div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
										<div class="video-wrap"  >
											<video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
												<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
												<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
												<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
												<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
													<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
													<param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
													<img src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
												</object>
											</video>
										</div></div>
									<?php break;
							} ?>

						<?php } ?>

					<?php
					}
				}
				?>
			</div>

			<div class="project_information">
				<p>
					<?php if (get_field('project_client')): ?>
						<strong>client</strong>_<?php the_field('project_client'); ?>
					<?php endif; ?>
				</p>
				<h1><?php the_title(); ?></h1>
			</div>
			
			<div class="two_columns_75_25 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="portfolio_single_text_holder">
							<?php the_content(); ?>
							<?php if(get_field('project_credits')): ?>
								<a class="toggle_button livory">+ Credits</a>
							    <div class="toggle_content">
							    	<?php the_field('project_credits'); ?>
							    </div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_detail <?php echo $portfolio_text_follow; ?>">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){
									?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								<?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
								</div>
							<?php } ?>
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}

								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
                                                        <span class="category">
                                                            <?php echo implode(', ', $portfolio_tags_array) ?>
                                                        </span>
								</div>

							<?php } ?>
							<div class="portfolio_social_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($portfolio_qode_like == "on") { ?>
									<span class="dots"><i class="fa fa-square"></i></span>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="portfolio_navigation">
				<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?></div>
				<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
					<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
				<?php } ?>
				<div class="portfolio_next"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>'); ?></div>
			</div>
			<?php	break;
		case 6: ?>
			<div class="portfolio_gallery">
				<?php
				$portfolio_m_images = get_post_meta(get_the_ID(), "qode_portfolio-image-gallery", true);
                if ($portfolio_m_images){
                    $portfolio_image_gallery_array=explode(',',$portfolio_m_images);
                    foreach($portfolio_image_gallery_array as $gimg_id){
                        $title = get_the_title($gimg_id);
                        $alt = get_post_meta($gimg_id, '_wp_attachment_image_alt', true);
						$portfolio_gallery_thumb_size = get_post_meta($id, 'qode_portfolio_gallery_image_orientation', true);
						$portfolio_gallery_thumb_size = (!empty($portfolio_gallery_thumb_size)) ? get_post_meta($id, 'qode_portfolio_gallery_image_orientation', true) : 'full';

						$original_img = wp_get_attachment_image_src($gimg_id, 'full');
						if(is_array($original_img)) {
							$original_img = $original_img[0];
						}

                        $image_src = wp_get_attachment_image_src($gimg_id, $portfolio_gallery_thumb_size);
                        if (is_array($image_src)) {
							$image_src = $image_src[0];
						}

                        ?>
                        <?php if($lightbox_single_project == "yes"){ ?>
                            <a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $title;  ?>" href="<?php echo $original_img; ?>" data-rel="prettyPhoto[single_pretty_photo]">
                                <span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $title;  ?></h6></span></span>
                                <img src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
                            </a>
                        <?php } else { ?>
                            <a class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="#">
                                <span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $title;  ?></h6></span></span>
                                <img src="<?php echo $image_src; ?>" alt="<?php echo $alt; ?>" />
                            </a>
                        <?php }
                    }
                }
				$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
				if ($portfolio_images){
					usort($portfolio_images, "comparePortfolioImages");
					foreach($portfolio_images as $portfolio_image){
						?>

						<?php if($portfolio_image['portfolioimg'] != ""){ ?>
							<?php
							global $wpdb;
							$image_src = $portfolio_image['portfolioimg'];
							$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
							$id = $wpdb->get_var($query);
							$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
							?>
							<?php if($lightbox_single_project == "yes"){ ?>
								<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
									<span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $portfolio_image['portfoliotitle'];  ?></h6></span></span>
									<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
								</a>
							<?php } else { ?>
								<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="#">
									<span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $portfolio_image['portfoliotitle'];  ?></h6></span></span>
									<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
								</a>
							<?php } ?>

						<?php }else{ ?>

							<?php
							$portfoliovideotype = "";
							if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
							switch ($portfoliovideotype){
								case "youtube": ?>
									<?php if($lightbox_single_project == "yes"){ ?>
										<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="http://www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
											<span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $portfolio_image['portfoliotitle'];  ?></h6></span></span>
											<img width="100%" src="http://img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg" />
										</a>
									<?php } else { ?>
										<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="#">
											<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
										</a>
									<?php } ?>
									<?php	break;
								case "vimeo": ?>
									<?php if($lightbox_single_project == "yes"){
										$videoid = $portfolio_image['portfoliovideoid'];
										$xml = simplexml_load_file("http://vimeo.com/api/v2/video/".$videoid.".xml");
										$xml = $xml->video;
										$xml_pic = $xml->thumbnail_large; ?>
										<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="http://vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
											<span class="gallery_text_holder"><span class="gallery_text_inner"><h6><?php echo $portfolio_image['portfoliotitle'];  ?></h6></span></span>
											<img width="100%" src="<?php echo $xml_pic;  ?>" />
										</a>
									<?php } else { ?>
										<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" href="">
											<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
										</a>
									<?php } ?>

									<?php break;
								case "self": ?>

									<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" onclick='return false;' href="#">
										<div class="video">
											<div class="mobile-video-image" style="background-image: url(<?php echo $portfolio_image['portfoliovideoimage']; ?>);"></div>
											<div class="video-wrap"  >
												<video class="video" poster="<?php echo $portfolio_image['portfoliovideoimage']; ?>" preload="auto">
													<?php if(!empty($portfolio_image['portfoliovideowebm'])) { ?> <source type="video/webm" src="<?php echo $portfolio_image['portfoliovideowebm']; ?>"> <?php } ?>
													<?php if(!empty($portfolio_image['portfoliovideomp4'])) { ?> <source type="video/mp4" src="<?php echo $portfolio_image['portfoliovideomp4']; ?>"> <?php } ?>
													<?php if(!empty($portfolio_image['portfoliovideoogv'])) { ?> <source type="video/ogg" src="<?php echo $portfolio_image['portfoliovideoogv']; ?>"> <?php } ?>
													<object width="320" height="240" type="application/x-shockwave-flash" data="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf">
														<param name="movie" value="<?php echo get_template_directory_uri(); ?>/js/flashmediaelement.swf" />
														<param name="flashvars" value="controls=true&file=<?php echo $portfolio_image['portfoliovideomp4']; ?>" />
														<img src="<?php echo $portfolio_image['portfoliovideoimage']; ?>" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
													</object>
												</video>
											</div>
										</div>
									</a>

									<?php break;
							} ?>

						<?php } ?>

					<?php
					}
				}
				?>
			</div>
			<div class="two_columns_75_25 clearfix portfolio_container">
				<div class="column1">
					<div class="column_inner">
						<div class="portfolio_single_text_holder">
							<h3><?php echo _e('About This Project','qode'); ?></h3>
							<?php the_content(); ?>
							f
						</div>
					</div>
				</div>
				<div class="column2">
					<div class="column_inner">
						<div class="portfolio_detail">
							<?php
							$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
							if ($portfolios){
								usort($portfolios, "comparePortfolioOptions");
								foreach($portfolios as $portfolio){
									?>
									<div class="info portfolio_custom_field">
										<?php if($portfolio['optionLabel'] != ""): ?>
											<h6><?php echo stripslashes($portfolio['optionLabel']); ?></h6>
										<?php endif; ?>
										<p>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</p>
									</div>
								<?php
								}
							}
							?>
							<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
								<div class="info portfolio_custom_date">
									<h6><?php _e('Date','qode'); ?></h6>
									<p><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></p>
								</div>
							<?php endif; ?>
							<?php
							$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
							$counter = 0;
							$all = count($terms);
							if($all > 0){
								?>
								<div class="info portfolio_categories">
									<h6><?php _e('Category ','qode'); ?></h6>
													<span class="category">
													<?php

													foreach($terms as $term) {
														$counter++;
														if($counter < $all){ $after = ', ';}
														else{ $after = ''; }
														echo $term->name.$after;
													}
													?>
													</span>
								</div>
							<?php } ?>
							<?php
							$portfolio_tags = wp_get_post_terms(get_the_ID(),'portfolio_tag');

							if(is_array($portfolio_tags) && count($portfolio_tags)) {
								foreach ($portfolio_tags as $portfolio_tag) {
									$portfolio_tags_array[] = $portfolio_tag->name;
								}

								?>
								<div class="info portfolio_tags">
									<h6><?php _e('Tags', 'qode') ?></h6>
                                                        <span class="category">
                                                            <?php echo implode(', ', $portfolio_tags_array) ?>
                                                        </span>
								</div>

							<?php } ?>
							<div class="portfolio_social_holder">
								<?php echo do_shortcode('[social_share]'); ?>
								<?php if($portfolio_qode_like == "on") { ?>
									<span class="dots"><i class="fa fa-square"></i></span>
									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="portfolio_navigation">
				<div class="portfolio_prev"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?></div>
				<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
					<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
				<?php } ?>
				<div class="portfolio_next"><?php next_post_link('%link','<i class="fa fa-angle-right"></i>'); ?></div>
			</div>
			<?php	break;
	}
	?>
	</div>
			<?php } ?>
			<?php switch ($porftolio_template) {
				case 7: ?>
					<div class="full_width">
						<div class="full_width_inner">
							<div class="portfolio_single">

								<!-- Story Slideshow -->

								<div id="IHM_Stories" class="flexslider">
										
									<ul class="slides">

										<?php if(get_field('story_slides')): ?>

											<?php while(has_sub_field('story_slides')): ?>

												<li>

													<!-- If Image-->

													<?php if(get_sub_field('slide_type') == "image"): ?>

														<img src='<?php the_sub_field("slide_image"); ?>' />
														<p class="slide_caption"><?php the_sub_field('slide_caption'); ?></p>

													<!-- If the slide type is Vimeo -->

													<?php elseif(get_sub_field('slide_type') == "vimeo"): ?>

														<iframe src="http://player.vimeo.com/video/<?php the_sub_field('video_id'); ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>

													<!-- If the video type is Youtube-->

													<?php elseif(get_sub_field('slide_type') == "youtube"): ?>

														<iframe width="100%" src="http://www.youtube.com/embed/<?php the_sub_field('video_id'); ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
													
													<?php endif; ?>

												</li>

											<?php endwhile; ?>

										<?php endif; ?>

									</ul>

									<div class="portfolio_like"><?php if( function_exists('qode_like') ) qode_like(); ?></div>

								</div>

								<div class="container">
									<div class="container_inner clearfix">

										<div class="two_columns_75_25 clearfix portfolio_container">
											<div class="column1">
												<div class="column_inner">
													<div class="portfolio_single_text_holder">
														
														<!-- Main content area for story -->

														<?php the_content(); ?>

													</div>
												</div>
											</div>
											<div class="column2">
												<div class="column_inner">
													
													<div class="story_sidebar_container">

														<!-- Location -->

														<div class="story_sidebar_block">

															<h3>Location</h3>

															<p><?php the_field('story_location'); ?></p>

														</div>

														<!-- Heritage -->

														<div class="story_sidebar_block">

															<h3>Heritage</h3>

															<p><?php the_field('story_heritage'); ?></p>

														</div>

														<!-- Share -->

														<div class="story_sidebar_block">

															<h3>Share</h3>

															<!-- Social Share icons for project. Sharing icons to be displayed are defined in Bridge dashboard -->
															
															<?php echo do_shortcode('[social_share_list]'); ?>

														</div>

													</div>

												</div>
											</div>
										</div>
									</div>

									<!-- Related Story Posts -->

									<div class="related_stories">

										<div class="container_inner">

											<h2>Related Stories</h2>

											<div class="related_stories_feed">

												<div class="vc_row">

													<!-- begin custom related loop-->
		  
											        <?php
											          
											        // get the custom post type's taxonomy terms
											          
											        $custom_taxterms = wp_get_object_terms( $post->ID,
											                    'portfolio_category', array('fields' => 'ids') );
											        // arguments
											        $args = array(
											        'post_type' => 'portfolio_page',
											        'post_status' => 'publish',
											        'posts_per_page' => 3, // you may edit this number
											        'orderby' => 'desc',
											        'tax_query' => array(
											            array(
											                'taxonomy' => 'portfolio_category',
											                'field' => 'id',
											                'terms' => $custom_taxterms
											            )
											        ),
											        'post__not_in' => array ($post->ID),
											        );
											        $related_items = new WP_Query( $args );
											        // loop over query
											        if ($related_items->have_posts()) :
											        while ( $related_items->have_posts() ) : $related_items->the_post();

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
											        <?php
											        endwhile;
											        endif;
											        // Reset Post Data
											        wp_reset_postdata();
													?> 

												</div>

											</div>

											<div class="related_stories_more_cta">

												<a href="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/IHM/stories/'); ?>" class="more_stories_button"></a>

												<a href="<?php echo wp_make_link_relative('http://welcomeus.wpengine.com/IHM/stories/'); ?>">More Stories</a>
											
											</div>

										</div>
									</div>

									<!-- Share Call To Action -->

									<div class="story_bottom">

										<div class="container_inner">

											<div class="vc_row">

												<div class="vc_col-md-12">

													<p>All of our stories are a part of the American Story. What's Yours?</p>
													<a href="https://instagram.com/explore/tags/ihm2015/" target="_blank" class="story_social_hashtag">#IHM2015</a>
													<a href="https://instagram.com/explore/tags/immigrantheritagemonth/" target="_blank" class="story_social_hashtag">#ImmigrantHeritageMonth</a>

												</div>

											</div>

										</div>

									</div>

								</div>
							</div>
						</div>
					</div>
					<?php break;
			} ?>
<?php } ?>