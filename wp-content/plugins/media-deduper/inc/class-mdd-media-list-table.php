<?php
/**
 * Media Library List Table class.
 */
require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
require_once( ABSPATH . 'wp-admin/includes/class-wp-media-list-table.php' );

/**
 * Based on WP_Media_List_Table
 */
class MDD_Media_List_Table extends WP_Media_List_Table {

	/**
	 * @global WP_Query $wp_query
	 */
	public function prepare_items() {
		global $wp_query;

		// Eliminate some E_NOTICES from class-wp-media-list-table.
		$this->is_trash = false;

		$this->set_pagination_args( array(
			'total_items' => $wp_query->found_posts,
			'total_pages' => $wp_query->max_num_pages,
			'per_page'    => $wp_query->query_vars['posts_per_page'],
		) );
	}

	/**
	 * @access public
	 */
	public function no_items() {
		_e( 'Great news, no duplicates were found!', 'media-deduper' );
	}

	/**
	 * @return array
	 */
	protected function get_bulk_actions() {
		$actions = array();
		$actions['delete']      = __( 'Delete Permanently', 'media-deduper' );
		$actions['smartdelete'] = __( 'Smart Delete', 'media-deduper' );
		return $actions;
	}
}
