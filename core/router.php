<?
error_reporting(E_ALL);

//create the router object
$router = new Router(true);

//include the routes file AFTER the router has been created
require_once dirname(__FILE__)."/../routes.php";



class Router
{
	private		$debug;
	public	$routes;
	
	//when debug is false, it will not display debugging information
	function __construct($debug=false) {
		$this->debug = $debug;
	}
	
	public function __call($verb,$argument) {
		
		switch ($verb) {
		case "post":			//should Create a resource
		case "get":				//should Read a resource
		case "put":				//should Update a resource 
		case "delete":			//should Delete a resource
		case "header":			//should *******
		case "options":			//should *******
		    $this->set_route($verb,$argument[0], $argument[1]);
		    break;
		default:
			throw new Exception('FATAL ERROR: undefined function '.$verb.' for router class\n');
		}
	}
	
	
	public function match($verb,$uri) {
		foreach($this->routes[$verb] as $pattern=>$closure)
			if ($pattern == $uri)
				return $closure;
		throw new Exception('FATAL ERROR: no route matches '.$uri);
	}
	
	
	public function set_route($verb,$uri, $closure) {
		if ($this->debug)
			echo "adding $verb method for $uri<br>\n";
		//Structure of nested routes array
		//1st index stores the method that should be used to access it
		//2nd index stores a hash (aka associative array) of the uri being access and the closure (aka block) to execute
		//	the structure of the routes matter as the order in which they are defined matters.  if get(*,{closure}) is defined
		//	first then it will be used for all resources accessed via get
		$this->routes[$verb][$uri] = $closure;
	}
};

?>