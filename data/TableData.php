<?php

function TableData(){
	
	//Open database connection
	$conn_string = "host=localhost port=5432 dbname=gnucash user=gnucash password=password";
	$dbconn = pg_connect($conn_string);

	//Get records from database
	$query = "SELECT public.Transactions.guid, public.Transactions.post_date AS date, public.Transactions.description AS description, public.Splits.value_num, public.Splits.value_denom from public.splits
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
		$timestamp = strtotime($row['date']);
		$row['date']= gmdate("d-m-Y", $timestamp);
		$rows[] = $row;
	}
	//Return result to jTable
	$jTableResult = array();
	$jTableResult['Result'] = "OK";
	$jTableResult['Records'] = $rows;
	
	//Close database connection
	pg_close($dbconn);
	
	return json_encode($jTableResult);
}
	
?>