<?php include_once "./connection.php";?>
<?php require_once "./session.php"; ?>
<?php require_once "./utility.php";  ?>

<?php
if (!empty($_FILES['images']['name'])  || !empty($_FILES['attachments']['name'])) {
      echo "Updated image";
      if(isset($_POST["name"])){
            $name=trim($_POST["name"]);
            $email=trim($_POST["email"]);
            $phone=trim($_POST["phone"]);
            $product_type=trim($_POST['product_type']);
            $message=trim($_POST['message']);
          
            $fname=$_FILES['images']['name'];
            $destination="./images/".$fname;
            $destination_image="./images/".$fname;
            move_uploaded_file($_FILES['images']['tmp_name'],$destination);
      
            $filename=$_FILES['attachments']['name'];
            $ra1=rand(1111,9999);
            $ra2=rand(1111,9999);
            $ra3=$ra1.$ra2;
            $ra3=md5($ra3);
            $doc="./attachments/".$ra3.$filename;
            $destination_doc="./attachments/".$ra3.$filename;
            move_uploaded_file($_FILES['attachments']['tmp_name'],$doc);
      
         if(!empty($name) )
          {
              $PostEditId=$_GET['id'];
              $sql="update client set name='$name', email='$email', phone='$phone', product_type='$product_type',
               images='$destination_image', attachments='$destination_doc', message='$message' where id='$PostEditId' " ;
              $statement = $conn->prepare($sql);
              $result = $statement->execute();
             if($result)
             {
                 $_SESSION["SuccessMessage"]="Post Has Been Updated SuccessFully";
                 Redirection_to_Action("admin.php");
             }
             else{
                 $_SESSION["ErrorMessage"] ="Some Went Going Wrong...PLease Try Header";
                 Redirection_to_Action("admin.php");
             }
          }else{
              $_SESSION["ErrorMessage"] ="Inserted Values is NULL";
          }   
      }  
}
// with Out selection of file
else {
      if (isset($_POST['name'])) {
           
    
      $name=trim($_POST["name"]);
      $email=trim($_POST["email"]);
      $phone=trim($_POST["phone"]);
      $product_type=trim($_POST['product_type']);
      $message=trim($_POST['message']);

   if(!empty($name) )
    {
      
        $PostEditId=$_GET['id'];
        echo $PostEditId;
        $sql="update client set name='$name', email='$email', phone='$phone', product_type='$product_type',
         message='$message' where id='$PostEditId' " ;
        $statement = $conn->prepare($sql);
        $result = $statement->execute();
       if($result)
       {
           $_SESSION["SuccessMessage"]="Post Has Been Updated SuccessFully";
           Redirection_to_Action("admin.php");
       }
       else{
           $_SESSION["ErrorMessage"] ="Some Went Going Wrong...PLease Try Header";
           Redirection_to_Action("admin.php");
       }
    }else{
        $_SESSION["ErrorMessage"] ="Inserted Values is NULL";
    }  
   }
}    

?>

