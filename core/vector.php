<?

error_reporting(E_ALL);

class Vector
{
	private $array;
	
	function __construct() {
		$this->array = array();
	}
	
	public function contents() {
		return $this->array;
	}
	
	public function insert($value, $key=NULL) {
		if ($key)
			$this->array[$key] = $value;
		else
			$this->array[] = $value;
	}
	
	public function clear() {
		$this->array[] = array();
	}
	
	public function update($key, $value) {
		$this->array[$key] = $value;
	}
	
	public function erase($key) {
		unset($this->array[$key]);
	}
	
	public function blank() {
		return count($this->array) == 0;
	}
	
}




?>