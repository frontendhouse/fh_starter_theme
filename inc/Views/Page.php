<?php
namespace FH\Views;

class Page extends Index {

	/**
	 * Integrate with WordPress actions and filters hooks
	 */
	public function hooks() {
		parent::hooks();
	}



	/**
	 * Here you can add hooks only releted with current view.
	 */
	public function view_hooks() {
		parent::view_hooks();
		if ( is_page() ) {
			add_action( 'fh_entry', array( get_class( $this ), 'page_title' ), 5 );
			add_action( 'fh_entry', array( get_class( $this ), 'page_content' ), 10 );
		}
	}

	/**
	 * Page title.
	 */
	public static function page_title() {
		the_title(  '<h1 class="site-title">', '</h1>' );
	}

	/**
	 * Page content.
	 */
	public static function page_content() {
		the_content();
	}
}