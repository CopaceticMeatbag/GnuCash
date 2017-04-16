<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Prettier GnuCash">
    <meta name="author" content="Mike A">

    <title>GnuCash Accounting</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!--Declare our PHP Database Connection-->
	<?php
	$conn_string = "host=localhost port=5432 dbname=gnucash user=gnucash password=postPASS101";
	$dbconn = pg_connect($conn_string);
	?>
	

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">GnuCash Accounting</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> S0ULphIRE <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="pages/bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="pages/bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="pages/blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Finance Overview</small>
                        </h1>
                    </div>
                </div>
				
				<div class="col-lg-8">
					<div class="row">
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title" style="text-align:center"><i class="fa fa-bank fa-fw"></i><b> Saved This Month  </b><i class="fa fa-bank fa-fw"></i></h3>
								</div>
								<div class="panel-body money-saved">
								<?php
									$query = "Select SUM(Total) from (Select 
												  Sum(splits.value_num) as Total, 
												  accounts.account_type 
												From 
												  splits Inner Join 
												  accounts On accounts.guid = splits.account_guid Inner Join 
												  transactions On splits.tx_guid = transactions.guid 
												Where 
												  transactions.post_date >= date_trunc('month', CURRENT_DATE) 
												Group By 
												  accounts.account_type 
												Having 
												  accounts.account_type Not In ('EXPENSE', 'INCOME') 
												Order By 
												  accounts.account_type ) as TotalSaved";
									$res_account_value_month = pg_query($dbconn,$query);
									$MonthlyGainz = pg_fetch_row($res_account_value_month);
									$MonthlyGainz = (intval($MonthlyGainz[0])/100);
									echo("<p>$$MonthlyGainz</p>");
								?>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title" style="text-align:center"><i class="fa fa-bank fa-fw"></i><b> Saved This Year </b><i class="fa fa-bank fa-fw"></i></h3>
								</div>
								<div class="panel-body money-saved">
								<?php
									$query = "Select SUM(Total) from (Select 
												  Sum(splits.value_num) as Total, 
												  accounts.account_type 
												From 
												  splits Inner Join 
												  accounts On accounts.guid = splits.account_guid Inner Join 
												  transactions On splits.tx_guid = transactions.guid 
												Where 
												  transactions.post_date >= date_trunc('year', CURRENT_DATE) 
												Group By 
												  accounts.account_type 
												Having 
												  accounts.account_type Not In ('EXPENSE', 'INCOME') 
												Order By 
												  accounts.account_type ) as TotalSaved";
									$res_account_value_year = pg_query($dbconn,$query);
									$YearlyGainz = pg_fetch_row($res_account_value_year);
									$YearlyGainz = (intval($YearlyGainz[0])/100);
									echo("<p>$$YearlyGainz</p>");
								?>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title" style="text-align:center"><i class="fa fa-bank fa-fw"></i><b> Total Saved </b><i class="fa fa-bank fa-fw"></i></h3>
								</div>
								<div class="panel-body money-saved">
								<?php
									$query = "Select SUM(Total) from (Select 
												  Sum(splits.value_num) as Total, 
												  accounts.account_type 
												From 
												  splits Inner Join 
												  accounts On accounts.guid = splits.account_guid Inner Join 
												  transactions On splits.tx_guid = transactions.guid  
												Group By 
												  accounts.account_type 
												Having 
												  accounts.account_type Not In ('EXPENSE', 'INCOME') 
												Order By 
												  accounts.account_type ) as TotalSaved";
									$res_account_value_total = pg_query($dbconn,$query);
									$TotalGainz = pg_fetch_row($res_account_value_total);
									$TotalGainz = (intval($TotalGainz[0])/100);
									echo("<p>$$TotalGainz</p>");
								?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i><b> Monthly Expense Breakdown</b></h3>
							</div>
							<div class="panel-body">
								<div id="expense-bar"></div>
								<div class="text-right">
									<a href="../pages/blank-page.html">View Details<i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
                    <div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-money fa-fw"></i><b> Transactions Panel </b></h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped">
									<?php
										echo("<thead>");
										echo("<tr>
										<th>Date</th><th>Description</th><th>Amount</th></tr>");
										echo("</thead>");
										
										#Select the Transaction GUID, PostDate, Description, and Value of each transaction.
										$query = "SELECT public.Transactions.guid, public.Transactions.post_date, public.Transactions.description, public.Splits.value_num, public.Splits.value_denom
										FROM public.Transactions
										INNER JOIN public.Splits ON public.Transactions.guid=public.Splits.tx_guid
										ORDER BY public.transactions.post_date DESC";
										$res_trans = pg_query($dbconn, $query);
										echo("<tbody>");
										
										#Grab an array of rows of transactions, then create a table entry for each row
										while ($row = pg_fetch_row($res_trans)) {
											
											#Start new table row (aka new transaction)
											#Enter row details, for value only show the positive values for each account (splits is balanced with positive + negative transactions)
											echo("<tr>");
											$date = date('Y-m-d', strtotime($row[1]));	
											$value = $row[3]/$row[4];
											if ((int)$value > 0){
												echo("<td>$date</td>");
												echo("<td>$row[2]</td>");
												echo("<td>$$value</td>");
											}
											#End of row
											echo("</tr>\n");
										}
										echo("</tbody>");
									?>
								</table>
							</div>
							<div class="text-right">
								<a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
                </div>
				
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	
	<!-- ChartJS Charts JavaScript -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>-->
	
	<script>
	<!-- Generate data from PostgreSQL, ready for JSON accepting Charts/Graphs -->
	<!-- Generate Bargraph Array -->
	<?php
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
	$res_accounts_list = pg_query($dbconn, $query);
	while ($account = pg_fetch_row($res_accounts_list)) {

		#Find the total value of each account and add to array.
		$total_value = (intval($account[3])/100);
		
		$bargraph_inner_array[account]=$account[1];
		$bargraph_inner_array[value]=$total_value;
		
		#Add the array with the current account name + value to the main bargraph array.
		$bargraph_array[] = $bargraph_inner_array;
	}
	#Sort the Bar Graph Array in descending account value
	usort($bargraph_array, function($b, $a) {
		return $a['value'] - $b['value'];
	});
	?>
	<!-- End Generate Bargraph Array -->
	
	<!-- Custom Morris Charts JavaScript -->
	Morris.Bar({
  element: 'expense-bar',
  data: <?php echo json_encode($bargraph_array);?>,
  xkey: ['account'],
  ykeys: ['value'],
  labels: ['Account Value'],
  resize: true,
  gridTextSize: 12,
  gridTextWeight: 'bold',
  xLabelMargin: 7
});

	</script>

</body>

</html>
