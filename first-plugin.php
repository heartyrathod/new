<?php
/*
Plugin Name: first-plugin
Description: This is a sample  plugin for WordPress.
Version: 1.1.0
Author: aj
Author url:http://localhost/just/wordpress 
*/


function customplugin_table(){

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
  
    $tablename = $wpdb->prefix."customplugin";
  
    $sql = "CREATE TABLE $tablename (
    id mediumint(11) NOT NULL AUTO_INCREMENT,
    name varchar(80) NOT NULL,
    username varchar(80) NOT NULL,
    email varchar(80) NOT NULL,
    PRIMARY KEY  (id)
    ) $charset_collate;";
  
    // require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
  
  }
  register_activation_hook( __FILE__, 'customplugin_table' );
  
   
  function customplugin_menu() {
  
    add_menu_page("Custom Plugin", "Custom Plugin","manage_options", "myplugin", "displayList",
                          plugins_url('/first/img/hr1.jpg'));
    add_submenu_page("myplugin","All Entries", "All entries","manage_options", "allentries", "displayList");
    add_submenu_page("myplugin","Add new Entry", "Add new Entry","manage_options", "addnewentry", "addEntry");
    

}
add_action("admin_menu", "customplugin_menu");
  
  function displayList(){
    include "displaylist.php";
  }
  
  function addEntry(){
    include "addentry.php";
  }

  

