<?php

session_start();

require "../dbConnection.php";

$dbConn = getConnection();

//---------------DOGS---------------

	if(isset($_GET['perros'])) { //Find all dogs
		$sql = "SELECT * FROM z_pets WHERE species = 'dog'"; // selects pets by their pet ID
		$stmt = $dbConn -> prepare($sql);
	    $stmt -> execute();
	    $result = $stmt->fetchAll();
		//print_r($result);
	}

//-----------CATS---------------------

	if(isset($_GET['gatos'])) { //Find all cats
		$sql = "SELECT * FROM z_pets WHERE species = 'cat';"; // selects pets by their pet ID
		$stmt = $dbConn -> prepare($sql);
	    $stmt -> execute();
	    $result2 = $stmt->fetchAll();
		//print_r($result2);
	}

//----------OTHER------------------
	
	if(isset($_GET['otros'])) { //Find all cats
		$sql = "SELECT * FROM z_pets 
		WHERE species='mouse' or 
		species='snake' or 
		species='lizard' or 
		species='monkey' or 
		species='sipder' or 
		species='bird' or
		species='bat'"; 
		$stmt = $dbConn -> prepare($sql);
	    $stmt -> execute();
	    $result3 = $stmt->fetchAll();
		//print_r($result3);
	}	
	
	
function losPerros(){
   global $result;
 	echo "<table class='tableStyle'>";
	echo "<td class='titles'>Species</td>
   		<td class='titles'>Age</td>
   		<td class='titles'>Gender</td>
		<td class='titles'>Breed</td>
		<td class='titles'>Name</td>
		<!--<td class='titles'>Date Found</td>-->
		<td class='titles'>Spayed or Neutered</td>
		<td class='titles'>More Info</td>";
    if (isset($result)) {
        foreach($result as $records) {
        	
         	echo "<tr>";
         	echo "<td class='otherTD'>" .$records['species'] . "</td>
         		<td class='otherTD'>" . $records['age'] . "</td>
         		<td class='otherTD'> " . $records['gender'] . "</td>
         		<td class='otherTD'> " . $records['breed'] . "</td>
         		<td class='otherTD'> " . $records['name'] . "</td>
         		<!--<td class='otherTD'> " . $records['dateFound'] . "</td>-->
         		<td class='otherTD'> " . $records['spayedNeutered'] . "</td>"; 	
		?>
			<td class="otherTD">
			<form action = "petsDetails.php" method="get">
				<input type="hidden" name="petID" value="<?=$records['petID']?>"/>
				<input type="submit" value="More Information" name="detailView"/>
			</form>
			</td>
		</tr>		
		<?php
        }
		
    }
			echo "</table>";
}

function losGatos(){
   global $result2;
 	echo "<table class='tableStyle'>";
	echo "<td class='titles'>Species</td>
   		<td class='titles'>Age</td>
   		<td class='titles'>Gender</td>
		<td class='titles'>Breed</td>
		<td class='titles'>Name</td>
		<!--<td class='titles'>Date Found</td>-->
		<td class='titles'>Spayed or Neutered</td>
		<td class='titles'>More Info</td>";
    if (isset($result2)) {
        foreach($result2 as $records) {
        	
         	echo "<tr >";
         	echo "<td class='otherTD'>" .$records['species'] . "</td>
         		<td class='otherTD'>". $records['age'] . "</td>
         		<td class='otherTD'> " . $records['gender'] . "</td>
         		<td class='otherTD'> " . $records['breed'] . "</td>
         		<td class='otherTD'> " . $records['name'] . "</td>
         		<!--<td class='otherTD'> " . $records['dateFound'] . "</td>-->
         		<td class='otherTD'> " . $records['spayedNeutered'] . "</td>";
         	
			?>
			<td class="otherTD">
			<form action = "petsDetails.php">
				<input type="hidden" name="detailView" value="<?=$records['petID']?>"/>
				<input type="submit" value="More Information" name="moreInfo" />

			</form>
			</td>
		</tr>		
		<?php

		 
        }
		
    }
			echo "</table>";
}

function losOtros(){
   global $result3;
 	echo "<table class='tableStyle'>";
	echo "<td class='titles'>Species</td>
   		<td class='titles'>Age</td>
   		<td class='titles'>Gender</td>
		<td class='titles'>Breed</td>
		<td class='titles'>Name</td>
		<!--<td class='titles'>Date Found</td>-->
		<td class='titles'>Spayed or Neutered</td>
		<td class='titles'>More Info</td>";
    if (isset($result3)) {
        foreach($result3 as $records) {
        	
         	echo "<tr >";
         	echo "<td class='otherTD'>" .$records['species'] . "</td>
         		<td class='otherTD'>". $records['age'] . "</td>
         		<td class='otherTD'> " . $records['gender'] . "</td>
         		<td class='otherTD'> " . $records['breed'] . "</td>
         		<td class='otherTD'> " . $records['name'] . "</td>
         		<!--<td class='otherTD'> " . $records['dateFound'] . "</td>-->
         		<td class='otherTD'> " . $records['spayedNeutered'] . "</td>";
         	
			?>
			<td class="otherTD">
			<form action = "petsDetails.php">
				<input type="hidden" name="detailView" value="<?=$records['petID']?>"/>
				<input type="submit" value="More Information" name="moreInfo" />

			</form>
			</td>
		</tr>		
		<?php

		 
        }
		
    }
			echo "</table>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Home</title>
  <meta name="description" content="">
  <meta name="author" content="Daniel G. Miranda">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <!--<link rel="stylesheet" href="css/bootstrap.css" type="text/css"/> -->
  <link rel="stylesheet" href="css/styles.css" type="text/css" />
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
</head>

<body>
  <div id="allContent">
  	<div id="menu-top">
	    <header>
	      <h1><a href="http://hosting.otterlabs.org/mirandadanielg/cst336/final_project/shelter.php?otros=Other" class="noUnderline">San Martin Animal Shelter</a></h1><!-- This is where the logo will go -->
	    </header>
	</div>
	<div id="idSection">
    	<form method="post" action="login.php">
    		Admin Login: <br />
			Username: <input type="text" name="userName" />
			Password: <input type="password" name="password" />
			<input type="submit" value="Login!" name="loginForm"><br /><br/>
		
		</form>
	</div>
	
				<div id="buttons">
      					<form>
    						<input type="submit" class="btn" name="perros" value="Dogs">
    						<input type="submit" class="btn" name="gatos" value="Cats">
    						<input type="submit" class="btn" name="otros" value="Other">
    					</form>
    					<br /> <br />
				<?php
      				if (isset($result)) {
     					echo "<h3>Dogs</h3>";
						
      				}
	  				if (isset($result2)) {
     					echo "<h3>Cats</h3>";
      				}
	  				if (isset($result3)) {
     					echo "<h3>Other</h3>";
      				}
      			?>
	
    					<br /> <br />
    					
    					<table align="center" id='resultStyle'>
    					<br />
    					<?php 	
      						if (isset($result)) {
     							losPerros();
      						}
	  						if (isset($result2)) {	
     							losGatos();
      						}
	  						if (isset($result3)) {
     							losOtros();
      						}
							 
	  					?>
	  				</table>
    				<br /> <br /><br /> <br />	
    					
    				</div>

    <footer>
     <p>&copy; Copyright  by Daniel G. Miranda</p>
    </footer>
  </div>
  <script>
  	$("#submitQuiz").click( function(){			//**********THIS IS THE SUBMIT BUTTON*******************
          //$(".feedback").css("display","block");
          $(".feedback").slideToggle(3000);
         }
  </script>
</body>
</html>
