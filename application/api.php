<?php
if( ! isset( $_GET ['sco_number'] ) )
{
	return;
	exit();
}
$sco_number = $_GET ['sco_number'];

?>
<html>
<head>

<title>VS SCORM - RTE API</title>

<script language="javascript">
	var debug = true;

	// ------------------------------------------
	//   SCORM RTE Functions - Initialization
	// ------------------------------------------
	function LMSInitialize( dummyString )
	{
		if (debug)
		{
			console.log("*** LMSInitialize ***");
		}
		return "true";
	}

	// ------------------------------------------
	//   SCORM RTE Functions - Getting and Setting Values
	// ------------------------------------------
	function LMSGetValue( sco_key )
	{

		// create request object
		var req = createRequest();

		// set up request parameters - uses GET method
		url = "../functions/get_value.php?sco_number=<?php echo $sco_number; ?>&sco_key=" + urlencode(sco_key) + "&code=" + Math.random();
		req.open("GET", url, true);

		// submit to the server for processing
		req.send(null);

		// process returned data - error condition
		if (req.status != 200)
		{
			console.log("Problem with Request");
			return "";
		}

		// process returned data - OK
		else
		{
			return req.responseText;
		}

	}

	function LMSSetValue( sco_key, sco_value )
	{

		// create request object
		var req = createRequest();

		// set up request parameters - uses combined GET and POST
		url = "../functions/set_value.php?sco_number=<?php echo $sco_number; ?>&sco_key=" + urlencode(sco_key) + "&code=" + Math.random();
		req.open("POST", url, true);

		// send header information along with the POST data
		var params = "sco_value=" + urlencode(sco_value);
		req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		// submit to the server for processing
		req.send(params);

		// process returned data - error condition
		if (req.status != 200)
		{
			console.log("Problem with Request");
			return "false";
		}

		// process returned data - OK
		else
		{
			return "true";
		}

	}

	function LMSCommit( dummyString )
	{
		if (debug)
		{
			console.log("*** LMSCommit ***");
		}
		return "true";
	}

	// ------------------------------------------
	//   SCORM RTE Functions - Closing The Session
	// ------------------------------------------
	function LMSFinish( dummyString )
	{
		if (debug)
		{
			console.log("*** LMSFinish ***");
		}
		return "true";
	}

	// ------------------------------------------
	//   SCORM RTE Functions - Error Handling
	// ------------------------------------------
	function LMSGetLastError()
	{
		if (debug)
		{
			console.log("*** LMSGetLastError ***");
		}
		return 0;
	}

	function LMSGetDiagnostic( errorCode )
	{
		if (debug)
		{
			console.log("*** LMSGetDiagnostic errorCode=" + errorCode + " ***");
		}
		return "diagnostic string";
	}

	function LMSGetErrorString( errorCode )
	{
		if (debug)
		{
			console.log("*** LMSGetErrorString errorCode=" + errorCode + " ***");
		}
		return "error string";
	}

	// ------------------------------------------
	//   Create AJAX request
	// ------------------------------------------
	function createRequest()
	{

		// this is the object that we're going to (try to) create
		var request;

		// does the browser have native support for 
		// the XMLHttpRequest object
		try
		{
			request = new XMLHttpRequest();
		}

		// it failed so it's likely to be Internet Explorer which 
		// uses a different way to do this
		catch (tryIE)
		{

			// try to see if it's a newer version of Internet Explorer
			try
			{
				request = new ActiveXObject("Msxml2.XMLHTTP");
			}

			// that didn't work so ...
			catch (tryOlderIE)
			{

				// maybe it's an older version of Internet Explorer
				try
				{
					request = new ActiveXObject("Microsoft.XMLHTTP");
				}

				// even that didn't work (sigh)
				catch (failed)
				{
					console.log("Error creating XMLHttpRequest");
				}

			}
		}

		return request;

	}

	// ------------------------------------------
	//   URL encode  - similar to PHP function
	// ------------------------------------------
	function urlencode( str )
	{
		//
		// Ref: http://kevin.vanzonneveld.net/techblog/article/javascript_equivalent_for_phps_urlencode/
		//

		var histogram =
		{}, unicodeStr = "", hexEscStr = "";
		var ret = (str + "").toString();

		var replacer = function( search, replace, str )
		{
			var tmp_arr =
			[];
			tmp_arr = str.split(search);
			return tmp_arr.join(replace);
		};

		// The histogram is identical to the one in urldecode.
		histogram["'"] = "%27";
		histogram["("] = "%28";
		histogram[")"] = "%29";
		histogram["*"] = "%2A";
		histogram["~"] = "%7E";
		histogram["!"] = "%21";
		histogram["%20"] = "+";
		histogram["\u00DC"] = "%DC";
		histogram["\u00FC"] = "%FC";
		histogram["\u00C4"] = "%D4";
		histogram["\u00E4"] = "%E4";
		histogram["\u00D6"] = "%D6";
		histogram["\u00F6"] = "%F6";
		histogram["\u00DF"] = "%DF";
		histogram["\u20AC"] = "%80";
		histogram["\u0081"] = "%81";
		histogram["\u201A"] = "%82";
		histogram["\u0192"] = "%83";
		histogram["\u201E"] = "%84";
		histogram["\u2026"] = "%85";
		histogram["\u2020"] = "%86";
		histogram["\u2021"] = "%87";
		histogram["\u02C6"] = "%88";
		histogram["\u2030"] = "%89";
		histogram["\u0160"] = "%8A";
		histogram["\u2039"] = "%8B";
		histogram["\u0152"] = "%8C";
		histogram["\u008D"] = "%8D";
		histogram["\u017D"] = "%8E";
		histogram["\u008F"] = "%8F";
		histogram["\u0090"] = "%90";
		histogram["\u2018"] = "%91";
		histogram["\u2019"] = "%92";
		histogram["\u201C"] = "%93";
		histogram["\u201D"] = "%94";
		histogram["\u2022"] = "%95";
		histogram["\u2013"] = "%96";
		histogram["\u2014"] = "%97";
		histogram["\u02DC"] = "%98";
		histogram["\u2122"] = "%99";
		histogram["\u0161"] = "%9A";
		histogram["\u203A"] = "%9B";
		histogram["\u0153"] = "%9C";
		histogram["\u009D"] = "%9D";
		histogram["\u017E"] = "%9E";
		histogram["\u0178"] = "%9F";

		// Begin with encodeURIComponent, which most resembles PHP's encoding functions
		ret = encodeURIComponent(ret);

		for (unicodeStr in histogram)
		{
			hexEscStr = histogram[unicodeStr];
			ret = replacer(unicodeStr, hexEscStr, ret); // Custom replace. No regexing
		}

		// Uppercase for full PHP compatibility
		return ret.replace(/(\%([a-z0-9]{2}))/g, function( full, m1, m2 )
		{
			return "%" + m2.toUpperCase();
		});
	}
</script>

</head>
<body>
	<p>&nbsp;</p>
</body>
</html>