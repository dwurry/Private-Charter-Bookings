<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link
	href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/simple-line-icons/simple-line-icons.min.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/bootstrap/css/bootstrap.min.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/uniform/css/uniform.default.css"
	rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<meta content="" name="description" />
<meta content="" name="author" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<!-- BEGIN THEME STYLES -->
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/css/components.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/css/plugins.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/admin/layout3/css/layout.css"
	rel="stylesheet" type="text/css">
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/admin/layout3/css/themes/default.css"
	rel="stylesheet" type="text/css" id="style_color">
<link
	href="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/admin/layout3/css/custom.css"
	rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8">

<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>

	<!-- BEGIN HEADER -->
	<div class="page-header">
		<!-- BEGIN HEADER TOP -->
		<div class="page-header-top">
			<div class="container">
				<!-- BEGIN LOGO -->
				<div class="page-logo">
			<?php
			// if broker
			$user = User::model()->findByPk(Yii::app()->user->getId());
			$id = '-1';
			if($user->auth_level == User::USER_OP){
				$type = UploadImage::LOGO_OP;
				$id = $user->operator_id;
			}elseif($user->auth_level == User::USER_BR){
				$broker = BrokerSettings::model()->findByAttributes(array('user_id'=>$user->id));
				$type = UploadImage::LOGO_BR;
				$id = $broker->id;
			}else{
				if(isset($quote)){
					$id = $quote . broker_id;
				}elseif(isset($bid)){
					$id = $bid . broker_id;
				}
				$type = UploadImage::LOGO_BR;
			}
			$logoUrl = UploadImage::getImageUrl($id, $type, 150, 150);
			?>
				<a href="index.html"><img src="<?php echo $logoUrl;?>" alt="logo"
						class="logo-default"></a>
				</div>
				<!-- END LOGO -->
<?php
if(!Yii::app()->user->isGuest):
	?>
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="menu-toggler"></a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<!-- BEGIN NOTIFICATION DROPDOWN -->
						<li
							class="dropdown dropdown-extended dropdown-dark dropdown-notification"
							id="header_notification_bar"><a href="javascript:;"
							class="dropdown-toggle" data-toggle="dropdown"
							data-hover="dropdown" data-close-others="true"> <i
								class="icon-bell"></i> <span class="badge badge-default">7</span>
						</a>
							<ul class="dropdown-menu">
								<li class="external">
									<h3>
										You have <strong>12 pending</strong> tasks
									</h3> <a href="javascript:;">view all</a>
								</li>
								<li>
									<ul class="dropdown-menu-list scroller" style="height: 250px;"
										data-handle-color="#637283">
										<li><a href="javascript:;"> <span class="time">just now</span>
												<span class="details"> <span
													class="label label-sm label-icon label-success"> <i
														class="fa fa-plus"></i>
												</span> New user registered.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">3 mins</span> <span
												class="details"> <span
													class="label label-sm label-icon label-danger"> <i
														class="fa fa-bolt"></i>
												</span> Server #12 overloaded.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">10 mins</span>
												<span class="details"> <span
													class="label label-sm label-icon label-warning"> <i
														class="fa fa-bell-o"></i>
												</span> Server #2 not responding.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">14 hrs</span> <span
												class="details"> <span
													class="label label-sm label-icon label-info"> <i
														class="fa fa-bullhorn"></i>
												</span> Application error.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">2 days</span> <span
												class="details"> <span
													class="label label-sm label-icon label-danger"> <i
														class="fa fa-bolt"></i>
												</span> Database overloaded 68%.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">3 days</span> <span
												class="details"> <span
													class="label label-sm label-icon label-danger"> <i
														class="fa fa-bolt"></i>
												</span> A user IP blocked.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">4 days</span> <span
												class="details"> <span
													class="label label-sm label-icon label-warning"> <i
														class="fa fa-bell-o"></i>
												</span> Storage Server #4 not responding dfdfdfd.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">5 days</span> <span
												class="details"> <span
													class="label label-sm label-icon label-info"> <i
														class="fa fa-bullhorn"></i>
												</span> System Error.
											</span>
										</a></li>
										<li><a href="javascript:;"> <span class="time">9 days</span> <span
												class="details"> <span
													class="label label-sm label-icon label-danger"> <i
														class="fa fa-bolt"></i>
												</span> Storage server failed.
											</span>
										</a></li>
									</ul>
								</li>
							</ul></li>
						<!-- END NOTIFICATION DROPDOWN -->

						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown dropdown-user dropdown-dark"><a
							href="javascript:;" class="dropdown-toggle"
							data-toggle="dropdown" data-hover="dropdown"
							data-close-others="true">
						<?php $logoUrl = UploadImage::getImageUrl($user->id, 'picture', 75, 150);?>
						<img alt="" class="img-circle" src="<?php echo $logoUrl; ?>"> <span
								class="username username-hide-mobile"><?php echo $user->fname.' '.$user->lname; ?></span>
						</a>
							<ul class="dropdown-menu dropdown-menu-default">
							<?php
	if(!Yii::app()->user->isGuest && Yii::app()->user->level == User::USER_ADMIN){
		?>
							<li><a
									href="<?php echo Yii::app()->request->baseUrl; ?>/admin/index">
										<i class="icon-user"></i> My Profile
								</a></li>
							<?php
	}elseif(!Yii::app()->user->isGuest && Yii::app()->user->level == User::USER_OP){
		?>
                            <li><a
									href="<?php echo Yii::app()->request->baseUrl; ?>/us/editProfile">
										<i class="icon-user"></i> My Profile
								</a></li>
								<li class="divider"></li>
								<li><a
									href="<?php echo Yii::app()->request->baseUrl; ?>/co/updateOperator">
										<i class="icon-user"></i> Edit My Operator
								</a></li>
								<li><a
									href="<?php echo Yii::app()->request->baseUrl; ?>/co/quotes"> <i
										class="icon-user"></i> View Quotes
								</a></li>
                            <?php
	}elseif(!Yii::app()->user->isGuest && Yii::app()->user->level == User::USER_BR){
		?>
                            <li><a
									href="<?php echo Yii::app()->request->baseUrl; ?>/us/editProfile">
										<i class="icon-user"></i> My Profile
								</a></li>
                            <?php
	}elseif(!Yii::app()->user->isGuest && Yii::app()->user->level == User::USER_US){
		?>
                            <li><a
									href="<?php echo Yii::app()->request->baseUrl; ?>/us/editProfile">
										<i class="icon-user"></i> My Profile
								</a></li>
							<?php } ?>
							<li class="divider"></li>
							<?php if(Yii::app()->user->isGuest) { ?>
							<li><a
									href="<?php echo Yii::app()->request->baseUrl; ?>/site/login">
										<i class="icon-key"></i> Log In
								</a></li>
							<?php } ?>
							<?php if(!Yii::app()->user->isGuest) { ?>
							<li><a
									href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">
										<i class="icon-key"></i> Log Out
								</a></li>
							<?php } ?>
						</ul></li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
				</div>
				<!-- END TOP NAVIGATION MENU -->
			</div>
		</div>
		<!-- END HEADER TOP -->
		<!-- BEGIN HEADER MENU -->
		<div class="page-header-menu">
			<div class="container">
				<!-- BEGIN HEADER SEARCH BOX -->
				<form class="search-form" action="extra_search.html" method="GET">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search"
							name="query"> <span class="input-group-btn"> <a
							href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
						</span>
					</div>
				</form>
				<!-- END HEADER SEARCH BOX -->
				<!-- BEGIN MEGA MENU -->
				<!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
				<!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
				<div class="hor-menu ">
					<ul class="nav navbar-nav">
				<?php
	$controller = ($user->auth_level <= User::USER_BR)?'us':'co';
	$dashboard = Yii::app()->createUrl('/' . $controller . '/index');
	?>
					<li class="menu-dropdown"><a href="<?php echo $dashboard;?>">Dashboard</a></li>
						<li class="menu-dropdown"><a
							href="<?php echo Yii::app()->createUrl('/us/newQuote/0');?>"> New
								Quote</a></li>
					<?php
	if($user->auth_level > User::USER_US){
		$customers = Yii::app()->createUrl('/' . $controller . '/customers');
		?>
							<li class="menu-dropdown"><a href="<?php echo $customers;?>">Customers
						</a></li>
					<?php
	}else{
		$customers = Yii::app()->createUrl('/' . $controller . '/customers');
		?>
							<li class="menu-dropdown"><a href="<?php echo $customers;?>">Passenger
						</a></li>
				<?php
	
}
	$finance = Yii::app()->createUrl('/' . $controller . '/finance');
	if($user->auth_level == User::USER_OP){
		$aircraft = Yii::app()->createUrl('/' . $controller . '/aircraft');
		$crew = Yii::app()->createUrl('/' . $controller . '/crew');
		?>								
							<li class="menu-dropdown classic-menu-dropdown "><a
							href="<?php echo $aircraft;?>"> Aircraft </a></li>
						<li class="menu-dropdown mega-menu-dropdown mega-menu-full "><a
							href="<?php echo $crew;?>"> Crew </a></li>
				<?php	} ?>	
					<li class="menu-dropdown mega-menu-dropdown mega-menu-full "><a
							href="<?php echo $finance; ?>"> Finance </a></li>
					</ul>
				</div>
				<!-- END MEGA MENU -->
			</div>
		</div>
		<!-- END HEADER MENU -->
<?php endif; // user is guest -- no header menu ?>
		</div>
	<!-- END HEADER -->

	<!-- BEGIN PAGE CONTAINER -->
	<div class="page-container">
		<!-- BEGIN PAGE HEAD -->
		<div class="page-head">
			<div class="container"></div>
		</div>
		<!-- END PAGE HEAD -->

	<?php echo $content; ?>
	
	</div>
	<!-- END PAGE CONTAINER -->

	<!-- BEGIN FOOTER -->
	<div class="footer"><?php
	date_default_timezone_set(Yii::app()->params['timezone']);
	?>Copyright &copy; <?php echo date('Y'); ?> Private Air Book.  |  All Rights Reserved.<br />
	</div>
	<!-- footer -->
	<!-- END FOOTER -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/respond.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/excanvas.min.js"></script> 
<![endif]-->
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/jquery.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/jquery-migrate.min.js"
		type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/bootstrap/js/bootstrap.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/jquery.blockui.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/jquery.cokie.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/uniform/jquery.uniform.min.js"
		type="text/javascript"></script>
	<script
		src="<?php echo Yii::app()->request->baseUrl; ?>/themes/met/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
		type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
