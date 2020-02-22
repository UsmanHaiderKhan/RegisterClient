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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
            <h2 class="heading">Your Order Details</h2>
            <div><?php echo SuccessMessage(); echo ErrorMessage(); ?></div>
                <table class="table table-hover table-striped table-light">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Pro_Type</th>
                            <th>Image</th>
                            <th>message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                   
                        <?php
                          $sql = "select * from client";
                          $statement = $conn->prepare($sql);
                          $result = $statement->execute();
                          if ($result) {
                              foreach ($statement as $value) {
                                  ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['username']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php echo $value['phone']; ?></td>
                                    <td><?php echo $value['product_type']; ?></td>
                                    <td><img src="./../<?php echo $value['images']?>" alt="" width=40; height:40; /></td>
                                    <td><?php echo $value['message']; ?></td>
                                    <td>
                                    <a href="edit.php?edit=<?php echo $value["id"]; ?>"><span class="btn btn-warning btn-sm">Edit</span></a>
                                    <a href="deleteClient.php?delete=<?php echo $value["id"] ?>"><span class="btn btn-danger btn-sm">Delete</span></a>
                                    </td>
                                </tr> 
                            </tbody>
                            <?php
                              } 
                           }
                        ?>
                   
                </table>
            </div>
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
