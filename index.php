
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

		require "Instagram.php";
		
		//Seting the user/client information in variable
		$user_id = "647463488";
		$user_name= "consumeraffairs";
		$limit=12;
		$client_id= "e89f96ef8506485dab829356282bbac5";
		$endpoint= "https://api.instagram.com/v1/";
		
		//Creation of a new class dedicated to Instagram
		$instagram = new Instagram($client_id, $endpoint);
		
		try{
			//Calling the Instagram class methode that will set up the url and call the API 
			$media = $instagram->getRecentMedia($user_name, $limit);
			//looping with for each to get the Pictures 
			  foreach($media as $medium){
  				echo"<div class='col-2'><img src='{$medium->images->thumbnail->url}'/></div>";
    		}
			//var_dump($media);
			
		}catch(Exception $e){
			die($e->getMessage());
		}
	  ?>
    </div>
  </div>
  <div class="col-1"></div>

</div>
<footer class="row center">
<div class="col-3"></div>
<div class="col-6">
  <audio id="music" autoplay="true">
    <source src="http://tahiti-it.com/CA/get_a_job.mp3" type="audio/mpeg">
     Your browser does not support the audio element.
  </audio>
  <div class="col-4"><button onClick="">Download code</button></div>
  <div class="col-4"><button onclick="document.getElementById('music').play()">Play</button></div>
  <div class="col-4"><button onclick="document.getElementById('music').pause()">Pause</button></div>
</div>
<div class="col-3"></div>
</footer>
</body>
</html>

