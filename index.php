<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!--<link href="css/plugins/morris.css" rel="stylesheet">-->

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Mike Anthony <b class="caret"></b></a>
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
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
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
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
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
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i>Expenses</h3>
                            </div>
                            <div class="panel-body">
                                <div id="expense-bar"></div>
                                <div class="text-right">
                                    <a href="#">View Details<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <?php
											echo("<table class='table table-striped table-hover table-responsive' border=2>\n");
											echo("<thead class='thead-default'>");
											echo("<tr><th>Date</th><th>Description</th><th>Amount</th></tr>");
											echo("</thead>");
											$query = "select guid,post_date,description from public.transactions ORDER BY post_date DESC";
											$res_trans = pg_query($dbconn, $query);
											echo("<tbody>");
											
											#Grab an array of rows of transactions, then create a table entry for each row
											while ($row = pg_fetch_row($res_trans)) {
												
												#Start new table row (aka new transaction)
												echo("<tr>");
												$date = date('Y-m-d', strtotime($row[1]));
												#Add the values we have already (Date and Description)
												echo("<td>$date</td>");
												echo("<td>$row[2]</td>");
												
												#Get the value for the transation
												$query = "select value_num,value_denom from public.splits WHERE tx_guid = ('$row[0]')";
												
												#res_splits now contains a list of values for each transaction
												$res_splits = pg_query($dbconn,$query);
												
												#Grab the value and add it to the current table row
												while ($sec_row = pg_fetch_row($res_splits)) {
													
													#Only show the positive values for each account (splits is balanced with positive + negative transactions)
													$value = $sec_row[0]/$sec_row[1];
													if ((int)$value > 0){
														echo("<td>$$value</td>");
													}
												}
												#Move on to next row
												echo("</tr>\n");
											}
											echo("</tbody>");
											echo("</table>");
										?>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-12">
						<div id="pieChart" style="width:600px;height:300px"></div>
					</div>
                </div>
				
                <!-- /.row -->
				<div class="row">
					
				</div>

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
	
	<!-- Flot Charts JavaScript -->
	<script src="js/plugins/flot/jquery.flot.js"></script>
	<script src="js/plugins/flot/jquery.flot.pie.js"></script>
	
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
	
	<!-- Generate data from PostgreSQL, ready for Morris and Flot Charts/Graphs -->
	<!-- Generate Bargraph Array -->
	<?php
	$bargraph_inner_array = array();
	$bargraph_array = array();
	$piegraph_inner_array = array();
	$piegraph_array = array();
	$emptyParentGUID = "74a4f183da91fccda3bcef482a5cc821";
	
	#Iterate through the list of Expense Accounts 
	$query = "SELECT guid,name,parent_guid FROM public.accounts WHERE account_type = 'EXPENSE'";
	$res_accounts_list = pg_query($dbconn, $query);
	while ($account = pg_fetch_row($res_accounts_list)) {

		#Find the total value of each account and add to array.
		if($account[2] != $emptyParentGUID) {
			$query = "SELECT SUM(value_num) FROM public.splits WHERE account_guid = ('$account[0]') AND value_num > 0";
			$res_account_value = pg_query($dbconn, $query);
			$value = pg_fetch_row($res_account_value);

			#If the Expense Account isn't at $0, format and add to bargraph_inner_array.
			if ($value[0] != NULL){
				$total_value = (intval($value[0])/100);
				
				$bargraph_inner_array[account]=$account[1];#\n$total_value
				$bargraph_inner_array[value]=$total_value;
				$piegraph_inner_array[label]=$account[1];
				$piegraph_inner_array[data]=$total_value;
				
				#Add the array with the current account name + value to the main bargraph array.
				$bargraph_array[] = $bargraph_inner_array;
				$piegraph_array[] = $piegraph_inner_array;
			}
		}
	}
	#Sort the array in descending account value
	usort($bargraph_array, function($b, $a) {
		return $a['value'] - $b['value'];
	});
	?>
	<!-- End Generate Bargraph Array -->
	
	<!-- Generate Piechart Array -->
	<?php
	?>
	<!-- End Generate Piechart Array -->
	
	<!-- Custom Flot Charts JavaScript -->
	<script type="text/javascript">
	$.plot('#pieChart',<?php echo json_encode($piegraph_array);?>, {
    series: {
        pie: {
            show: true
        }
    }
});
	<!-- Custom Morris Charts JavaScript -->
	Morris.Bar({
  element: 'expense-bar',
  data: <?php echo json_encode($bargraph_array);?>,
  xkey: ['account'],
  ykeys: ['value'],
  labels: ['Account Value'],
  resize: true,
  gridTextSize: 12,
  xLabelMargin: 9
});


	</script>

</body>

</html>
