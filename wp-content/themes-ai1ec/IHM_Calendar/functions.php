<?php

/**
 * For advanced users:
 *
 * Place any custom WordPress hooks or theme functions into this file.
 *
 * This file is optional and can be omitted from your custom theme.
 */

add_filter( 'ai1ec_theme_args_categories.twig', 'mytheme_agenda_args', 10, 2 );

function mytheme_agenda_args( $args, $is_admin ) {
  // Iterate through every date of Agenda view

  foreach($args['categories'] as $index => $category) {
    $pieces = explode('/', $category->href);
    $pieces[5] = 'cat_ids~'.$category->term_id;
    $args['categories'][$index]->href = implode($pieces, '/');
  }

  //print_r($args);

  return $args;
}


add_filter( 'ai1ec_theme_args_event-single.twig', 'mytheme_single_args', 10, 2 );

function mytheme_single_args( $args, $is_admin ) {

    $post_id = $args['event']->get( 'post_id' );
    $args['event_content'] = get_post( $post_id );
    $args['event_link'] = get_post_permalink( $post_id );
    $args['event_data'] = get_post_meta( $post_id, null );

  return $args;
}
