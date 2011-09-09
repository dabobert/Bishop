<?

require_once dirname(__FILE__).'/vector.php';

class Response
{
	public $header;
	public $status;
	public $body;
	public $action;
	public $uri;
	public $variables;
	public $path;
	public $format;
	public $method;
	
	function __construct($str='') {
		$this->header 	= new Vector();
		$this->variables= new Vector();
		$this->status 	= 200;
		$this->format	= 'html';
		$this->body		= $str;
	}
}



?>