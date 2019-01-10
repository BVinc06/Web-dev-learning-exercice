<?php 
Require_once 'config.php';
Class BDD
{
	//PDO connection is reached from the singleton class

	//get the selected row
	public Function getAction($table, $key)
	{
		
		 
		try {
            /*TODO : Find if there is an ID and do a prepared request according to the case */
            print "appel getAction avec $table, $key \n";
            $bdd = singleton::getInstance();
            if ($key == null) {
            	$sql = "select * from $table";
            	print( "sql: $sql \n");
            	$stmt = $bdd ->prepare($sql);
            	$stmt -> execute();

            	$tab = $stmt-> fetchAll(PDO::FETCH_ASSOC);
            	print json_encode( $tab);
            }

			else {
				if($key == intval($key)){
					$sql = "select * from $table where id=$key";
            	print( "sql: $sql \n");
            	$stmt = $bdd ->prepare($sql);
            	$stmt -> execute();

            	$tab = $stmt-> fetchAll(PDO::FETCH_ASSOC);
            	print json_encode( $tab);
				}
			}
		}

		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

		
	}

	//update selected table 
	public Function putAction($table, $set)
	{
		$bdd = singleton::getInstance();
		try {
			/*TODO : prepare the request for one row update */

			print "appel putAction avec $table, $set \n";
			$sql = "update $table set $set\n ";
			print $sql;
			$stmt = $bdd->prepare($sql);
			$stmt -> execute();
			print "altération réussie";
			
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	//insert a row from selected table
	public Function postAction($table, $cols, $vals)
	{
		$bdd = singleton::getInstance();
		try{
			/*TODO : prepare the request for one row insert */
			print "appel postAction avec $table, $key \n";
			$sql = "insert into $table ($cols) values ($vals)";
			print $sql;
			$stmt = $bdd->prepare($sql);
			$stmt -> execute();
			print "insertion réussie";
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}

	//delete a row from selected table
	public Function deleteAction($table, $key)
	{
		$bdd = singleton::getInstance();
		try{
			/*TODO : prepare the request for one row delete */

			 if ($key == null) {
            	print( "id non correspondante! \n");
            	exit;
            }

			else {
				if($key == intval($key)){
				print "appel deleteAction avec $table, $key \n";
				$sql = "delete from $table where id = $key";
            	print( "sql: $sql \n");
            	$stmt = $bdd ->prepare($sql);
            	$stmt -> execute();
            	print "suppression réussie";
            	$tab = $stmt-> fetchAll(PDO::FETCH_ASSOC);
            	print json_encode( $tab);
				}
			}
		}
		catch (PDOException $e) {
    		echo $e->getMessage();
    	exit;
		}

	}


}
?>