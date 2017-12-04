<!DOCTYPE html>
<?php
/**
 * Created by Anushka K R.
 * Dev. Ref: http://www.anushkar.com
 * Dev. Public Profile: https://www.upwork.com/fl/anushkakrajasingha
 * Date: 11/24/2017
 * Time: 6:33 PM
 */
?>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta  charset="<?php bloginfo( 'charset' ); ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <?php do_action( 'et_head_meta' ); ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php $template_directory_uri = get_template_directory_uri(); ?>    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( $template_directory_uri . '/js/html5.js"' ); ?>" type="text/javascript"></script>
	<![endif]-->
    <script type="text/javascript">
        document.documentElement.className += ' js';
    </script>
    <?php wp_head(); ?>
</head>
<?php do_action('html_body_start'); ?>
