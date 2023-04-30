<?php
 if(isset ($_GET["id"])){
$id=$_GET['id'];
$servername='localhost';
$username='root';
$password='';
$database='shop';

$connection=new mysqli($servername,$username,$password,$database);
$sql="DELETE FROM client_list WHERE id=$id";
$connection->query($sql);
 }

 header("location:/hwshop/index.php");
 exit;
?>