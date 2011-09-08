<?

$router->get('/people:format', function() {
	echo "<h1>show all people</h1>";
});

$router->get('/people:id:format', function() {
	echo "<h1>show a person</h1>";
});

$router->get('/people/new:format', function() {
	echo "<h1>show form to create new person</h1>";
});

$router->post('/people:format', function() {
	echo "<h1>create a person </h1>";
});

$router->put('/people:id:format', function() {
	echo "<h1>update a person</h1>";
});

$router->delete('/people:id:format', function() {
	echo "<h1>delete a person</h1>";
});

?>