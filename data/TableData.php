<?php

try
{
	//Open database connection
	$conn_string = "host=localhost port=5432 dbname=gnucash user=gnucash password=password";
	$dbconn = pg_connect($conn_string);
	
	if(isset($_GET['action'])){
    $action = $_GET['action'];
}
	
	//Getting records (listAction)
	if(isset($action) == "list")
	{
		//Get records from database
		$query = "SELECT public.Transactions.guid, public.Transactions.post_date, public.Transactions.description, public.Splits.value_num, public.Splits.value_denom from public.splits
					Inner Join accounts On accounts.guid = splits.account_guid
					Inner Join transactions On splits.tx_guid = transactions.guid
					WHERE accounts.account_type In ('EXPENSE')
					ORDER BY post_date DESC";
		$result = pg_query($dbconn, $query);
		
		//Add all records to an array
		$rows = array();
		while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC))
		{
			$row['value_num'] = "$".(intval($row['value_num'])/intval($row['value_denom']));
		    $rows[] = $row;
		}
		
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if(isset($action) == "create")
	{
		//Insert record into database
		$result = mysql_query("INSERT INTO people(Name, Age, RecordDate) VALUES('" . $_POST["Name"] . "', " . $_POST["Age"] . ",now());");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM people WHERE PersonId = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if(isset($action) == "update")
	{
		//Update record in database
		$result = mysql_query("UPDATE people SET Name = '" . $_POST["Name"] . "', Age = " . $_POST["Age"] . " WHERE PersonId = " . $_POST["PersonId"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if(isset($action) == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM people WHERE PersonId = " . $_POST["PersonId"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	pg_close($dbconn);

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