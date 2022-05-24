<?php


$connection = mysqli_connect("localhost", "root", "", "school");


if (!$connection) {
  die("Unable to connect to database");
}