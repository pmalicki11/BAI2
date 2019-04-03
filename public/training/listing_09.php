<?php
 if (!isset($_GET["p"])) {
    echo 'Zmienna "p" nie istnieje!';
  } else {
	$p = $_GET["p"];
	switch ($_GET["p"]) {
	  case "s1":
	    echo "Switch {$p} is active";
	    break;
	  case "s2":
	    echo "Switch {$p} is active";
	    break;
      case "s3":
	    echo "Switch {$p} is active";
	    break;
	  default:
	    echo "Any active switch present";
		break;
	}
  }