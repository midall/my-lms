<?php
require '../constants.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
	<!--<![endif]-->

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Michael Nt">
		<meta name="keywords" content="">

		<title><?php echo SITE_NAME; ?> | Documentation by <?php echo AUTHOR; ?></title>

		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/stroke.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css">
		<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<link rel="stylesheet" type="text/css" href="js/syntax-highlighter/styles/shCore.css" media="all">
		<link rel="stylesheet" type="text/css" href="js/syntax-highlighter/styles/shThemeRDark.css" media="all">

		<!-- CUSTOM -->
		<link rel="stylesheet" type="text/css" href="css/custom.css">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>

		<div id="wrapper">

			<div class="container">

				<section id="top" class="section docs-heading">

					<div class="row">
						<div class="col-md-12">
							<div class="big-title text-center">
								<h1><?php echo SITE_NAME; ?></h1>
								<p class="lead">Documentation for the version <?php echo VERSION; ?></p>
							</div>
							<!-- end title -->
						</div>
						<!-- end 12 -->
					</div>
					<!-- end row -->

					<hr>

				</section>
				<!-- end section -->

				<div class="row">

					<div class="col-md-3">
						<nav class="docs-sidebar" data-spy="affix" data-offset-top="300" data-offset-bottom="200" role="navigation">
							<ul class="nav">
								<li><a href="#line1">About the project</a></li>
								<li><a href="#line2">How to Install</a></li>
								<li><a href="#line3">SCORM</a>
									<ul class="nav">
										<li><a href="#line3_1">SCORM &amp; LMS</a></li>
										<li><a href="#line3_2">SCO API methods</a></li>
										<li><a href="#line3_3">SCO API variables</a></li>
									</ul>
								</li>
								<li><a href="#line4">Application</a></li>
								<li><a href="#line5">References</a></li>
								<li><a href="#line6">Version History (Changelog)</a></li>
								<li><a href="#line7">Contact Me</a></li>
							</ul>
						</nav >
					</div>
					<div class="col-md-9">
						<section id="line1" class="welcome">

							<div class="row">
								<div class="col-md-12 left-align">
									<h2 class="dark-text">About the project<hr></h2>
									<div class="row">

										<div class="col-md-12 full">
											<div class="intro1">
												<ul>
													<li><strong>Item Name : </strong><?php echo SITE_NAME; ?></li>
													<li><strong>Item Version : </strong> v <?php echo VERSION; ?></li>
													<li><strong>Author  : </strong> <a href="https://ntallas.eu/" target="_blank"><?php echo AUTHOR; ?></a></li>
													<li><strong>GitHub repository: </strong> <a href="https://github.com/midall/my-lms" target="_blank">My LMS project</a></li>
												</ul>
											</div>

											<hr>
											<div>
												<p>First of all, thank you so much for downloading this repository.
													<strong>You are awesome!</strong>
													<br> You are entitled to get all free lifetime upcoming versions to this product.
												</p>

												<p>This documentation is to help you regarding each step of customization. Please go through the documentation carefully to understand how this
													application is made and how to edit this properly.
													Knowledge of PHP, MySQL, JS, HTML and CSS  is required to customize this application. </p>

												<h4>Test Environment</h4>
												<p>The application has been tested in: (NOT prerequisites)</p>
												<ol>
													<li>Apache 2.4.23</li>
													<li>PHP 5.6.25</li>
													<li>MySQL 5.7.14</li>
												</ol>
												<div class="intro2 clearfix">
													<p><i class="fa fa-exclamation-triangle"></i> Be careful while editing the software. If not edited properly, the functionality may break completely.
														<br> No support is provided for faulty customization.
													</p>
												</div>
												
												<h4>Enhancements</h4>
												<p>The application is using XMLHttpRequest for the database interactions and as future enhancement is to convert those calls using jQuery functionality $.ajax, $.post and $.get</p>
											</div>
										</div>

									</div>
									<!-- end row -->
								</div>
							</div>
						</section>

						<section id="line2" class="section">

							<div class="row">
								<div class="col-md-12 left-align">
									<h2 class="dark-text">How to Install<a href="#top">#back to top</a><hr></h2>
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->
							
							<div class="row">
								<div class="col-md-12">
									<ol>
										<li>Download the package</li>
										<li>Copy-paste them into your web directory (local or remote)</li>
										<li>Run the SQL commands from "database/stracture.sql" in your database server</li>
										<li>Change the credentials/details on file "constants.php"</li>
										<li>Upload your SCORM course on folder "courses"</li>
										<li>Update, if required, link in page "application/rte.php"</li>
									</ol>
								</div>

							</div>

						</section>
						<!-- end section -->

						<section id="line3" class="section">

							<div class="row">
								<div class="col-md-12 left-align">
									<h2 class="dark-text">SCORM <a href="#top">#back to top</a><hr></h2>
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->

							<div class="row">
								<div class="col-md-12">
									<h4 id="line3_1">SCORM &amp; LMS</h4>
									<p>SCORM stands for Sharable Content Object Reference Model and its main purpose is to set the 
										standards and specifications (with one word  compliance ) of interoperability of the content 
										used for electronic educational purpose.</p>
									<p>There most used SCORM versions (from oldest to newest):</p>
									<ol>
										<li>SRORM 1.1</li>
										<li>SRORM 1.2</li>
										<li>SCORM 2004 (3rd and 4th edition)</li>
									</ol>
									<p>The SCORM 2004 4th edition is the latest and it is released on March 2009</p>
									<br />
									<img src="images/upload/flow.png" alt="" class="img-responsive img-thumbnail">
									
									<h4>LMS</h4>
									<p>Learning Management System is the software  that allows to create, manage and track training 
										programs, mostly web-based using guidelines (SCORM).</p>
									<br />
									
									<h4>RTE</h4>
									<p>The Run Time Environment is the mechanism that defines how the SCO will interact with the LMS</p>
									<br />
									
									<h4>CAM</h4>
									<p>SCORM Content Aggregation Model (CAM)  describes the guidelines of how to combine learning content 
										labeled as SCOs in a standardized way for reusability and interoperability.</p>
									<br />
									
									<p>A simple representation of how a LMS is running:</p>
									<img src="images/upload/LMS.png" alt="" class="img-responsive img-thumbnail aligncenter" >
									
									<p>The RTE contains the API (JavaScript standar function – see below) and the SCO (one or many) in one 
										or separate frames. The LMS is interacting with RTE via API functions and manage the input/output 
										data through preset variable (data model).</p>
									<br />
									
									<h4 id="line3_2">SCO API methods</h4>
									<p>This 8 functions must be provided from the API in order for the training course to communicate with the LMS.</p>
									
									<div class="col-md-6">
										<strong>SCORM 1.2</strong>
										<ul>
											<li>API.LMSInitialize("")</li>
											<li>API.LMSFinish("")</li>
											<li>API.LMSGetValue(parameter)</li>
											<li>API.LMSSetValue(parameter, value)</li>
											<li>API.LMSCommit("")</li>
											<li>API.LMSGetLastError()</li>
											<li>API.LMSGetErrorString(errorCode)</li>
											<li>API.LMSGetDiagnostic(errorCode)</li>
										</ul>
									</div>
									
									<br />
									
									<div class="col-md-6">
										<strong>SCORM 2004</strong>
										<ul>
											<li>API.Initialize("")</li>
											<li>API.Terminate("")</li>
											<li>API.GetValue(parameter)</li>
											<li>API.SetValue(parameter, value)</li>
											<li>API.Commit("")</li>
											<li>API.GetLastError()</li>
											<li>API.GetErrorString(errorCode)</li>
											<li>API.GetDiagnostic(errorCode)</li>
										</ul>
									</div>
									
									<br />
									<h4 id="line3_3">SCO API variables</h4>
									<p>There are a lot of variables/parameters used in SCORM, below are the <sgtrong>required</strong> ones</p>
									
									<div class="col-md-3">
										<strong>Variable</strong>
										<ul>
											<li>cmi.core._children</li>
											<li>cmi.core.student_id</li>
											<li>cmi.core.student_name</li>
											<li>cmi.core.lesson_location</li>
											<li>cmi.core.credit</li>
											<li>cmi.core.lesson_status</li>
											<li>cmi.core.entry</li>
											<li>cmi.core.score._children</li>
											<li>cmi.core.score.raw</li>
											<li>cmi.core.total_time</li>
											<li>cmi.core.session_time</li>
											<li>cmi.core.exit</li>
											<li>cmi.suspend_data</li>
											<li>cmi.launch_data</li>
										</ul>
									</div>

									<div class="col-md-2">
										<strong>GET/SET</strong>
										<ul>
											<li>GET</li>
											<li>GET</li>
											<li>GET</li>
											<li>GET/SET</li>
											<li>GET</li>
											<li>GET/SET</li>
											<li>GET</li>
											<li>GET</li>
											<li>GET/SET</li>
											<li>GET</li>
											<li>SET</li>
											<li>SET</li>
											<li>GET/SET</li>
											<li>GET</li>
										</ul>
									</div>

									<div class="col-md-7">
										<strong>Example</strong>
										<ul>
											<li>student_id, lesson_location</li>
											<li>125</li>
											<li>John Wick</li>
											<li>1, 2, 9</li>
											<li>credit, no-credit</li>
											<li>passed, completed, failed, incomplete, browsed, not attempted</li>
											<li>ab-initio, resume</li>
											<li>raw</li>
											<li>0, 100</li>
											<li>0000:00:00.00</li>
											<li>0000:00:00.00</li>
											<li>time-out, suspend, logout</li>
											<li>2w2a605070408A02Xds2402</li>
											<li>B01BA000A</li>
										</ul>
									</div>
								</div>
							</div>

						</section>
						<!-- end section -->

						<section id="line4" class="section">

							<div class="row">
								<div class="col-md-12 left-align">
									<h2 class="dark-text">Application<a href="#top">#back to top</a><hr></h2>
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->

							<div class="row">
								<div class="col-md-12">
									<p>This application build and tested on SCORM version 1.2, so the references in this documentation is about thatt version. 
										Methods, variables and mechanism of SCORM 2004 also found in this documentation, but is for general purpose and further development.</p>
									
									<h4>MySQL security</h4>
									<p>All mysqli queries are protected from SQL injection by preparing SQL statements for execution.</p>
									
									<h4>Launch Application</h4>
									<p>The basic file to launch the application is "rte.php", which inside are loading two files in "frames".</p>
									
									<p>First is loading the API functions written in JS, file "api.php" which includes all the functions from the section <a href="#line3_2">SCO API methods</a>
									<div class="intro2 clearfix">
										<p><i class="fa fa-exclamation-triangle"></i> Be careful with the order that the RTE loads the API file and the launching scorm page eg. index_lms.html. 
											API file must load in a frame <strong>before</strong> the launching html page of SCORM package. Otherwise will get an error like this (or similar):
											<br>Error - unable to acquire LMS API, content may not play properly and results may not be recorded.
										</p>
									</div>
									
									<h4>api.php</h4>
									<p>The API file includes the 8 functions (described in section <a href="#line3_2">SCO API methods</a>).
										For permanent storage of values of SCORM variables (described in section <a href="#line3_3">SCO API variables</a>)</p>
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->

						</section>
						<!-- end section -->
						
						<section id="line5" class="section">

							<div class="row">
								<div class="col-md-12 left-align">
									<h2 class="dark-text">References <a href="#top">#back to top</a><hr></h2>
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->

							<div class="row">
								<div class="col-md-12">
									<h4>Useful Links and Reference</h4>
									<p>Find below useful links and SCORM material that used for this development:</p>
									<ol>
										<li><a href="https://www.adlnet.gov/" target="_blank">adlnet.gov</a></li>
										<li><a href="http://www.vsscorm.net/" target="_blank">vsscorm.net</a></li>
										<li><a href="http://scorm.com/" target="_blank">scorm.com</a></li>
									</ol>
								</div>
							</div>
							<!-- end row -->

						</section>
						<!-- end section -->
						
						<section id="line6" class="section">

							<div class="row">
								<div class="col-md-12 left-align">
									<h2 class="dark-text">Version History (Changelog) <a href="#top">#back to top</a><hr></h2>
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->

							<div class="row">
								<div class="col-md-12">

									<p>You can find the version history on file <strong>changelog.md</strong> .</p>

									<hr>

									<h4>Changelog</h4>

									<pre class="brush: html">
										<?php
										$handle = fopen( '../changelog.md', 'r');
										while( ( $line = fgets( $handle ) ) !== false )
										{
											echo $line;
										}
										fclose($handle);
										?>
									</pre>
								</div>
							</div>
							<!-- end row -->

						</section>
						<!-- end section -->
						
						<section id="line7" class="section">

							<div class="row">
								<div class="col-md-12 left-align">
									<h2 class="dark-text">Contact Me <a href="#top">#back to top</a><hr></h2>
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->

							<div class="row">
								<div class="col-md-12">
									<p> Please feel free to visit <a href="https://ntallas.eu/" target="_blank">ntallas.eu</a> and contact me</a>
									
								</div>
							</div>
							<!-- end row -->

						</section>
						<!-- end section -->
					</div>
					<!-- // end .col -->

				</div>
				<!-- // end .row -->

			</div>
			<!-- // end container -->

		</div>
		<!-- end wrapper -->

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/retina.js"></script>
		<script src="js/jquery.fitvids.js"></script>
		<script src="js/wow.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>

		<!-- CUSTOM PLUGINS -->
		<script src="js/custom.js"></script>
		<script src="js/main.js"></script>

		<script src="js/syntax-highlighter/scripts/shCore.js"></script>
		<script src="js/syntax-highlighter/scripts/shBrushXml.js"></script>
		<script src="js/syntax-highlighter/scripts/shBrushCss.js"></script>
		<script src="js/syntax-highlighter/scripts/shBrushJScript.js"></script>

	</body>

</html>