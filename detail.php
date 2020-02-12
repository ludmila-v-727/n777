<?php 
session_start(); 
header('Content-Type: text/html; charset=UTF-8');
//var_dump($_SESSION);
?>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<title>Редактирование</title>
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


require "autocl.php";
require "newscontr.php";

if (isset ($_GET['id'])) {
	$id=$_GET['id'];
	$resalt=Oun_new($id);
	$res=$resalt[0];
}
if (($_GET['p']=='edit') || ($_GET['p']=='add')) {
	
	$but='save';
	}
if ($_GET['p']=='del') {
	
	$but='del';
}
?>

<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">Заголовок</th>
<th scope="col">Текст</th>
<th scope="col">Теги новостей</th>
<th scope="col">Дата публикации</th>
<th scope="col"></th>
</tr>
</thead>
  <tbody>
<?php if (isset($_SESSION)) { ?>
<form method="POST" action="adminka.php">
<input type="hidden" name="id" value="<?=$res['id'];?>" />
<tr>

<td>
<input type="text" name="title" value="<?=$res['title'];?>" style="width:100%" required />
</td>
<td>
<input type="text" name="new" value="<?=$res['new'];?>" style="width:100%" required />
</td>
<td>
<input type="text" name="filter" value="<?=$res['filter'];?>" style="width:100%" required />
</td>
<td><?=$res['date_t'];?></td>
<?php

if ($but=="save") {
?>
<td>
<button  name="save" class="btn btn-warning">Сохранить</button>
</td>
<?php } 
if ($but=="del") {
	?>
<td>
<button  name="del" class="btn btn-danger">Удалить</button>
</td>
<?php } ?>
</tr>
</form>
<?php } ?>
</tbody>
</table>




</body>