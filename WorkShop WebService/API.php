<?php 
include "BDD.php";



Class API
{
	//initialize the request
	function __construct()
	{
		$this->reqArgs();

	}
	
	// provides the response 
	function reqArgs()
	{
		// get the HTTP method, path and body of the request
		
		$method = $_SERVER['REQUEST_METHOD'];
		print "méthode : $method \n";

		$request = explode("/", $_SERVER['PATH_INFO']);
		array_shift( $request);
		print_r($request);
		
		$input = json_decode( file_get_contents('php://input') );
		print_r( $input );

		if ($request){
			
			// retrieve the table and key from the path
			$table = $request[0];
			$key = isset ( $request[1] ) ? $request[1] : null;
			print "table : $table, id : $key \n";
		}
		
		if ($input)
		{ 
				
			// escape the columns and values from the input object
			$columns = implode(",", array_keys((array) $input));
			print "columns : $columns \n";
			$values = implode(",", array_values(( array ) $input));
			print "values : $values\n";
	 
			// build the SET part of the SQL command
			$set = '';
			$tab= array();
			foreach ($input as $k => $v) {
				$tab[]=$k ."='".$v . "'";
			}
			$set=implode(",", $tab);
			print "set : $set \n";
			
		}
		
		if($method){
			$bdd = new BDD();
			//TODO You'd better to use a switch Method ;)
			switch ($method) {
				case 'GET':
					$bdd->getAction($table, $key);
					break;
				
				case "POST":
					$bdd->postAction($table, $columns, $values);
					break;

				case "PUT":
					$bdd->putAction($table, $set);
					break;
			}
		}
	}
}
new API();

?>