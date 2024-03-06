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
  <button onClick="window.location.href='index.php';">Tillbaka</button>
</nav>
<section>
	<h2>Alla filmer</h2>
    <hr>
    <br>
	<?php
        require"dbconn.php";
        
        $path ="images/";
        //Hämtar alla poster från tblMovies + Genrenamnet från tblGenre
        $sql = "SELECT tblGenre.Genre, tblMovies. * FROM tblGenre INNER JOIN tblMovies ON tblGenre.Genreid=tblMovies.Genreid";
        
        $result = $dbconn->query($sql);
        
        while($row = $result->fetch_assoc()){
			echo "<div id='container'>";
			  echo"<div class='size-1'>";
			    echo"<img src='".$path.$row['Picture']."'>";
			  echo"</div>";
			  echo"<div class='size-2'>";
			    echo"<table>";
				  echo"<tr>";
				    echo"<th>Genre</th>";
					echo"<th>Name</th>";
					echo"<th>Utgivningsdatum</th>";
					echo"<th>Längd</th>";
				  echo"</tr>";
				  echo"<tr>";
				    echo"<td>".$row['Genre']."</td>";
					echo"<td>".$row['Movie']."</td>";
					echo"<td>".date('d.m.Y', strtotime($row['Releasedate']))."</td>";
					echo"<td>".$row['Length']." min.</td>";
				  echo"</tr>";
				echo"</table>";
			  echo"</div>";
			echo "</div>";
           
        }
        
        $dbconn -> close;
    ?>
</section>
<footer>
	<p>Made by Lu</p>
</footer>
</body>
</html>