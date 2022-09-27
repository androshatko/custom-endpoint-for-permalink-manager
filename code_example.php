add_action('rest_api_init', function () {
	register_rest_route( 'personal/v1', '/permalink-manager', array(
		'methods' => 'POST',
		'callback' => 'update_uri'
	));
});
function update_uri($req) {
	$res = new WP_REST_Response($response);
	$res->set_status(200);

	Permalink_Manager_URI_Functions::save_single_uri($req['post_id'], $req['slug'], false, true);
	
	$response = ['req' => $res];

	return get_site_url() . $req['slug'];
}
