<?php

// Load the constants
require '../constants.php';

// Load main classes
require '../classes/Db.php';
require '../classes/Admin.php';

// Get the course number / Check if anything is blank
if( isset( $_REQUEST['course_number'] ) && strlen( $_REQUEST['course_number'] ) != 0  )
{
	$course_number = trim( $_REQUEST['course_number'] );
}
else
{
	$course_number = '';
}

// Create object
$admin = new Admin( DEFAULT_CORE_STUDENT_ID );
$scorm_data = $admin->get_scorm_courses_data( $course_number );
?>
<html>
<head>

<title><?php echo SITE_NAME; ?> - Administrator <?php echo VERSION; ?></title>

<style>
table
{
	border-collapse: collapse;
	table-layout: fixed;
	width:600px;
    table-layout: fixed;
}

td
{
    word-wrap: break-word;
    border-bottom: 1px solid blue;
}

th
{
	border-bottom: 1px solid black;
}
</style>
</head>
<body bgcolor="#fffff0">
	<p>Go to <a href=".." >home</a></p>
	<div style="width:600px; margin:0 auto;" bgcolor="#ffffff">
		<form action="administration.php" method="GET">
			<select name="course_number">
				<option value="">Select Course</option>
				<option value="1" <?php if( $course_number == 1 ) echo 'selected'; ?>>Captive</option>
				<option value="2" <?php if( $course_number == 2 ) echo 'selected'; ?>>LMS365</option>
			</select>
			<input type="submit" />
		</form>

		<table>
			<tr>
				<th width="8%">SCO ID</th>
				<th width="7%">Course #</th>
				<th width="7%">User ID</th>
				<th width="28%">SCO key</th>
				<th width="50%">SCO value</th>
			</tr>
			<?php
			foreach( $scorm_data as $data )
			{
				echo '<tr>' . PHP_EOL;
				echo '	<td>' . $data['sco_id'] . '</td>' . PHP_EOL;
				echo '	<td>' . $data['course_number'] . '</td>' . PHP_EOL;
				echo '	<td>' . $data['user_id'] . '</td>' . PHP_EOL;
				echo '	<td>' . $data['sco_key'] . '</td>' . PHP_EOL;
				echo '	<td>' . $data['sco_value'] . '</td>' . PHP_EOL;
				echo '<tr/>' . PHP_EOL;
			}
			?>
		</table>
	</div>
</body>
</html>