
<?php

function input_secure($inp_var_name)
{
$inp_var_name = addslashes($inp_var_name);
$inpvarname = strip_tags($inp_var_name);
return $inp_var_name;
}

/*************************** Upload Files ***************************/
// enctype="multipart/form-data" in form.   لتحميل الصور


// Start of file upload funtion for PHP5
function upload_file($file_data,$expensions,$pre_char,$file_label)
{
 
    
      $file_path            = "";
      $error_msg_extention  = "";
      $error_msg_size       = "";
      $errors               = array();
      if(isset($file_data)) { 
      $file_ext  = strtolower(end(explode('.',$file_data['name'])));
      $file_name = $pre_char."_".time()."_".rand(1, 100).".".$file_ext;
      $file_size = $file_data['size'];
      $file_tmp  = $file_data['tmp_name'];
      $file_type = $file_data['type'];
      if(isset($file_ext) && in_array($file_ext,$expensions)=== false){
         $errors[]            = "الملف المرفق ليس من أنواع الملفات المسموح بها";
         $error_msg_extention = "خطأ في تحميل : " . $file_label ." - الملف المرفق ليس من أنواع الملفات المسموح بها";
         echo "<script>alert('". $error_msg_extention ."');</script>";
      }
      
      if($file_size > 10097152){
         $errors[]       = "الحد الأقصى لحجم الملف للتحميل هو 10 ميجا فقط";
         $error_msg_size = "خطأ في تحميل : " . $file_label ." - الحد الأقصى لحجم الملف للتحميل هو 10 ميجا فقط";
         echo "<script>alert('". $error_msg_size ."');</script>";
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$uploadpath."uploads/".$file_name);
         $file_path = "uploads/".$file_name;
         return $file_path;
      } 
      } else {
         $file_path = "";
         return $file_path;
      }
}    
// End of file upload funtion for PHP5
?>

<?php
/*************************** Send E-mail ***************************/
// Start of send e-mail function //
function send_mail_message($address, $comments) {

    // Start of send variable //
    $sitenamemal = $organization_name;
    $contemail = $contemail;
    $frm_e_subject = "لديك رسالة من";
    $frm_e_subject_snd_to = "مرسلة إلى";
    $frm_e_subject_snd_bdy = "وفيما يلي نص الرسالة : ";
    $frm_can_contact = "يمكنك التواصل مع";
    $frm_can_contact_mail = "من خلال البريد الإلكتروني :";
    // Start of send variable //
    
    $comments = $comments;
    $address = $address;
    
    $name = $sitenamemal;
    $email = $contemail;
    $subject = $frm_e_subject ." ". $name ;
    
    $e_body = "$frm_e_subject $name , $frm_e_subject_snd_bdy " . PHP_EOL . PHP_EOL;
    $e_content = "\"$comments\"" . PHP_EOL . PHP_EOL;
    $e_reply = "$frm_can_contact $name $frm_can_contact_mail  $email ";
    
    $msg = wordwrap( $e_body . $e_content . $e_reply, 70 );
    
    $headers = "From: $email" . PHP_EOL;
    $headers .= "Reply-To: $email" . PHP_EOL;
    $headers .= "MIME-Version: 1.0" . PHP_EOL;
    $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
    $headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
    
    mail($address, $subject, $msg, $headers);
    
    }
    // End of send e-mail function //
?>

<?php 