<!DOCTYPE html>
<!--
/*
 * App developed & maintained by Rayhan
 * For more information please call on +8801776305469 or email me on smartdevworld@gmail.com
 */
-->
<?php
include 'db.php';
    $id = $_GET['id'];
    $results = mysqli_query($db, "SELECT * FROM supportdesk WHERE id = '$id'");
    $row = mysqli_fetch_assoc($results);
    if (isset($_POST['send'])){
        $name = $_POST['username'];
    $problem = $_POST['problemdetails'];
        $sql = mysqli_query($db, "UPDATE  supportdesk SET username = '$name', problemdetails='$problem' WHERE id = '$id'");
    $db->query($sql);
    header('location: index.php');
  
    }
  ?>   
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>IT Users Support Assistant</title>
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-top: 70px;">
                <center><h1>Users Support Assistant</h1></center>
                <div class="col-md-10 col-md-offset-1">
                    <table class="table">
                        <hr><br>
                        
                        <form method="post">
              <div class="form-group">
                  <label>User Name</label>
                  <input type="text" required name="username" value="<?php echo $row['username'];?>" class="form-control">
                  <label>Problem Details</label>
                  <input type="text" required name="problemdetails" value="<?php echo $row['problemdetails'] ; ?>" class="form-control">
                  <br>
                  <input type="submit" name="send" value="Update Task" class="btn btn-success">
              </div>
          </form>
     
                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
