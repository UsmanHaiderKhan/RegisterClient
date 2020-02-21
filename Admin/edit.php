<?php include_once "../connection.php";?>
<?php require_once "../session.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>




<div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <div><?php echo SuccessMessage();
                        echo ErrorMessage(); ?>
                </div>
                <h3>Edit Orders</h3>
            <?php 
            $editpostUrl=$_GET['edit'];
            $getQuery="select * from client where id='$editpostUrl'";
            $statement = $conn->prepare($getQuery);
            $result =$statement->execute();

            if($result)
            {
                foreach($statement as $value)
                        {
                           
                            $image=$value['image'];
                    ?>
    
                <form action="edit.php?id=<?php echo $editpostUrl; ?>" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                    <input type="text" value="<?php echo $value['username'] ?>" class="form-control" placeholder="UserName">
                              </div>
                              <div class="form-group">
                                    <input type="text" value="<?php echo $value['email'] ?>" class="form-control" placeholder="Email">
                              </div>
                              <div class="form-group">
                                    <input type="number" value="<?php echo $value['phone'] ?>" class="form-control" placeholder="Phone">
                              </div>
                              <div class="form-group">
                                    <select class="form-control" name="product_type">
                                          <option value=""></option>
                                          <option>font color</option>
                                          <option>style type</option>
                                    </select>
                              </div>
                              <div class="position-relative">
                                    <div class="form-group">
                                          <div class="wrap">
                                                <input type="file" name="images" />
                                                <p id="filename">Images</p>
                                                <span>Choose image</span>
                                          </div>
                                    </div>
                              </div>
                              <div class="position-relative">
                                    <div class="form-group">
                                          <div class="wrap">
                                                <input type="file" id="attch" name="attachments" />
                                                <p id="filenames">Attachments</p>
                                                <span>Choose Attachments</span>
                                          </div>
                                    </div>
                              </div>
                              <div class="form-group">
                                    <textarea id="my-textarea" name="message" class="form-control"
                                          placeholder="SomeThing About You" name="" rows="8"></textarea>
                              </div>
                              <div class="form-group">
                              <input class="btn btn-primary" type="submit" value="Update Post" name="submit">
                              </div>
                        </form>
                </form>
                <?php    }} ?>
            </div>
        </div>
        <!-- Designer -->
        
    </div>
    </div>


    <!-- Footer Area -->
    <footer class="mt-5">
        <div class="container">
            <p class="water-mark"> Designed By:Legendary Solutions</p>
        </div>
    </footer>

    <!-- Script Section -->
    <script src="./js/jquery.min.js"></script>
    <script>
        $(document).ready(function (e) {
            $("#register-form").on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    method: "DELETE",
                    url: 'delete.php',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,

                });
            });
        });

    </script>

</body>

</html>
