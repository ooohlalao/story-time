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
    $wp_admin_bar->add_menu( 
        array( 'parent' => "top-secondary", // 'false' 为添加住菜单，也可以输入父级菜单的 ID  
        'id' => 'description', // 自定义链接的 ID，  
        'title' => get_bloginfo('description'), // 自定义链接标题  
        'href' => admin_url( '/../'), // 链接地址  
        'meta' => false // 用来设置自定义链接属性选项的一个数组：array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );  
        )
    );
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
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('updates');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-content');
}
add_action('wp_before_admin_bar_render','mytheme_admin_bar_render'); 


// 在代码中，我们使用remove_menu(‘comments’)函数来删除“评论”链接，要删除不同的链接或菜单，您可以检查一下/wp-includes/admin-bar.php 这个文件，查找不同链接名称及它们相应的ID。
// 下面列出其中一部份以供参考：

// my-account                     – 不带头像的个人资料链接
// my-account-with-avatar  – 带头像的个人资料链接
// my-blogs                         – 多站点博客中“我的博客”链接
// get-shortlink                   – 获取简短链接
// edit                                – 指向“编辑”文章页面的链接
// new-content                   – “添加新文章”的链接
// comments                       – “评论”链接
// appearance                    – “外观”链接
// updates                         – “更新”链接