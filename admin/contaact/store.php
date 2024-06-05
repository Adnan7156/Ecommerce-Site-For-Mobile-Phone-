  
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Contactus;
$_contactus=new Contactus();
$_contactus->store();





