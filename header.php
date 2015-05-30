<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
	<div id="page" class="hfeed site">
        
		<header id="masthead" class="site-header" role="banner">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				
			</a>
            

			
		</header><!-- #masthead -->
        <div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></button>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu nav-menu-small') ); ?>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu nav-menu-l') ); ?>
                    <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu nav-menu-r') ); ?>
                    <script>
                    //remove duplicate navbars
                    var nav_l = document.getElementsByClassName('nav-menu-l');
                    var nav_r = document.getElementsByClassName('nav-menu-r');
                    removePartial(nav_l,0);//left navbar only remove the even number.
                    removePartial(nav_r,1);//right navbar only remove the odd.                    
                    
                        //remove item of target from end to header . Removes one item every two.
                        // if there are six items in total. 6 4 2 or 5 3 1 will be removed individually. 1 3 5 or 2 4 6 will be left.
                        // if there are five items in total. 4 2 or 5 3 1 will be removed individually. 1 3 5 or 2 4 will be left.
                        function removePartial(target,shift)
                        {
                            var ulist = target[0].children[0];
                            var cnt = ulist.childElementCount;
                            
                            var check = cnt % 2 ; //judge whether cnt is odd.
                            if(check==1) shift = 1 - shift;//left navbar only remove the even number, right navbar only remove the odd.
                            
                            for(var item = cnt-shift ; item > 0; item -= 2)
                            {
                                var chd = ulist.children[item-1];
                                ulist.removeChild(chd);
                                console.log(item-1,cnt);
                            }
                        }
                    </script>
					<!--<?php get_search_form(); ?>-->
                    
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->

		<div id="main" class="site-main">
