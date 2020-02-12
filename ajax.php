<?php
require "autocl.php";
require "newscontr.php";
if ($_POST["v1"] == "ok") {

$x='R';
$res=News_getAlldis($x);
$string = '';
foreach ($res as $info => $val) {
$string.= '
<tr>
<td>'.$val["title"].'</td>
<td>'.$val["new"].'</td>
<td>'.$val["date_t"].'</td>
<td><a href="index.php?tegi='.$val["filter"].'&pag=1">'.$val["filter"].'</a></td>
</tr>
';





}




$st='bla';
echo $st;
//echo $string;
}

?>