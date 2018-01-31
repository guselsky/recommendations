<?php 

// Add another value or field to WP's default rest api's json object
add_action('rest_api_init', 'recommendations_custom_rest');

function recommendations_custom_rest() {
	register_rest_field('page', 'authorName', array(
		'get_callback' => function() {
			return get_the_author();
		}
	));
	register_rest_field('post', 'authorName', array(
		'get_callback' => function() {
			return get_the_author();
		}
	));	
}

// Create a custom REST URL
add_action('rest_api_init', 'recommendationsRegisterSearch');

function recommendationsRegisterSearch() {
	register_rest_route('recommendations/v1', 'search', array(
		// This is a get request
		'methods' => WP_REST_SERVER::READABLE,
		'callback' => 'recommendationsSearchResults'
	));
}

// Get custom search results from REST
function recommendationsSearchResults($data) {
	$mainQuery = new WP_Query(array(
		'post_type' => array('post', 'page', 'profile', 'thing', 'creator'),
		// this method searches for content, 'term' is a random name to be added to the URL
		// The input should be sanitized
		's' => sanitize_text_field($data['term'])
 	));

	$results = array(
		'generalInfo' => array(),
		'profiles' => array(),
		'things' => array(),
		'creators' => array()
	);

	while($mainQuery->have_posts()) {
		$mainQuery->the_post();

		if (get_post_type() == 'post' OR get_post_type() == 'page') {
			array_push($results['generalInfo'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'postType' => get_post_type(),
				'authorName' => get_the_author()
			));			
		}

		if (get_post_type() == 'profile') {
			array_push($results['profiles'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'postType' => get_post_type(),
				'authorName' => get_the_author()
			));			
		}

		if (get_post_type() == 'thing') {
			array_push($results['things'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'postType' => get_post_type(),
				'authorName' => get_the_author()
			));			
		}

		if (get_post_type() == 'creator') {
			array_push($results['creators'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'postType' => get_post_type(),
				'authorName' => get_the_author()
			));			
		}
	}

	return $results;
}