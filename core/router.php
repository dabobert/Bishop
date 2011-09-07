<?
//echo dirname(__FILE__)."/../routes.php";
//bishop/core/../routes.php
require_once dirname(__FILE__)."/../routes.php";

class Router
{
	private		$debug;
	protected	$routes;
	
	function __construct($debug=false) {
		$this->debug = $debug;
	}
	
	public function __call($data,$argument) {
		switch ($data) {
		case "get":
		case "post":
		case "destroy":
		    $this->set_route($data,$argument[0], $argument[1]);
		    break;
		}
	}
	
	public function set_route($method,$uri, $closure) {
		if ($this->debug)
			echo "adding $method method for $uri<br>\n";
		$this->routes[$method][$uri] = $closure;
	}
};

?>