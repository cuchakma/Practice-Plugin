<?php
/**
 * trigger this file when uninstall
 * 
 * @package Alecaddd Plugin
 */

defined( 'ABSPATH' ) or die('You are not authorized to access this file, please exit before we call the cyber crime department');

// Clear Database Stored Data
//$books = get_posts();

//foreach( $books as $book ){
//    wp_delete_post( $book->ID, true );
//}

//access the database via SQL;
global $wpdb;

$wpdb->query( "DELETE FROM wp_posts where post_type = 'book'" );