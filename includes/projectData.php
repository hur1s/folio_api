<?php

class projectData 
{

	public function __construct()
	{

	}
	
	function GetCollection($projectRequest=null)
	{
		global $dbManager;
		
		$limitClause = "";
		if($projectRequest->howMany != "all")
		{
			$limitClause = "LIMIT " . $projectRequest->howMany . " ";
		}
		
		$whereClause ="WHERE 1=1";
		if($projectRequest->type && $projectRequest->type != 'all')
		{
			$whereClause .= " AND type='". $projectRequest->type ."'";
		}
		if($projectRequest->company && $projectRequest->company != 'all')
		{
			$whereClause .= " AND company='". $projectRequest->company ."'";
		}
		if($projectRequest->product && $projectRequest->product != 'all')
		{
			$whereClause .= " AND product='". $projectRequest->product ."'";
		}
		if($projectRequest->id && $projectRequest->id != 'all')
		{
			$whereClause .= " AND id='". $projectRequest->id ."'";
		}
		
		$sql  = "SELECT * FROM `folio` " . $whereClause . " ORDER BY id DESC " . $limitClause;
		//echo $sql;
		$queryResult = $dbManager->GetMysqli()->query($sql);

		return $queryResult;
	
	}

}

?>
