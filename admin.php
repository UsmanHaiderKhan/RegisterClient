<?php include_once "./connection.php";?>
<?php require_once "./session.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"/>
 
    <style>
        .heading {
            font-size: 40px;
            color: brown;
            text-align: center;
            
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <h2 class="heading">Your Order Details</h2>
                <div><?php echo SuccessMessage(); echo ErrorMessage(); ?></div>
                    <div class="table-responsive">
                        <table class="table display nowrap cell-border table-hover table-striped" id="table_data">
                            <thead class="thead-dark">
                                <tr>
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
                                
                                        <tr>
                                        
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['email']; ?></td>
                                            <td><?php echo $value['phone']; ?></td>
                                            <td><?php echo $value['product_type']; ?></td>
                                            <td><img src="<?php echo $value['images']?>" alt="" style="width:40px;height:40px "/></td>
                                            <td><?php echo $value['message']; ?></td>
                                            <td>
                                                <a href="editOrder.php?edit=<?php echo $value["id"]; ?>"><span class="btn btn-warning btn-sm">Edit</span></a>
                                                <a href="deleteClient.php?delete=<?php echo $value["id"] ?>"><span class="btn btn-danger btn-sm">Delete</span></a>
                                            </td>
                                        </tr> 
                                    <?php
                                    } 
                                }
                                ?>
                        
                        </table>
                    </div>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function (e) {
            $('#table_data').DataTable({ });
        });
      
    </script>

</body>

</html>
