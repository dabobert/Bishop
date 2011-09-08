<?

$router->get('/people', function($params) {
	return "<h1>show all people</h1>";
});

$router->get('/people/new', function($params) {
	return "<h1>we gotta fix this</h1>";
	//will just display the html form
});


//$router->get('/people/:id/edit', function($params) { //this is right
$router->get('/people/edit/:id', function($params) { //this is wrong
	$people = file(dirname(__FILE__)."/support/people.txt");
	
	$index 	= $params["id"]-1;
	
	//explode the row, and pass it to the person model
	$person = new Person(explode("\t",$people[$index]));
	return "<h1>editing a person</h1>";
	//will just display the html form
});

$router->get('/people/:id', function($params) {
	return "<h1>show a person</h1>";
});

$router->get('/admin/people', function($params) {
	return "<h1>admin: show all people</h1>";
});

$router->post('/people', function($params) {
	return "<h1>create a person </h1>";
});

$router->put('/people/:id', function($params) {
	return "<h1>update a person</h1>";
});

$router->delete('/people/:id', function($params) {
	return "<h1>delete a person</h1>";
});

?>