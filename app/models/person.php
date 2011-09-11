<?

class Person {
	public $id;
	public $first_name;
	public $last_name;
	public $phone;
	public $email;
	public $email_display;
	
	function __construct($init_array, $id=NULL)
	{
		if (isset($init_array[0]))
			$this->first_name = $init_array[0];
		else
			$this->first_name = NULL;
		
		if (isset($init_array[1]))
			$this->last_name = $init_array[1];
		else
			$this->first_name = NULL;
		
		if (isset($init_array[2]))
			$this->phone = $init_array[2];
		else
			$this->first_name = NULL;
			
		if (isset($init_array[3]))	
			$this->email = $init_array[3];
		else
			$this->first_name = NULL;
			
			
		if (isset($init_array[4]))	
			$this->email_display = $init_array[4];
		else
			$this->first_name = NULL;
		
		if ($id)
			$this->id = $id;
	}
	
	static public function open($line)
	{
		//decrement in order to match the index of the array
		
		//find the text file;
		$people = file(dirname(__FILE__).'/../../support/people.txt');

		//explode the row, and pass it to the person model
		return new Person(explode("\t",$people[$line-1]), $line);
	}
}

?>