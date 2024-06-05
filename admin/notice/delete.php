<?php
include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Notice;
$_notice=new Notice();
$_notice->delete();
