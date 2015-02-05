
<?php

//-----------------------------------------------------------------------------------------------
// Description: A PHP script to select files from the current directory and upload them to Amazon S3.
// Author: Andrea Longhitano - using Donovan Schönknecht's s3.php class
// please download it if you want to use this S3 uploader
// Last Mod. date: 18/01/2015
// Version: 1.0
// Feel free to use, https://github.com/Longhitano/main_projects
//-----------------------------------------------------------------------------------------------

$file_to_upload = null;


if ($handle = opendir('.')) {

	
    while (false !== ($entry = readdir($handle))) {

    	        if ($entry != "." && $entry != ".." && preg_match("/^Report/", $entry)) {
				$file_to_upload = file_get_contents($entry);
				echo "A file has been found and uploaded: $entry";
            

        }
    }
    closedir($handle);

 
}
require 's3.php';

new S3('Your_Access_Key ', 'Your_Secret_key');

$new_name = 'Your_Report_name.csv';

S3::putObject(
	
	$file_to_upload ,
	' your_s3_bucket',
	$new_name
	) 

?>