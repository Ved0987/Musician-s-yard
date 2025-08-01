<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('user/template/head'); ?>
	<title>Cart</title>
</head>
<style type="text/css">
	#filter a{
		padding: 5px 10px ;
		background-color: #c04641;
		font-weight: bold;
		color: #fff !important;
	}
	#filter .active{
		background-color: #092248 !important;
	}
</style>
<body>
	<!-- header -->
	<?php $this->load->view('user/template/header'); ?>
	<!-- header -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<div class="row text-end">
						<a href="<?=base_url()?>shop"><i class="fa fa-times" aria-hidden="true"></i></a>
						
					</div>
					<div class="row" id="filter">
						<?php 
						foreach ($menuFilter as $key => $value) { ?>
							<a class="<?php if($get == $value->m_id){echo 'active';} ?> mt-2 " href="<?=base_url()?>shop?menu=<?=$value->m_id?>"><?=$value->m_name?></a>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-10">
					<?php if(count($product) > 0){ ?>
						<div class="row">
							<?php foreach ($product as $key => $value) { ?>
								<div class="col-md-4 mt-3">
									<a href="<?=base_url()?>product-view/<?=$value->p_id?>">
										<div class="card">
											<img src="<?=base_url()?>uploads/product_images/<?=$value->product_img[0]->p_photo?>" class="card-img-top" alt="...">
											<div class="card-body">
												<h3><?=$value->p_name?></h3>
												<h4 class="mt-2">₹ <?=$value->p_price?></h4>
											</div>
										</div>
									</a>
								</div>
							<?php } ?>
						</div>
					<?php }else{ ?>
						<div class="row">
							<div class="col-md-12">
								<h1>No Product Found !</h1>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
			
		</div>
	</section>


	<!-- footer -->
	<?php $this->load->view('user/template/footer'); ?>
	<!-- footer -->
</body>
</html>