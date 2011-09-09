<?

class Viewer
{
	protected $response;
	protected $template_file;
	protected $output;

	
	public function render($response, $format="html") {
		$this->response = $response;
		
		if ($this->response->body)
			echo $this->response->body;
		else
			echo $this->apply_template();
	}

	
	
	public static function generate_template_path($uri) {
		return dirname(__FILE__)."/../app/views/people/new.html.php";
	}
	
	
	private function apply_template()
	{
		$this->template_file= Viewer::generate_template_path($this->response->uri);
		$layout 						= dirname(__FILE__)."/../app/views/layouts/default.html.php";
		
		if (!$this->response->variables->blank())
		  extract($this->response->variables);
		
	  ob_start();
		
		$this->display_header();
	
		if (file_exists($layout))
		  require($layout);
		else
			require $this->template_file;

	  $applied_template = ob_get_contents();
	  ob_end_clean();

	  return $applied_template;
	}
	
	private function format_header() {
		switch ($this->response->format) {
		case "txt":		'Content-Type: text/plain';
		case "json":	'Content-type: application/json';
		case "xml": 	
		case "html":
		default:
			return "html";
		}
	}
	
	
	private function display_header() {
		if ($this->response->header->blank())
			$this->response->header->insert = $this->format_header();
			
		foreach($this->response->header->contents() as $header_str) {
			header($header_str);
		}
	}
	
}



?>