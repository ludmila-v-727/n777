<?php 
session_start();
header('Content-Type: text/html; charset=UTF-8');
?>
<?php if ($_GET['exit']==1) {
	session_destroy();
	header('Location: index.php');
exit;

}
	
?>
<?php 
require "autocl.php";
require "newscontr.php";
//var_dump($_POST);
//var_dump($_SESSION);
if ((isset($_POST["save"])) && ($_POST["id"]!='')) {

$id_u=$_POST["id"];
$id_user=$_SESSION['id'];
$title=$_POST['title'];
$new=$_POST['new'];
$filter=$_POST['filter'];


$ress=New_up($id_u, $id_user, $title, $new, $filter);
	

	
	
}
if ((isset($_POST["save"])) && ($_POST["id"]=='')) {

$id_user=$_SESSION['id'];
$title=$_POST['title'];
$new=$_POST['new'];
$filter=$_POST['filter'];

$ress=News_insert($id_user,$title,$new,$filter);


}
if (isset($_POST["del"]) && ($_POST["id"]!='')) {
	$id_u=$_POST["id"];
	$ress=New_del($id_u);
	
	
}



?>

<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<title>Adminka</title>

<style>
.zima {
	background-image: url(img/vesna.gif);
	
	height:15%;
	
}
	

</style>

</head>
<body>
<div class="zima">Зимний марафон</div>
<?php 



if (isset($_POST['edit'])){
$login=$_POST['login'];
$pass=$_POST['pass'];
$avtoriz1=Avtoriz($login,$pass);

if (isset($avtoriz1[0]['id'])) {
$_SESSION['id']=$avtoriz1[0]['id'];
$_SESSION['name']=$avtoriz1[0]['name'];

}
}
if (isset($_SESSION)) {
	?>
	<div style="margin-left: 75%">
	<?php
	echo "Hellou, ".$_SESSION['name'];
	?>
	<a href="index.php">Сайт</a>
	<a href="adminka.php?exit=1">EXIT</a>
	</div>
	<?php
} else {
	echo "not access";
}
if (isset($_SESSION)) {
?>
<div class="foto">

<div class="fon">
<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">Заголовок</th>
<th scope="col">Текст</th>
<th scope="col">Дата публикации</th>
<th scope="col">Ссылки для фильтра</th>
<th scope="col"></th>
</tr>
</thead>
  <tbody>
<?php

$res=News_getAll();
echo '
<a href="detail.php?p=add">Добавить</a>';
foreach ($res as $info => $val) {
echo '

<tr>
<td>'.$val["title"].'</td>
<td>'.$val["new"].'</td>
<td>'.$val["date_t"].'</td>
<td>'.$val["filter"].'</td>
<td><a href="detail.php?id='.$val["id"].'&p=edit">Изменить</a>|<a href="detail.php?id='.$val["id"].'&p=del">Удалить</a></td>
</tr>
';





}

?>
</tbody>
</table>
</div>
<?php } ?>








</body>
