<?php 
session_start();
if (isset($_POST['paraula'])) {
	echo $_POST['paraula'];
	$arrayFuncions = get_defined_functions();

	if (in_array($_POST['paraula'], $arrayFuncions['internal']) && 
    !in_array($_POST['paraula'], $_SESSION['encertades'])) {
		
        $_SESSION['encertades'][] = $_POST['paraula'];
		header('Location: phplogic.php', true, 303);
	}
	else{
        header('Location: phplogic.php', true, 303);
    }
}
?>