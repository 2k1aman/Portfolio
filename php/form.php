<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $description = $_POST['description'];
        
      
      // Connecting to the Database
      $servername = "sql109.epizy.com";
      $username = "epiz_31836540";
      $password = "Is6nyQEwwAthpRE";
      $database = "epiz_31836540_forms";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `forms` (`name`, `email`, `subject`,`description`, `dt`) VALUES ('$name', '$email', '$subject','$description', current_timestamp())";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success" role="alert">
          Form filled successfully ! We will contact you soon <a href="/aboutus1.html" class="alert-link">Go back</a>
        </div>';
        }
        else{
            echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-warning" role="alert">
            we are facing some technical issues <a href="/aboutus1.html" class="alert-link">Go back</a>
          </div>';
        }

      }

    }

    
?>