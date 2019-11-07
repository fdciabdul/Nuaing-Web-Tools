<?php
if (isset($_POST['txtScribd']))
{
	$url = $_POST['txtScribd'];
	$doc = substr($url, strpos($url, "/doc/")+5);
	$doc = substr($doc, 0, strpos($doc, "/"));
	if (is_numeric($doc))
	{
		$url = "http://www.scribd.com/mobile/documents/".$doc."/download";
		header("location: $url");
	}
	else
	{
		echo "Some unspecified error occurred.";
	}
}
?>
	<div style="border-bottom: 1px solid #ccc; text-align: center; padding-bottom: 10px;">
		<h1 style="font-size: 15px; color: #0f0">Scribd Document Downloader</h1>
		<b>Usage information</b>
		<br />
		Open the scribd document you want to download. Now copy the URL from address bar and paste in the textbox below.
	</div>
	<div id="body" style="clear: left; margin-top: 20px;">
		<form method="post" action="">
			<label for="txtScribd" style="float: left;">Enter URL below:</label>
			<input type="text" size="60" name="txtScribd" id="txtScribd" />
			<input type="submit" value="Download" style="margin-left: 0px; margin-top: 10px;" />
		</form>
	</div>
	<!--<div style="clear: both; margin-top: 20px; border-top: 1px solid #ccc; text-align: center;">
		Coded By <a href="http://www.techgaun.com" target="_blank">Samar Dhwoj Acharya</a>
	</div>
	-->
</body>

</html>