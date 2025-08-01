<!DOCTYPE html>
	<html lang="en">
	<head>
		<?php $this->load->view('user/template/login-head'); ?>
		<title>Login</title>
	</head>
	<style type="text/css">
		.owl-nav{
			text-align: center;
			margin-top: 15px ;
		}
	</style>
	<body>
		<section id="mainBanner">
			<div class="container">
				<div class="row py-5">
					<div class="offset-md-2 col-md-8 col-12">
						<div class="card shadow-lg">
							<div class="card-body text-center">
								<a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo.png"></a>
							</div>
							<div class="card-body">
								<form action="" method="POST" id="login_form" name='login_form' enctype="multipart/form-data" >
									<div class="mb-3">
										<label for="u_email" class="form-label">Email address</label>
										<input type="email" class="form-control" id="u_email" name="u_email" aria-describedby="emailHelp">
									</div>
									<div class="mb-3">
										<label for="u_password" class="form-label">Password</label>
										<input type="password" class="form-control" id="u_password" name="u_password">
									</div>
									<div class="mb-3 text-end">
										<button type="submit" id="submitBtn" class="btn btn-danger">Login</button>
									</div>
								</form>
								<div class="row">
                  <div class="col-md-12 text-center">
                    <p class="f-600">Don't have an account? <a href="<?=base_url()?>user-registration" class="link-danger">Signup</a></p>
                  </div>
                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- footer -->
		<?php $this->load->view('user/template/login-footer'); ?>
		<!-- footer -->
		<script type="text/javascript">
		$(document).ready(function($) {
			$.validator.addMethod("valueNotEquals", function(value, element, arg){
				return arg !== value;
			}, "Value must not equal arg.");
			$("#login_form").validate({
				
				rules: {
					u_email:{
						required:true,
						email:true,
					},
					u_password:{
						required :true,
					},                
				},
				errorPlacement: function(error, element) 
				{
					if (element.attr("type") == "file") {
						error.insertAfter(element);
					} else {}
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