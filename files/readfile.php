<?php





$path = "/opt/lampp/htdocs/school-management-system/files/";


$file2 = fopen($path . "2.txt", "r") or die("Unable to open the file !");
$file3 = fopen($path . "3.txt", "r") or die("Unable to open the file !");

function readContent($file)
{
  $fileContent = fread($file, filesize($file));
  return $fileContent;
}

function openFile($path)
{
  return fopen($path, "r") or die("Unable to open the file !");
}


$file1 = openFile($path . "teacher1.txt");
$file2 = openFile($path . "teacher2.txt");
$file3 = openFile($path . "teacher3.txt");


$fileContent1 = readContent($file1);
$fileContent2 = readContent($file1);
$fileContent3 = readContent($file1);


$fileContent = array($fileContent1, $fileContent2, $fileContent3);

fclose($file1);
fclose($file2);
fclose($file3);


$aboutContent = array();

if ($about = fopen("/opt/lampp/htdocs/school-management-system/files/about.txt", "r")) {
  while (!feof($about)) {
    $aboutContent[] = fgets($about);
  }
  fclose($about);
}