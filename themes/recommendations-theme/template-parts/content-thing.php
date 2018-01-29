<?php
/**
 * Template part for displaying things
 */

$relatedCreators = get_field('related_creators');

?>

<h3 class="heading--medium"><?php the_title(); ?> by <?php 

if($relatedCreators[1]) {
	$conjunction = " and ";
} else {
	$conjunction = "";
}

$number_of_creators = count($relatedCreators);
$i = 0;

foreach($relatedCreators as $creator) { ?>
	<a href="<?php echo get_the_permalink($creator); ?>"><?php echo get_the_title($creator);?></a>
	<?php 
	if(!$i == $number_of_creators -1) {
		echo $conjunction;
		$i++;
		}
	 }

 ?></h3>
<p class="categories__subtitle"><?php the_category(); ?></h4>
<p class="text-block">
	<?php the_content(); ?>
</p>