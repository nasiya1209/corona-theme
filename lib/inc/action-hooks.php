<?php

/**
  * Corona Action Hooks
  *
  * @package WordPress
  * @subpackage corona
  * @since Corona 2.0
  */




/**
  * Posted on - Change or remove the byline, a.k.a. "Posted on"
  *
  * @package WordPress
  * @subpackage corona
  * @since Corona 1.1
  * @see lib/inc/template-tags.php
  */

function corona_posted_on() {
  do_action( 'corona_posted_on' );
}




/**
  * Insert Menu
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_get_menu( $menu ) {
  corona_generate_menu_hook( $menu, 'corona_get_menu' );
}




/**
  * Hook before Corona's Secondary Sidebar
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_sidebar_secondary_top() {
  do_action( 'corona_sidebar_secondary_top' );
}




/**
  * Hook after Corona's Secondary Sidebar
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_sidebar_secondary_bottom() {
  do_action( 'corona_sidebar_secondary_bottom' );
}




/**
  * Hook before Corona's top menus
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_menu_before() {
  do_action( 'corona_menu_before' );
}




/**
  * Hook after Corona's top menus
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_menu_after() {
  do_action( 'corona_menu_after' );
}




/**
  * Hook at the top of a Corona menu
  *
  * @param string - Name of the menu
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_menu_top( $menu ) {
  corona_generate_menu_hook( $menu, 'corona_menu_top' );
}




/**
  * Hook at the bottom of a Corona menu
  *
  * @param string - Name of the menu
  *
  * @package Wordpress
  * @subpackage corona
  * @since Corona 2.0
  */

function corona_menu_bottom( $menu ) {
  corona_generate_menu_hook( $menu, 'corona_menu_bottom' );
}




/**
  * The Wordpress loop as an action hook for DRY-er templates and easier replacement
  *
  * @param string $slug - The slug name for the generic template.
  * @param string $name - The name of the specialized template.
  * @param bool $comments - Include the comments block.
  *
  * @since 2.5.0
  */

function corona_loop( $slug, $name, $comments = false ) {
  $templates = corona_get_template_part( $slug, $name );

	while ( have_posts() ) : the_post();

    $post_format = get_post_format();
    
    corona_template_loader( $templates, $post_format );

    if ( $comments === true ) {
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
    }

	endwhile;

  do_action( 'corona_loop' );
}
