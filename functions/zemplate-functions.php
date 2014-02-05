<?php
/*
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 2.0
 */

/*------------------------------------*\
    //Zemplate Setup
\*------------------------------------*/
//Usage: don't touch
//Descript: Sets up some automatic things from twenty* themes.

function zemplate_setup() {
    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', __('Primary Menu', 'twentytwelve'));

    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(624, 9999); // Unlimited height, soft crop
}
add_action('after_setup_theme', 'zemplate_setup');

/*------------------------------------*\
    //Bloginfo Shortcode
\*------------------------------------*/
//Usage: [bloginfo key='name']

function bloginfo_shortcode($atts) {
    extract(shortcode_atts(array(
        'key' => '',
    ), $atts));
    return ($key == 'url' ? home_url() : get_bloginfo($key));
}
add_shortcode('bloginfo', 'bloginfo_shortcode');

/*------------------------------------*\
    //WP Navmenu Shortcode
\*------------------------------------*/
//Usage: [wpnavmenu menu='menuname' menu_class='page_menu']
//Descript: Returns our Wordpress menu inside page content

function wp_nav_menu_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
        'menu'            => '',
        'container'       => 'div',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'depth'           => 0,
        'walker'          => '',
        'theme_location'  => ''),
        $atts));

    return wp_nav_menu(array(
        'menu'            => $menu,
        'container'       => $container,
        'container_class' => $container_class,
        'container_id'    => $container_id,
        'menu_class'      => $menu_class,
        'menu_id'         => $menu_id,
        'echo'            => false,
        'fallback_cb'     => $fallback_cb,
        'before'          => $before,
        'after'           => $after,
        'link_before'     => $link_before,
        'link_after'      => $link_after,
        'depth'           => $depth,
        'walker'          => $walker,
        'theme_location'  => $theme_location));
}
add_shortcode("wpnavmenu", "wp_nav_menu_shortcode");

/*------------------------------------*\
    //Continue Reading Link
\*------------------------------------*/

function excerpt_read_more_link($output) {
    global $post;
    return $output . ' <a href="'. get_permalink() . '">' . __('&hellip;read more') . '</a>';
}
add_filter('get_the_excerpt', 'excerpt_read_more_link');

/*------------------------------------*\
    //Gets rid of that stupid [...].
\*------------------------------------*/
function replace_excerpt($content) {
       return str_replace('[...]',
               ' ',
               $content
      );
}
add_filter('the_excerpt', 'replace_excerpt');

/*------------------------------------*\
    //Blank Search Fix
\*------------------------------------*/
if(!is_admin()){
    add_action('init', 'search_query_fix');
    function search_query_fix(){
        if(isset($_GET['s']) && $_GET['s']==''){
            $_GET['s']=' ';
        }
    }
}

/*------------------------------------*\
    //More Control over Comments
\*------------------------------------*/
//Usage: <?php wp_list_comments('type=comment&callback=mytheme_comment'); ? >
//Descript: Overrides wp_list_comments

function zemplate_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ('div' == $args['style']) {
        $tag = '<div>';
        $add_below = 'comment';
    } else {
        $tag = '<li>';
        $add_below = 'div-comment';
    }

    echo '<li id="comment-'.get_comment_ID().'">';

    if ('div' != $args['style']):
        echo '<div id="div-comment-'.get_comment_ID().'" class="comment__body">';
    endif;

    echo '<div class="comment__meta">';
    echo '<div class="comment__author vcard">';
    if ($args['avatar_size'] != 0):
        echo get_avatar($comment, $args['avatar_size']);
        printf(__('<cite class="fn">%s</cite> <span class="commented">commented:</span>'));
        echo get_comment_author_link();
    echo '</div>';
    endif;

    if ($comment->comment_approved == '0'):
        echo '<em class="comment-awaiting-moderation"> Your comment is awaiting moderation. </em>';
    endif;

    echo '<div class="comment__date commentmetadata">';
        printf(__('%1$s at %2$s'));
        echo get_comment_date();
        echo get_comment_time();
        echo edit_comment_link(__('(Edit)'),'  ','');
    echo '</div>';
    echo '</div>';

    comment_text();

    echo '<div class="reply">';
    comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));
    echo '</div>';

    if ('div' != $args['style']):
        echo '</div>';
    endif;
}


/*------------------------------------*\
    //Custom Search
\*------------------------------------*/
function custom_search($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
    <div class="search-wrap">
        <input type="search" placeholder="Search" value="' . get_search_query() . '" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';
    return $form;
}
add_filter('get_search_form', 'custom_search');


/*------------------------------------*\
    //GA Function
\*------------------------------------*/
//Usage: <?php ga_switch('000000000000000000000'); ? >
//Descript: Hostname based google code, only run if on live site. Place right BEFORE </head>
function ga_switch($key){
    $hostname = $_SERVER['HTTP_HOST']; //dev.zenman.com | localhost | Live server | etc..
    $remote_addr = $_SERVER['REMOTE_ADDR']; //remote browser ip
    $exclude_ip_range = array('173.164.136.221','69.15.186.249','127.0.0.1');
    
    switch ($hostname) {
        case 'localhost': //do nothing
            //echo '<!-- no google analytics code -->';
            break;
        case 'localhost:8888': //do nothing
            //echo '<!-- no google analytics code -->';
            break;
        case 'dev1.zenman.com': //do nothing
            //echo '<!-- no google analytics code -->';
            break;
        case 'test1.zenman.com': //do nothing
            //echo '<!-- no google analytics code -->';
            break;
        case 'stage1.zenman.com': //mimic live environment...
            if(isset($remote_addr) && false == in_array($remote_addr, $exclude_ip_range)){
                echo "<script type='text/javascript'>

                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', '".$key."']);
                _gaq.push(['_trackPageview']);

                (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();

                </script>";                
            }else{
                echo "<!-- No GA code for Zenman! -->";
            }
            break;
        default: //this is what you get on live server
            if(isset($remote_addr) && false == in_array($remote_addr, $exclude_ip_range)){
                echo "<script type='text/javascript'>

                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', '".$key."']);
                _gaq.push(['_trackPageview']);

                (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();

                </script>";                
            }else{
                echo "<!-- No GA code for Zenman! -->";
            }
            break;
    }
}