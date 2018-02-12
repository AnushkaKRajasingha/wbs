<?php
/**
 * Created by Anushka K R.
 * Dev. Ref: http://www.rajasingha.com
 * Dev. Public Profile: https://www.upwork.com/fl/anushkakrajasingha
 * Date: 2/8/2017
 * Time: 1:36 AM
 */
/* Class to to genarate the menu and adding menu item to it by analizing the wp posts */
if(!class_exists('WP_Menu_Creator')){
    class WP_Menu_Creator{
        public function __construct()
        {
            add_action('after_switch_theme',array($this,'WBS_Theme_setup_options'));
        }


     public function the_slug_exists($post_name)
    {
        global $wpdb;
        if ($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
            return true;
        } else {
            return false;
        }
    }


    public function WBS_Theme_add_menu_items($pages, $parent_page_id = 0, $parent_id = 0, $menu_id = 0)
    {
        foreach ($pages as $slug => $title) {
            if (!is_array($title)) {
                $_page_check = get_page_by_title($title);
                $_page = array(
                    'post_type' => 'page',
                    'post_title' => $title,
                    'post_content' => "<pre>{$title} page content",
                    'post_status' => 'publish',
                    'post_slug' => $slug,
                    'post_parent' => $parent_page_id
                );
                if (!isset($_page_check->ID) && !the_slug_exists($slug)) {
                    $_page_id = wp_insert_post($_page);
                }

                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $title,
                    'menu-item-classes' => $slug,
                    'menu-item-url' => home_url('/' . $slug),
                    'menu-item-status' => 'publish',
                    'menu-item-parent-id' => $parent_id));
            } else {
                $_page_check = get_page_by_title($title['title']);
                $_slug = str_replace(' ', '_', str_replace('&', '_n_', strtolower($title['title'])));
                $_page = array(
                    'post_type' => 'page',
                    'post_title' => $title['title'],
                    'post_content' => "<pre>{$title['title']} page content",
                    'post_status' => 'publish',
                    'post_slug' => $_slug
                );
                if (!isset($_page_check->ID) && !the_slug_exists($_slug)) {
                    $_page_id = wp_insert_post($_page);
                }

                $parent_id = wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => __($title['title']),
                    'menu-item-classes' => $_slug,
                    'menu-item-url' => home_url('/' . $_slug),
                    'menu-item-status' => 'publish'));

                WBS_Theme_add_menu_items($title['childpages'], $_page_id, $parent_id, $menu_id);

                $parent_id = 0;
            }

        }
    }



    public function WBS_Theme_setup_options()
    {
        // echo 'WBS_Theme_setup_options';
        // if(get_option('WBS_Theme_menu_created') === 0) {
        add_option('WBS_Theme_menu_created', 1);
        $menu_name = 'WBS_Theme_main_menu';
        $menu_exists = wp_get_nav_menu_object( $menu_name );
        // If it doesn't exist, let's create it.
        if( !$menu_exists){

            $pages = array(
                'home' => 'Home',
                'guest-book' => 'Guest Book',
                'timeline' => 'Timeline',
                'gift' => 'Gift Registry',
                'photo-n-ideos' => 'Photo & Videos',
                'games' => array(
                    'title' => 'Games',
                    'childpages' => array(
                        'birthday-bets' => 'Birthday Bets',
                        'baby-photo-game' => 'Baby Photo Game',
                        'quiz-games' => 'Quiz Games'
                    )
                ),
                'video' => 'Video'
            );

            $menu_id = wp_create_nav_menu($menu_name);
            $locations = get_theme_mod('nav_menu_locations'); //var_dump($locations);
            //set the menu to the new location and save into database
            $locations['primary-menu'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );

            WBS_Theme_add_menu_items($pages,0,0,$menu_id);


        }
        // }
    }


    }
}