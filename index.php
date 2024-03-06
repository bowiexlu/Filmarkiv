<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<title>Filmarkiv</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
	<h1>Filmarkiv</h1>
</header>
<nav>
  <button onClick="window.location.href='new.php';">Lägg till film</button>
  <button onClick="window.location.href='allfilms.php';">Alla filmer</button>
</nav>
<section>
	<aside class="size-1">
    	<?php
			require"dbconn.php";
			
			$path ="images/";
			
			$sql = "SELECT * FROM tblGenre";
			
			$result = $dbconn->query($sql);
			
			while($row = $result->fetch_assoc()){
				echo"<input type='checkbox' id='genre".$row['Genreid']."'>";
				echo"<label for='genre".$row['Genreid']."'>".$row['Genre']."</label>";
				echo"<div class='content'>";
				//Hämtar alla filmer som hör till en viss genre
				$sqlfilm = "SELECT * FROM tblMovies WHERE Genreid = '".$row['Genreid']."'";
				$filmer = $dbconn->query($sqlfilm);
				if($filmer->num_rows>0){
					while($info = $filmer->fetch_assoc()){
						echo"<p><a href='".htmlspecialchars($_SERVER['PHP_SELF'])."?Movieid=".$info['Movieid']."'>".$info['Movie']."</a></p>";
					}
				
				}else{
					echo"<p>Finns inga filmer i genren!</p>";
				}
				echo"</div>";
			}
			
			$dbconn -> close();
		?>
    </aside>
    <article class="size-2">
    <?php
	if(isset($_GET['Movieid'])&& empty($_GET['Movieid'])==false){
		require"dbconn.php";
		
		$sql = "SELECT * FROM tblMovies WHERE Movieid ='".$_GET['Movieid']."'";
		$result = $dbconn->query($sql);
		
		$filminfo= $result->fetch_assoc();
		
		echo"<div class='first'>";
		  echo"<h2>Fakta</h2>";
		  echo"<hr>";
		  echo"<p>Filmens namn: ".$filminfo['Movie']."</p>";
		  $date = date_create($filminfo['Releasedate']);
		  echo"<p>Utgivningsdatum: ".date_format($date,'d.m.Y')."</p>";
		  echo"<p>Filmens längd: ".$filminfo['Length']." min.</p>";
		  
		echo"</div>";
		
		echo"<div class='second'>";
		  echo"<img src='".$path.$filminfo['Picture']."' width='60%'>";
		echo"</div>";
		
		
		$dbconn->close();
		
	}
    ?>
    
    
    </article>
</section>
<footer>
	<p>Made by Lu</p>
</footer>
</body>
</html>