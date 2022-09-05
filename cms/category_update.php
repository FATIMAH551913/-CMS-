<?php if(!isset($_SESSION)) { session_start(); } 
include('config.php');
include('functions.php');
$breadcrumb_array = array(
        "لوحة التحكم",
        "إدارة التصنيفات",
        "تعديل بيانات التصنيف");

include('header.php'); 

?>
<?php
if (isset($_POST['save_form']) && !empty($_POST['save_form'])){
	$cat_name= input_secure($_POST['cat_name']);
	$cat_type= input_secure($_POST['cat_type']);
	if (isset($_POST['cat_pvalid']) && !empty($_POST['cat_pvalid'])){
		$cat_pvalid= 1;
	}else{
		$cat_pvalid= 0;
	}
	$cat_id= input_secure($_POST['cat_id']);
	// Edit files
$expensions = array("jpg","jpeg","png");
if(isset($_FILES['data']['name']) && $_FILES['data']['name'] !=""){
      $cat_image = upload_file($_FILES['data'],$expensions,"cat_","صورة التصنيف");
	  $img_sql = ",cat_image='" . $cat_image . "'";
} else {
	  $img_sql = "";
}

// Add Row
mysqli_query($connection,"update ". $sql_insert_ignore ." category set cat_name='". $cat_name ."',cat_type='". $cat_type ."' ,cat_pvalid='". $cat_pvalid . "',cat_order='1'" .$img_sql. " WHERE ID='" . $cat_id ."'");
?>
      <script language="javascript">window.location.href="category.php?error_msg=1";</script>
      <?php
}else{
	if (isset($_GET['cat_id']) && !empty($_GET['cat_id'])){
		$cat_id= input_secure($_GET['cat_id']);
		$sqtstmnt = "SELECT * from category WHERE ID='" . $cat_id . "'";
$result = mysqli_query($connection,$sqtstmnt);

$cats_num = mysqli_num_rows($result);
if(isset($cats_num) && $cats_num > 0) {
	$row = mysqli_fetch_array($result);

?>
	<!--begin::Dashboard-->
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
				<div class="card-header">
					<h3 class="card-title">
					إضافة تصنيف جديد
				
					</h3>
				</div>
				<!--begin::Form-->
				<form class="form" method="post" action="category_update.php" enctype="multipart/form-data">
					<div class="card-body">
						<div class="form-group row">
							<label class="col-lg-3 col-form-label text-right">اسم التصنيف</label>
							<div class="col-lg-9 col-xl-4">
								<input name="cat_name" id="cat_name" type="text" class="form-control" placeholder="" value= "<?php echo $row['cat_name'];?>" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label text-right">صورة</label>
							<div class="col-lg-9 col-xl-4">
								<div class="custom-file">
									<input type="file" class="custom-file-input" name="data" id="data">
									<label class="custom-file-label" for="companyProfileFile"> Choose file </label>
								</div>
							</div>
						</div>
						<?php if (!empty($row['cat_image'])) { ?> 
						<div class="form-group row">
							<label class="col-lg-3 col-form-label text-right"> صورة الحالية</label>
							<div class="col-lg-9 col-xl-4">
							<a href= '<?php echo $row['cat_image']; ?>' target="blank"> <img src='<?php echo $row['cat_image']; ?>' style="max-width:50px;"></a>
							</div>
						</div>
						<?php } ?>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label text-right">نوع المحتوى</label>
							<div class="col-lg-9 col-xl-4">
							<select name ="cat_type" id="cat_type" class="form-control form-control-solid ">
							<option value="<?php echo $row['cat_type'];?>" selected >
								<?php
									switch ($row['cat_type']){
										case "1":
											echo "مقالات";
											break;
										case "2":
											echo "صور";
											break;
										case "3":
											echo "فيديوهات";
											break;
									}
								?>
							</option>	
							<option value="1">مقالات </option>
								<option value="2"> صور</option>
								<option value="3"> فيديوهات</option>
							</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label text-right">تفعيل</label>
							<div class="col-3">
								<span class="switch switch-icon">
									<label>
									<input type="checkbox" <?php if($row['cat_pvalid'] == 1) { ?>  checked="checked" <?php }?> name="cat_pvalid" id="cat_pvalid"/>
										<span></span>
									</label>
								</span>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-10">
							<input type="hidden" id="save_form" name="save_form" value="1">
							<input type="hidden" id="cat_id" name="cat_id" value="<?php echo $cat_id; ?>">
								<button type="submit" class="btn btn-success mr-2">حفظ</button>
								<a href="category_add.php" class="btn btn-secondary">إلغاء</a>
							</div>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Card-->
	<!--end::Dashboard-->
  
<?php 
    } else{
		echo "لايوجد تصنيف بهذا الرقم";
	}
}else {
	echo "يجب تعديل رقم التصنيف الذي ترغب في تحديد بياناته";
}
}
include('footer.php'); 

?>