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
	
	static public function open($line)
	{
		//decrement in order to match the index of the array
		$line--;
		
		//find the text file;
		$people = file(dirname(__FILE__).'/../../support/people.txt');

		//explode the row, and pass it to the person model
		$person = new Person(explode("\t",$people[$line]));
	}
}

?>