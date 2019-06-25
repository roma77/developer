<?php

namespace Custom_menu;

class Menu {

	/**
	 * List of menu custom fields.
	 *
	 * Set the label, element (input, select), attrs as the attributes list for the element,
	 * If it's a dropdown set the options for it.
	 *
	 *  @var array
	 */
	public static $custom_fields = array();

	/**
	 * Menu Management, sets navigation items custom options.
	 *
	 * @since 0.1.0
	 *
	 * @uses add_action()
	 *
	 * @return void
	 */
	function __construct( $custom_fields ) {

		self::$custom_fields = $custom_fields;

		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'edit_nav_menu_walker' ) );
		add_action( 'wp_update_nav_menu_item', array( $this, 'update_nav_menu_item' ), 10, 3 );
	}

	/**
	 * Replaces default menu editor walker with custom one.
	 *
	 * @return void.
	 */
	function edit_nav_menu_walker( $walker ) {

		$walker = 'Custom_Menu_Walker_Edit';
		require_once dirname( __FILE__ ) . '/Menu_Walker_Edit.php';

		return $walker;
	}

	/**
	 * Update postmeta for the menu items.
	 *
	 * @return  void
	 */
	function update_nav_menu_item( $menu_id, $menu_item_id, $args ) {

		$request = stripslashes_deep( $_POST );

		foreach ( self::$custom_fields as $key => $field ) {
			if ( ! isset( $field['sanitize_callback'] ) ) {
				$field['sanitize_callback'] = 'sanitize_text_field';
			}
			if ( isset( $request[ $key ] ) && isset( $request[ $key ][ $menu_item_id ] ) ) {
				if ($key == '_mycustom_id') {
					update_post_meta( $menu_item_id, $key, sanitize_title(call_user_func( $field['sanitize_callback'], $request[ $key ][ $menu_item_id ] ) ) );
				} else {
					update_post_meta( $menu_item_id, $key, call_user_func( $field['sanitize_callback'], $request[ $key ][ $menu_item_id ] ) );
				}
			} else {
				delete_post_meta( $menu_item_id, $key );
			}
		}
	}
}
