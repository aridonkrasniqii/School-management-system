<?php
$path = "/opt/lampp/htdocs/school-management-system/files/teacher";

$file1 = fopen($path . "1.txt", "r") or die("Unable to open the file !");
$fileContent1 = fread($file1, filesize($path . "1.txt"));

$file2 = fopen($path . "2.txt", "r") or die("Unable to open the file !");
$fileContent2 = fread($file2, filesize($path . "2.txt"));

$file3 = fopen($path . "3.txt", "r") or die("Unable to open the file !");
$fileContent3 = fread($file3, filesize($path . "3.txt"));



$fileContent = array($fileContent1, $fileContent2, $fileContent3);



$aboutContent = array();

if ($about = fopen("/opt/lampp/htdocs/school-management-system/files/about.txt", "r")) {
  while (!feof($about)) {
    $aboutContent[] = fgets($about);
  }
  fclose($about);
}


fclose($file1);
fclose($file2);
fclose($file3);