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
                    <h1 class="site-title"><?php //bloginfo( 'name' ); ?></h1>
                    <h2 class="site-description"><?php //bloginfo( 'description' ); ?></h2>
			</a>
		</header><!-- #masthead -->
        <div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></button>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
                    <table border="0"><tr class="nav-table">
                    <td class="left">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu nav-menu-l') ); ?>
                    </td><td class="center">
                    <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                        <img id="logo" src="<?php echo bloginfo ('template_directory');?>/../story-time/images/logo.png" alt="<?php bloginfo ('name');?>" />
                    </a>
                    </td><td class="right">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu nav-menu-r') ); ?>
                    </td>
                    </tr></table>
                    <script>
                    //remove duplicate navbars
                    var nav_l = document.getElementsByClassName('nav-menu-l');
                    var nav_r = document.getElementsByClassName('nav-menu-r');
                    removePartial(nav_l,1);//left navbar removes the former half.
                    removePartial(nav_r,0);//right navbar removes the second half.                    
                    
                        //remove item of target from end to header . Removes the former or later half.
                        // if there are six items in total. 6 5 4 or 3 2 1 will be removed individually. 1 2 3 or 4 5 6 will be left.
                        // if there are five items in total. 5 4 or 3 2 1 will be removed individually. 1 2 3 or 4 5 will be left.
                        function removePartial(target,part)
                        {
                            var ulist = target[0].children[0];
                            var cnt = ulist.childElementCount;
                            
                            var halfvalue = Math.round(cnt / 2) ;
                            var start,end;
                            if(part==0)
                            {
                                start = cnt-1; end = halfvalue;
                            }
                            else if(part==1)
                            {
                                start = halfvalue-1; end = 0;
                            }
                            else return;
                            
                            for(var item = start ; item > end-1; item -= 1)
                            {
                                var chd = ulist.children[item];
                                ulist.removeChild(chd);
                                console.log(item,cnt);
                            }
                        }
                    </script>
					<!--<?php get_search_form(); ?>-->
                    
				</nav><!-- #site-navigation -->
			</div><!-- #navbar -->

		<div id="main" class="site-main">
