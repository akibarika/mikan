<?php
/**
 * Created by PhpStorm.
 * User: Akiba
 * Date: 14-8-21
 * Time: 下午11:10
 */

//adding menu selecting support
add_theme_support( 'menus' );
if( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(array('menu' => 'Menu'));
}

