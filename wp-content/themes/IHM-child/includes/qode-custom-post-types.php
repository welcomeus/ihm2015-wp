<?php

add_action('init', 'create_post_type',0);

/* Create Portfolio, Testimonial, Slider and Carousel post type */
if (!function_exists('create_post_type')) {
	function create_post_type() {
		global $qode_options_proya;
		$slug = 'portfolio_page';
		if(isset($qode_options_proya['portfolio_single_slug'])) {
			if($qode_options_proya['portfolio_single_slug'] != ""){
				$slug = $qode_options_proya['portfolio_single_slug'];
			}
		}
		register_post_type( 'portfolio_page',
			array(
				'labels' => array(
					'name' => __( 'Stories','qode' ),
					'singular_name' => __( 'Story','qode' ),
					'add_item' => __('New Story','qode'),
					'add_new_item' => __('Add New Story','qode'),
					'edit_item' => __('Edit Story','qode')
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => $slug),
				'menu_position' => 4,
				'show_ui' => true,
				'menu_icon'     => 'dashicons-groups',
				'taxonomies' => array( 'portfolio_category'),
		        'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments')
			)
		);
		
		/*register_post_type('slides',
			array(
				'labels' 		=> array(
				'name' 				=> __('Slider','qode' ),
				'menu_name'	=> __('Slider','qode' ),
				'all_items'	=> __('Slides','qode' ),
				'add_new' =>  __('Add New Slide','qode'),
				'singular_name' 	=> __('Slide','qode' ),
				'add_item'			=> __('New Slide','qode'),
				'add_new_item' 		=> __('Add New Slide','qode'),
				'edit_item' 		=> __('Edit Slide','qode')
				),
				'public'		=>	false,
				'show_in_menu'	=>	true, 
				'rewrite' 		=> 	array('slug' => 'slides'),
				'menu_position' => 	4,
				'show_ui'		=>	true,
				'has_archive'	=>	false, 
				'hierarchical'	=>	false,
				'supports'		=>	array('title', 'page-attributes'),
				'menu_icon'     => 'dashicons-format-gallery'
			)
		);*/
		
	/* Create Portfolio Categories */

	  $labels = array(
			'name' => __( 'Story Categories', 'qode' ),
			'singular_name' => __( 'Story Category', 'qode' ),
			'search_items' =>  __( 'Search Story Categories','qode' ),
			'all_items' => __( 'All Story Categories','qode' ),
			'parent_item' => __( 'Parent Story Category','qode' ),
			'parent_item_colon' => __( 'Parent Story Category:','qode' ),
			'edit_item' => __( 'Edit Story Category','qode' ), 
			'update_item' => __( 'Update Story Category','qode' ),
			'add_new_item' => __( 'Add New Story Category','qode' ),
			'new_item_name' => __( 'New Story Category Name','qode' ),
			'menu_name' => __( 'Story Categories','qode' ),
	  );     

	  register_taxonomy('portfolio_category',array('portfolio_page'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'portfolio-category' ),
	  ));

	/* Create Portfolio Tags */

		$labels = array(
			'name' => __( 'Story Tags', 'qode' ),
			'singular_name' => __( 'Story Tag', 'qode' ),
			'search_items' =>  __( 'Search Story Tags','qode' ),
			'all_items' => __( 'All Story Tags','qode' ),
			'parent_item' => __( 'Parent Story Tag','qode' ),
			'parent_item_colon' => __( 'Parent Story Tags:','qode' ),
			'edit_item' => __( 'Edit Story Tag','qode' ),
			'update_item' => __( 'Update Story Tag','qode' ),
			'add_new_item' => __( 'Add New Story Tag','qode' ),
			'new_item_name' => __( 'New Story Tag Name','qode' ),
			'menu_name' => __( 'Story Tags','qode' ),
		);

		register_taxonomy('portfolio_tag',array('portfolio_page'), array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'portfolio-tag' ),
		));

	/* Create Slider Category */

	  $labels = array(
			'name' => __( 'Sliders', 'qode' ),
			'singular_name' => __( 'Slider', 'qode' ),
			'search_items' =>  __( 'Search Sliders','qode' ),
			'all_items' => __( 'All Sliders','qode' ),
			'parent_item' => __( 'Parent Slider','qode' ),
			'parent_item_colon' => __( 'Parent Slider:','qode' ),
			'edit_item' => __( 'Edit Slider','qode' ), 
			'update_item' => __( 'Update Slider','qode' ),
			'add_new_item' => __( 'Add New Slider','qode' ),
			'new_item_name' => __( 'New Slider Name','qode' ),
			'menu_name' => __( 'Sliders','qode' ),
	  );     

	  register_taxonomy('slides_category',array('slides'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'show_admin_column' => true,
		'rewrite' => array( 'slug' => 'slides-category' ),
	  ));

	}
}

?>