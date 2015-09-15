<?php
require_once("includes/applicationVariables.php");
require_once("includes/DbManager.php");
require_once("includes/project.php");
require_once("includes/projectRequest.php");
require_once("includes/projectData.php");

//connect to DB
$dbManager = new DbManager();
 
if (isHTTP()) {
  if (isset($_POST["action"]) && !empty($_POST["action"])) { // Checks if action value exists
    $action = $_POST["action"];
    $length = $_POST["length"];
    switch($action) { //Switch case for value of action
      case "latest": getLatest($length); break;
    }
  }
}

//Function to check if the request is an AJAX request
function isHTTP() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function getLatest($length) {
  $return = $_POST;  
  
	$projectRequest = new projectRequest();
	$projectRequest->howMany = $length;
	$projectCollection = Project::GetCollection($projectRequest);
  
  $return["data"] = $projectCollection;
  echo json_encode($return);
}

$dbManager->Close(); 
?>