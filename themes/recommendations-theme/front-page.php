<?php
/**
 * The template for the front page
 */

get_header(); ?>

<div class="page-banner" style="background-image: url(<?php echo get_theme_file_uri('/images/hero--large.jpg') ?>">		
	<div class="page-banner__bg-image container-1200");">		

		<h2 class="page-banner__title heading--large">Recommend things to your friends</h2><br>
		<h3 class="page-banner__subtitle heading--medium">And see what other people recommend</h3>

	</div><!-- page-banner__bg-image -->
</div><!-- page-banner -->

<div class="container-1200">
		<!-- <h3 class="heading--medium">Categories</h3>
	
		<ul class="categories">
			<li class="categories__category-item">Books</li>
			<li class="categories__category-item">Courses</li>
			<li class="categories__category-item">Music</li>
			<li class="categories__category-item">Films</li>
			<li class="categories__category-item">Activities</li>
			<li class="categories__category-item">Food</li>
		</ul> -->
	</div>

	<div class="container-1200">
		<h3 class="heading--medium" id="how-it-works">How does it work?</h3>
		
		<p class="text-block">Simple, you can visit other people's profiles and see what they recommend. You can also create your own profiles and recommend things yourself. You can also search for things and see who recommends them.</p>
		
<!-- 		<h3 class="heading--medium">What does it cost?</h3>

		<p class="text-block">It costs you nothing! The websites is financed entirely by affiliate commissions. If you buy a thing using a link on this page, we get a commission. This helps us operate this website at no cost to you!</p> -->

	</div>

	<div class="container-1200">
		<h3 class="heading--medium">View recommendations from these people</h3>
		<div class="row">

			<?php 

			$homepageProfiles = new WP_Query(array(
				'posts_per_page' => 6,
				'post_type' => 'profile'
			));

			while($homepageProfiles->have_posts()) {
				$homepageProfiles->the_post(); ?>
				<div class="one-fourth">
					<a href="<?php the_permalink(); ?>">
						<div class="image-container image-container--centered">
						<?php
						 if(get_the_post_thumbnail()) {
						 	the_post_thumbnail('profilePortrait');
						 } else {
						 	?>
						 	 <img src="<?php bloginfo('template_url')?>/images/placeholder.png" alt="placeholder">
						  <?php } ?>
						 </div>
						<h4 class="heading--small heading--centered"><?php the_title(); ?></h4>
					</a>
				</div>
				<?php
			}
			?>

		</div>
	</div>

	<?php
	get_footer();