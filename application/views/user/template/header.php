<section id="header">
	
	<div class="container">
		<div class="row py-2 align-items-center">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg">
					<div class="container-fluid">
						<a class="navbar-brand" href="<?=base_url()?>"><img class="header-logo" src="<?=base_url()?>assets/images/logo.png"></a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="<?=base_url()?>">Home</a>
								</li>
								<li class="nav-item ms-2">
									<a class="nav-link" href="<?=base_url()?>shop">Shop</a>
								</li>
								<li class="nav-item ms-2">
									<a class="nav-link" href="<?=base_url()?>seller-registration">Join Us As Seller</a>
								</li>
								<?php
								if($this->session->userdata('user_session')){?>
									<li class="nav-item ms-2">
										<a class="nav-link" href="<?= base_url() ?>cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
									</li>
									<div class="dropdown-center align-self-center ms-3">
										<a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											<img src="<?=base_url()?>assets/images/upload-user-img.png" style="width: 25px;">
										</a>

										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="<?= base_url() ?>profile">My Account</a></li>
											<li><a class="dropdown-item" href="<?=base_url()?>orders">Orders</a></li>
											<li><a class="dropdown-item" href="<?=base_url()?>login/logout">Logout</a></li>
										</ul>
									</div>
								<?php }else{ ?>
									<li class="nav-item ms-2">
										<a class="btn btn-danger " href="<?=base_url()?>user-login" >Login</a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>