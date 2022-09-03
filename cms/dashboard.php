<?php
if(!isset($_SESSION)) { session_start(); }  
include('config.php');
include('functions.php');
// 1- check if username and password is Ok 1' OR 'x' = 'x
// 2- if not , go back to login page and dispiy error message
// 3- if yes , create session , then disply dashbord code

//-------------------------------------
/* 
 == Forget Password ==
 1- Select where username or email or mobile is exist.
 2- if no, display message 'not member'.
 3- if yes, send V-code 'email/ sms'.
 4- save vcode with expiry data .
 5- form ==> vcodee  & new password. 
 6-check vcode is right or valid.
 7-if no , vcode (X) / Expired.
 8- if yes, save new password.

*/

if (!isset($_SESSION['admin_role'])){
   if (isset($_POST['username']) && isset($_POST['password'])){
   $username = input_secure($_POST['username']);
   $password =  input_secure($_POST['password']);

   $ency_password = sha1(md5($password));
   
   $slq_qury = mysqli_query($connection,"SELECT * from users where username = '". $username ."' and  password = '" .  $ency_password . "' and pvalid= '1' ");
   $users_num = mysqli_num_rows($slq_qury);
   
    if($users_num > 0 ) {
       $_SESSION['admin_role'] = 1;
       ?>
       <script language="javascript">window.location.href="dashboard.php";</script>
       <?php
    }else {
      ?>
      <script language="javascript">window.location.href="index.php?error_msg=1";</script>
      <?php
    }

   }else {
      ?>
      <script language="javascript">window.location.href="index.php?error_msg=1";</script>
      <?php
   }
} else {
?>
<?php
// عبارة عن ارري تحدد موقعك انت في كذا ... تكتب اعلى الصفحة
$breadcrumb_array = array(
    "لوحة التحكم");
 include('header.php'); 
?>
<!--begin::Dashboard-->
Welcome
<!--end::Dashboard-->
<?php 
$widget_page = true;
include('footer.php'); 
}
?>