<?php
 
function Avtoriz($login,$pass)
{
	
    $base = new Database;
    return $base->DBQuery("
    SELECT id, name FROM users WHERE login='$login' and pass='$pass'
    ");
}
function New_teg($filter,$pag)
{
	$base = new Database;
	if ($pag!=1){
		$pag=($pag-1)*5;
		
		return $base->DBQuery("
    SELECT * FROM newss WHERE filter='$filter' LIMIT ".$pag.",5
    ");
		}
		else {
			
		
    
    return $base->DBQuery("
    SELECT * FROM newss WHERE filter='$filter' LIMIT 5
    ");
		}
}
function New_teg_pag($filter)
{
	
    $base = new Database;
    return $base->DBQuery("
    SELECT count(filter) FROM newss WHERE filter='$filter' group by filter
    ");
}
function News_getAll()
{
	
    $base = new Database;
    return $base->DBQuery("
    SELECT * FROM newss
    ");
}
function News_getAlldis()
{
	
    $base = new Database;
	
    return $base->DBQuery("
    SELECT * FROM newss ORDER BY id DESC LIMIT 10
    ");
	
}
function News_insert($id_user,$title,$new,$filter)
{
	
    $base = new Database;
    $base->DBExec("INSERT INTO `newss` (`id`, `id_user`, `title`, `new`, `filter`) VALUES (not null, $id_user, '$title', '$new', '$filter')");
}
function Oun_new($i)
{
	
    $base = new Database;
    return $base->DBQuery("
    SELECT * FROM newss WHERE id=$i
    ");
}
    function New_up($i,$id_user,$title,$new,$filter)
{
	
    $base = new Database;
    return $base->DBExec(" UPDATE newss
SET  id_user='$id_user', title='$title',new='$new', filter='$filter' WHERE id=$i");
}


function New_del($i)
{
	
    $base = new Database;
    return $base->DBExec("DELETE FROM newss WHERE id=$i");
}