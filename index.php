<?php
/*
Plugin Name: Hierarchical Page View
Plugin URI: http://plugins.justingivens.com/?pid=Hierarchical-Page-View
Description: The plugin displays the Hierarchial Page View only in the Admin section for large number of Post/Pages. Currently goes 5 Levels Deep.
Version: 1.5
Author: Justin D. Givens
Author URI: http://plugins.justingivens.com/?aid=Hierarchical-Page-View
Copyright 2011 Justin D. Givens

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
define( 'HPV_VERSION' , '1.0');
define( 'HPV_NAME' , 'Hierarchical Page View');
define( 'HPV_URL' , plugin_dir_url( __FILE__ ) );

function hpv_add_submenu() {
	$page = add_submenu_page(  'edit.php?post_type=page' , HPV_NAME , HPV_NAME , 'edit_pages' , 'hierarchical-page-view' , 'hpv_display_page' );
	add_action( 'admin_print_styles-' . $page , 'hpv_admin_styles' );
}
function hpv_admin_styles() {
	wp_enqueue_style( 'hpv_css_styles' , HPV_URL . 'hpv-css.css' , array() , HPV_VERSION , 'screen' );
}
function hpv_display_page() {
	echo '<div class="wrap">';
	echo '<div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div>';
	echo '<h2>' . HPV_NAME . ' <a class="add-new-h2" href="./post-new.php?post_type=page">Add New Page</a></h2>';
	echo '<p>Welcome to the Hierarchical Page View. Make suggestions here: <a target="_blank" href="http://plugins.justingivens.com/?pid=Hierarchical-Page-View-Suggestion">JustinGivens.com</a>.</p>';
	echo '<div id="hpv-details">';
	$args = array(
		'child_of' => 0,
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order, post_title',
		'hierarchical' => 0,
		'exclude' => '',
		'include' => '',
		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'parent' => 0,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	);
	echo '<ul>';
	$pages = get_pages( $args );
	foreach ( $pages as $pagg ) {
		echo '<li><a href="./post.php?post='.$pagg->ID.'&action=edit">'.$pagg->post_title.'</a>';
		$childArgs = array(
			'child_of' => 0,
			'sort_order' => 'ASC',
			'sort_column' => 'menu_order, post_title',
			'hierarchical' => 0,
			'exclude' => '',
			'include' => '',
			'meta_key' => '',
			'meta_value' => '',
			'authors' => '',
			'parent' => $pagg->ID,
			'exclude_tree' => '',
			'number' => '',
			'offset' => 0,
			'post_type' => 'page',
			'post_status' => 'publish'
		);
		$childPages = get_pages( $childArgs );
		if( count( $childPages ) > 0 ) {
			echo '<ul>';
			foreach ( $childPages as $cpagg ) {
				echo '<li><a href="./post.php?post='.$cpagg->ID.'&action=edit">'.$cpagg->post_title.'</a>';
				$child2Args = array(
					'child_of' => 0,
					'sort_order' => 'ASC',
					'sort_column' => 'menu_order, post_title',
					'hierarchical' => 0,
					'exclude' => '',
					'include' => '',
					'meta_key' => '',
					'meta_value' => '',
					'authors' => '',
					'parent' => $cpagg->ID,
					'exclude_tree' => '',
					'number' => '',
					'offset' => 0,
					'post_type' => 'page',
					'post_status' => 'publish'
				);
				$child2Pages = get_pages( $child2Args );
				if( count( $child2Pages ) > 0 ) {
					echo '<ul>';
					foreach ( $child2Pages as $c2pagg ) {
						echo '<li><a href="./post.php?post='.$c2pagg->ID.'&action=edit">'.$c2pagg->post_title.'</a>';
						$child3Args = array(
							'child_of' => 0,
							'sort_order' => 'ASC',
							'sort_column' => 'menu_order, post_title',
							'hierarchical' => 0,
							'exclude' => '',
							'include' => '',
							'meta_key' => '',
							'meta_value' => '',
							'authors' => '',
							'parent' => $c2pagg->ID,
							'exclude_tree' => '',
							'number' => '',
							'offset' => 0,
							'post_type' => 'page',
							'post_status' => 'publish'
						);
						$child3Pages = get_pages( $child3Args );
						if( count( $child3Pages ) > 0 ) {
							echo '<ul>';
							foreach ( $child3Pages as $c3pagg ) {
								echo '<li><a href="./post.php?post='.$c3pagg->ID.'&action=edit">'.$c3pagg->post_title.'</a>';
								$child4Args = array(
									'child_of' => 0,
									'sort_order' => 'ASC',
									'sort_column' => 'menu_order, post_title',
									'hierarchical' => 0,
									'exclude' => '',
									'include' => '',
									'meta_key' => '',
									'meta_value' => '',
									'authors' => '',
									'parent' => $c3pagg->ID,
									'exclude_tree' => '',
									'number' => '',
									'offset' => 0,
									'post_type' => 'page',
									'post_status' => 'publish'
								);
								$child4Pages = get_pages( $child4Args );
								if( count( $child4Pages ) > 0 ) {
									echo '<ul>';
									foreach ( $child4Pages as $c4pagg ) {
										echo '<li><a href="./post.php?post='.$c4pagg->ID.'&action=edit">'.$c4pagg->post_title.'</a>';
										$child5Args = array(
											'child_of' => 0,
											'sort_order' => 'ASC',
											'sort_column' => 'menu_order, post_title',
											'hierarchical' => 0,
											'exclude' => '',
											'include' => '',
											'meta_key' => '',
											'meta_value' => '',
											'authors' => '',
											'parent' => $c4pagg->ID,
											'exclude_tree' => '',
											'number' => '',
											'offset' => 0,
											'post_type' => 'page',
											'post_status' => 'publish'
										);
										$child5Pages = get_pages( $child5Args );
										if( count( $child5Pages ) > 0 ) {
											echo '<ul>';
											foreach ( $child5Pages as $c5pagg ) {
												echo '<li><a href="./post.php?post='.$c5pagg->ID.'&action=edit">'.$c5pagg->post_title.'</a>';
												echo '</li>';
											}
											echo '</ul>';
										}
										echo '</li>';
									}
									echo '</ul>';
								}
								echo '</li>';
							}
							echo '</ul>';
						}
						echo '</li>';
					}
					echo '</ul>';
				}
				echo '</li>';
			}
			echo '</ul>';
		}
		echo '</li>';
	}
	echo '</ul>';
	echo '</div>';
	echo '</div>';
}

add_action( 'admin_menu' , 'hpv_add_submenu' );
?>