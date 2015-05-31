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
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
        
        <div class="flash">

             <embed play="true" quality="high" wmode="transparent" height="760px" width="1000px" src="<?php echo bloginfo ('template_directory');?>/../story-time/flash/main.swf" pluginspage="http://www.macromedia.com/go/getflashplayer">
            </embed>
        </div>

                 

		</div><!-- #content -->
	<!--</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
