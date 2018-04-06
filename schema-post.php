
<meta itemprop="publisher" content="<?php echo get_bloginfo('name'); ?>">

<meta itemprop="author" class="theauthor" content="<?php echo get_the_author(); ?>">


<meta itemprop="name headline" content="<?php echo the_title(); ?>">


<meta itemprop="articleSection" content="<?php
$postcategory = get_the_category(); 
echo $postcategory[0]->cat_name;
?>">


<meta itemprop="url" content="<?php echo get_permalink(); ?>">


<meta itemprop="datePublished" content="<?php the_date(); ?>">


<meta itemprop="thumbnailURL" content="<?php 
if ( has_post_thumbnail()) {
   $thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
   echo $thumb_image_url[0];
 } ?>">
 

<meta itemprop="articleBody" content="<?php 
		ob_start();
		the_content();
		$old_content = ob_get_clean();
		$new_content = strip_tags($old_content);
		echo $new_content; ?>">
		

<meta itemprop="description about" content="<?php echo strip_tags(get_the_excerpt()); ?>">


<meta itemprop="image" content="<?php  
$args = array(
	'numberposts' => 1,
	'order'=> 'DESC',
	'post_mime_type' => 'image',
	'post_parent' => $post->ID,
	'post_type' => 'attachment'
	);

$get_children_array = get_children($args,ARRAY_A);  //returns Array ( [$image_ID]... 
$rekeyed_array = array_values($get_children_array);
$child_image = $rekeyed_array[0];
  
$firstimage_attributes = wp_get_attachment_image_src( $child_image['ID'], full );
echo $firstimage_attributes[0]; 	
 ?>">
 

<meta itemprop="interactioncount" content="<?php comments_number( 'UserComments:0', 'UserComments:1', 'UserComments:%' ); ?>">


<meta itemprop="keywords" content="<?php
  $posttags = get_the_tags();
  if ($posttags) {
    foreach($posttags as $tag) {
      echo $tag->name . ' '; 
    }
  }
?>">


<meta itemprop="WordCount" content="<?php
    $wccontent = get_post_field( 'post_content', $post->ID );
    $word_count = str_word_count( strip_tags( $wccontent ) );
    echo $word_count;
	?>">