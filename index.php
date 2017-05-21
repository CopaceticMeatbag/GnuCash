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
	
	<!-- JTable CSS -->
	<link href="js/plugins/jtable/themes/lightcolor/gray/jtable.css" rel="stylesheet" type="text/css" />
	
	<!-- jQuery ui CSS -->
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css" type="text/css" rel="stylesheet" />

	
	<!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- JTable JavaScript -->
	<script src="js/plugins/jtable/jquery.jtable.js"></script>
	
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
	
	<!-- ChartJS Charts JavaScript -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>-->

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Load PHP Sources -->
	<?php
	require_once('data/ExpenseData.php');
	require_once('data/TableData.php');
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
                <a class="navbar-brand" href="index.php">GnuCash Accounting</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Copacetic Meatbag <b class="caret"></b></a>
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
                        <a href="pages/blank-page.html"><i class="fa fa-fw fa-file"></i> View Transactions</a>
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
									$Gainz = money_saved('month');
									echo("<p>$$Gainz</p>");
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
									$Gainz = money_saved('year');
									echo("<p>$$Gainz</p>");
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
									$Gainz = money_saved('total');
									echo("<p>$$Gainz</p>");
								?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i><b> Monthly Expense Breakdown </b>    $<?php echo budget_data('howsitgoin');?> remaining in budget</h3>
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
							<div class="row"><!-- style="max-height:460px;overflow:auto;">-->
								<div id="TransactionsTable" class="TransactionsTable">
								</div>
							</div>
							<script type="text/javascript">
							
								$(document).ready(function () {
									
									//Prepare jTable
									$('#TransactionsTable').jtable({
										title: 'Transactions',
										defaultDateFormat: 'dd-mm-yy',
										defaultSorting: 'date DESC',
										paging: 'false',
										actions: {
											listAction: 'data/TableData.php?action=list',
											createAction: 'data/TableData.php?action=create',
											updateAction: 'data/TableData.php?action=update',
											deleteAction: 'data/TableData.php?action=delete'
										},
										fields: {
											guid: {
												key: true,
												create: false,
												edit: false,
												list: false
											},
											date: {
												title: 'Date',
												width: '20%',
												type: 'date'
											},
											description: {
												title: 'Description',
												width: '40%'
											},
											value_num: {
												create: false,
												edit: false,
												list: false
											},
											value_denom: {
												create: false,
												edit: false,
												list: false
											},
											value: {
												title: 'Value',
												width: '30%',
												create: true,
												edit: true
											}
										}
									});

									//Load person list from server
									$('#TransactionsTable').jtable('load');
								});
								
							</script>
							<div class="row">
							<div class="text-right">
								<a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
							</div>
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
	<script>
	<!-- Custom Morris Charts JavaScript -->
	Morris.Bar({
	  element: 'expense-bar',
	  data: <?php echo budget_data("graph");?>,
	  xkey: ['account'],
	  //We can't directly reference the total_budget key (or else a new bar would be created). Instead we populate programatically in our hoverCallback.
	  ykeys: ['value','totalBudgetPlaceholder','budget'],			
	  labels: ['Account Value','Total Budget','Budget Remaining'],
	  resize: true,
	  gridTextSize: 12,
	  gridTextWeight: 'bold',
	  xLabelMargin: 7,
	  preUnits: "$",
	  stacked: true,
	  hoverCallback: function (index, options, content, row) {
		
		//red if over budget
		if (options.data[index].budget < 0 && options.data[index].total_budget > 0){
			var colour = "#770000"; 	
			var budget="Over Budget By: -$"+-1*options.data[index].budget;
		}
		//purple if no budget is set
		else if (options.data[index].budget < 0 && options.data[index].total_budget == 0){
			var colour = "#800080";
			var budget="No Budget Set: -$"+-1*options.data[index].budget;
		}
		//green if not over budget
		else{
			var colour = "#006600"; 	
			var budget="Budget Remaining: $"+options.data[index].budget;
		}
		
		var txtToReplace = $(content)[2].textContent;
		var text = "<div class='morris-hover-point' style='color: #7a92a3'>Total Budget: $"+ options.data[index].total_budget + "</div>";
		content = content.replace(txtToReplace, text);
		var txtToReplace = $(content)[3].textContent;
		var text = "<div class='morris-hover-point' style='color: "+colour+"'>" + budget + "</div>";
		content = content.replace(txtToReplace, text);
		return (content);
	  },
	  barColors: function(row, series, type) {
//		console.log(series, row);
		if(series.key == 'budget')
		  {
			if(row.y < 0)
			  return "#770000"; //over budget red
			else
			  return "#7a92a3";  //under budget grey
		  }
		  else
		  {
			return "#0b62a4"; //standard colour blue
		  }
	  }
	});
	</script>
</body>
</html>