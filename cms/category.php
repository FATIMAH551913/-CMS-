<?php session_start();
include('config.php'); 
include('functions.php');
$breadcrumb_array = array(
    "لوحة التحكم",
    "إدارة التصنيفات"
	);

include('header.php'); 
if (isset($_GET['del_id']) && !empty($_GET['del_id'])){
	$del_id= input_secure($_GET['del_id']);
	mysqli_query($connection,"DELETE FROM category WHERE ID='". $del_id ."'");
	?>
      <script language="javascript">window.location.href="category.php?error_msg=1";</script>
    <?php
}else{
?>
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">
            إدارة التصنيفات
			</h3>
		</div>
		<div class="card-toolbar">
            <!--begin::Button-->
            <a href="category_add.php" class="btn btn-primary font-weight-bolder">
                إضافة تصنيف

            </a>
            <!--end::Button-->
		</div>
	</div>
	<div class="card-body">
        <!--begin: Datatable-->
		<table class="table datatable-bordered datatable-head-custom">
			<thead>
				<tr>
					<th>ID</th>
                    <th>رقم التصنيف</th>
					<th>نوع المحتوى</th>
					<th>فعال</th>
					<th>تعديل</th>
					<th>حذف</th>
				</tr>
			</thead>
			<tbody>
				<?php

				// Select Queries
				$read = mysqli_query($connection,"SELECT * from category ORDER BY ID ASC");
				while ($row=mysqli_fetch_array($read)) {
				?>

                
				<tr>
					<td><?php echo $row['ID']; ?></td>
                    <td><?php  echo $row['cat_name']; ?></td>
					<td><?php 
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
					 ?></td>
					<td><?php if($row['cat_pvalid']== 1) {echo "فعال";}else{echo "غير فعال";} ?></td>
					<td><a href=""> تعديل </a></td>
					<td><a href="category.php?del_id= <?php echo $row['ID']; ?>">حذف </a></td>
				</tr>
                <?php } ?>
			</tbody>
		</table>
		<!--end: Datatable-->
	</div>
</div>
<!--end::Card-->
<?php 
}
include('footer.php'); 
?>