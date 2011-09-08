<?


error_reporting(E_ALL);
require_once dirname(__FILE__)."/core/router.php";
require_once dirname(__FILE__)."/routes.php";

class Bishop
{
	protected $method;
	protected $router;
	protected $format;
	protected $uri;
	protected $id;
	
	function __construct($router) {
		//Bishop::debug();
		$this->method 	= strtolower($_SERVER["REQUEST_METHOD"]);
		$this->router	= $router;
		$this->uri		= pathinfo($_SERVER["PATH_INFO"]);
		if (isset($this->uri["extension"]))
			$this->format = $this->uri["extension"];
		else
			$this->format = "html";
	}
	
	public function run() {
		$foo = $this->router->match($this->method,"/people:format");
		$foo();
	}
	
	
	
	
	private static function debug() {
		var_dump($_SERVER);
		echo "<hr>\n";
		var_dump(pathinfo($_SERVER["PATH_INFO"]));
		echo "<hr>\n";
	}
};



$foo = new Bishop($router);
$foo->run();

?>