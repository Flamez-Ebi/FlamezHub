<?php
session_start()
?>

<?php
include_once('dbase/index.php');
$fname=htmlspecialchars($_POST['s_fname']);
$lname=htmlspecialchars($_POST['s_lname']);
$phone=htmlspecialchars($_POST['s_phone']);
$email=htmlspecialchars($_POST['s_email']);
$gender=htmlspecialchars($_POST['s_gender']);
$dob=htmlspecialchars($_POST['s_dob']);
$state=htmlspecialchars($_POST['s_state']);
$password=htmlspecialchars($_POST['s_password']);
$p_location=htmlspecialchars($_POST['s_prefarelocation']);
$p_gender=htmlspecialchars($_POST['s_prefaregender']);
$additionalinfo=($_POST['s_additionalinfo']);
$plan=htmlspecialchars($_POST['s_plan']);
$h_password = password_hash($password, PASSWORD_DEFAULT);
 


 $insert = "SELECT * FROM users  " ;
    if ($result=mysqli_query($connect,$insert)){
    $rowcount= mysqli_num_rows($result);
    }


    $user_no = $rowcount + 1;

if($user_no < 10){
  $user_no ="000".$user_no;
  }

  if($user_no > 10 and $user_no  < 100){
  $user_no ="00".$user_no;
  }
   if($user_no > 100 and $user_no  < 1000){
  $user_no ="0".$user_no;
  }

 $user_id = 'US_'.$user_no;







 //searches if email exist

$insert = "SELECT * FROM users WHERE email='$email' ";
if ($result=mysqli_query($connect,$insert)){
    $rowcount= mysqli_num_rows($result);

    if ($rowcount > 0) {

?>
<script>
  
window.alert("ERR: EMAIL ALREADY EXIST");
window.location="../";
</script>
<?php
   
     exit;       
 
  
  }}


$insert = "SELECT * FROM users WHERE phone='$phone' ";
if ($result=mysqli_query($connect,$insert)){
    $rowcount= mysqli_num_rows($result);

    if ($rowcount > 0) {

?>
<script>
  
window.alert("ERR: TELEPHONE NO. ALREADY EXIST");
window.location="../";
</script>
<?php
   
     exit;       
 
  
  }}

//insert into database
$sql = "INSERT INTO users (user_id,fname,lname,email,gender,phone,pin,plan,dob,state,p_location,p_gender,additionalinfo,reg_time,reg_date) VALUES ('$user_id','$fname','$lname','$email','$gender','$phone','$h_password','$plan','$dob','$state','$p_location','$p_gender','$additionalinfo',NOW(),NOW())";


$sql2 = "INSERT INTO account (user_id,balance) VALUES ('$user_id','0')";






if ($conn->query($sql) === TRUE and $conn->query($sql2) === TRUE   ) {

 $_SESSION['user_id'] = $user_id;



    ?>
<script>
  
//window.alert("SUCCESSFULLYY SAVED");
window.location = "../dashboard";
</script>
<?php
   


    
    
  
} else {
    ?>
  <script>
  
window.alert("Not Successful");
</script>
<?php
}

$conn->close();










?>

