<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('user/template/login-head'); ?>
	<title>Profile</title>
</head>
<style type="text/css">
	.float-edit-btn{
		position: absolute;
		top: 10px;
		right: 10px;
	}
	.upload-img{
		width: 150px;
	}
	#preview{
		height: 150px;
		width: 150px;
		border-radius: 50%;
	}
</style>
<body>
	<!-- header -->
	<?php $this->load->view('user/template/header'); ?>
	<!-- header -->
	<section id="mainBanner">
		<div class="container">
			<div class="row py-5">
				<div class="offset-md-2 col-md-8 col-12">
					<div class="card shadow-lg">
						<a href="<?=base_url()?>profile-edit"><i class="float-edit-btn fa fa-pencil-square-o fa-3x" aria-hidden="true"></i></a>
						<div class="card-body">
							<form action="" method="POST" id="register-form" name='register-form' enctype="multipart/form-data" novalidate>
								<div class="row">
									<div class="mb-3">
										<div class="col-md-12 text-center">
											<img class="upload-img rounded-circle" id="preview" src="<?=base_url()?>/<?=$details[0]->u_path?>/<?=$details[0]->u_profile?>" >
											<input readonly type="file" id="u_profile" name="u_profile" class="cupload" accept="image/*" data-allowed-file-extensions="png jpg jpeg" style="display: none;">  
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="mb-3">
											<label for="u_fname" class="form-label ">First Name</label>
											<input readonly type="text" class="form-control" id="u_fname" name="u_fname" value="<?= $details[0]->u_fname ?>" >
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="mb-3">
											<label for="u_lname" class="form-label ">Last Name</label>
											<input readonly type="text" class="form-control" id="u_lname" name="u_lname" value="<?= $details[0]->u_lname ?>" >
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="mb-3">
											<label for="u_email" class="form-label ">Email</label>
											<input readonly type="email" class="form-control" id="u_email" name="u_email" value="<?= $details[0]->u_email ?>">
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="mb-3">
											<label for="u_phone" class="form-label ">Phone</label>
											<input readonly type="text" class="form-control" id="u_phone" name="u_phone" value="<?= $details[0]->u_phone ?>">
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="mb-3">
											<label for="u_dob" class="form-label ">Date of Birth</label>
											<input readonly type="text" class="form-control" id="u_dob" name="u_dob" value="<?= $details[0]->u_dob ?>" readonly>
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="mb-3">
											<label for="u_gender" class="form-label ">Gender</label>
											<input readonly type="text" class="form-control" id="u_gender" name="u_gender" value="<?= $details[0]->u_gender ?>">
										</div>
									</div>
									<div class="col-md-12 col-12">
										<div class="mb-3">
											<label for="u_add" class="form-label ">Address</label>
											<textarea readonly class="form-control" id="u_add" name="u_add" ><?= $details[0]->u_add ?></textarea>
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="mb-3">
											<label for="u_city" class="form-label ">City</label>
											<input readonly type="text" class="form-control" id="u_city" name="u_city" value="<?= $details[0]->u_city ?>">
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="mb-3">
											<label for="u_state" class="form-label ">State</label>
											<input readonly type="text" class="form-control" id="u_state" name="u_state" value="<?= $details[0]->u_state ?>">
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="mb-3">
											<label for="u_country" class="form-label ">Country</label>
											<input readonly type="text" class="form-control" id="u_country" name="u_country" value="<?= $details[0]->u_country ?>" >
										</div>
									</div>
									<div class="col-md-6 col-12">
										<div class="mb-3">
											<label for="u_pincode" class="form-label ">Pincode</label>
											<input readonly type="text" class="form-control" id="u_pincode" name="u_pincode" value="<?= $details[0]->u_pincode ?>">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- footer -->
	<?php $this->load->view('user/template/footer'); ?>
	<!-- footer -->
	<script type="text/javascript">
		function openfileDialog() {
			$("#u_profile").click();
		}
		$('#u_profile').change(function(){
			const file = this.files[0];
			console.log(file);
			if (file){
				let reader = new FileReader();
				reader.onload = function(event){
					console.log(event.target.result);
					$('#preview').attr('src', event.target.result);
				}
				reader.readAsDataURL(file);
			}
		});

	</script>
	<script type="text/javascript">
		$(document).ready(function($) {
			$.validator.addMethod("valueNotEquals", function(value, element, arg){
				return arg !== value;
			}, "Value must not equal arg.");
			$("#register-form").validate({
				ignore: "#hidden",
				errorElement: 'div',
				errorClass: 'invalid-feedback',
				successClass: 'is-valid',
				rules: {
					u_profile:{
						required:true,
					},
					u_fname:{
						required :true,
					},                
					u_lname: {
						required: true,
					},
					u_email:{
						required :true,
						email:true,
					},                
					u_phone: {
						required: true,
						minlength:10,
						maxlength:10
					},
					u_password: {
						required: true,
					},
					u_cpassword:{
						required :true,
						 equalTo: "#u_password"
					},                
					u_dob: {
						required: true,
					},
					u_gender: {
						valueNotEquals: 'default',
					},
					u_add: {
						required: true,
					},
					u_city: {
						required: true,
					},
					u_state: {
						required: true,
					},
					u_country: {
						required: true,
					},
					u_pincode: {
						required: true,
					},
				},
				messages:{
					u_profile:{
						required:'Please upload image',
					},
					u_fname:{
						required :'Please Enter First Name',
					},                
					u_lname: {
						required: 'Please Enter Last Name',
					},
					u_email:{
						required :'Please Enter Email',
					},                
					u_phone: {
						required: 'Please Enter Phone Number',
					},
					u_password: {
						required: 'Please Enter Password',
					},
					u_cpassword:{
						required :'Please Enter Password Again',
					},                
					u_dob: {
						required: 'Please Enter Date of Birth',
					},
					u_gender: {
						valueNotEquals: 'Please Enter Gender',
					},
					u_add: {
						required: 'Please Enter Address',
					},
					u_city: {
						required: 'Please Enter City',
					},
					u_state: {
						required: 'Please Enter State',
					},
					u_country: {
						required: 'Please Enter Country',
					},
					u_pincode: {
						required: 'Please Enter Pincode',
					},
				},
				errorPlacement: function(error, element) 
				{
					if (element.attr("type") == "file") {
						error.insertAfter(element);
					} else {
						error.insertAfter(element);
					}

				},
				highlight: function (element, errorClass, validClass) {
					$(element).removeClass('is-valid').addClass('is-invalid');
				},
				unhighlight: function (element, errorClass, validClass) {
					$(element).removeClass('is-invalid').addClass('is-valid');
				},
				submitHandler: function(form) {
					$('#submitBtn').prop('disabled',true);
					form.submit();
				}     
			});
		});
	</script>
</body>
</html>