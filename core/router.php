<?
require_once dirname(__FILE__)."/../routes.php";

class Router
{
	private		$debug;
	protected	$routes;
	
	function __construct($debug=false) {
		$this->debug = $debug;
	}
	
	public function __call($verb,$argument) {
		
		switch ($verb) {
		case "put":
		case "header":
		case "options":
		case "get":
		case "post":
		case "delete":
		    $this->set_route($verb,$argument[0], $argument[1]);
		    break;
		}
	}
	
	public function set_route($verb,$uri, $closure) {
		if ($this->debug)
			echo "adding $verb method for $uri<br>\n";
		//Structure of nested routes array
		//1st index stores the method that should be used to access it
		//2nd index stores a hash (aka associative array) of the uri being access and the closure (aka block) to execute
		//	the structure of the routes matter as the order in which they are defined matters.  if get(*,{closure}) is defined
		//	first then it will be used for all resources accessed via get
		$this->routes[$verb][] = array($uri,$closure);
	}
};

?>