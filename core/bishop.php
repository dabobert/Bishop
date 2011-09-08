<?

error_reporting(E_ALL);
require_once dirname(__FILE__)."/init.php";
require_once dirname(__FILE__)."/router.php";


class Bishop
{
	protected $method;
	protected $template_engine;
	protected $router;
	protected $format;
	protected $template_file;
	protected $uri;
	protected $id;
	protected $params;
	
	function __construct($router) {
		//Bishop::debug();
		$this->method 	= strtolower($_SERVER["REQUEST_METHOD"]);
		$this->router	= $router;
		$this->uri		= $this->clean_uri();
	}
	
	public function clean_uri() {
		//remove any trailing slash
		return preg_replace('/\/\z/', NULL, $_SERVER["PATH_INFO"]);
	}
	
	public function params($match)
	{
		if (isset($match["id"]))
			$this->params["id"] = $match["id"];
		if (isset($match["params"]))
			$this->params["params"] = $match["params"];
		$this->params				= array_merge($this->params,$_REQUEST);
		$this->params["uri"] 		= $this->uri;
		return $this->params;
	}
	
	public function run() {
		$match = $this->router->match($this->method,$this->uri);
		if ($return = $match["closure"]($this->params($match)))
			echo $return;
		else
		{
			//by including it here, the framework won't error out when it is not included, because it's not in use
			require_once dirname(__FILE__)."/viewer.php";
			Viewer::render($this->uri);
		}
	}
	
	

	private static function debug() {
		var_dump($_SERVER);
		echo "<hr>\n";
		var_dump($_SERVER["PATH_INFO"]);
		echo "<hr>\n";
		var_dump(pathinfo($_SERVER["PATH_INFO"]));
		echo "<hr>\n";
	}
};



?>