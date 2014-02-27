<?php

if ($_POST['submit']){
	// For Encrypting the data
	$str=array($_POST['string']);
	$str1=md5($str[0]);
	$enc=array($str1);

// Hiding the encrypted data
if ($_FILES['secret']['error'] > 0)
  {
	echo "Error: " . $_FILES["secret"]["error"] . "<br/>";
  }
else
  {
	require_once('Stegger.class.inc.php');
		$image=$_FILES['secret'];
        // Instantiate the Stegger object
        $hide = new Stegger();
		if (count($str) < 1){
            // decoding
            $hide->Get($image);

        } else {
            // encoding 
            $hide->Put($enc, $image);
        }
  
  }
}

?>