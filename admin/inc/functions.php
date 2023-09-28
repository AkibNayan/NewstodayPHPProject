<?php

	include "connection.php";

	function delete($table, $p_key, $url, $del_id){

		global $db;

		$sql3 = "DELETE FROM $table WHERE $p_key='$del_id'";
        $delete_res = mysqli_query($db, $sql3);

        if($delete_res){
            header('Location: '.$url);
        }
        else{
            die($table." Delete Error!".mysqli_error($db));
        }

	}

?>