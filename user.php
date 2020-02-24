<?php require_once "./session.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User Management</title>
      <link rel="stylesheet" href="./css/bootstrap.min.css">
      <link rel="stylesheet" href="./css/main.css">
</head>

<body>
      <!-- Main Body Area-->
      <div class="container mt-5">
            <!-- <div class="shadow-md">  -->
            <div class="row justify-content-center">
                  <div class="col-md-8">
                        <div class="statusMsg"></div>
                        <h2 class="heading">Place Your Order</h2>
                        <div><?php echo SuccessMessage(); echo ErrorMessage(); ?></div>
                        <form method="post" id="register-form" enctype="multipart/form-data">
                              <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="UserName">
                              </div>
                              <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                              </div>
                              <div class="form-group">
                                    <input type="number" name="phone" class="form-control" placeholder="Phone">
                              </div>
                              <div class="form-group">
                                    <select class="form-control" name="product_type">
                                          <option value="">-- Select Product Type --</option>
                                          <option>font color</option>
                                          <option>style type</option>
                                    </select>
                              </div>
                              <div class="position-relative">
                                    <div class="form-group">
                                          <div class="wrap">
                                                <input type="file" name="images" accept="image/*" />
                                                <p id="filename">Images</p>
                                                <span>Choose image</span>
                                          </div>
                                    </div>
                              </div>
                              <div class="position-relative">
                                    <div class="form-group">
                                          <div class="wrap">
                                                <input type="file" id="attch" name="attachments"
                                                      accept="application/pdf, application/vnd.ms-excel" />
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
                                    <input type="submit" value="Register Now" name="submit"
                                          class="btn btn-warning btn-block btn-click" />
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
      <script>
            $(document).ready(function (e) {
                  $("#register-form").on('submit', function (e) {
                        e.preventDefault();
                        $.ajax({
                              method: "POST",
                              url: 'submit.php',
                              data: new FormData(this),
                              dataType: "FormData",
                             
                              success: function (response) {
                                    alert("Data Saved" + response);
                              },
                              error: function (err) {
                                    alert('Error is not coming slow', + err)
                              }
                        });
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
      </script>

</body>

</html>
