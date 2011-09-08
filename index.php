<?

require_once dirname(__FILE__)."/core/bishop.php";

//i thought of naming the default object queens_bishop but that doesn't fit with the true inspiration for the name
$joey = new Bishop($router);
$joey->run();

?>