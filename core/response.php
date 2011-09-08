<?

require_once dirname(__FILE__)."/vector.php";

class Response
{
	public $header;
	public $status;
	public $body;
	public $variables;
	public $format;
	
	function __construct($str="") {
		$this->header 	= new Vector();
		$this->variables= new Vector();
		$this->status 	= 200;
		$this->format	= "html";
		$this->body		= $str;
	}
}



?>