<?php

require __DIR__.'/includes/Footer_Widget.php';
require __DIR__.'/includes/footer_widget_settings.php';
require __DIR__.'/includes/google_maps_settings.php';


add_action('wp_enqueue_scripts','load_style_script');
/* удаляем конструкцию [...] в конце цитаты */
add_filter('excerpt_more', function($more) {
    return '...';
});

add_action('wp_head','create_count_views_table');
add_action('wp_footer','add_count_view');
add_action( 'widgets_init', 'cofee_theme_footer_widget' );

add_action( 'admin_menu', 'cofee_break_footer_widget_menu' );
add_action( 'admin_menu', 'cofee_maps_settings_page' );
add_action( 'admin_init', 'cofee_break_footer_widget_settings' );
add_action( 'admin_init', 'google_maps_settings' );

add_action('admin_menu','check_option_image_exists');
add_action('init', 'slider_posts');
add_action( 'wp_enqueue_scripts', 'enqueue_comment_reply' );

function add_count_view(){
    if(!is_single()) return;
    global $post,$wpdb;
    $post_id = $post->ID;
    $sql = "SELECT `count_views` FROM count_views WHERE post_id='$post_id'";
    $result = $wpdb->get_results($sql,ARRAY_A);
    if(empty($result)){
        $query = "INSERT INTO `cofee-base`.`count_views` (`post_id`, `count_views`) VALUES ('$post_id', '1');";
        $wpdb->query($query);
    }
    else{
       $count_views = $result[0]['count_views'];
       $count_views += 1;
       $wpdb->update('count_views',['count_views' => $count_views],['post_id' => $post_id]);
    }
}

function get_count_views(){
    global $wpdb,$post;
    $post_id = $post->ID;
    $sql = "SELECT count_views FROM count_views WHERE post_id=$post_id";
    $result = $wpdb->get_results($sql,ARRAY_A);
    return empty($result) ? 0 : $result[0]['count_views'];
}

function create_count_views_table(){
    global $wpdb;
    $sql = " CREATE TABLE IF NOT EXISTS `count_views` (
      `post_id` int(11) unsigned NOT NULL,
      `count_views` int(11) unsigned NOT NULL
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8; ";

    $wpdb->query($sql);
}


function enqueue_comment_reply() {
    if( is_singular() && comments_open() && (get_option('thread_comments') == 1) )
        wp_enqueue_script('comment-reply');
}




function slider_posts(){
    register_post_type('cofee_gallery', array(
        'labels'             => array(
            'name'               => 'Галлерея', // Основное название типа записи
            'singular_name'      => 'Галлерея', // отдельное название записи типа Book
            'add_new'            => 'Добавить ',
            'add_new_item'       => 'Добавить в галлерею',
            'edit_item'          => 'Редактировать галлерею',
            'new_item'           => 'Новая картинка',
            'view_item'          => 'Посмотреть картинки',
            'search_items'       => 'Найти изображения',
            'not_found'          =>  'галлереи не найдено',
            'not_found_in_trash' => 'В корзине галлереи не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Галлерея'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title','editor','thumbnail')
    ) );
}




function cofee_theme_footer_widget(){
register_widget( 'Footer_Widget' );
}

register_sidebar([
    'name' => 'Виджет в футере для вывода картинок',
    'id' => 'cofee_theme_footer_widget',
    'before_widget' => ' ',/* контент который вставляется перед\после вывода виджета */
    'after_widget' => ' '
]);

register_sidebar([
    'name' => 'вывод архивов',
    'id' => 'archive_vidget',
    'before_widget' => ' ',/* контент который вставляется перед\после вывода виджета */
    'after_widget' => ' '
]);

//register_sidebar([
//    'name' => 'Меню в хедере',
//    'id' => 'menu_header',
//    'before_widget' => ' ',
//    'after_widget' => ' ',
//    'before_title' => '',
//    'after_title' => ''
//]);

register_nav_menu('header_menu','Меню в шапке');


add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    $html = preg_replace( '/(sizes)/', "", $html );
    return $html;
}

function load_style_script(){

    wp_register_script('easing',
        get_template_directory_uri().'/js/easing.js',['jquery']);
    wp_register_script('jquery.chocolat',
        get_template_directory_uri().'/js/jquery.chocolat.js',['jquery']);
    wp_register_script('jquery.flexisel',
        get_template_directory_uri().'/js/jquery.flexisel.js',['jquery'],null,true);
    wp_register_script('jquery.hoverdir',
        get_template_directory_uri().'/js/jquery.hoverdir.js',['jquery']);
    wp_register_script('modernizr.custom.97074',
        get_template_directory_uri().'/js/modernizr.custom.97074.js',['jquery']);
    wp_register_script('move-top',
        get_template_directory_uri().'/js/move-top.js',['jquery']);
    wp_register_script('cofee-theme-script',
        get_template_directory_uri().'/js/cofee-theme-script.js',['jquery']);
    wp_register_script('cofee-theme-map',
        get_template_directory_uri().'/js/cofee-theme-map.js');
    //wp_register_script( 'cofee-theme-maps-google', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyB3tVQOjFsJAd-ghm_L40s6DPRaOTnwR2Q&callback=initMap' );


    wp_register_style('style',get_template_directory_uri().'/style.css');
    wp_register_style('chocolat',
        get_template_directory_uri().'/css/chocolat.css');
    wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css');

    wp_enqueue_script('easing');
    wp_enqueue_script('jquery.flexisel');
    wp_enqueue_script('jquery.chocolat');
    wp_enqueue_script('jquery.hoverdir');
    wp_enqueue_script('modernizr.custom.97074');
    wp_enqueue_script('move-top');
    wp_enqueue_script('cofee-theme-script');
   // wp_enqueue_script('cofee-theme-maps-google');
    wp_enqueue_script('cofee-theme-map');

    $options = get_option('cofee_break_footer_widget_option');
    $map_options = get_option('google_maps_options');

    wp_localize_script('cofee-theme-script','cofeeObject',$options);
    wp_localize_script('cofee-theme-map','mapObject',$map_options);

    wp_enqueue_style('style');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('chocolate');

}

add_theme_support('post-thumbnails');

function wp_corenavi($my_query){// постраничная навигация
    //global $wp_query,$wp_rewrite;
    $pages = '';
    $max = $my_query->max_num_pages;
    if(!$current = get_query_var('paged')) $current = 1;
    $a['base'] = str_replace(999999999,'%#%',esc_url(get_pagenum_link(999999999)));
    $a['total'] = $max;
    $a['current'] = $current;

    $total = 0;// 1 - выводит текст страница N из N 0 не выводит
    $a['mid_size'] = 2;// ссылки слева и справа от текущей
    $a['end_size'] = 1;// количество ссылок вначале и вконце
    $a['prev_text'] = '&laquo;';//  текст предыдущая
    $a['next_text'] = '&raquo;';// текст следующая

//    if($max > 1) {
//        echo "<div class = 'pager'>";
//    }
    if($total == 1 && $max > 1){
        $pages = "<span class = ''> Страница ".$current." из ".$max." </span>";
    }
    echo $pages . paginate_links($a);
//    if($max > 1){
//        echo "</div>";
//    }
}

