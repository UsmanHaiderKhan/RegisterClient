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