<!doctype html>
<html lang="en">
<head>
	<?php $this->load->view('admin/template/head'); ?>
	<title>User Details</title>
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
							<h1><?=ucfirst($users[0]->u_id)?></h1>

						</div>
						<div class="col-md-6 text-center d-felx align-self-center">
							<input type="hidden" name="u_id" id="u_id" value="<?=$users[0]->u_id?>">
							<select id="status_mang" class="form-select" aria-label="Default select example">
								<option <?php if ($users[0]->u_status == 'active') { echo "selected"; }?> value="active">Active</option>
								<option <?php if ($users[0]->u_status == 'inactive') { echo "selected"; }?> value="inactive">Inactive</option>
								<?php if ($users[0]->u_status == 'pending'){ ?>
									<option selected value="pending">Pending</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<hr>
					<div class="row ">
						<div class="col-md-12 text-center">
							<img src="<?=base_url()?><?=$users[0]->u_path?>/<?=$users[0]->u_profile?>">
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Name :</label> 
									<h6><?=ucfirst($users[0]->u_fname)?> <?=ucfirst($users[0]->u_lname)?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Email :</label> 
									<h6><?=$users[0]->u_email ?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Phone :</label> 
									<h6><?=$users[0]->u_phone ?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Gender :</label> 
									<h6><?=$users[0]->u_gender?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Address :</label> 
									<h6><?=$users[0]->u_add ?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">City :</label> 
									<h6><?=$users[0]->u_city ?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">State :</label> 
									<h6><?=$users[0]->u_state ?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Pincode :</label> 
									<h6><?=$users[0]->u_pincode?></h6>
								</div>
							</div>
						</div>
						<div class="col-md-4 mt-3">
							<div class="card">
								<div class="card-body">
									<label class="f-500">Created :</label> 
									<h6><?=getDateFormat($users[0]->createdat)?></h6>
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
				url:base_path+'admin/users/updateStatus',
			type:"POST",
				data: {value:$(this).val(),id:$('#u_id').val()},
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