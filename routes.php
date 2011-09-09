<?

$router->get('/people', function($params) {
	return new Response("<h1>show all people</h1>");
});

$router->get('/people/new', function($params) {
	//will just display the html form
});

$router->get('/people/:people_id/cars/:id', function($params) {
	//will just display the html form
});

$router->get('/people/:id/edit', function($params) {
	$response = new Response();
	$person		= Person::open($params["id"]);
	$response->variables->insert($person);
});


$router->get('/people/:id', function($params) {
	$response = new Response();
	$person		= Person::open($params["id"]);
	$response->variables->insert($person,"person");
	throw new Exception(var_dump($response->response->contents()));
});

$router->get('/admin/people', function($params) {
	return new Response( "<h1>admin: show all people</h1>");
});

$router->post('/people', function($params) {
	return new Response( "<h1>create a person </h1>");
});

$router->put('/people/:id', function($params) {
	return new Response( "<h1>update a person</h1>");
});

$router->delete('/people/:id', function($params) {
	return new Response( "<h1>delete a person</h1>");
});

?>