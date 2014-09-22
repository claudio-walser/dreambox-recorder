<?php
include('./bootstrap.php');

$application = new \DreamboxRecorder\Application('php');
$request = new \Spaf\Core\Request\Http();

$twitterBootstrap = '/resources/bootstrap-3.2.0/';
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dreambox Recorder</title>
    <!-- Bootstrap -->
    <link href="<?php echo $twitterBootstrap; ?>css/bootstrap.min.css" rel="stylesheet">
    
    <!--
    <script type="text/javascript" src="/resources/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/resources/jquery/jquery.ui.touch-punch.min.js"></script>
    <link rel="stylesheet" id="jquery-ui-style-css" href="/resources/jquery/css/jquery-ui-1.10.3.custom.min.css" type="text/css" media="all">

    <script type="text/javascript" src="/resources/jquery/plugins/jquery.moment-langs.min.js"></script>
    <script type="text/javascript" src="/resources/jquery/plugins/jquery.rangecalendar.js"></script>
    <link rel="stylesheet" id="rangecalendar-style-css" href="/resources/jquery/plugins/css/rangecalendar.css" type="text/css" media="all">
    <script>
    jQuery(document).ready(function(){
      console.log(jQuery('#range-calendar').rangeCalendar());
      //var simpleRangeCalendar = $("#range-calendar").rangeCalendar();
    });
    </script>
    -->
    <style>
    	.top-spacer {
    		height: 60px;
    	}
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body role="document">
    <?php
	include_once('layout/header.php');
	?>
	<div class="top-spacer"></div>
	<div id="range-calendar"></div>
    <div class="container theme-showcase" role="main">
		
		<div class="col-sm-4">
			<?php		
			include_once('content/bouquets.php');
			?>
		</div>

		<div class="col-sm-8">
			<?php		
			include_once('content/channels.php');
			?>
		</div>
    </div>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="/resources/jquery/jquery.min.js"></script>
    <script src="<?php echo $twitterBootstrap; ?>js/bootstrap.min.js"></script>
    <script src="/resources/js/my.js"></script>
  </body>
</html>