<?php
try
{
	//Getting records (listAction)
	if (isset($_GET["action"])){
		$action = $_GET["action"];
	}else{
		$action = "unset";
	}
	
	//Open database connection
	$conn_string = "host=localhost port=5432 dbname=gnucash user=gnucash password=password";
	$dbconn = pg_connect($conn_string);

	if($action == "list"){

		//Get records from database
		$query = "SELECT public.Transactions.guid AS guid, public.Transactions.post_date AS Date, public.Transactions.description AS Description, public.Splits.value_num AS value_num, public.Splits.value_denom AS value_denom from public.splits
					Inner Join accounts On accounts.guid = splits.account_guid
					Inner Join transactions On splits.tx_guid = transactions.guid
					WHERE accounts.account_type In ('EXPENSE')
					ORDER BY post_date DESC";
		$result = pg_query($dbconn, $query);

		//Add all records to an array
		$rows = array();
		while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC))
		{
			$row['value'] = "$".number_format((float)($row['value_num']/$row['value_denom']), 2, '.', '');
			#$timestamp = strtotime($row['Date']);
			#$row['Date']= gmdate("d-m-Y", $timestamp);
			$rows[] = $row;
		}
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		
		//Close database connection
		pg_close($dbconn);
		
		print json_encode($jTableResult);
	}
	else if($action == "create"){

		//Call Python Script to use PieCash Python binding for database changes.
		//system('python create_transaction.py myargs1 myargs2 myargs3 myargs4', $retval);
		//if ($retval){console.log("Yay");}
		//console.log("$retval");
	}
	else if($action == "update"){
		
	}
	else if($action == "delete"){
		
	}
	else if($action == "unset"){
		
	}
}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
?>