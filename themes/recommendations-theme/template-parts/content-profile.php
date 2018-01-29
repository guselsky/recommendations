<?php
/**
 * Template part for displaying profiles
 */

$relatedThings = get_field('related_things'); ?>

<div class="row">
	<div class="one-fourth">
		<div class="image-container">
		<?php
		 if(get_the_post_thumbnail()) {
		 	the_post_thumbnail('profilePortrait');
		 } else {
		 	?>
		 	 <img src="<?php bloginfo('template_url')?>/images/placeholder.png" alt="placeholder">
		  <?php } ?>
		 </div>
		<h3 class="heading--medium heading--centered heading__profile-title"><?php the_title(); ?></h3>
		<p class="text-block">
			<?php the_content(); ?>
		</p>					
	</div>
	<div class="three-fourths">		
		<h3 class="heading--medium"><?php the_title(); ?>'s recommendations</h3>
		<ul>
			
		<?php 

		// Check if there are any related things, if so, display them
		if ($relatedThings) {
			foreach($relatedThings as $thing) {

				// Get the thing's metadata
				$thing_meta = get_field('related_creators', $thing->ID);
				// Create a counter for iterating over the thing's creators and their ids
				$counter = 0;
				// Create an array for the thing's creators
				$thing_creators = [];
				// Create an array for the thing's creator's ids
				$thing_creator_ids = [];

				foreach ($thing_meta as $meta_item) {
					// Push the creators to the creators array
					$thing_creator_many = get_field('related_creators', $thing->ID)[$counter]->post_title;
					array_push($thing_creators, $thing_creator_many);
					// Push the creator ids to the creator ids array
					$thing_creator_id_many = get_field('related_creators', $thing->ID)[$counter]->ID;
					array_push($thing_creator_ids, $thing_creator_id_many);
					$counter++;
				}

				// Count how many creators are in the array
				$number_of_creators = count($thing_creators);

				// If there is more than one creator but not more than two, add an "and" between each one of them
				if ($thing_creators[1] && !$thing_creators[2]) {
					$conjunction = " and ";
				// If there are more than two creators, add a comma
				} elseif ($thing_creators[2]) {
					$conjunction = "</a>, ";
				// If there is one author, don't add anything
				} else {
					$conjunction = "";
				}

				?>
				<li><a href="<?php echo esc_url(get_the_permalink($thing)); ?>"><?php echo get_the_title($thing); ?></a> by
				
					<?php

					// Create a counter to iterate through the $thing_creator_ids array for the permalink; and to check if it's the last iteration through the $thing_creators array in order to omit the last $conjunction
					$i = 0;

					 foreach($thing_creators as $thing_creator) { ?>
					 <a href="<?php esc_url(the_permalink($thing_creator_ids[$i])) ?>">
					 <?php if ($i == $number_of_creators - 2) {
						echo $thing_creator . '</a> and'; 
					} elseif(!$i == $number_of_creators - 1) {
						echo $thing_creator . $conjunction;
					} else {
						echo $thing_creator;
					} ?>	
					</a>
					<?php
					
					$i++;
					} ?>

				</li>
			<?php } 
		} else { ?>
			<p><?php the_title(); ?> doesn't have any recommendations yet.</p>
		<?php }

		?>

		</ul>
	</div>
</div>
