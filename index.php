<?php 
session_start();
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css">
<title>Новости парка</title>
<style>
.zima {
	background-image: url(img/vesna.gif);
	
	height:15%;
	

	
}
</style>
</head>
<body>
<div>
<div class="zima">Зимний марафон</div>
<div style="margin-left:75%; width:15%; height:25%; ">
Добрый день, <?=$_SESSION['name'];?>
<a href="adminka.php">Панель управление</a>
<form method="POST" action="adminka.php">
 Логин <input type="text" name="login" required /></br>
 Пароль <input type="password" name="pass" required />
 <button  name="edit" class="btn btn-warning">Войти</button>
</form>
</div>
</div>
<div class="foto">

<div id="pr" style="width:100%;
	height:65%;
	overflow: scroll;fon">
<table class="table">
<tr>
<th scope="col">Заголовок</th>
<th scope="col">Текст</th>
<th scope="col">Дата публикации</th>
<th scope="col">Ссылки для фильтра</th>
</tr>
<?php
require "autocl.php";
require "newscontr.php";

$res=News_getAlldis();
//var_dump($res);
if (isset($_GET['tegi'])) {
$filter=htmlspecialchars_decode($_GET['tegi']);
$pag=$_GET['pag'];
$res=New_teg($filter,$pag);
}
foreach ($res as $info => $val) {
echo '
<tr>
<td>'.$val["title"].'</td>
<td>'.$val["new"].'</td>
<td>'.$val["date_t"].'</td>
<td><a href="index.php?tegi='.$val["filter"].'&pag=1">'.$val["filter"].'</a></td>
</tr>
';





}
?>

</table>
<?php 
if (isset($_GET['tegi'])) {
$count=New_teg_pag($filter);
$c=(int)$count/5;
$c++;
$i=0;
while($i<=$c) {
$i++;
?>
<a href="index.php?tegi=<?=$filter;?>&pag=<?=$i;?>" style="margin-left:10px"><?=$i;?></a>
<?php

 } 
}?>

</div>

</div>
<script>
$(document).ready(function(){
	var z=0;
	if ( z!=1){
	$( "#pr" ).scroll(function(){
	console.log(1);

	$.ajax({
				url: 'ajax.php',
				type:"POST",
				data: {'v1': "ok", 'x': 'R'},
				success: function(data){
					console.log(data);
					$( "#pr" ).after(data);
				}
			});
});
z=1;
	}
});
</script>
</body>
</html>
