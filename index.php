<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div class="background">
        <div id="primary" class="content-area">
                <div id="content" class="site-content" role="main">
                    
                      <div class="flash">
                          
                              <div>
                                  
                              <h1 class="site-title">
                                  
                                  <?php bloginfo( 'name' ); ?></h1>
                                  
                              <h2 class="site-description">
                                    
                                  <?php bloginfo( 'description' ); ?></h2>
                               

                               <div class="recent recentleft">     
                              <?php if ( function_exists('recently_updated_posts') ) recently_updated_posts(1,7);clear_cache_zww() ; ?>
                               </div>
                                  
                               <div class="recent recentright">
                              <?php if ( function_exists('recently_updated_posts') ) recently_updated_posts(2,7);clear_cache_zww() ; ?>
                              </div>
							  
                              <img id="slide_sub" src="<?php echo bloginfo ('template_directory');?>/../story-time/images/slide_sub.png" alt="<?php bloginfo ('name');?>">
                              <img id="slide2" src="<?php echo bloginfo ('template_directory');?>/../story-time/images/slide_main.svg" alt="<?php bloginfo ('name');?>">
                              <img id="slide1" src="<?php echo bloginfo ('template_directory');?>/../story-time/images/slide_main.svg" alt="<?php bloginfo ('name');?>">
                              <img id="slide3" src="<?php echo bloginfo ('template_directory');?>/../story-time/images/slide_main.svg" alt="<?php bloginfo ('name');?>">
                                  
                            
                          
                          
                          <div id="flash"><embed play="true" quality="high" wmode="transparent" height="840" width="1100" src="<?php echo bloginfo ('template_directory');?>/../story-time/flash/main.swf" pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
                          </div>
                    
                     </div>
                              
                    <div><a href="#"><img class="arrow_l" src="<?php echo bloginfo ('template_directory');?>/../story-time/images/arrow_left.svg"></a></div>
                    
                    <div><a href="#"><img class="arrow_r" src="<?php echo bloginfo ('template_directory');?>/../story-time/images/arrow_right.svg"></a></div>
            


                </div><!-- #content -->
	    </div><!-- #primary -->
</div>

<?php get_footer(); ?>
