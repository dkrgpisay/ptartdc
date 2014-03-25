<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>RTDC Design</title>
	<link rel='stylesheet' type='text/css' href='src/css/reset.css'/>
	<link rel='stylesheet' type='text/css' href='src/css/font/poetsen/stylesheet.css'/>
	<link rel='stylesheet' type='text/css' href='src/css/style.css'/>
</head>
<body>
	<div id='header'>
		<div class='container left-con'>
			<div id='logo'>PHOENIX</div>
			<div id='main-nav'>
				<a><div>Dashboard</div></a>
				<a><div>Projects</div></a>
				<a><div>Archives</div></a>
				<a><div>Hypercare Issues</div></a>
			</div>
		</div>
		<div class='container right-con'>
			<div id='user-login'>
				<a id='login'>Login</a>
			</div>
		</div>
	</div>
	<div id='main-content'>
		
		<div class='box 2-1' id='r1-1'></div>
		<div class='box' id='r1-2'>
			<div class='stat-num'>23</div>
			<div class='stat-desc'>Projects are At Risk</div>
		</div>
		<div class='box' id='r1-3'></div>

		<div id='r1' class='drill-content-container'>
			<div class='preloader'></div>
			<div class='drill-content'>HELLO - box 1 Drill down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br>down<br></div>
			<div class='expand-drill'></div>
		</div>

		<div id='r2-1' class='box'></div>
		<div id='r2-2' class='box'>
			<div class='stat-num'>10</div>
			<div class='stat-desc'>Scheduled Migrations this Week</div>
		</div>
		<div id='r2-3' class='box 2-1'></div>

		<div id='r2' class='drill-content-container'>
			<div class='preloader'></div>
			<div class='drill-content'>HELLOS</div>
			<div class='expand-drill'></div>
		</div>

		<div class='box 2-1'></div>
		<div class='box 2-1'></div>
		<div class='box'></div>
		<div class='box 2-1'></div>
		<div class='box'></div>
		<div class='box 2-1'></div>
		<div class='box 2-1'></div>
	</div>
</body>
<script type='text/javascript' src='./lib/jquery-1.11.0.min.js'></script>
<script type='text/javascript' src='./lib/masonry.pkgd.min.js'></script>
<script type='text/javascript'>
	var lastDrill;
	$('.drill-content').hide();
	$('.box').click(function(){
		if ($(this).hasClass("drilled")) {
			// User clicked the same box -> Need to close Drilldown
			$(lastDrill).stop().animate({height: "0px"},200, function() {
				$(lastDrill + " .preloader").stop().stop().show();
				console.log($(lastDrill + " .preloader"));				
			});
			$(this).removeClass("drilled");
			$(lastDrill).removeClass("open-drillbox");
			lastDrill = "";
		}
		else {
			// User clicked a different box -> Need to remove "drilled"
			$(".drilled").removeClass("drilled");

			var drillcontent = "#"+$(this).attr("id").split('-')[0];
			if (drillcontent == lastDrill) {
				// same drillbox is used. no need to close any drillboxes
				// need to load preloader again
				$(drillcontent + " .drill-content").fadeOut();
				$(drillcontent + " .preloader").stop().stop().fadeIn().delay(2000).fadeOut(400, function() {
					$(drillcontent + " .drill-content").fadeIn();
				});
			}
			else {
				// different drillbox is open. need to close all drillboxes and open new one
				// Close open Drillbox
				$(lastDrill).stop().animate({height: "0px"},200, function() {
					$(drillcontent + " .preloader").show();
				});
				// Open new Drillbox
				$(drillcontent).stop().animate({height: "300px"},200, function() {
					$(drillcontent + " .preloader").stop().delay(2000).fadeOut(400, function() {
						$(drillcontent + " .drill-content").fadeIn();
					});
				});
			}
			$(this).addClass("drilled");
			$(drillcontent).addClass("open-drillbox");
			lastDrill = drillcontent;
		}
	});

	$(".expand-drill").click(function() {
		$(lastDrill).stop().animate({height: "500px"},200);
	});

</script>
</html>