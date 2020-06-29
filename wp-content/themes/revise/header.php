<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Revise
 */


/* Logo Setting */
$enable_logo = cs_get_option('enable_logo');
$upload_logo = cs_get_option('upload_logo');
$upload_logo_array = wp_get_attachment_image_src( $upload_logo, 'large' );
$text_logo = cs_get_option('text_logo');


?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<!--start navigation area-->
    <header class="header_area" id="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-xl navbar-light" data-spy="affix">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->  

                        <?php if (!empty($upload_logo)): ?> 
                             <a class="navbar-brand logo_h" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $upload_logo_array[0]); ?>" alt="Site Logo"></a>   
                            <?php else: ?>
                                <?php if (!empty($text_logo)): ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html($text_logo);; ?></a></h1> 
                                    <?php else: ?> 
                                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    
                                <?php endif; ?> 
                        <?php endif; ?>



                         

                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <?php 
                           


                            wp_nav_menu( array(
							    'theme_location'  => 'menu-1',
							    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
							    'container'       => 'ul',
							    'container_class' => 'collapse navbar-collapse',
							    'container_id'    => 'bs-example-navbar-collapse-1',
							    'menu_class'      => 'nav navbar-nav menu_nav ml-auto',
							    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
							    'walker'          => new WP_Bootstrap_Navwalker(),
							) );
                        ?>



                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--end navigation area-->

