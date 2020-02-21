<?php 
$response=array(
    'status' => '0',
    'message' => "Failed to Post the form data.Please try Again..."
);

  if (isset($_POST['name'])) {

      $name=trim($_POST['name']);
      $email=trim($_POST['email']);
      $phone=trim($_POST['phone']);
      $product_type=trim($_POST['product_type']);
      $message=trim($_POST['message']);
      
      $fname=$_FILES['images']['name'];
      $r1=rand(1111,9999);
      $r2=rand(1111,9999);
      $r3=$r1.$r2;
      $r3=md5($r3);
      $destination="./images/".$r3.$fname;
      $destination_image="./images/".$r3.$fname;
      move_uploaded_file($_FILES['images']['tmp_name'],$destination);

      $filename=$_FILES['attachments']['name'];
      $ra1=rand(1111,9999);
      $ra2=rand(1111,9999);
      $ra3=$ra1.$ra2;
      $ra3=md5($ra3);
      $doc="./attachments/".$ra3.$filename;
      $destination_doc="attachments/".$ra3.$filename;
      move_uploaded_file($_FILES['attachments']['tmp_name'],$doc);

      $uploadStatus=1;

         if ($uploadStatus==1 || empty($username)|| empty($email) || empty($phone) || empty($destination_image) || empty($destination_doc) || empty($message)) {
         include_once "./connection.php";
            
            $insert="insert into client (name,email,phone,product_type,images,attachments,message) 
            VALUES('$name','$email','$phone','$product_type','$destination_image','$destination_doc','$message')";
            $statement = $conn->prepare($insert);
            $result = $statement->execute();
            if ($result) {
               $response['status']=1;
               $response['message'] = "Form Has Been Submit SuccessFully";
               echo "Submit Successfully.";
               //  echo '<script type="text/javascript">location.href ="checkout.html";</script>';
            } 
            else {
            $response['message'] = "Something Going Wrong...please try again.";
               echo "Something Going Wrong...please try again.";

            }
         }
         else {
            echo "Please Fill All the fields...!";
         }
     } 
      else{
            $response['message'] = "Something Going Wrong...please try again and Harder.";
            echo "Something Going Wrong...please try again and Harder. ";
         }
   

?>