<?php
require 'constants.php';
?>
<html>
<head>
<title><?php echo SITE_NAME; ?> - Home</title>
</head>
<body bgcolor="#B0C4DE">
	<div style="width:700px; margin:0 auto; padding:15px; background-color:#B0C4D6;">
		<br/>
		<h2>Welcome to <?php echo SITE_NAME; ?></h2>
		
		<br/><hr>
		<h4>Courses</h4>
		<p>Please select course:</p>
		<p><a href="application/rte.php?course_number=1">Captive</a></p>
		<p><a href="application/rte.php?course_number=2">LMS365</a></p>
		
		<br/><hr>
		<h4>Documentation</h4>
		<p>Or go to the <a href="documentation" target="_blank">documentation</a></p>
		
		<br/><hr>
		<h4>Administration</h4>
		<p>Manage SCORM data in the <a href="application/administration.php" target="_blank">administration</a></p>
		
		<br/><hr>
		<h4>Usefull Links</h4>
		<p>Build by <a href="https://ntallas.eu" target="_blank">midall</a></p>
		<p>Github <a href="https://github.com/midall/my-lms" target="_blank">my-mls</a></p>
    </div>
</body>
</html>
