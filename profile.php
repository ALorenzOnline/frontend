<?php
    include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
    <body>
        <div id="profile">
            <b id="welcome">Welcome !<i></i></b>
            <b id="logout"><a href="logout.php">Log Out</a></b>
             
            <div>
             
            <?php
            // Create connection
                $conn = new mysqli("localhost", "root", "root", "test");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
 
                $sql = "SELECT * FROM tbluser where email = '" . $_SESSION['login_user'] . "'";
                $result = $conn->query($sql);
 
                if ($result->num_rows > 0) 
                {
                    // output data of each row
                    $row = $result->fetch_assoc() ;
                      
                        echo "<b>Email: </b>" . $row["email"]. "<br /> <b>First Name:</b> " . $row["firstName"] . "<br /> <b>Last Name: </b>" . $row["lastName"]. "<br>";
                         
                        echo '<b id="logout"><a href="edit.php?id='. $row["idUser"] .'">Edit Profile</a></b>';
                } 
                else
                {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
             
             
        </div>
    </body>
</html>
