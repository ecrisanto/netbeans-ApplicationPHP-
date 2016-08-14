<?php
require_once("Includes/db.php");
WishDB::getInstance()->delete_wish($_POST["wishID"]);
header("Location: editWishList.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

