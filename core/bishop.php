<?

error_reporting(E_ALL);
require_once dirname(__FILE__)."/router.php";


class Bishop
{
	protected $method;
	protected $router;
	protected $format;
	protected $template_file;
	protected $uri;
	protected $id;
	
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
	
	public function run() {
		$closure = $this->router->match($this->method,$this->uri);
		if ($return = $closure())
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