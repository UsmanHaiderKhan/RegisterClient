<?php include_once "../connection.php" ?>
<?php require_once "../session.php"; ?>
<?php require_once "../utility.php"; ?>
<?php

if (isset($_GET["id"])) {

 $deleteClientId=$_GET["id"];
 $sql="delete from client where id='$deleteClientId'";
 $statement=$conn->prepare($sql);
 $result=$statement->execute();

 if ($result) {
      $_SESSION["SuccessMessage"]="Order Has Been Deleted SuccessFully";
      redirection_to_action("./admin.php");
 }else {
    $_SESSION["ErrorMessage"]="Sone Thing Going Wrong....Please Try Harder";
    redirection_to_action("./admin.php");
 }

}
?>


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
                  <div class="col-lg-11">
                  <div><?php echo SuccessMessage();
                              echo ErrorMessage(); ?>
                  </div>
                  <h3>Delete Orders</h3>
                  <?php 
                  $deleteOrderUrl=$_GET['delete'];
                  $getQuery="select * from client where id='$deleteOrderUrl'";
                  $statement = $conn->prepare($getQuery);
                  $result =$statement->execute();

                  if($result)
                  {
                  foreach($statement as $value)
                              {
                                    $image=$value['images'];
                                    $attachments= $value['attachments'];
                        ?>
                  <form action="deleteClient.php?id=<?php echo $deleteOrderUrl; ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                          <input type="text" name="name" value="<?php echo $value['name'] ?>" class="form-control" placeholder="UserName">
                                    </div>
                                    <div class="form-group">
                                          <input type="text" name="email" value="<?php echo $value['email'] ?>" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                          <input type="number" name="phone" value="<?php echo $value['phone'] ?>" class="form-control" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                          <p>Selected ProductType :<?php echo $value['product_type'] ?></p>
                                          <select class="form-control" name="product_type">
                                                <option disabled></option>
                                                <option>font color</option>
                                                <option>style type</option>
                                          </select>
                                    </div>
                                    <div class="position-relative">
                                          <div class="form-group">
                                          <p>current-img:<img src="../<?php echo $image; ?>" style="width:40px;height:40px" alt=""/></p>
                                                <div class="wrap">
                                                      <input type="file" name="images" value="<?php echo $image; ?>" />
                                                      <p id="filename">Images</p>
                                                      <span>Choose image</span>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="position-relative">
                                          <div class="form-group">
                                          <p><?php echo $attachments ?></p>
                                                <div class="wrap">
                                                      <input type="file" id="attch" name="attachments" value="<?php echo $attachments; ?>"/>
                                                      <p id="filenames">Attachments</p>
                                                      <span>Choose Attachments</span>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                          <textarea id="my-textarea" name="message" class="form-control" 
                                          placeholder="Some Thing About Yours" rows="8"><?php echo $value['message']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                       <input class="btn btn-danger" type="submit" value="Are Your You Want to delete ?" name="submit">
                                    </div>
                              </form>
                  <?php    }} ?>
                  </div>
            </div>
            <!-- Designer -->
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