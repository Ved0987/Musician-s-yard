<!doctype html>
<html lang="en">
<head>
	<?php $this->load->view('admin/template/head'); ?>
	<title>Seller Details</title>
</head>
<body>
	<div class="container-fluid py-3">
		<div class="row">
			<div class="col-md-2 border-end">
				<?php $this->load->view('admin/template/sidebar'); ?>
			</div>
			<div class="col-md-10">
				<div class="container mt-2">
					<div class="row">
						<div class="col-md-12 text-end">
							<a href="<?=base_url()?>admin-logout">Logout</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6 text-center d-felx">
							<h1><?=ucfirst($seller[0]->s_shopname)?></h1>

						</div>
						<div class="col-md-6 text-center d-felx align-self-center">
							<input type="hidden" name="s_id" id="s_id" value="<?=$seller[0]->s_id?>">
							<select id="status_mang" class="form-select" aria-label="Default select example">
								<option <?php if ($seller[0]->s_status == 'active') { echo "selected"; }?> value="active">Active</option>
								<option <?php if ($seller[0]->s_status == 'inactive') { echo "selected"; }?> value="inactive">Inactive</option>
								<?php if ($seller[0]->s_status == 'pending'){ ?>
									<option selected value="pending">Pending</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<hr>
					<div class="row ">
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Name :</label> 
									<h6><?=ucfirst($seller[0]->s_fname)?> <?=ucfirst($seller[0]->s_lname)?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Email :</label> 
									<h6><?=$seller[0]->s_email ?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Phone :</label> 
									<h6><?=$seller[0]->s_phone ?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">GST :</label> 
									<h6><?=$seller[0]->s_gst?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Address :</label> 
									<h6><?=$seller[0]->s_add ?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">City :</label> 
									<h6><?=$seller[0]->s_city ?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">State :</label> 
									<h6><?=$seller[0]->s_state ?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Pincode :</label> 
									<h6><?=$seller[0]->s_pincode?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Created :</label> 
									<h6><?=getDateFormat($seller[0]->createdat)?></h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('admin/template/footer'); ?>
	<script type="text/javascript">
		$( "#status_mang" ).change(function() {
			$.ajax({
				url:base_path+'admin/sellers/updateStatus',
			type:"POST",
				data: {value:$(this).val(),id:$('#s_id').val()},
				success: function(result){
					if(result == 'success'){
						 location.reload();
					}
				}
			});
		});
	</script>
</body>
</html>