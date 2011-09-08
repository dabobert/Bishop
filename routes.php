<?

$router->get('/people(.:format)', function() {
	return "<h1>show all people</h1>";
});

$router->get('/people/new(.:format)', function() {
	return "<h1>we gotta fix this</h1>";
	//will just display the html form
});

$router->get('/people/:id(.:format)', function() {
	return "<h1>show a person</h1>";
});

$router->get('/admin/people(.:format)', function() {
	return "<h1>admin: show all people</h1>";
});

$router->post('/people(.:format)', function() {
	return "<h1>create a person </h1>";
});

$router->put('/people/:id(.:format)', function() {
	return "<h1>update a person</h1>";
});

$router->delete('/people/:id(.:format)', function() {
	return "<h1>delete a person</h1>";
});

?>