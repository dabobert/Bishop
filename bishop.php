<?


error_reporting(E_ALL);
require_once dirname(__FILE__)."/core/router.php";
require_once dirname(__FILE__)."/routes.php";

class Bishop
{
	protected $method;
	protected $format;
	protected $uri;
	protected $id;
	
	function __construct() {
		//Bishop::debug();
		$this->method 	= strtolower($_SERVER["REQUEST_METHOD"]);
		$this->uri		= pathinfo($_SERVER["PATH_INFO"]);
		if (isset($this->uri["extension"]))
			$this->format = $this->uri["extension"];
		else
			$this->format = "html";
	}
	
	public static function debug() {
		var_dump($_SERVER);
		echo "<hr>\n";
		var_dump(pathinfo($_SERVER["PATH_INFO"]));
		echo "<hr>\n";
	}
};

class myApp extends Bishop 
{
	function __construct() {

		parent::__construct();
		$paths = array("/people","*");
		$handlers = array("/people"=>"<h1>hey<h1>","*"=>"<pre>everything</pre>");
		echo $this->{$this->method}("str");
		var_dump(Routes::show());
	}


	
	function get($str)
	{
		echo "howdy--$str";
	}
};


$foo = new myApp;


?>