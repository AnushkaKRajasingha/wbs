<?php
/**
 * Created by Anushka K R.
 * Dev. Ref: http://www.anushkar.com
 * Dev. Public Profile: https://www.upwork.com/fl/anushkakrajasingha
 * Date: 11/28/2017
 * Time: 4:31 PM
 */
$menuClass = 'nav';
    $menuClass = 'navbar-nav w-100 justify-content-lg-between flex-lg-row';
    $primaryNav = '';

    $primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => 'top-menu', 'echo' => false,'walker' => new wbs_menuWalker() ) );

    if ( '' == $primaryNav ) :
        ?>
        <ul id="top-menu" class="<?php echo esc_attr( $menuClass ); ?>">
            <li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'wbs' ); ?></a></li>
            <?php wbs_show_page_menu( $menuClass, false, false ); ?>
            <?php wbs_show_categories_menu( $menuClass, false ); ?>
        </ul>
    <?php
    else :
        echo( $primaryNav );
    endif;
?>