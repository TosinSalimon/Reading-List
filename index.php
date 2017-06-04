<!DOCTYPE html>
<html lang="en">
<head>
<title>Reading List</title>
    <meta charset="utf-8">
    <link   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
     <script type="text/javascript" src="functions.js"></script>
</head>
 
<body>
    
    <div class="container">
            <div class="row">
              
                <h3>Reading List</h3>
            </div>
            <div class="row">

                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                    <th>ID</th>
                      <th>Date</th>
                      <th>Name</th>
                      <th>URL</th>
                      <th>Description</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM readinglist ORDER BY ID ASC';
                   foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['ID'] . '</td>';
                                echo '<td>'. $row['theDate'] . '</td>';
                                echo '<td>'. $row['name'] . '</td>';
                                echo '<td>'. $row['URL'] . '</td>';
                                echo '<td>'. $row['theDesc'] . '</td>';
                                echo '<td width=250>';
                                echo ' ';
                                echo '<a href="update.php?id='.$row['ID'].'">Update</a>';
                                echo ' ';
                                echo '</td>';
                                echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
                
					
					<?php 
 
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
					 <div class="container">
               <center> <div class="span10 offset1">
                    <div class="row">
                        <h3>Add A Book</h3>
                    </div>
             
                    <form class="form-horizontal" action="index.php" method="post">
                      <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input name="name" type="varchar" placeholder="name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($nameError)): ?>
                                <span class="help-inline"><?php echo $nameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($URLError)?'error':'';?>">
                        <label class="control-label">URL</label>
                        <div class="controls">
                            <input name="URL" type="varchar"  placeholder="URL " value="<?php echo !empty($URL)?$URL:'';?>">
                            <?php if (!empty($URLError)): ?>
                                <span class="help-inline"><?php echo $URLError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                        <div class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <input name="theDesc" type="varchar"  placeholder="Description" value="<?php echo !empty($theDesc)?$theDesc:'';?>">
                            <?php if (!empty($descriptionError)): ?>
                                <span class="help-inline"><?php echo $descriptionError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
					  <br>
                          <button type="submit" class="bttn" >Add New Book</button>
                          <a href="index.php">Back</a>
                        </div>
                    </form>
        </div></center>
                 
    </div> <!-- /container -->
	
	      <div class="container">
	       <h3>Delete A Book</h3>
	         <form action="delete.php" method="post">
			 <center><label class="control-label">Book ID</label><center>
				<input name="ID" type="number" id="ID" placeholder="ID"><br><br>
			    <input name="delete"  class="bttn" type="submit" id="delete" value="Delete">
			</form>
              </div>
    
  </body>
    
     <style>
	 .control-label{
	color:black;
	text-align:right;
}
  h4,h3 {
      background-color: black;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
    .btn btn-read{
    background-color: purple;
    border: 1px solid black;
    color:white !important;
    text-align: center;
         }
input{
	height:40px;
	width:100%;
	text-align:center;
}	
.bttn{
	background: #ccccff;
  background-image: -webkit-linear-gradient(top, grey, grey);
  background-image: -moz-linear-gradient(top, grey, grey);
  background-image: -ms-linear-gradient(top, grey, grey);
  background-image: -o-linear-gradient(top, grey, grey);
  background-image: linear-gradient(to bottom,grey, grey);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
        }
#delete{
	width:140px;
	
}


  </style>
</html>
