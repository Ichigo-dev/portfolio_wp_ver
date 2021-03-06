<?php
// 固定ページサムネイル追加
add_theme_support( 'post-thumbnails');

// 親ページから子ページを取得
function get_child_pages($page_content){
	$args = array(
		'post_parent' => $page_content->ID,
		'post_status' => 'publish',
		'post_type'   => 'page',
		'order'=>'ASC',
    'posts_per_page' => -1
	);
	$children_array = new WP_Query($args);
	return $children_array;
}

// カテゴリから投稿を取得
function get_category_posts($num){
	$args=array(
		'post_type'=>'post',
		'category_name'=>'works',
		'posts_per_pages'=> $num,
	);
	$works_posts=new WP_Query($args);
	return $works_posts;
}

// get_the_contentなどのpタグを削除
function remove_ptag($content){
	$content=wp_strip_all_tags($content);
	$content=strip_shortcodes($content);
	return $content;
}
