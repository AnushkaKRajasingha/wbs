<?php
/** *
 * User: Anushka K R
 * Date: 11/24/2017
 * Time: 5:13 PM
 */
if(!defined('ABSPATH'))die();
define( 'WBS_INCLUDE_DIR', get_template_directory() . '/include/' );
include_once 'include/menuWalker.php';
include_once WBS_INCLUDE_DIR.'/cls_customize_controls.php';

if(!function_exists('wbs_wp_localize_style')){
    function wbs_wp_localize_style(){
        $header_font =  get_option('wbs_heading_font','Poppins');
        $header_font_size = get_option('wbs_heading_font_size','38');
        $body_font = get_option('wbs_body_font','Poppins');
        $body_font_size = get_option('wbs_body_font_size','14');
        $wbs_title_color = get_option('wbs_title_color');
        $wbs_heading_text_color = get_option('wbs_heading_text_color');
        $wbs_main_text_color = get_option('wbs_main_text_color');
        $wbs_header_image = get_option('wbs_header_image');
        $wbs_header_image_style = ".bunner .bunner-bg {	background-image: url('{$wbs_header_image}') !important;}";
        $hide_menu_options = '#available-menu-items-post_type-post,#available-menu-items-taxonomy-category,
        #available-menu-items-taxonomy-post_tag,
        .customize-control.customize-control-nav_menu_locations,
        .customize-control.customize-control-nav_menu_auto_add,
        .customize-control.customize-control-undefined{display:none;}';
        $header_style = "h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,.h1, .h2, .h3, .h4, .h5, .h6, .h1 a, .h2 a, .h3 a, .h4 a, .h5 a, .h6 a{ font-family: {$header_font}, sans-serif; color:{$wbs_heading_text_color} !important;} ";
        $header_style2 = ".site-name{font-size:{$header_font_size}px !important;font-family: {$header_font}, sans-serif!important; }";
        $body_style = "body {font-family: '{$body_font}', sans-serif !important;font-size:{$body_font_size}px !important;color:{$wbs_main_text_color} !important;}";
        $wbs_title_color_style ='';
        if($wbs_title_color){
            $wbs_title_color_style = ".site-name{color:{$wbs_title_color} !important;}";
        }
        $__style = <<<STYLE
        <style type="text/css">
            {$header_style}
            {$header_style2}
            {$hide_menu_options}
            {$body_style}
            {$wbs_title_color_style}
            {$wbs_header_image_style}
        </style>
STYLE;
        echo $__style;
    }
}
add_action('wp_head','wbs_wp_localize_style');

if(!function_exists('wbs_to_google_font_name')) {
    function wbs_to_google_font_name($font_name)
    {
        return str_replace(' ', '+', $font_name);
    }
}

if(!function_exists('wbs_fontname_to_class')) {
    function wbs_fontname_to_class($font_name)
    {
        return 'wbs_' . strtolower(str_replace(' ', '_', $font_name));
    }
}

if(!function_exists('wbs_theme_styles')) {
    function wbs_theme_styles()
    {
        wp_enqueue_style('bootstrap_css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
        wp_enqueue_style('et_google_fonts_css', get_template_directory_uri() . '/google-fonts/et_google_fonts.css');
        wp_enqueue_style('wbs_main_css', get_template_directory_uri() . '/css/style.css');
        wp_enqueue_style('wbs_theme-neutral-1', get_template_directory_uri() . '/css/themes/neutral-1.css');
        /* google font */
        $header_font = get_option('wbs_heading_font', 'Poppins');
        // var_dump(wbs_fontname_to_class($header_font));
        // var_dump(wbs_to_google_font_name($header_font));
        wp_enqueue_style(wbs_fontname_to_class($header_font), '//fonts.googleapis.com/css?family=' . wbs_to_google_font_name($header_font) . ':400,600,700', array(), array());
        /*google font*/
    }
}
add_action( 'wp_enqueue_scripts', 'wbs_theme_styles');

if(!function_exists('wbs_customize_preview_css')){
    function wbs_customize_preview_css(){
        wp_enqueue_style( 'wbs_theme-customizer', get_template_directory_uri() . '/css/theme-customizer-controls-styles.css' );
    }
}
add_action( 'customize_controls_enqueue_scripts', 'wbs_customize_preview_css' );

if(!function_exists('wbs_theme_js')) {
    function wbs_theme_js()
    {
        global $wp_scripts;
        wp_deregister_script('jquery');
        wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js", false, null);
        wp_enqueue_script('jquery');
        wp_enqueue_script('google-fonts', get_template_directory_uri() . '/google-fonts/et_google_fonts.js', array('jquery'));
        wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array('jquery'));
        wp_enqueue_script('bootstrap_js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', array('jquery'));
        wp_enqueue_script('menu_fix_js', get_template_directory_uri() . '/js/menu_fix.js', array('jquery'));


    }
}
add_action( 'wp_enqueue_scripts', 'wbs_theme_js');

register_nav_menus( array(
    'primary-menu' => 'Primary Menu'
) );

if ( ! function_exists( 'wbs_show_page_menu' ) ) {

    function wbs_show_page_menu($customClass = 'nav clearfix', $addUlContainer = true, $addHomeLink = true){
        //need to be implemented for more features
    }

}
if ( ! function_exists( 'wbs_show_categories_menu' ) ) {

    function wbs_show_categories_menu($customClass = 'nav clearfix', $addUlContainer = true){
        //need to be implemented for more features
    }

}
if ( ! function_exists( 'wbs_html_body_start' ) ) {
    function wbs_html_body_start()
    {
        ?>
        <body  <?php body_class(); ?>>
        <header>
            <nav class="navbar-1">
                <div class="container">
                    <div
                        class="col-12 padding-x d-flex align-items-center justify-content-center justify-content-lg-start">
                        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            </a>
                        <div class="site-name"><?php echo bloginfo('blogname');?></div>
                    </div>
                </div>
            </nav>
            <div class="input-group input-group-search d-lg-none navbar-light navbar-expand-lg">
                <button class="btn" type="button"></button>
                <input type="text" class="form-control">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <nav class="navbar-2 navbar navbar-light navbar-expand-lg">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <?php include 'include/mainnav.php'; ?>
                    </div>
                </div>
            </nav>
        </header>
    <?php
    }
}
add_action('html_body_start','wbs_html_body_start',10);

if ( ! function_exists( 'wbs_html_body_end' ) ) {
    function wbs_html_body_end()
    {
        ?>
        <footer>
        <div class="container">
            <div class="col-12 padding-x">
                <div class="row align-items-start">
                    <div class="col-12 col footer-left d-flex align-items-center justify-content-center justify-content-md-between">
                       <a href="<?php echo esc_url(wp_login_url(get_permalink())); ?>" class="btn btn-tr"><?php esc_attr_e('Login', 'wbs'); ?></a>
                       <a href="#" class="link">Edit Profile & Email Notifications</a>
                    </div>
                    <div class="col-12 col-md footer-right text-center text-md-left">
                        <p>Sign up to host a baby shower today</p>
                        <p class="mb-0">Thank you for visiting the Web Baby Shower for Web Baby Shower Network.</p>
                        <p class="mb-0">Powered by Web Baby Shower : Terms of Service</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
    <?php
    }
}
add_action('html_body_end','wbs_html_body_end',10);

if(!function_exists('wbs_comment_form_before')) {
    function wbs_comment_form_before()
    {
        echo '<div class="comment-section"><div class="comment-content comment-content-2">';
    }
}
add_action('comment_form_before','wbs_comment_form_before');

if(!function_exists('wbs_comment_form_after')) {
    function wbs_comment_form_after()
    {
        echo '</div></div>';
    }
}
add_action('comment_form_after','wbs_comment_form_after');

if(!function_exists('wbs_custom_comment_form')) {
    function wbs_custom_comment_form()
    {
        //  return array('label_submit' => 'Test Submit');
    }
}
add_filter('comment_form_defaults','wbs_custom_comment_form');

if(!function_exists('wbs_comment_form_logged_in')){
    function wbs_comment_form_logged_in(){ return '';}
}
//add_action('comment_form_logged_in','wbs_comment_form_logged_in');

if(!function_exists('wbs_comment_form_default_fields')){
    function wbs_comment_form_default_fields(){
        $commenter = wp_get_current_commenter();
        $fields = '<div class="row"><div class="col-md-5"><div class="form-group"><input required type="text" class="form-control" placeholder="Screen Name or Nickname"  value="' . esc_attr( $commenter['comment_author'] ) . '"></div></div>';
        return $fields;
    }
}
add_filter('comment_form_default_fields','wbs_comment_form_default_fields',10,2);

if(!function_exists('func_wbs_comment_form')){
    function func_wbs_comment_form(){

        $user = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';

        $before_submit_field = '';
        if(is_user_logged_in()){
            $before_submit_field = '<div class="row"><div class="col-md-5"><div class="form-group"><input required type="text" class="form-control" placeholder="Screen Name or Nickname"  value="' . esc_attr( $user_identity ) . '"></div></div>';
        }

        $args = array(
            'comment_field'        => '<div class="form-group"><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea></div>',
            'title_reply_before' => '<div class="h3 black">',
            'title_reply_after' => '</div><p class="mb-25">Spam filtering in place -- please be patient while your comments are processed!</p>',
            'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
            'class_submit' => 'btn',
            'logged_in_as'         => '',
            'submit_field'         => $before_submit_field.'<div class="col-md-7 text-right"><div class="form-group"><p class="form-submit">%1$s %2$s</p></div></div></div>',
        );
        return comment_form($args);
    }
}
add_filter('wbs_comment_form','func_wbs_comment_form');

if(!function_exists('wbs_custom_comment_list')){
    function wbs_custom_comment_list($comment, $args, $depth){
        ?>
        <div class="comment-section" id="comment-<?php comment_ID(); ?>">
            <div class="comment-content">
                <div class="row align-items-start">
                    <div class="col-12 col comment-content-left d-flex align-items-center justify-content-center justify-content-md-between">
                        <div class="user-photo-wrap"><div class="user-photo"><?php  if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?></div></div>
                        <div class="user-name black"><?php echo get_comment_author_link( $comment );  ?></div>
                    </div>
                    <div class="col-12 col-md comment-content-right">
                        <div class="comment black">
                            <?php if ( '0' == $comment->comment_approved ) : ?>
                                <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                            <?php endif; ?>
                            <?php comment_text(); ?>
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between">
                            <?php
                            comment_reply_link( array_merge( $args, array(
                                'add_below' => 'div-comment',
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                                'before'    => '<div class="reply">',
                                'after'     => '</div>'
                            ) ) );
                            ?>
                            <div class="date"><?php printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() ); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php
    }
}

if ( ! function_exists( 'wbs_get_websafe_fonts' ) ) :
    function wbs_get_websafe_fonts() {
        $websafe_fonts = array(
            'Georgia' => array(
                'styles' 		=> '300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
                'character_set' => 'cyrillic,greek,latin',
                'type'			=> 'serif',
            ),
            'Times New Roman' => array(
                'styles' 		=> '300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
                'character_set' => 'arabic,cyrillic,greek,hebrew,latin',
                'type'			=> 'serif',
            ),
            'Arial' => array(
                'styles' 		=> '300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
                'character_set' => 'arabic,cyrillic,greek,hebrew,latin',
                'type'			=> 'sans-serif',
            ),
            'Trebuchet' => array(
                'styles' 		=> '300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
                'character_set' => 'cyrillic,latin',
                'type'			=> 'sans-serif',
                'add_ms_version'=> true,
            ),
            'Verdana' => array(
                'styles' 		=> '300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
                'character_set' => 'cyrillic,latin',
                'type'			=> 'sans-serif',
            ),
        );

        $_websafe_fonts = array();

        foreach ( $websafe_fonts as $font_name => $settings ) {
            $settings['standard'] = true;

            $_websafe_fonts[ $font_name ] = $settings;
        }

        $websafe_fonts = $_websafe_fonts;

        return $websafe_fonts;

       // return apply_filters( 'et_websafe_fonts', $websafe_fonts );
    }
endif;

if ( ! function_exists( 'wbs_get_google_api_key' ) ) :
    function wbs_get_google_api_key() {
        $google_api_option = get_option( 'et_google_api_settings' );
        $google_api_key = isset( $google_api_option['api_key'] ) ? $google_api_option['api_key'] : '';

        return $google_api_key;
    }
endif;

if ( ! function_exists( 'wbs_get_one_font_languages' ) ) :
    function wbs_get_one_font_languages() {
        $one_font_languages = array(
            'he_IL' => array(
                'language_name'   => 'Hebrew',
                'google_font_url' => '//fonts.googleapis.com/earlyaccess/alefhebrew.css',
                'font_family'     => "'Alef Hebrew', serif",
            ),
            'ja' => array(
                'language_name'   => 'Japanese',
                'google_font_url' => '//fonts.googleapis.com/earlyaccess/notosansjapanese.css',
                'font_family'     => "'Noto Sans Japanese', serif",
            ),
            'ko_KR' => array(
                'language_name'   => 'Korean',
                'google_font_url' => '//fonts.googleapis.com/earlyaccess/hanna.css',
                'font_family'     => "'Hanna', serif",
            ),
            'ar' => array(
                'language_name'   => 'Arabic',
                'google_font_url' => '//fonts.googleapis.com/earlyaccess/lateef.css',
                'font_family'     => "'Lateef', serif",
            ),
            'th' => array(
                'language_name'   => 'Thai',
                'google_font_url' => '//fonts.googleapis.com/earlyaccess/notosansthai.css',
                'font_family'     => "'Noto Sans Thai', serif",
            ),
            'ms_MY' => array(
                'language_name'   => 'Malay',
                'google_font_url' => '//fonts.googleapis.com/earlyaccess/notosansmalayalam.css',
                'font_family'     => "'Noto Sans Malayalam', serif",
            ),
            'zh_CN' => array(
                'language_name'   => 'Chinese',
                'google_font_url' => '//fonts.googleapis.com/earlyaccess/cwtexfangsong.css',
                'font_family'     => "'cwTeXFangSong', serif",
            ),
        );

        return $one_font_languages;
    }
endif;

if ( ! function_exists( 'wbs_get_google_fonts' ) ) :
    function wbs_get_google_fonts() {
        // get hardcoded google fonts
        require_once( WBS_INCLUDE_DIR . 'google-fonts-data.php' );
        return wbs_get_saved_google_fonts();

        $google_fonts_cache = get_option( 'wbs_google_fonts_cache', array() );

        if ( 'valid' === get_transient( 'wbs_google_fonts_cache_status' ) && ! empty( $google_fonts_cache ) ) {
            return apply_filters( 'et_builder_google_fonts', $google_fonts_cache );
        }

        $google_api_key = wbs_get_google_api_key();
        $all_google_fonts = array();

        if ( '' !== $google_api_key ) {
            $google_fonts_api_url = sprintf( 'https://www.googleapis.com/webfonts/v1/webfonts?key=%1$s', $google_api_key );
            $google_fonts_response = wp_remote_get( esc_url_raw( $google_fonts_api_url ) );

            $all_google_fonts = is_array( $google_fonts_response ) ? json_decode( wp_remote_retrieve_body( $google_fonts_response ), true ) : array();
        }

        if ( ! empty( $all_google_fonts ) && ! empty( $all_google_fonts['items'] ) ) {
            $google_fonts = array();

            foreach ( $all_google_fonts['items'] as $font_data ) {
                $google_fonts[ $font_data['family'] ] = array(
                    'styles'        => sanitize_text_field( implode( ',', $font_data['variants'] ) ),
                    'character_set' => sanitize_text_field( implode( ',', $font_data['subsets'] ) ),
                    'type'          => sanitize_text_field( $font_data['category'] ),
                );
            }
            // save google fonts and set the cache status to be valid for next 24 hours
            update_option( 'wbs_google_fonts_cache', $google_fonts );
            set_transient( 'wbs_google_fonts_cache_status', 'valid', 24 * HOUR_IN_SECONDS );
        } else if ( ! empty( $google_fonts_cache ) ) {
            // still use cache if it's not empty and fonts update failed
            return apply_filters( 'wbs_builder_google_fonts', $google_fonts_cache );
        } else {
            // get hardcoded google fonts
            require_once( WBS_INCLUDE_DIR . 'google-fonts-data.php' );
            $google_fonts = wbs_get_saved_google_fonts();
        }

        return apply_filters( 'et_builder_google_fonts', $google_fonts );
    }
endif;

if ( ! function_exists( 'wbs_get_fonts' ) ) :
    function wbs_get_fonts( $settings = array() ) {
        $defaults = array(
            'prepend_standard_fonts' => true,
        );

        $settings = wp_parse_args( $settings, $defaults );

        $fonts = $settings['prepend_standard_fonts']
            ? array_merge( wbs_get_websafe_fonts(), wbs_get_google_fonts() )
            : array_merge( wbs_get_google_fonts(), wbs_get_websafe_fonts() );

        return $fonts;
    }
endif;

if ( ! function_exists( 'wbs_get_custom_fonts' ) ) :
    function wbs_get_custom_fonts() {
        $all_custom_fonts = get_option( 'wbs_uploaded_fonts', array() );
        return apply_filters( 'wbs_custom_fonts', $all_custom_fonts );
    }
endif;

if(!function_exists('wbs_old_fonts_mapping')) {
    function wbs_old_fonts_mapping()
    {
        return array(
            'Raleway Light' => array(
                'parent_font' => 'Raleway',
                'styles' => '300',
            ),
            'Roboto Light' => array(
                'parent_font' => 'Roboto',
                'styles' => '100',
            ),
            'Source Sans Pro Light' => array(
                'parent_font' => 'Source Sans Pro',
                'styles' => '300',
            ),
            'Lato Light' => array(
                'parent_font' => 'Lato',
                'styles' => '300',
            ),
            'Open Sans Light' => array(
                'parent_font' => 'Open Sans',
                'styles' => '300',
            ),
        );
    }
}

if(!function_exists('wbs_customize_register')){
    function wbs_customize_register($wp_customize)
    {
        $site_domain = get_locale();

        $google_fonts = wbs_get_fonts( array(
            'prepend_standard_fonts' => false,
        ) );

        $user_fonts = wbs_get_custom_fonts();

        // combine google fonts with custom user fonts
        $google_fonts = array_merge( $user_fonts, $google_fonts );

        $et_domain_fonts = array(
            'ru_RU' => 'cyrillic',
            'uk' => 'cyrillic',
            'bg_BG' => 'cyrillic',
            'vi' => 'vietnamese',
            'el' => 'greek',
        );

        $et_one_font_languages = wbs_get_one_font_languages();

        $font_choices = array();
        $font_choices['none'] = array(
            'label' => 'Default Theme Font'
        );

        $removed_fonts_mapping = wbs_old_fonts_mapping();

        foreach ( $google_fonts as $google_font_name => $google_font_properties ) {
            $use_parent_font = false;

            if ( isset( $removed_fonts_mapping[ $google_font_name ] ) ) {
                $parent_font = $removed_fonts_mapping[ $google_font_name ]['parent_font'];
                $google_font_properties['character_set'] = $google_fonts[ $parent_font ]['character_set'];
                $use_parent_font = true;
            }

            if ( '' !== $site_domain && isset( $et_domain_fonts[$site_domain] ) && false === strpos( $google_font_properties['character_set'], $et_domain_fonts[$site_domain] ) ) {
                continue;
            }
            $font_choices[ $google_font_name ] = array(
                'label' => $google_font_name,
                'data'  => array(
                    'parent_font'    => $use_parent_font ? $google_font_properties['parent_font'] : '',
                    'parent_styles'  => $use_parent_font ? $google_fonts[$parent_font]['styles'] : $google_font_properties['styles'],
                    'current_styles' => $use_parent_font && isset( $google_fonts[$parent_font]['styles'] ) && isset( $google_font_properties['styles'] ) ? $google_font_properties['styles'] : '',
                    'parent_subset'  => $use_parent_font && isset( $google_fonts[$parent_font]['character_set'] ) ? $google_fonts[$parent_font]['character_set'] : '',
                    'standard'       => isset( $google_font_properties['standard'] ) && $google_font_properties['standard'] ? 'on' : 'off',
                )
            );
        }

        /* header font */
        $wp_customize->add_panel('wbs_typography', array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'title' =>  __('Typography', 'wbs'),
            'description' => __('Customize theme typography.', 'wbs'),
        ));
        $wp_customize->add_section('wbs_header', array(
            'title' => __('Header', 'wbs'),
            'priority' => 5,
            'panel' => 'wbs_typography',
        ));
        $wp_customize->add_setting('wbs_heading_font', array(
            'default' => 'Poppins',
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
         $wp_customize->add_control( new Wbs_Select_Option ( $wp_customize, 'wbs_heading_font', array(
             'label'		=> __( 'Header Font', 'wbs' ),
             'section'	=> 'wbs_header',
             'settings'	=> 'wbs_heading_font',
             'type'		=> 'select',
             'choices'	=> $font_choices,
         ) ) );

        $wp_customize->add_setting('wbs_heading_font_size', array(
            'default' => '38',
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control( new Wbs_Range_Option( $wp_customize, 'wbs_heading_font_size', array(
            'label'	      => esc_html__( 'Header Text Size', 'wbs' ),
            'section'     => 'wbs_header',
            'type'        => 'range',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 72,
                'step' => 1
            ),
        ) ) );
         /* header font ends*/
        /* body font */
        $wp_customize->add_section('wbs_body', array(
            'title' => __('Body', 'wbs'),
            'priority' => 6,
            'panel' => 'wbs_typography',
        ));

        $wp_customize->add_setting('wbs_body_font', array(
            'default' => 'Poppins',
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control( new Wbs_Select_Option ( $wp_customize, 'wbs_body_font_ctrl', array(
            'label'		=> __( 'Body Font', 'wbs' ),
            'section'	=> 'wbs_body',
            'settings'	=> 'wbs_body_font',
            'type'		=> 'select',
            'choices'	=> $font_choices,
        ) ) );

        $wp_customize->add_setting('wbs_body_font_size', array(
            'default' => '14',
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control( new Wbs_Range_Option( $wp_customize, 'wbs_body_font_size', array(
            'label'	      => esc_html__( 'Body Text Size', 'wbs' ),
            'section'     => 'wbs_body',
            'type'        => 'range',
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 72,
                'step' => 1
            ),
        ) ) );

        /* body font ends */
        /*custom color    */
        $wp_customize->add_section('wbs_custom_color', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'title' =>  __('Custom Color', 'wbs'),
        'description' => __('Customize theme color.', 'wbs'),
        ));

        $wp_customize->add_setting('wbs_title_color', array(
            'default' => '#f6bb17',
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));

        if ( ! is_null( $wp_customize->get_setting( 'wbs_title_color' ) ) ) {
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wbs_title_color', array(
                'label'		=> esc_html__( 'Site Title Color', 'wbs' ),
                'section'	=> 'wbs_custom_color',
            ) ) );
        }
        $wp_customize->add_setting('wbs_heading_text_color', array(
            'default' => '#747474',
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));

        if ( ! is_null( $wp_customize->get_setting( 'wbs_heading_text_color' ) ) ) {
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wbs_heading_text_color', array(
                'label'		=> esc_html__( 'Heading Text Color', 'wbs' ),
                'section'	=> 'wbs_custom_color',
            ) ) );
        }

        $wp_customize->add_setting('wbs_main_text_color', array(
            'default' => '#747474',
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));


        if ( ! is_null( $wp_customize->get_setting( 'wbs_main_text_color' ) ) ) {
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wbs_main_text_color', array(
                'label'		=> esc_html__( 'Main Text Color', 'wbs' ),
                'section'	=> 'wbs_custom_color',
            ) ) );
        }

        /* custom color ends */
        /* Header image */
        $wp_customize->add_section('wbs_header_image', array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'title' =>  __('Header Image', 'wbs'),
            'description' => __('Customize theme Header image.', 'wbs'),
        ));

        $wp_customize->add_setting('wbs_header_image', array(
            'default' => '#',
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));

        if ( ! is_null( $wp_customize->get_setting( 'wbs_header_image' ) ) ) {
            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'wbs_header_image', array(
                'label'		=> esc_html__( 'Header Image', 'wbs' ),
                'section'	=> 'wbs_header_image',
            ) ) );
        }
        /* header image ends */
        /* Title */
        $wp_customize->add_section('wbs_title_override', array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'title' =>  __('Title', 'wbs'),
            'description' => __('', 'wbs'),
        ));
        $wp_customize->add_control('wbs_title_override_ctrl', array(
            'label' => __('SITE TITLE', 'wbs'),
            'section' => 'wbs_title_override',
            'type' => 'option',
            'priority' => 30,
            'settings' => 'blogname'
        ));
        /* Title ends */

        $wp_customize->remove_section('title_tagline');
        $wp_customize->remove_section('custom_css');
        $wp_customize->remove_section('static_front_page');
        $wp_customize->remove_section('post_type-post');
    }
}

add_action( 'customize_register', 'wbs_customize_register' );

add_action('after_switch_theme', 'wbs_setup_options');

if(!function_exists('the_slug_exists')) {
    function the_slug_exists($post_name)
    {
        global $wpdb;
        if ($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . $post_name . "'", 'ARRAY_A')) {
            return true;
        } else {
            return false;
        }
    }
}

if(!function_exists('wbs_add_menu_items')) {
    function wbs_add_menu_items($pages, $parent_page_id = 0, $parent_id = 0, $menu_id = 0)
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

                wbs_add_menu_items($title['childpages'], $_page_id, $parent_id, $menu_id);

                $parent_id = 0;
            }

        }
    }
}

if(!function_exists('wbs_setup_options')) {
    function wbs_setup_options()
    {
       // echo 'wbs_setup_options';
       // if(get_option('wbs_menu_created') === 0) {
            add_option('wbs_menu_created', 1);
            $menu_name = 'wbs_main_menu';
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

                wbs_add_menu_items($pages,0,0,$menu_id);


            }
       // }
    }
}

if(!function_exists('wbs_remove_menus')) {
    function wbs_remove_menus()
    {

        remove_menu_page('nav-menus.php');        //Settings

    }
}
add_action( 'admin_menu', 'wbs_remove_menus' );