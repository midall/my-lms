<?php
require '../constants.php';

if( ! isset( $_GET['course_number'] ) )
{
	header( 'Location: ../' );
}

$course_number = $_GET['course_number'];

?>
<html>
<head>

<title><?php echo SITE_NAME; ?> - RTE Frameset <?php echo VERSION; ?></title>

<script src="../assets/jquery/jquery-3.2.0.min.js"></script>

</head>
<frameset frameborder="0" framespacing="0" border="0" rows="0,*" cols="*">
	<frame src="api.php?course_number=<?php echo $course_number; ?>" name="API" noresize>
	<frame src="../courses/<?php echo $course_number; ?>/index_lms.html" name="course">
</frameset>
</html>