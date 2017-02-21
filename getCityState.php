<?php
      
	$cityState = array("44278" => "Tallmadge, Ohio",
  					   "44322" => "Akron, Ohio"
  					);

  	$zip = $_GET["zip"];
  	if (array_key_exists($zip, $cityState))
    	print $cityState[$zip];
  	else
    	print "";

?>