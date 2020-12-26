<?php
/**
 * Plugin Name: Alecadd Plugin
 * Plugin URI:  www.google.com
 * Description: This is a test plugin
 * Version:     1.0
 * Author:      Cupid Chakma
 * Author URI:  www.google.com
 * Text Domain: alecaddd-plugin
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package     Alecaddd Plugin
 * @author      Cupid Chakma
 * @copyright   2020
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 *
 * Prefix:      Plugin Functions Prefix
 */


defined('ABSPATH') or die('You are not authorized to access this file, please exit before we call the cyber crime department');


class AlecaddPlugin {


    function __construct() {
       //$this->print_stuff();
    }

    protected function create_post_type(){
        add_action('init', array( $this, 'custom_post_type' ) );
    }

    function register() {
        add_action( 'admin_enqueue_scripts',array( $this ,'enqueue' ) );
    }

    function activate() {

        $this->custom_post_type();

        //flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        global $wpdb;
        $wpdb->query( "DELETE FROM wp_posts where post_type = 'book'" );
    }

    function custom_post_type() {
        register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
    }

    function enqueue() {
        //enqueue all scripts
        wp_enqueue_style('mypluginstyle', plugins_url(__FILE__)."assets/mystyle.css", array(''), false);
    }
    
    function print_stuff() {
        echo "I am all loaded with cum!";
    }
}


class SecondClass extends AlecaddPlugin{

    function __construct() {
        $this->print_stuff();
    }

    function register_post_type() {
        $this->create_post_type();
    }
}

if( class_exists( 'AlecaddPlugin' ) ) {
    $alecaddPlugin = new AlecaddPlugin();
    $alecaddPlugin->register();
}

$secondclass = new SecondClass();
$secondclass->register_post_type();

//activation
register_activation_hook( __FILE__, array( $alecaddPlugin, 'activate' ) );

//deactivation
register_deactivation_hook( __FILE__, array( $alecaddPlugin, 'deactivate' ));
