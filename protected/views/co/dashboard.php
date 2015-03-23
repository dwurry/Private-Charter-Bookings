<?php
/* @var $this CoController */
/* @var $dataProvider CActiveDataProvider */

$cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/jqvmap/jqvmap/jqvmap.css');
$cs->registerCssFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/morris/morris.css');
$cs->registerCssFile(Yii::app()->request->baseUrl . '/themes/met/admin/pages/css/tasks.css');
$cs->registerCssFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/fullcalendar/fullcalendar.min.css');
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/flot/jquery.flot.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/flot/jquery.flot.resize.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/flot/jquery.flot.categories.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/jquery.pulsate.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/bootstrap-daterangepicker/moment.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/bootstrap-daterangepicker/daterangepicker.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/fullcalendar/fullcalendar.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/plugins/jquery.sparkline.min.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/scripts/metronic.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/admin/layout2/scripts/layout.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/admin/layout2/scripts/demo.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/admin/pages/scripts/index.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/admin/pages/scripts/tasks.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/admin/pages/scripts/calendar.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/themes/met/global/pagescripts/opDashboard.js', CClientScript::POS_END);

?>

<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
	<div class="container">
		<!-- BEGIN PAGE CONTENT INNER -->
		<!-- BEGIN DASHBOARD STATS -->
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat blue-madison">
					<div class="visual">
						<i class="fa fa-plane"></i>
					</div>
					<div class="details">
						<div class="number">49</div>
						<div class="desc">Flights Completed</div>
					</div>
					<a class="more" href="#"> <i class=""></i>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat red-intense">
					<div class="visual">
						<i class="fa fa-usd"></i>
					</div>
					<div class="details">
						<div class="number">$1,715,435</div>
						<div class="desc">Total Revenue</div>
					</div>
					<a class="more" href="#"><i class=""></i> </a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat green-haze">
					<div class="visual">
						<i class="fa fa-check"></i>
					</div>
					<div class="details">
						<div class="number">13</div>
						<div class="desc">Pending Flights</div>
					</div>
					<a class="more" href="#"> <i class=""></i>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat purple-plum">
					<div class="visual">
						<i class="fa fa-bank"></i>
					</div>
					<div class="details">
						<div class="number">$420,645</div>
						<div class="desc">Pending Revenue</div>
					</div>
					<a class="more" href="#"> <i class=""></i>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat blue-madison">
					<div class="visual">
						<i class="fa fa-bullhorn"></i>
					</div>
					<div class="details">
						<div class="number">123</div>
						<div class="desc">Quotes Submitted</div>
					</div>
					<a class="more" href="#"> <i class=""></i>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat red-intense">
					<div class="visual">
						<i class="fa fa-bar-chart-o"></i>
					</div>
					<div class="details">
						<div class="number">$463,167</div>
						<div class="desc">Estimated Profit</div>
					</div>
					<a class="more" href="#"><i class=""></i> </a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat green-haze">
					<div class="visual">
						<i class="fa fa-user"></i>
					</div>
					<div class="details">
						<div class="number">3</div>
						<div class="desc">New Customers</div>
					</div>
					<a class="more" href="#"> <i class=""></i>
					</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat purple-plum">
					<div class="visual">
						<i class="fa fa-gears"></i>
					</div>
					<div class="details">
						<div class="number">$27,534</div>
						<div class="desc">Average Flight Price</div>
					</div>
					<a class="more" href="#"> <i class=""></i>
					</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6 col-sm-6">
				<div class="portlet light ">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-cursor font-purple-intense hide"></i> <span
								class="caption-subject font-purple-intense bold uppercase">Booking
								Ratios</span>
						</div>
					</div>
					<div class="portlet-body">
						<div class="row">
							<div class="col-md-4">
								<div class="easy-pie-chart">
									<div class="number transactions" data-percent="55">
										<span> 40 </span> %
									</div>
									<a class="title" href="#"> Booking Rate </a>
								</div>
							</div>
							<div class="margin-bottom-10 visible-sm"></div>
							<div class="col-md-4">
								<div class="easy-pie-chart">
									<div class="number visits" data-percent="85">
										<span> 27 </span> %
									</div>
									<a class="title" href="#"> Margin </a>
								</div>
							</div>
							<div class="margin-bottom-10 visible-sm"></div>
							<div class="col-md-4">
								<div class="easy-pie-chart">
									<div class="number bounce" data-percent="46">
										<span> 13 </span> %
									</div>
									<a class="title" href="#"> Booking Growth </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-cursor font-purple-intense hide"></i> <span
									class="caption-subject font-purple-intense bold uppercase">Financial
									Ratios</span>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number transactions" data-percent="55">
											<span> +55 </span> %
										</div>
										<a class="title" href="#"> Sales Growth </a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm"></div>
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number visits" data-percent="85">
											<span> +85 </span> %
										</div>
										<a class="title" href="#"> Returning Customers </a>
									</div>
								</div>
								<div class="margin-bottom-10 visible-sm"></div>
								<div class="col-md-4">
									<div class="easy-pie-chart">
										<div class="number bounce" data-percent="46">
											<span> -46 </span> %
										</div>
										<a class="title" href="#"> Customer Growth </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END DASHBOARD STATS -->
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<!-- BEGIN PORTLET-->
				<div class="portlet light tasks-widget">
					<div class="portlet-title">
						<div class="caption caption-md">
							<i class="icon-bar-chart theme-font hide"></i> <span
								class="caption-subject theme-font bold uppercase">Confirmed
								Flights</span> <span class="caption-helper">16</span>
						</div>
						<div class="inputs">
							<div class="portlet-input input-small input-inline"></div>
						</div>
					</div>
					<div class="portlet-body">
						<div class="task-content">
							<div class="scroller" style="height: 315px;"
								data-always-visible="1" data-rail-visible1="0"
								data-handle-color="#D7DCE2">
								<!-- START TASK LIST -->
								<ul class="task-list">
									<li>
										<div class="task-checkbox">
											<input type="hidden" value="1" name="test" /> <input
												type="checkbox" class="liChild" value="2" name="test" />
										</div>
										<div class="task-title">
											<span class="task-title-sp"> Los Angeles - San Francisco :
												March 15, 2015 </span> <span
												class="label label-sm label-success">Cessna 172</span> </span>
										</div>
										<div class="task-config">
											<div class="task-config-btn btn-group">
												<a class="btn btn-xs default" href="javascript:;"
													data-toggle="dropdown" data-hover="dropdown"
													data-close-others="true"> <i class="fa fa-cog"></i><i
													class="fa fa-angle-down"></i>

												</a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:;"> <i class="fa fa-check"></i>
															Complete
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-pencil"></i>
															Edit
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-trash-o"></i>
															Cancel
													</a></li>
												</ul>
											</div>
										</div>
									</li>
									<li>
										<div class="task-checkbox">
											<input type="checkbox" class="liChild" value="" />
										</div>
										<div class="task-title">
											<span class="task-title-sp"> San Francisco - Truckee : March
												17, 2015 </span> <span class="label label-sm label-danger">TBM
												850</span>
										</div>
										<div class="task-config">
											<div class="task-config-btn btn-group">
												<a class="btn btn-xs default" href="javascript:;"
													data-toggle="dropdown" data-hover="dropdown"
													data-close-others="true"> <i class="fa fa-cog"></i><i
													class="fa fa-angle-down"></i>
												</a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:;"> <i class="fa fa-check"></i>
															Complete
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-pencil"></i>
															Edit
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-trash-o"></i>
															Cancel
													</a></li>
												</ul>
											</div>
										</div>
									</li>
									<li>
										<div class="task-checkbox">
											<input type="checkbox" class="liChild" value="" />
										</div>
										<div class="task-title">
											<span class="task-title-sp"> San Francisco - Los Angeles :
												March 17, 2015 </span> <span
												class="label label-sm label-success">Cessna 172</span> </span>
										</div>
										<div class="task-config">
											<div class="task-config-btn btn-group">
												<a class="btn btn-xs default" href="javascript:;"
													data-toggle="dropdown" data-hover="dropdown"
													data-close-others="true"> <i class="fa fa-cog"></i><i
													class="fa fa-angle-down"></i>
												</a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:;"> <i class="fa fa-check"></i>
															Complete
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-pencil"></i>
															Edit
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-trash-o"></i>
															Cancel
													</a></li>
												</ul>
											</div>
										</div>
									</li>
									<li>
										<div class="task-checkbox">
											<input type="checkbox" class="liChild" value="" />
										</div>
										<div class="task-title">
											<span class="task-title-sp"> Phoenix - Denver : March 18,
												2015 </span> <span class="label label-sm label-warning">Citation
												Mustang</span>
										</div>
										<div class="task-config">
											<div class="task-config-btn btn-group">
												<a class="btn btn-xs default" href="javascript:;"
													data-toggle="dropdown" data-hover="dropdown"
													data-close-others="true"> <i class="fa fa-cog"></i><i
													class="fa fa-angle-down"></i>
												</a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:;"> <i class="fa fa-check"></i>
															Complete
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-pencil"></i>
															Edit
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-trash-o"></i>
															Cancel
													</a></li>
												</ul>
											</div>
										</div>
									</li>
									<li>
										<div class="task-checkbox">
											<input type="checkbox" class="liChild" value="" />
										</div>
										<div class="task-title">
											<span class="task-title-sp"> San Francisco - Napa Valley :
												March 19, 2015 </span> <span
												class="label label-sm label-warning">Citation Mustang</span>
										</div>
										<div class="task-config">
											<div class="task-config-btn btn-group">
												<a class="btn btn-xs default" href="javascript:;"
													data-toggle="dropdown" data-hover="dropdown"
													data-close-others="true"> <i class="fa fa-cog"></i><i
													class="fa fa-angle-down"></i>
												</a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:;"> <i class="fa fa-check"></i>
															Complete
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-pencil"></i>
															Edit
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-trash-o"></i>
															Cancel
													</a></li>
												</ul>
											</div>
										</div>
									</li>
									<li>
										<div class="task-checkbox">
											<input type="checkbox" class="liChild" value="" />
										</div>
										<div class="task-title">
											<span class="task-title-sp"> Seattle - Portland : March 19,
												2015 </span> <span class="label label-sm label-danger">TBM
												850</span>
										</div>
										<div class="task-config">
											<div class="task-config-btn btn-group">
												<a class="btn btn-xs default" href="javascript:;"
													data-toggle="dropdown" data-hover="dropdown"
													data-close-others="true"> <i class="fa fa-cog"></i><i
													class="fa fa-angle-down"></i>
												</a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:;"> <i class="fa fa-check"></i>
															Complete
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-pencil"></i>
															Edit
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-trash-o"></i>
															Cancel
													</a></li>
												</ul>
											</div>
										</div>
									</li>
									<li>
										<div class="task-checkbox">
											<input type="checkbox" class="liChild" value="" />
										</div>
										<div class="task-title">
											<span class="task-title-sp"> San Francisco - Chicago : April
												1, 2015 </span> <span class="label label-sm label-default">Citation
												X</span> </span>
										</div>
										<div class="task-config">
											<div class="task-config-btn btn-group">
												<a class="btn btn-xs default" href="javascript:;"
													data-toggle="dropdown" data-hover="dropdown"
													data-close-others="true"> <i class="fa fa-cog"></i><i
													class="fa fa-angle-down"></i>
												</a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:;"> <i class="fa fa-check"></i>
															Complete
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-pencil"></i>
															Edit
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-trash-o"></i>
															Cancel
													</a></li>
												</ul>
											</div>
										</div>
									</li>
									<li>
										<div class="task-checkbox">
											<input type="checkbox" class="liChild" value="" />
										</div>
										<div class="task-title">
											<span class="task-title-sp"> Salt Lake City - Portland :
												March 28, 2015 </span> <span
												class="label label-sm label-success">Cessna 172</span> </span>
										</div>
										<div class="task-config">
											<div class="task-config-btn btn-group">
												<a class="btn btn-xs default" href="javascript:;"
													data-toggle="dropdown" data-hover="dropdown"
													data-close-others="true"> <i class="fa fa-cog"></i><i
													class="fa fa-angle-down"></i>
												</a>
												<ul class="dropdown-menu pull-right">
													<li><a href="javascript:;"> <i class="fa fa-check"></i>
															Complete
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-pencil"></i>
															Edit
													</a></li>
													<li><a href="javascript:;"> <i class="fa fa-trash-o"></i>
															Cancel
													</a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
								<!-- END START TASK LIST -->
							</div>
						</div>
						<div class="task-footer">
							<div class="btn-arrow-link pull-right">
								<a href="javascript:;">See All Tasks</a>
							</div>
						</div>
					</div>
				</div>
				<!-- END PORTLET-->
			</div>
			<div class="col-md-6 col-sm-6">
				<!-- BEGIN PORTLET-->
				<div class="portlet light">
					<div class="portlet-title tabbable-line">
						<div class="caption caption-md">
							<i class="icon-globe theme-font hide"></i> <span
								class="caption-subject theme-font bold uppercase">Sales Pipeline</span>
						</div>
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab_1_2" data-toggle="tab"> New</a>
							</li>
							<li><a href="#tab_1_2" data-toggle="tab"> Sent </a></li>
							<li><a href="#tab_1_2" data-toggle="tab"> Pending</a></li>
							<li><a href="#tab_1_2" data-toggle="tab"> Completed </a></li>
						</ul>
					</div>
					<div class="portlet-body">
						<!--BEGIN TABS-->
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="scroller" style="height: 337px;"
									data-always-visible="1" data-rail-visible1="0"
									data-handle-color="#D7DCE2">
									<ul class="feeds">
										<li><a href="operator_quote_outline.html">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-warning">
																<i class="fa fa-plus"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																<strong>New Quote</strong> / Phoenix - Seattle April 7,
																2015 <span class="label label-sm label-info"> Take
																	action <i class="fa fa-share"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">Just now</div>
												</div> <a /></li>
										<li><a href="operator_quote_outline.html">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-warning">
																<i class="fa fa-plus"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																<strong>New Quote</strong> / Los Angeles - Seattle April
																25, 2015 <span class="label label-sm label-info"> Take
																	action <i class="fa fa-share"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">20 mins</div>
												</div>
										</a></li>
										<li><a href="operator_quote_outline.html">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-warning">
																<i class="fa fa-plus"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																<strong>New Quote</strong> / New York - Chicago April
																17, 2015 <span class="label label-sm label-info"> Take
																	action <i class="fa fa-share"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">24 mins</div>
												</div></li>
										<li><a href="operator_quote_outline.html">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-warning">
																<i class="fa fa-plus"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																<strong>New Quote</strong> / Chicago - Miami May 2, 2015
																<span class="label label-sm label-info"> Take action <i
																	class="fa fa-share"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">30 mins</div>
												</div></li>
										<li><a href="operator_quote_outline.html">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-warning">
																<i class="fa fa-plus"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																<strong>New Quote</strong> / Denver - Houston April 3,
																2015 <span class="label label-sm label-info"> Take
																	action <i class="fa fa-share"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
												<div class="col2">
													<div class="date">40 mins</div>
												</div></li>
										<li><a href="operator_quote_outline.html">
												<div class="col1">
													<div class="cont">
														<div class="cont-col1">
															<div class="label label-sm label-warning">
																<i class="fa fa-plus"></i>
															</div>
														</div>
														<div class="cont-col2">
															<div class="desc">
																<strong>New Quote</strong> / Atlanta - Orlando June 13,
																2015 <span class="label label-sm label-info"> Take
																	action <i class="fa fa-share"></i>
																</span>
															</div>
														</div>
													</div>
												</div>
										</a>
											<div class="col2">
												<div class="date">1.5 hours</div>
											</div></li>
								
								</div>
							</div>
						</div>
						<!--END TABS-->
					</div>
				</div>
				<!-- END PORTLET-->
			</div>


			<!-- Calendar -->
			<div class="row">
				<div class="col-md-12">
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<span class="caption-subject them-font bold uppercase">Calendar</span>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-3 col-sm-12">
									<!-- BEGIN DRAGGABLE EVENTS PORTLET-->
									<h3 class="event-form-title">Draggable Events</h3>
									<div id="external-events">
										<form class="inline-form">
											<input type="text" value="" class="form-control"
												placeholder="Event Title..." id="event_title" /><br /> <a
												href="javascript:;" id="event_add" class="btn default"> Add
												Event </a>
										</form>
										<hr />
										<div id="event_box"></div>
										<label for="drop-remove"> <input type="checkbox"
											id="drop-remove" />remove after drop
										</label>
										<hr class="visible-xs" />
									</div>
									<!-- END DRAGGABLE EVENTS PORTLET-->
								</div>
								<div class="col-md-9 col-sm-12">
									<div id="calendar" class="has-toolbar"></div>
								</div>
							</div>
							<!-- END CALENDAR PORTLET-->
						</div>
					</div>
				</div>
			</div>
			<!-- Calendar -->
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->