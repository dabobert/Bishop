<?

$router->get('/people', function($params) {
	
		$people = file(dirname(__FILE__).'/../../support/people.txt');

		//explode the row, and pass it to the person model
		//return new Person(explode("\t",$people[$line]));
	
	
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
	$response->variables->insert($person,"person");
	return $response;
});


$router->get('/people/:id', function($params) {
	$response = new Response();
	$person		= Person::open($params["id"]);
	$response->variables->insert($person,"person");
	return $response;
});

$router->get('/admin/people', function($params) {
	return new Response( "<h1>admin: show all people</h1>");
});

$router->post('/people', function($params) {
	return new Response( "received post:<br><h1>create a person </h1>");
});

$router->put('/people/:id', function($params) {
	return new Response( "received put:<br><h1>update a person</h1>");
});

$router->delete('/people/:id', function($params) {
	return new Response( "received delete:<br><h1>delete a person</h1>");
});

?>