<?php

function money_saved($period){
	
	//Open database connection
	$conn_string = "host=localhost port=5432 dbname=gnucash user=gnucash password=gnucash";
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

function budget_data($parameter){
	
	//Open database connection
	$conn_string = "host=localhost port=5432 dbname=gnucash user=gnucash password=gnucash";
	$dbconn = pg_connect($conn_string);
	
	if ($parameter == "graph"){
		#Iterate through the list of Expense Accounts 
		$query = "
SELECT 
	COALESCE(t1.account,t2.account) AS account, COALESCE(t1.budget,t2.value,0) AS total_budget, COALESCE(t2.value,0) AS value
FROM
	(SELECT
		endtable.account as account, endtable.budget as budget
	FROM
		(SELECT 
				public.accounts.name AS account, round(public.budget_amounts.amount_num::decimal/public.budget_amounts.amount_denom::decimal,2) AS budget, public.accounts.parent_guid as parent
		FROM 
				public.budget_amounts 
		INNER JOIN 
			public.accounts ON public.budget_amounts.account_guid = public.accounts.guid
		WHERE 
			public.accounts.account_type = 'EXPENSE'
		AND 
			public.budget_amounts.period_num = (date_part('month', CURRENT_DATE)-1)
		AND 
			public.accounts.parent_guid = '9bf599dccbf9b17fd779d609de5d4c24'
		UNION
		SELECT
			public.accounts.name as account, SUM(t1.budget) as budget, public.accounts.parent_guid as parent
		FROM
			(SELECT 
				public.accounts.name AS account, round(public.budget_amounts.amount_num::decimal/public.budget_amounts.amount_denom::decimal,2) AS budget, public.accounts.parent_guid as parent
			FROM 
				public.budget_amounts 
			INNER JOIN 
				public.accounts ON public.budget_amounts.account_guid = public.accounts.guid
			WHERE 
				public.accounts.account_type = 'EXPENSE'
			AND 
				public.budget_amounts.period_num = (date_part('month', CURRENT_DATE)-1)
			ORDER BY budget DESC
			 ) t1
		INNER JOIN
			public.accounts ON t1.parent = public.accounts.guid
		WHERE
			t1.parent != '9bf599dccbf9b17fd779d609de5d4c24'
		GROUP BY t1.parent, public.accounts.name, public.accounts.parent_guid
		) endtable
	) t1
FULL JOIN
	(SELECT
		endtable.account as account, endtable.value as value
	FROM
		(SELECT 
			public.Accounts.name AS account, round((SUM(public.Splits.value_num)/AVG(public.accounts.commodity_scu)),2) AS value, public.accounts.parent_guid as parent
		FROM 
			public.Accounts 
		INNER JOIN 
			public.Splits ON public.Accounts.guid=public.Splits.account_guid 
		INNER JOIN 
			public.transactions ON public.splits.tx_guid = public.transactions.guid
		WHERE 
			public.Accounts.account_type = 'EXPENSE' and public.Accounts.name != 'Recreation' and public.Accounts.name != 'Bank'
		AND 
			public.transactions.post_date >= date_trunc('month', CURRENT_DATE)
		AND 
			public.accounts.parent_guid = '9bf599dccbf9b17fd779d609de5d4c24'
		GROUP BY 
			public.accounts.name, public.accounts.parent_guid
		UNION
		SELECT
			public.accounts.name as account, SUM(t1.value) as value, public.accounts.parent_guid as parent
		FROM
			(SELECT 
				public.Accounts.name AS account, round((SUM(public.Splits.value_num)/AVG(public.accounts.commodity_scu)),2) AS value, public.accounts.parent_guid as parent
			FROM 
				public.Accounts 
			INNER JOIN 
				public.Splits ON public.Accounts.guid=public.Splits.account_guid 
			INNER JOIN 
				public.transactions ON public.splits.tx_guid = public.transactions.guid
			WHERE 
				public.Accounts.account_type = 'EXPENSE' and public.Accounts.name != 'Recreation' and public.Accounts.name != 'Bank'
			AND 
				public.transactions.post_date >= date_trunc('month', CURRENT_DATE)
			GROUP BY 
				public.accounts.name, public.accounts.parent_guid
			) t1
		 INNER JOIN
			public.accounts ON t1.parent = public.accounts.guid
		 WHERE
			t1.parent != '9bf599dccbf9b17fd779d609de5d4c24'
		 GROUP BY
			t1.parent, public.accounts.name, public.accounts.parent_guid
		) endtable
) t2
ON
	t1.account = t2.account
ORDER BY
	total_budget DESC, value DESC";
	
		$result = pg_query($dbconn, $query);
		
		$rows = array();
		while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC))
		{
		#	if ($row['total_budget'] != 0){
				$row['budget'] = number_format((float)($row['total_budget'] - $row['value']), 2, '.', '');
		#	}else {
		#		$row['budget'] = 0;
		#	}
			$rows[] = $row;
		}
		
		//Close database connection
		pg_close($dbconn);
		
		$JSONBudgetData = json_encode($rows);
		return $JSONBudgetData;
	}
	if ($parameter == "howsitgoin"){
		#Iterate through the list of Expense Accounts 
		$query = "SELECT 
					COALESCE(t1.account,t2.account) AS account, COALESCE(t1.budget,t2.value,0) AS total_budget, COALESCE(t2.value,0) AS value
				FROM
					(SELECT 
						public.accounts.name AS account, round(public.budget_amounts.amount_num::decimal/public.budget_amounts.amount_denom::decimal,2) AS budget
					FROM 
						public.budget_amounts 
					INNER JOIN 
						public.accounts ON public.budget_amounts.account_guid = public.accounts.guid 
					WHERE 
						public.accounts.account_type = 'EXPENSE' 
					AND 
						public.budget_amounts.period_num = (date_part('month', CURRENT_DATE)-1)
					) t1
				FULL JOIN
					(SELECT 
						public.Accounts.name AS account, round((SUM(public.Splits.value_num)/AVG(public.accounts.commodity_scu)),2) AS value
					FROM 
						public.Accounts 
					INNER JOIN 
						public.Splits ON public.Accounts.guid=public.Splits.account_guid 
					INNER JOIN 
						public.transactions ON public.splits.tx_guid = public.transactions.guid
					WHERE 
						public.Accounts.account_type = 'EXPENSE' 
					AND 
						public.transactions.post_date >= date_trunc('month', CURRENT_DATE)
					GROUP BY 
						public.accounts.name
					) t2
				ON
					t1.account = t2.account
				ORDER BY total_budget DESC, value DESC";
		$result = pg_query($dbconn, $query);
		
		$total_budget_remaining = 0;
//		echo '<script>console.log("Your stuff here")</script>';
		while($row = pg_fetch_array($result,NULL,PGSQL_ASSOC))
		{
			$total_budget_remaining += number_format((float)($row['total_budget'] - $row['value']), 2, '.', '');
		}
		
		//Close database connection
		pg_close($dbconn);
		
		return $total_budget_remaining;
	}

}
?>