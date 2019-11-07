<?php 
ob_start();
session_start();
function home_base_url(){   
	$base_url = (isset($_SERVER['HTTPS']) &&
		$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';
	$tmpURL = dirname(__FILE__);
	$tmpURL = str_replace(chr(92),'/',$tmpURL);
	$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);
	$tmpURL = ltrim($tmpURL,'/');
	$tmpURL = rtrim($tmpURL, '/');
	if (strpos($tmpURL,'/')){
		$tmpURL = explode('/',$tmpURL);
		$tmpURL = $tmpURL[0];
	}
	if ($tmpURL !== $_SERVER['HTTP_HOST'])
		$base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';
	else
		$base_url .= $tmpURL.'/';
	return $base_url; 
}
$settings['title'] = 'Fb Get Token';
$settings['desc'] = 'Get Token Method Get';
$settings['author'] = 'Irfaan Programmer';
$baseurl = home_base_url();
$title = $settings['title'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title><?= $settings['title'] ?></title>   
	<meta charset='utf-8'/>
	<meta content='IE=edge' http-equiv='X-UA-Compatible'/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

	<meta name="description" content="<?= $settings['desc'] ?>"/>
	<meta name="author" content="<?= $settings['author'] ?>"/>
	<link rel="base" href="<?= $baseurl ?>"/>
	<link rel="canonical" href="<?= $baseurl ?>"/>
	<link href='<?= $baseurl ?>img/favicon.png' rel='icon' type='image/x-icon'/>
	<!-- <meta rel="sitemap" type="application/xml" content="http://meusite.com.br/sitemap.xml"/> -->
	<meta name="robots" content="index/follow"/>
	<meta name="googlebot" content="index/follow"/>
	<meta name="theme-color" content="#FF4455"/>
	<meta name="msapplication-navbutton-color" content="#FF4455"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="#FF4455"/>
	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="<?= $title ?>"/>
	<meta itemprop="description" content="<?= $settings['desc'] ?>"/>
	<meta itemprop="image" content="<?= $baseurl ?>img/images.png"/>
	<!-- markup for facebook -->
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="<?= $title ?>"/>
	<meta property="og:url" content="<?= $baseurl ?>"/>
	<meta property="og:site_name" content="<?= $settings['title'] ?>"/>
	<meta property="og:image" content="<?= $baseurl ?>img/images.png"/>
	<meta property="og:description" content="<?= $settings['desc'] ?>"/>
	<meta property="og:locale" content="en_US"/>
<!-- <meta property="fb:app_id" content="5349"/>
	<meta property="fb:admins" content="123456789"/> -->
	<!-- markup for twitter -->
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:title" content="<?= $title ?>"/>
	<meta name="twitter:description" content="<?= $settings['desc'] ?>"/>
	<meta name="twitter:creator" content="<?= $settings['author'] ?>"/>
	<meta name="twitter:image" content="<?= $baseurl ?>img/images.png"/>

	<!-- JSON-LD - structured data markup Google Search -->
	<script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "WebSite",
		"name": "<?= $settings['title'] ?>",
		"alternateName": "<?= $settings['title'] ?>",
		"url": "<?= $baseurl ?>"}
	</script>

	<!-- BOOTSTRAP STYLES-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<style type="text/css">
		body {
			background: #868ba7 url(https://1.bp.blogspot.com/-DC008lu58Nc/W1LMf54UKXI/AAAAAAAAACQ/REydlqiHDecasKOrG7qdP1Z5GQdlRDdxgCLcBGAs/s1600/galaxy-blue.jpg) no-repeat fixed center center;
			background-size: cover;
			background-blend-mode: overlay;
		}
		.center {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
		}
		#wrapper {
			margin: auto;
			float: none;
		}
	</style>

</head>
<body>
	<div class="container">
		<div class='center'>
			<table width=100% height=100%>
				<td align=center>
					<div id='wrapper' class="<?= (empty($_GET['m']) ? 'col-md-4 col-sm-6 col-xs-12' : 'col-md-6 col-sm-6 col-xs-12') ?>">

						<div class="panel-body" style="text-align: center">
							<div class="panel panel-info" style="border-color: #4caf50;">

								<div class="panel-heading" style="color: #ffffff; background-color: #4caf50; border-color: #4caf50;"> <b><i class="fa fa-link"></i> <?= $title ?> </b>
								</div>
								<div class="panel-body">

									<?php if (empty(@$_GET['m'])): ?>
										<?php include "primary.php"; ?>
									<?php else: ?>
										<?php include "second.php"; ?>
									<?php endif ?>

								</div>
								<div class="panel-footer">
									&copy; <?= $settings['author'] ?> - <a class="label label-info" href="<?= (empty($_GET['m']) ? '?m=1' : '?m=0') ?>">Token Lainnya</a>
								</div>

							</div>

						</div>

					</div>
				</td>
			</table>
		</div>
	</div>

	<!-- JQUERY SCRIPTS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!-- Sweet -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

	<?php  
	if (!empty($_SESSION['execute'])) {
		echo $_SESSION['execute'];
		unset($_SESSION['execute']);
	}
	ob_end_flush();
	?>
</body>
</html>