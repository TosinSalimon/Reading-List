<?php 
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $URLError = null;
        $descriptionError = null;
         
        // keep track post values
        $name = $_POST['name'];
        $URL = $_POST['URL'];
        $theDesc = $_POST['theDesc'];
         
        // validate input
        $valid = true;
       
         
        if (empty($name)) {
            $nameError = 'Please enter a Name';
            $valid = false;
        }
         
        if (empty($URL)) {
            $URLError = 'Please enter a URL';
            $valid = false;
        }
   if (empty($theDesc)) {
            $descriptionError = 'Please enter a Description';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO ReadingList (name,URL,theDesc) values(?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($name,$URL,$theDesc));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>