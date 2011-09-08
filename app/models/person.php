<?

class Person {
	public $first_name;
	public $last_name;
	public $phone;
	public $email;
	public $email_display;
	
	function __construct($init_array)
	{
		$this->first_name = $init_array[0];
		$this->last_name = $init_array[1];
		$this->phone = $init_array[2];
		$this->email = $init_array[3];
		$this->email_display = $init_array[4];
	}
}

?>