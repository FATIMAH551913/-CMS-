<?php if(!isset($_SESSION)) { session_start(); } 
if (isset($_SESSION['admin_role'])){
$breadcrumb_array = array(
        "لوحة التحكم",
        "إدارة المقالات",
        "إضافة مقال جديد");
include('header.php'); 
?>

<!--begin::Dashboard-->
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">
				إضافة مقال جديد
				</h3>
			</div>
			<!--begin::Form-->
			<form class="form" method="post" action="courseManagement.php">
				<div class="card-body">
                    <div class="form-group row">
						<label class="col-lg-3 col-form-label text-right"> عنوان المقال</label>
						<div class="col-lg-9 col-xl-4">
							<input type="text" class="form-control" placeholder=""/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">تاريخ النشر</label>
						<div class="col-lg-9 col-xl-4">
							<input type="date" class="form-control" placeholder=""/>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">صورة</label>
						<div class="col-lg-9 col-xl-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="companyProfileFile">
                                <label class="custom-file-label" for="companyProfileFile"> Choose file </label>
                            </div>
						</div>
					</div>
                    <div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">عنوان المقال </label>
						<div class="col-lg-9 col-xl-4">
						   <textarea class="form-control" readonly="readonly" rows="3"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-lg-3 col-form-label text-right">تفعيل</label>
						<div class="col-3">
							<span class="switch switch-icon">
								<label>
									<input type="checkbox" checked="checked" name="select"/>
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
							<button type="submit" class="btn btn-success mr-2">حفظ</button>
							<a href="articles.php" class="btn btn-secondary">إلغاء</a>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Card-->
<!--end::Dashboard-->

<?php 
include('footer.php'); 
}else {
	?>
	<script language="javascript">window.location.href="index.php";</script>
	<?php
  }
?>