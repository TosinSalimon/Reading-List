<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
     
    if ( !empty($_POST)) {
         $dateError = null;
        $nameError = null;
        $URLError = null;
        $descriptionError = null;
         
        // keep track post values
        $date = $_POST['date'];
        $name = $_POST['name'];
        $URL = $_POST['URL'];
        $description = $_POST['description'];
         
        // validate input
        $valid = true;
        if (empty($date)) {
            $dateError = 'Please enter a valid date YYYY-MM-DD';
            $valid = false;
        }
         
        if (empty($name)) {
            $nameError = 'Please enter a valid name';
            $valid = false;
        } 
         
        if (empty($URL)) {
            $URLError = 'Please enter a valid URL';
            $valid = false;
        }
          if (empty($description)) {
            $descriptionError = 'Please enter a valid description';
            $valid = false;
        }
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE readinglist  set theDate = ?, name = ?, URL = ?,theDesc =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($date,$name,$URL,$description,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM readinglist where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $date = $data['theDate'];
        $name = $data['name'];
        $URL = $data['URL'];
        $description = $data['theDesc'];
        Database::disconnect();
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    

</head>

<body>
    <div class="container">
     
              <center><div class="span10 offset1">
                    <div class="row">
                        <h3>Update a Book</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($dateError)?'error':'';?>">
                        <label class="control-label">Date: </label>
                        <div class="controls">
                            <input name="date" type="text"  placeholder="Date Created" value="<?php echo !empty($date)?$date:'';?>">
                            <?php if (!empty($dateError)): ?>
                                <span class="help-inline"><?php echo $dateError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                         <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name: </label>
                        <div class="controls">
                            <input name="name" type="text"  placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($URLError)?'error':'';?>">
                        <label class="control-label">URL: </label>
                        <div class="controls">
                            <input name="URL" type="text" placeholder="URL" value="<?php echo !empty($URL)?$URL:'';?>">
                            <?php if (!empty($URLError)): ?>
                                <span class="help-inline"><?php echo $URLError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                        <label class="control-label">Description: </label>
                        <div class="controls">
                            <input name="description" type="text"  placeholder="description Number" value="<?php echo !empty($description)?$description:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn btn-success" href="index.php">Back</a>
                        </div>
                    </form>
                </div></center> 
                 
    </div> <!-- /container -->
  </body>
    <style>
        .control-label{
            font-weight: bold;
            font-size: 15pt;
            
        }

        .btn{
background: #ccccff;
  background-image: -webkit-linear-gradient(top, black, black);
  background-image: -moz-linear-gradient(top, black, black);
  background-image: -ms-linear-gradient(top, black, black);
  background-image: -o-linear-gradient(top, black, black);
  background-image: linear-gradient(to bottom, black, black);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
        }
        input{
            width: 300px;
            height: 30px;
        }
    </style>
</html>
        