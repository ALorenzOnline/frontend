<?php
    // Get Posted form values
    // Note that whatever is enclosed by $_POST[""] matches the form input elements
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $steamid = $_POST["steamid"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
     
    //let's check if all fields are filled
    if($firstname == "" ||
        $lastname == "" ||
        $steamid == "" ||
        $email == "" ||
        $pass == "")
        {
            //if all fields are blank, print message and stop the program with the "exit" command.
            echo "<font color='red'><b>Sorry, all the fields must be informed.</b></font>";
            exit;
        }
  
    // Connect to our DB with mysqli(<server>, <username>, <password>, <database>)
    $sql_connection = new mysqli("localhost", "root", "ozzi#1988", "steam");
     
    //check if the connection was made
    if($sql_connection == true)
    {
  
  
        $encrypted_pass = base64_encode($pass);
         
        //the instruction bellow will save the data to your database
        $sql = "INSERT INTO tbluser (
                    firstname,
                    lastname,
                    steamid,
                    email,
                    pass
                )
                VALUES (
                    '$firstname',
                    '$lastname',
                    '$steamid'
                    '$email',
                    '$encrypted_pass'
                )";
         
        //execute the SQL instruction
        mysqli_query($sql_connection, $sql);
         
        $query = mysqli_query($sql_connection, "select * from tbluser where email='$email'" );
        $rows = mysqli_num_rows($query);
        if ($rows > 0) 
        {
            //echo $rows;
            $_SESSION['login_user']=$email; // Initializing Session
            header("location: profile.php"); // Redirecting To Other Page
        } 
         
        $sql_connection->close();
    }
    else
    {
        //if something goes wrong in connection, print a message on screen
        echo "<font color='red'><b>Connection error: The data wasn't saved.</b></font>";
    }
     
?>
