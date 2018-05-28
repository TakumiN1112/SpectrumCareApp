<?php
  if (!empty($_POST["number"]) && $_POST["number"] > 0) {
    $url = "ftp://127.0.0.1";
	$user = "taku";
	$pw = "taku";
	
	$n = $_POST["number"];
	$i = 1;
	
	// connect and login to FTP server
	$ftp = ftp_connect("127.0.0.1");
	if (!$ftp) die('could not connect.');

	// login
	$login = ftp_login($ftp, $user, $pw);
	if (!$login) die('could not login.');

	// enter passive mode
	$passsive = ftp_pasv($ftp, true);
	if (!$passsive ) die('could not enable passive mode.');

	// get listing
	$listing = ftp_nlist($ftp, "/");

	foreach($listing as $value){
		if ($i > $n)
			break;
		echo "<a href='$url$value'>", substr($value, strrpos($value, '\\') + 1) ,"</a><br>";
		$i++;
	}
  } else {
	  echo "Error!! Something goes wrong!!";
  }
?>
