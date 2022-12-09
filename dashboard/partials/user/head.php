<?php
session_start();

if(strlen( !$_SESSION['sd']))
{
    header("Location:../index.php");
}else{
  include "function/load.php";
}

?>
 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Divine Favour International Schools</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../resources/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../resources/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../resources/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">


    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="../resources/css/style.css">