<?php

try
{
	//Open database connection
	$conn_string = "host=localhost port=5432 dbname=gnucash user=gnucash password=postPASS101";
	$dbconn = pg_connect($conn_string);
	
	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
		$query = "SELECT public.Transactions.guid, public.Transactions.post_date, public.Transactions.description, public.Splits.value_num, public.Splits.value_denom
						FROM public.Transactions INNER JOIN
							public.Splits ON public.Transactions.guid=public.Splits.tx_guid
						ORDER BY post_date DESC";
		$result = pg_query($dbconn, $query);
		
		//Add all records to an array
		$rows = array();
		while($row = pg_fetch_array($result))
		{
			$row[3] = $row[3]/100;
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
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
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysql_query("UPDATE people SET Name = '" . $_POST["Name"] . "', Age = " . $_POST["Age"] . " WHERE PersonId = " . $_POST["PersonId"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
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