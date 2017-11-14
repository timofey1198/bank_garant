<?
	
	include_once('functions.php');
	
	$garant = getInfo($_GET['url'], 'Размер обеспечения исполнения контракта');
	
	if($garant !== ''){
		echo '<script>document.getElementById("garant").value = "'.$garant.'";</script>';
	}
	
?>