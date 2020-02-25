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
            <div class="col-lg-12">
                <h2 class="heading">Your Order Details</h2>
                <div><?php echo SuccessMessage(); echo ErrorMessage(); ?></div>
                    <div class="table-responsive">
                        <table class="table display nowrap cell-border table-hover table-striped" id="table_data">
                            <thead class="thead-dark">
                                <tr>
                                     <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Pro_Type</th>
                                    <th>Image</th>
                                    <!-- <th>Attachments</th> -->
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
                                           <td><?php echo $value['id']; ?></td>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['email']; ?></td>
                                            <td><?php echo $value['phone']; ?></td>
                                            <td><?php echo $value['product_type']; ?></td>
                                            <td><img src="<?php echo $value['images']?>" alt="" style="width:40px;height:40px "/></td>
                                          <!-- <td>
                                               <a href="<?php echo $value['attachments']; ?>" target="_blank">
                                                 <embed src="<?php echo $value['attachments'] ?>" type="application/pdf"  >
                                               </a>
                                          </td> -->
                                            <td><?php echo $value['message']; ?></td>
                                            <td>
                                                <a  href="edit=<?php echo $value['id'] ?>" data-toggle="modal" data-target="#myModal"><span class="btn btn-warning btn-sm">Edit</span></a>
                                                
                                                 <button type="button" class="btn btn-danger delete_btn" >delete</button>
                                                <!-- <a href="deleteClient.php?delete=<?php echo $value["id"] ?>"><span class="btn btn-danger btn-sm">Delete</span></a> -->
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
<!--Edit Modal Area -->

            <div class="modal" id="myModal">
                  <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                        <div class="container-fluid">
                              <div class="row">
                                    <div class="col-lg-11">
                                    <div><?php echo SuccessMessage();
                                                echo ErrorMessage(); ?>
                                    </div>
                                    <h3>Edit Orders</h3>
                                    <?php 
                                    $editOrderUrl=16;
                                    // $editOrderUrl = (isset($_GET['edit']) ? $_GET['edit'] : 'error');
                                    // echo $editOrderUrl;
                                    $getQuery="select * from client where id='$editOrderUrl'";
                                    $statement = $conn->prepare($getQuery);
                                    $result =$statement->execute();

                                    if($result)
                                    {
                                    foreach($statement as $value)
                                                {
                                                      $image=$value['images'];
                                                      $attachments= $value['attachments'];
                                          ?>
                        
                                    <form action="editOrder.php?id=<?php echo $editOrderUrl; ?>" id="edit-form" method="post" enctype="multipart/form-data">
                                                      <div class="form-group">
                                                            <input type="text" name="name" value="<?php echo $value['name'] ?>" class="form-control" placeholder="UserName">
                                                      </div>
                                                      <div class="form-group">
                                                            <input type="email" name="email" value="<?php echo $value['email'] ?>" class="form-control" placeholder="Email">
                                                      </div>
                                                      <div class="form-group">
                                                            <input type="number" name="phone" value="<?php echo $value['phone'] ?>" class="form-control" placeholder="Phone">
                                                      </div>
                                                      <div class="form-group">
                                                            <p>Selected ProductType :<?php echo $value['product_type'] ?></p>
                                                            <select class="form-control" name="product_type">
                                                                  <option><?php echo $value['product_type'] ?></option>
                                                                  <option>font color</option>
                                                                  <option>style type</option>
                                                            </select>
                                                      </div>
                                                      <div class="position-relative">
                                                            <div class="form-group">
                                                            <p>current-img:<img src="./<?php echo $image; ?>" style="width:40px;height:40px" alt=""/></p>
                                                                  <div class="wrap">
                                                                        <input type="file" name="images" accept="image/*"  />
                                                                        <p id="filename">Images</p>
                                                                        <span>Choose image</span>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                      <div class="position-relative">
                                                            <div class="form-group">
                                                            <p><?php echo $attachments ?></p>
                                                                  <div class="wrap">
                                                                        <input type="file" id="attch" name="attachments" accept="application/*" value="<?php echo $attachments; ?>"/>
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
                                                      <input class="btn btn-primary" type="submit" value="Update Order" name="submit">
                                                      </div>
                                                </form>
                                    <?php    }} ?>
                                    </div>
                              </div>
                              <!-- Designer -->
                        </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                        </div>
                  </div>
            </div>

            <!-- Delete Model Area -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <form  action="deleteClient.php" id="delete-form" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                               Are You Sure You Want to Delete That Record...!
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="submit" name="deleteData" class="btn btn-danger">Delete</button>
                        </div>
                  </form>
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

            $("#edit-form").on('submit', function (e) {
                        e.preventDefault();
            $.ajax({
                        type: "PUT",
                        url: 'editOrder.php',
                        data: new FormData(this),
                        dataType: 'text',
                        contentType: false,  
                        cache: false,
                        processData: false,
                        success:function(response)
                        {
                              alert("Success"+response);
                        },
                        error:function(err)
                        {
                              alert("Error:"+err);
                        }
                  });
            });

    

    
      //Attachment-1
      var fileInput = document.querySelector('input[type=file]');
            var filenameContainer = document.querySelector('#filename');
            var dropzone = document.querySelector('div');

            fileInput.addEventListener('change', function () {
                  filenameContainer.innerText = fileInput.value.split('\\').pop();
            });
            // Attachment-2 
            var fileInputs = document.querySelector('#attch');
            var filenameContainers = document.querySelector('#filenames');
            var dropzones = document.querySelector('div');

            fileInputs.addEventListener('change', function () {
                  filenameContainers.innerText = fileInputs.value.split('\\').pop();
            });

//


            //DataTable
            $('#table_data').DataTable({ });
        });

    </script>
<script>
        $(document).ready(function (e) {

       $(".delete_btn").on("click",function(){
           $("#deleteModal").modal('show');

           $tr=$(this).closest('tr');

           var data=$tr.children("td").map(function(){
                 return $(this).text();
           }).get();
            console.log(data);
             $("#delete_id").val(data[0]);
          });

            $("#delete-form").on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: "DELETE",
                    url: 'deleteClient.php',
                    data: new FormData(this),
                    dataType: 'text',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(response)
                    {
                          alert("SuccessFully Delete the Record...!"+response);
                    },
                    error:function(error){
                          alert("SomeThing Going Wrong...!"+error);
                    }

                });
            });
        });

    </script>
</body>

</html>
