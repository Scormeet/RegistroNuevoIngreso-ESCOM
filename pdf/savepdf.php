<?php
if ( isset( $_FILES['file'] ) ) {
	if ($_FILES['file']['type'] == "application/pdf") {
		$source_file = $_FILES['file']['tmp_name'];
		$dest_file = "uploads/".$_FILES['file']['name'];

		if (file_exists($dest_file)) {
			print "Este archivo ya existe";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['file']['error'] == 0) {
				print "Pdf file uploaded successfully!";
				// print "<b><u>Details : </u></b><br/>";
				// print "File Name : ".$_FILES['file']['name']."<br.>"."<br/>";
				// print "File Size : ".$_FILES['file']['size']." bytes"."<br/>";
				// print "File location : upload/".$_FILES['file']['name']."<br/>";
			}
		}
	}
	else {
		if ( $_FILES['file']['type'] != "application/pdf") {
			print "Error occured while uploading file : ".$_FILES['file']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
		}
	}
}
?>