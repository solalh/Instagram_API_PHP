<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Consumer Affaires</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<header class="row">
  <div class="col-12 center">
    <h4>INSTAGRAM API USING PHP</h4>
    <h5>Please give Solal a job, you won't be disappointed!</h5>
  </div>
</header>
<div class="row">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="row">
      <?php
	  
		//example for use of Instagram class
		require "Instagram.php";
		
		$user_name = "consumeraffairs";
		$limit= 12;
		$client_id= "e89f96ef8506485dab829356282bbac5";
		
		// initialize class
		$instagram = new Instagram($client_id, $user_name, $limit);
		
		//display recent images
		echo $instagram->getRecentMedia();
	
	  ?>
    </div>
  </div>
  <div class="col-1"></div>

</div>
<footer class="row center">
<div class="col-3"></div>
<div class="col-6">
  <audio id="music">
    <source src="http://tahiti-it.com/CA/get_a_job.mp3" type="audio/mpeg">
     Your browser does not support the audio element.
     </audio>
  <div class="col-4"><button onClick="download()">Download code</button></div>
  <div class="col-4"><button onclick="document.getElementById('music').play()">Play</button></div>
  <div class="col-4"><button onclick="document.getElementById('music').pause()">Pause</button></div>
</div>
<div class="col-3"></div>
</footer>
<iframe id="invisible"></iframe>
<script>
function download() {
    var iframe = document.getElementById('invisible');
    iframe.src = "solal_code_consumer_affairs.zip";
}
</script>
</body>
</html>