<?php

class project 
{

	public $id;
	public $name;
	public $image;
	public $type;
	public $link;
	public $desc;
	public $company;
	public $product;
	public $technology;
	
	//constructor helper
	public function Load($dataRowAsArray)
	{
		$this->id = (string)$dataRowAsArray['id'];
		$this->name = (string)$dataRowAsArray['name'];
		$this->image = (string)$dataRowAsArray['pic'];
		$this->type = (string)$dataRowAsArray['type'];
		$this->link = (string)$dataRowAsArray['link'];
		$this->desc = (string)$dataRowAsArray['desc'];
		$this->company = (string)$dataRowAsArray['company'];
		$this->product = (string)$dataRowAsArray['product'];
		$this->technology = (string)$dataRowAsArray['technology'];
		//if(isset($dataRowAsArray['subscribed'])) {$this->subscribed = (bool)$dataRowAsArray['subscribed'];}
		//if(isset($dataRowAsArray['subscribedDate'])) {$this->subscribedDate = strftime("%Y-%m-%d", strtotime((string)$dataRowAsArray['subscribedDate']));}
	}
	
	//collections
	public static function GetCollection($projectRequest)
	{
		$projectData = new projectData();
		$resultSet = $projectData->GetCollection($projectRequest);

		$projectCollection = array();			
		while($dataRowAsArray = $resultSet->fetch_assoc())
		{
			$project = new project($projectRequest);
			$project->Load($dataRowAsArray); 
			$projectCollection[] = $project;
		}

		return $projectCollection;
	}
	
}

?>
