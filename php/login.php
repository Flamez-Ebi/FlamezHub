<?php
session_start()
?>



<?php


include_once('database.php');




 $email=htmlspecialchars($_POST['email']);

 $password= htmlspecialchars($_POST['pass']);


 
 $query = "SELECT * FROM user WHERE email ='$email' ";
  

$pass="0";

if ($result=mysqli_query($connect,$query)){
$rowcount= mysqli_num_rows($result);
while($row=mysqli_fetch_array($result)){
  
   $pass= $row['password'];
 
   $user_id = $row['id'];
  
    

   if (password_verify($password, $pass))  {  
    $_SESSION['id'] = "$id";
?>
 <script>window.alert("log in succesfull");window.location="#";</script>
 <?php 
   



}else {
  ?>
   <script>
window.alert("INVALID LOGIN CREDENTIAL PLEASE TRY AGAIN!.");
window.location="#";
</script>
<?php }
exit;
}}

?>
   <script>
window.alert("Ther was an error with the LOGIN");
window.location="#";
</script>
<?php

exit;

?>
 