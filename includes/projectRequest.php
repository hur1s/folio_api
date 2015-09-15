<?php

class projectRequest 
{
	
	public $id;
	public $howMany;
	public $type;
	public $company;
	public $product;
	public $dataRowAsArray;
	
	public function __construct()
	{
		//load defaults
		$this->id = 'all';
		$this->howMany = 10;
		$this->type = 'all';
		$this->company = 'all';
		$this->product = 'all';
		$this->dataRowAsArray = array();
	}

}

?>
