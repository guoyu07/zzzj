<?php
	require_once("connectsql.php");
	if($_SESSION["userid"]!=null){
		$string="select count(*) from questions";
		mysql_query("SET NAMES UTF8"); 
		$result=mysql_query($string);
		$num=mysql_fetch_array($result);
		$count=$num[0];
		try{
			$num=$_GET["id"];
			$count=$_GET['count'];
		}
		catch(Exception $e){
	
		}
		$string="update user set actnum = (actnum+1) where id=".$_SESSION['userid'];
		mysql_query($string);
		$string="select * from questions where id=$num";
		$result=mysql_query($string);
		$result=mysql_fetch_array($result);
		$str=$result["question"];
		$id=$result["id"];
		$ansa=$result["ansa"];
		$ansb=$result["ansb"];
		$ansc=$result["ansc"];
		$ansd=$result["ansd"];
		$ans=$result["answer"];
		$time=$result["timelimit"];
		$_SESSION['ans']=$ans;
    	$_SESSION['time']=$time;
    	$_SESSION['ansa']=$ansa;
    	$_SESSION['ansb']=$ansb;
    	$_SESSION['ansc']=$ansc;
    	$_SESSION['ansd']=$ansd;
    	$string="update user set quesnum = (quesnum+1) where id=".$_SESSION['userid'];
		mysql_query($string);
	}
    
?>