<?

$path_to_models = dirname(__FILE__).'/../app/models/';

if (is_dir($path_to_models))
	foreach (glob($path_to_models.'*.php') as $filename)
	    require_once $filename;

?>