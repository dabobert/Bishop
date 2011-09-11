<?

$router->get('/people', function($params) {
	$response = new Response();
	
	$lines = count(file(dirname(__FILE__).'/support/people.txt'));
	
	for($i=0; $i < $lines; $i++)
		$people[] = Person::open($i+1);
		
	$response->variables->insert($people,"people");
	return $response;
});


$router->get('/people/new', function($params) {
	//will just display the html form
});


$router->get('/people/:people_id/cars/:id', function($params) {
	//will cause an error because there is no response body and there is no view add app/views/cars/show.html.php
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
	//data needed to update a person is in params
	var_dump($_POST);
	return new Response( "received put:<br><h1>update a person</h1>");
});

$router->delete('/people/:id', function($params) {
	//data needed to delete a person is in params
	return new Response( "received delete:<br><h1>delete a person</h1>");
});

?>