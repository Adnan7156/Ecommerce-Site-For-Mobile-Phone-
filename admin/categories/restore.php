<?php

include_once($_SERVER['DOCUMENT_ROOT']."/ecommerce_project backup/config.php");
use App\Categories;
$_categorie= new Categories;
$_categorie->restore();
