<?php
session_start()
?>



<?php


include_once('../sign_up/dbase/index.php');




 $user_name=htmlspecialchars($_POST['user_name']);

 $password= htmlspecialchars($_POST['password']);


 
 $query = "SELECT * FROM users WHERE email ='$user_name' ";
  

$pass="0";

if ($result=mysqli_query($connect,$query)){
$rowcount= mysqli_num_rows($result);
while($row=mysqli_fetch_array($result)){
  
   $pass= $row['pin'];
 
   $user_id = $row['user_id'];
  
    

   if (password_verify($password, $pass))  {  
    $_SESSION['user_id'] = "$user_id";
?>
 <script>window.location="../dashboard";</script>
 <?php 
   



}else {
  ?>
   <script>
window.alert("INVALID LOGIN CREDENTIAL PLEASE TRY AGAIN!.");
window.location="../";
</script>
<?php }
exit;
}}

?>
   <script>
window.alert("INVALID LOGIN CREDENTIAL PLEASE TRY AGAIN!.");
window.location="../";
</script>
<?php

exit;

?>
 