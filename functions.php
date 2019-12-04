<?php

// parent child relationship and url rewrite

function library_cpt_slug($post_link,$id){
	$post = get_post($id);
	if(is_object($post) && 'chapter' == get_post_type($id)){
		$parent_post_id = get_field('parent_book');
		$parent_post = get_post($parent_post_id);
		if($parent_post){
			$post_link = str_replace("%book%", $parent_post->post_name, $post_link);
		}
	}
	return $post_link; 
}

add_filter('post_type_link','library_cpt_slug',1,2);

// Front end part library_cpt_slug
// children custom post find from parent custom post by meta query
$book_chapters = array(
	'post_type' => 'chapter',
	'meta_key' => 'parent_book',
	'meta_value' => get_the_id()
);

$book_chapters = new WP_Query($book_chapters);
while($book_chapters->have_posts()){
	$book_chapters->the_post();
	$chapter_link = get_the_permalink();
	$chapter_title = get_the_title();
	printf("<a href='%s'>%s</a>",$chapter_link,$chapter_title);
}