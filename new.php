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
  <button onClick="window.location.href='index.php';">Avbryt</button>
</nav>
<section>
    <article class="size-2">
      <h2>Ny film</h2>
      <hr>
      <br>
      <form action="addfilm.php" method="post" enctype="multipart/form-data">
        <fieldset>
          <p>
            <select name="Genreid">
              <option value="0"> -- Välj genre --</option>
              <?php
			    require"dbconn.php";
				$sql="SELECT * FROM tblGenre";
				$result = $dbconn->query($sql);
				
				while($row = $result->fetch_assoc()){
				  echo"<option value='".$row['Genreid']."'>".$row['Genre']."</option>";
				}
				$dbconn->close();
			  ?>
            </select>
          </p>
          <p>
            <label for="Movie">Filmnamn:</label>
            <input type="text" name="Movie" id="Movie">
          </p>
          <p>
            <label for="Picture">Välj bild:</label>
            <input type="file" name="Picture" id="Picture">
          </p>
          <p>
            <label for="Releasedate">Utgivningsdatum:</label>
            <input type="date" name="Releasedate" id="Releasedate">
          </p>
          <p>
            <label for="Length">Längd(min):</label>
            <input type="text" name="Length" id="Length">
          </p>
          <p>
            <input type="submit" name="submit" value="Lägg till">
          </p>      
        </fieldset>
      </form>
    </article>
</section>
<footer>
	<p>Made by Lu</p>
</footer>
</body>
</html>