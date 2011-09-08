<?

class Viewer
{
	

	//public static function render($uri) {
	public function render($response, $format="html") {
		$uri="";
		$path_info 		= pathinfo($uri);
		$layout 			= dirname(__FILE__)."/../app/views/layouts/default.html.php";
		$template_file= Viewer::generate_template_path($uri);
		
		if (Viewer::format($uri) == "html")
			if (file_exists($layout))
				include $layout;
			else
				include $template_file;
		else
			include $template_file;
	}
		
	
	public static function format($extension) {		
		switch ($extension) {
		case "json":
		case "xml":
			return $extension;
		case "html":
		default:
			return "html";
		}
	}
	
	
	public static function generate_template_path($uri) {
		return dirname(__FILE__)."/../app/views/people/new.html.php";
	}
	
	
	private function apply_template($tpl_file, $vars = array())
	{
	  extract($vars);

	  ob_start();

	  require($tpl_file);

	  $applied_template = ob_get_contents();
	  ob_end_clean();

	  return $applied_template;
	}
	
}



?>