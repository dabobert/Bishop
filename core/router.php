<?
error_reporting(E_ALL);

//create the router object
$router = new Router(true);

//include the routes file AFTER the router has been created
require_once dirname(__FILE__).'/response.php';
require_once dirname(__FILE__).'/../routes.php';



class Router
{
	private	$debug;
	public	$routes;
	
	//when debug is false, it will not display debugging information
	function __construct($debug=false) {
		$this->debug = $debug;
	}
	
	public function __call($verb,$argument) {
		
		switch ($verb) {
		case 'post':			//should Create a resource
		case 'get':				//should Read a resource
		case 'put':				//should Update a resource 
		case 'delete':		//should Delete a resource
		case 'header':		//should *******
		case 'options':		//should *******
		    $this->set_route($verb,$argument[0], $argument[1]);
		    break;
		default:
			throw new Exception('FATAL ERROR: undefined function '.$verb.' for router class\n');
		}
	}
	
	
	public function match($verb,$uri) {

		$uri_array 	= array_filter(explode("/",$uri), 'strlen');
		$max_index 	= count($uri_array) - 1;	
		$params		= array();
			
		foreach($this->routes[$verb] as $pattern=>$closure)
		{
			$ptn_array = array_filter(explode("/",$pattern), 'strlen');
			
			if ($this->debug)
				$this->debug_match($uri_array, $ptn_array);
	
			foreach($ptn_array as $index=>$value) {
				if ($uri_array[$index] != $ptn_array[$index] && !$this->is_stub($value))
				 	break;
				
				//if the current value is a stub save the value in params
				if ($this->is_stub($value))
					$params[$this->stub_value($value)] = $uri_array[$index];
				
				//if we haven't yet hit a break and we reach the max_index then we know we're done
				if($max_index == $index)
				{
					//set the action
					switch ($verb) {
					case 'post':	$params["action"] = 'create';
					case 'put':		$params["action"] = 'update';
					case 'delete':		
					case 'header':
					case 'options':	
						$params["action"] = $verb;
					    break;
					case 'get':
						if ($this->is_stub($ptn_array[$max_index]))
							$params["action"] = 'show';
						elseif ($uri_array[$max_index] == "new" || $uri_array[$max_index])
							$params["action"] = $uri_array[$max_index];
						else
							$params["action"] = "index";
					default:
						throw new Exception('FATAL ERROR: Bishop can not handle a method of '.$verb."\n");
					}
					
					return array('closure'=>$closure, 'params'=>$params);
				}
			}
		}
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
	
	
	private function is_stub($portion) {
		return substr($portion,0,1) == ':';
	}
	
	private function stub_value($portion) {
		return substr($portion,1,(strlen($portion)-1));
	}
	
	private function debug_match($uri_array, $ptn_array) {
		echo "pattern<br>\n";
		var_dump($uri_array);
		echo "uri<br>\n";
		var_dump($ptn_array);
		echo "======<br>\n";
	}
};


?>