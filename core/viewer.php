<?

class Viewer
{
	protected $response;
	protected $template_file;
	protected $output;
	
	public function render($response, $format='html') {
		$this->response 		= $response;
		
		if ($this->response->action == "headers")
			$this->display_header();
		elseif ($this->response->body)
			echo $this->response->body;
		else
			echo $this->apply_template();
	}
	
	
	private function apply_template()
	{
		$path_to_views		= dirname(__FILE__).'/../app/views/';
		$this->template_file= $path_to_views.$this->response->path.$this->response->action.'.'.$this->response->format.'.php';
		$layout 			= $path_to_views.'/layouts/default.html.php';
		
		if (!is_file($this->template_file))
			throw new Exception('FATAL ERROR: a view does not exist at '.$this->template_file.' nor does a value exist for body variable of the response object. TO FIX: assign something to $response->body in your route or create a file at '.$this->template_file."\n");
		
		if (!$this->response->variables->blank())
			extract($this->response->variables->contents());

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
		case 'txt':		'Content-Type: text/plain';
		case 'json':	'Content-type: application/json';
		case 'xml': 	
		case 'html':
		default:
			return 'html';
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