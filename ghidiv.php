<!DOCTYPE html>
	<html>

	<head>

		<title>GhiDiv</title>

         <link rel="stylesheet" type="text/css" href="ghidiv.css">
 
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>   

	  	<script type='text/javascript' src='script.js'></script>
	     
	    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
		
	</head>

	<body>

       <div id="stanga">
         <form action="ghidiv.php" method="post">
           <input type="text" name="dreapta">
           <input type="submit" value="Move right">
         </form>  

            <?php
                  
               $con = mysqli_connect("localhost","root","","ghidiv");
               $con->select_db("ghidiv");

               if(isset($_POST['stanga']))
			    {
               	 $stanga = $_POST['stanga'];
                 $reverse_string =  strrev($stanga);
                 echo $reverse_string;
                $insert_query = $con->query("INSERT INTO `ghidiv` SET `stanga` = '{$reverse_string}' ");
           		
           		 if(!$insert_query)
            		{
            	die($con->error);
            		}

                } 
              
         	 ?>	
       </div>



        <div id="dreapta">
          <form action="ghidiv.php" method="post">
           <input type="text" name="stanga">
           <input type="submit" value="Move left">
          </form>


   			<?php
              
                $con = mysqli_connect("localhost","root","","ghidiv");
                $con->select_db("ghidiv");
               if(isset($_POST['dreapta']))
			   {
                $dreapta = $_POST['dreapta'];
                echo $dreapta;

               $insert_query = $con->query("INSERT INTO `ghidiv` SET `dreapta` = '{$dreapta}' ");
           		
           		 if(!$insert_query)
            		{
            	die($con->error);
            		}
               }

               ?>
     	 
         	</div>

         <div id="container">
         <center>
         	 <h1>Messages:</h1>

    	   <?php

                $con = mysqli_connect("localhost","root","","ghidiv");
                $con->select_db("ghidiv"); 
              

                 $query = mysqli_query($con, "SELECT * FROM ghidiv ");


                while($row = mysqli_fetch_assoc($query)) 
	              {
                 	echo $row['stanga'];
                 	echo '<br>';
                 	echo $row['dreapta'];
                 	echo '<br>';
                  }

    	   ?>
         </center>
         </div>

	</body>

</html>