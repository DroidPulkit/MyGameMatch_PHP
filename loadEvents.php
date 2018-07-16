<?php
	include("dbconnect.php");
	include("db-functions.php");

	$data = array();

	$listEvents = listEvents($con);

	foreach($listEvents as $row)
	{
	 $data[] = array(
	  'id'    => $row["id"],
	  'title' => $row["title"],
	  'start' => $row["start"],
	  'end'   => $row["end"]
	 );
	}

	echo json_encode($data);
?>