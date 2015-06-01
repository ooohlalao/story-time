<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
//
// Your code goes below
//

add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' ); 
function my_admin_bar_render() { 
    global $wp_admin_bar; 
	
	$wp_admin_bar->add_group( array(
		'id'     => 'top-center',
		'meta'   => array(
			'class' => 'ab-top-center',
		),
	) );
    $wp_admin_bar->add_menu( 
        array( 'parent' => "top-center", // 'false' 为添加住菜单，也可以输入父级菜单的 ID  
        'id' => 'description', // 自定义链接的 ID，  
        'title' => get_bloginfo('description'), // 自定义链接标题  
        'href' => admin_url( '/../'), // 链接地址  
        'meta' => false // 用来设置自定义链接属性选项的一个数组：array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );  
        )
    );
}


function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    //$wp_admin_bar->remove_menu('search');
    $wp_admin_bar->remove_menu('updates');
    //$wp_admin_bar->remove_menu('comments');
    //$wp_admin_bar->remove_menu('new-content');
}
add_action('wp_before_admin_bar_render','mytheme_admin_bar_render'); 




add_theme_support('nav-menus');

if ( function_exists( 'register_nav_menus' ) ) {

    register_nav_menus(
        array(
            'header_menu' => 'Header Navigation'
        )
    );
}

function wper_so_menu($clsname){
        wp_nav_menu(
            array(
                'menu' => $clsname,
                'container' => 'div',
                'menu_class' => 'nav-menu '.$clsname,
                'menu_id' => 'nav',
                'echo' => true,
                'depth' => 2,
                'walker' => new Walker_Nav_Menu(),
                'theme_location' => 'header_menu'
            )
        );
}



// Recently Updated Posts
function recently_updated_posts($num=10,$days=7,$multi=false) {
   if( !$recently_updated_posts = get_option('recently_updated_posts') ) {
       query_posts('post_status=publish&orderby=date&posts_per_page=-1');
       $i=0;
	   while ( have_posts() && $i<$num ) : 
			the_post();
		   if (current_time('timestamp') - get_the_time('U') < 60*60*24*$days) {
			   $i++;
			   if($i==$num||$multi==true)
			   {
				   $the_title_value=get_the_title();				   
					$len=20;
					$the_title_subvalue = get_substr_keep_wordness($the_title_value,$len);
                   
				   $appendString='<a href="'.get_permalink().'" title="'.$the_title_value.'">'
				   .$the_title_subvalue.'</a>';
				   if($multi==true) $recently_updated_posts.='<li>'.$appendString.'</li>';
				   else  $recently_updated_posts.=$appendString;
			   }
		   }
		   else break;
		endwhile;
       wp_reset_query();
       if ( !empty($recently_updated_posts) ) update_option('recently_updated_posts', $recently_updated_posts);
   }
   $recently_updated_posts=($recently_updated_posts == '') ? '<li>None data.</li>' : $recently_updated_posts;
   echo $recently_updated_posts;
}

function get_substr_keep_wordness($the_title_value,$len)
{	
   $the_title_subvalue=mb_substr($the_title_value,0,$len,'utf-8');
   $title_array = explode(" ", $the_title_value);
   $firstword_len = strlen($title_array[0]);				   
	if($firstword_len<$len) 
	{
	   while(mb_substr($the_title_subvalue,-1,1,'utf-8')!=" ")
	   {
			if($the_title_subvalue==$the_title_value) break;
			$len++;
			$the_title_subvalue=mb_substr($the_title_value,0,$len,'utf-8');
	   }
	}
	else $the_title_subvalue = $title_array[0];	
	
   if($the_title_subvalue!=$the_title_value) $the_title_subvalue.=" ...";
   return $the_title_subvalue;
}
 
function clear_cache_zww() {
    update_option('recently_updated_posts', ''); // clear recently_updated_posts
}
add_action('save_post', 'clear_cache_zww'); // 