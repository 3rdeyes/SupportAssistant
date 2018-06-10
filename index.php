<!DOCTYPE html>
<!--
/*
 * App developed & maintained by Rayhan
 * For more information please call on +8801776305469 or email me on smartdevworld@gmail.com
 */
-->
<?php include 'db.php';
$page = (isset($GET['page']) ? $GET['page']:1) ;
$perPage =(isset($GET['per-page']) && ($GET['per-page'])<=100 ? $GET['per-page'] : 10);
$start =($page>1) ? ($page * $perPage)-$perPage :0;
$results = mysqli_query($db, "SELECT * FROM supportdesk limit ".$start.",".$perPage." ");
$total = $db->query("SELECT * FROM supportdesk")->num_rows;
$pages = ceil($total / $perPage) ;
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
                        <button type="button" data-target="#exampleModal" data-toggle="modal" class="btn btn-success">Add New Task</button>
                        <button type="button" class="btn btn-default pull-right">Print</button>
                        <hr><br>
                        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="add.php">
              <div class="form-group">
                  <label>User Name</label>
                  <input type="text" required name="username" class="form-control">
                  <label>Problem Details</label>
                  <input type="text" required name="problemdetails" class="form-control">
                  <br>
                  <input type="submit" name="send" value="Add New Task" class="btn btn-success">
              </div>
          </form>
       </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User PC</th>
                                <th scope="col">Problem Details</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>

                        </thead>
                        <tbody>
                            <tr>
                                <?php while ($row = mysqli_fetch_array($results)) { ?>
                                <th ><?php echo $row['id']; ?></th>
                                <td><?php echo $row['username'] ;?></td>
                                <td class="col-md-8"><?php echo $row['problemdetails'] ; ?></td>
                                <td><a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success">Edit</a></td>
                                <td><a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
