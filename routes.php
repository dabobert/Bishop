<?
/*
class Routes {
	
	public static function show() {
		return array(
			"/people"=> function(){
				echo "<h1>hey now</h1>";
			}
		);
	}
}
*/
/*
$routes = array(
	"/people"=> function(){
		echo "<h1>hey now</h1>";
	}
);
*/

$router = new Router(true);
$router->get('/people', function() {
	echo "Hey";
});

?>