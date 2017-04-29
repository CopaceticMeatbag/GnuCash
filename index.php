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
	
	<!-- JTable Tables CSS -->
	<link href="js/plugins/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- JTable Tables JavaScript -->
	<script src="js/plugins/jtable/jquery.jtable.min.js"></script>
	
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
	
	<!-- ChartJS Charts JavaScript -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>-->

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Load PHP Sources -->
	<?php require_once('data/ExpenseData.php');?>
	
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
							<div id="TransactionsTableContainer">
							<script type="text/javascript">
								$(document).ready(function () {

									//Prepare jTable
									$('#TransactionsTableContainer').jtable({
										title: 'Table of Transactions',
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
											post_date: {
												title: 'Date',
												type: 'date',
												width: '20%',
												edit: false,
											},
											description: {
												title: 'Description',
												width: '30%',
												edit: false
											},
											value_num: {
												title: 'Value',
												width: '20%',
												create: false,
												edit: false
											},
											value_denom: {
												list: false,
												create: false,
												edit: false
											}
										}
									});
									
									$('#TransactionsTableContainer').jtable('load');
								});
							</script>
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
	<script>
	<!-- Custom Morris Charts JavaScript -->
	Morris.Bar({
	  element: 'expense-bar',
	  data: <?php echo json_encode(graph_data());?>,
	  xkey: ['account'],
	  ykeys: ['value','budget','placeholder'],
	  labels: ['Account Value','Budget Remaining','Total Budget'],
	  resize: true,
	  gridTextSize: 12,
	  gridTextWeight: 'bold',
	  xLabelMargin: 7,
	  preUnits: "$",
	  stacked: true,
	  hoverCallback: function (index, options, content, row) {
		var txtToReplace = $(content)[3].textContent;
		var text =  '<div>Total Budget: $' + options.data[index].total_budget + '</div>';
		return content.replace(txtToReplace, text);
  }
	});
	</script>
</body>
</html>