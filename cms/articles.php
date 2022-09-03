<?php session_start();
include('config.php'); 
$breadcrumb_array = array(
    "لوحة التحكم",
    "إدارة المقالات" 
);
include('header.php'); 
?>
<!--begin::Card-->
<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<h3 class="card-label">
            إدارة المقالات
			</h3>
		</div>
		<div class="card-toolbar">
            <!--begin::Button-->
            <a href="articles_add.php" class="btn btn-primary font-weight-bolder">
                إضافة مقال جديد
            </a>
            <!--end::Button-->
		</div>
	</div>
	<div class="card-body">
        <!--begin: Datatable-->
		<table class="table datatable-bordered datatable-head-custom">
			<thead>
				<tr>
					<th>Date</th>
                    <th>Name</th>
				</tr>
			</thead>
			<tbody>
                
				<tr>
					<td><?php echo date("Y-m-d"); ?></td>
                    <td>Artile 1</td>
				</tr>
                
			</tbody>
		</table>
		<!--end: Datatable-->
	</div>
</div>
<!--end::Card-->
<?php 
include('footer.php'); 
?>