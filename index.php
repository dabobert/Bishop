<?

require_once dirname(__FILE__)."/core/bishop.php";

//i thought of naming the default object queens_bishop but that doesn't fit with the true inspiration for the name
$joey = new Bishop($router);
$joey->run();

/*
var_dump(pathinfo('/people/:id/edit'));


var_dump(pathinfo('/people/3/edit'));
*/
?>