<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Notice;
$_notices=new Notice;
$_notices->update();
