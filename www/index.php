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
    
    <style>
    	.top-spacer {
    		height: 60px;
    	}

      div.disabled {
        opacity: .5;

      }
      div.disabled input {
        display: none;
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
    <div class="container" role="main">
		
    <?php
    switch ($request->getParam('header')) {
      case 'planned':
        require_once('content/planned/planned.php');
        break;

      case 'video':
        require_once('content/video/video.php');
        break;

      case 'current':
        require_once('content/current/current.php');
        break;

      default:
        require_once('content/record/record.php');
        break;
    }
    ?>


    </div>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="<?php echo $twitterBootstrap; ?>js/bootstrap.min.js"></script>
    <script src="/resources/js/my.js"></script>
  </body>
</html>