<?

error_reporting(E_ALL);
require_once dirname(__FILE__).'/init.php';
require_once dirname(__FILE__).'/router.php';
require_once dirname(__FILE__).'/viewer.php';


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
		$this->method 		= strtolower($_SERVER['REQUEST_METHOD']);
		$this->router			= $router;
		$this->uri				= $this->clean_uri();
		$this->format			= $this->format();
		$this->template_engine	= new Viewer;
		$this->params			= array();
	}
	
	public function clean_uri() {
		//remove any trailing slash
		return preg_replace('/\/\z/', NULL, $_SERVER['PATH_INFO']);
	}
	
	public function params($match)
	{
		if (isset($match['id']))
			$this->params['id'] = $match['id'];
		if (isset($match['params']))
			$this->params['params'] = $match['params'];
		$this->params				= array_merge($this->params,$_REQUEST,$this->parse_argv());
		$this->params['uri'] 		= $this->uri;

		return $this->params;
	}
	
	
	public function run() {
		$match 							= $this->router->match($this->method,$this->uri);
		//Make a response object if the closure was empty
		if (! ($response = $match['closure']($this->params($match))))
			$response = new Response();
		$response->action		= $match["action"];
		$response->format		= $this->format;
		$response->uri			= $this->uri;
		$response->method		= $this->method;
		$this->render($response);
	}
	
	
	protected function render($response) {
		//to change how bishop renders inherit from bishop and overload the fn
		$this->template_engine->render($response);
	}
	
	
	private function parse_argv() {
		$array = array();
		
		if (isset($_SERVER['argv'][0]))
		{
			$argv = explode('&',$_SERVER['argv'][0]);
			foreach($argv as $param_str)
			{
				$param_var 	= explode('=',$param_str);
				$array[$param_var[0]]= $param_var[1];
			}
		}
		
		return $array;
	}
	
	public function format() {
		$uri_info = pathinfo($this->uri);
		if (isset($uri_info['extension']))	
			switch ($uri_info['extension']) {
			case 'json':
			case 'txt':
			case 'xml':
				return  $extension;
				break;
			case 'html':
			default:
				return 'html';
			}
		else
			return 'html';
	}
	
	
	private static function debug() {
		var_dump($_SERVER);
		echo "<hr>\n";
		var_dump($_SERVER['PATH_INFO']);
		echo "<hr>\n";
		var_dump(pathinfo($_SERVER['PATH_INFO']));
		echo "<hr>\n";
	}

};



?>