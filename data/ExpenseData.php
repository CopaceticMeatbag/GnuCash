<?php

function money_saved($period){
	
		//Open database connection
		$conn_string = "host=localhost port=5432 dbname=gnucash user=gnucash password=password";
		$dbconn = pg_connect($conn_string);
		
		//Define period to return
		if ($period != "total"){
			$where_clause = "Where transactions.post_date >= date_trunc('".$period."', CURRENT_DATE)";
		}else{
			$where_clause = "";
		}
		
		//Run query
		$query = "Select SUM(Total) from (Select 
					  Sum(splits.value_num) as Total, 
					  accounts.account_type 
					From splits Inner Join 
					  accounts On accounts.guid = splits.account_guid Inner Join 
						transactions On splits.tx_guid = transactions.guid 
					".$where_clause."
					Group By accounts.account_type 
					Having accounts.account_type Not In ('EXPENSE', 'INCOME') 
					Order By accounts.account_type ) as TotalSaved";
		$result = pg_query($dbconn,$query);
		
		$YearlyGainz = pg_fetch_row($result);
		$YearlyGainz = (intval($YearlyGainz[0])/100);
		
		//Close database connection
		pg_close($dbconn);
		
		return $YearlyGainz;
}

function graph_data(){
	
	//Open database connection
	$conn_string = "host=localhost port=5432 dbname=gnucash user=gnucash password=password";
	$dbconn = pg_connect($conn_string);
		
	$bargraph_inner_array = array();
	$bargraph_array = array();
	
	#Iterate through the list of Expense Accounts 
	$query = "SELECT
	public.Accounts.guid,
	public.Accounts.name,
	public.Accounts.parent_guid,
	SUM(public.Splits.value_num) AS total
	FROM public.Accounts
	INNER JOIN public.Splits 
		ON public.Accounts.guid=public.Splits.account_guid
    WHERE public.Accounts.account_type = 'EXPENSE'
	GROUP BY public.accounts.guid,public.accounts.name,public.accounts.parent_guid";
	$result = pg_query($dbconn, $query);
	while ($account = pg_fetch_row($result)) {

		#Find the total value of each account and add to array.
		$total_value = (intval($account[3])/100);
		
		$bargraph_inner_array['account']=$account[1];
		$bargraph_inner_array['value']=$total_value;
		
		#Add the array with the current account name + value to the main bargraph array.
		$bargraph_array[] = $bargraph_inner_array;
	}
	#Sort the Bar Graph Array in descending account value
	usort($bargraph_array, function($b, $a) {
		return $a['value'] - $b['value'];
	});
	
	//Close database connection
	pg_close($dbconn);
	
	return $bargraph_array;
}
?>