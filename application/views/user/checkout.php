<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('user/template/head'); ?>
	<title>Checkout</title>
</head>

<body>
	<!-- header -->
	<?php $this->load->view('user/template/header'); ?>
	<!-- header -->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h1>Checkout</h1>
				</div>
			</div>
			<!--  -->
			<div class="row">
				<?php 
				$finalTotal = 0;
				$total_Pd_price = 0;
				foreach ($getCart as $key => $value) { 
					$qty = intval($value->qty);
					$product_price = intval($value->product[0]->p_price);
					$total_Pd_price = $qty * $product_price;
					$finalTotal = $finalTotal + $total_Pd_price; ?>
					<div class="col-md-12">
						<div class="card border-0">
							<div class="">
								<div class="row align-items-center">
									<div class="col-md-2">
										<img class="w-100" src="<?=base_url()?>uploads/product_images/<?=$value->product_img[0]->p_photo?>">
									</div>
									<div class="col-md-4">
										<p><?= $value->product[0]->p_name ?></p>
									</div>
									<div class="col-md-3">
										₹ <?= $value->product[0]->p_price ?>
									</div>
									<div class="col-md-1">
										<?= $value->qty ?>
									</div>
									<div class="col-md-2 text-end">
										<p>₹ <?= $total_Pd_price ?></p>
									</div>

								</div>
							</div>
						</div>
						<hr>
					</div>
				<?php	} ?>
			</div>
			<div class="row">
				<div class="col-md-10">
					Mode of Payment
				</div>
				<div class="col-md-2 text-end">
					<p>COD</p>
				</div>
			</div>
			<div class="row py-3">
				<div class="col-md-10" style="font-weight: bold;">
					Total Payable Amout 
				</div>
				<div class="col-md-2 text-end
				" style="font-weight: bold;">
					₹ <?=$finalTotal?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<h3>Shipping address</h3>
				</div>
				<div class="col-md-6 text-end">
					<p><?=$user_details[0]->u_add?>,<?=$user_details[0]->u_city?>, <?=$user_details[0]->u_state?>, <?=$user_details[0]->u_country?>, <?=$user_details[0]->u_pincode ?>  </p>
				</div>
			</div>
			<div class="row py-5">
				<div class="col-md-12 text-center">
					<a href="<?=base_url()?>place-order" class="btn btn-danger">Place Order</a>
				</div>
			</div>
		</div>
	</section>


	<!-- footer -->
	<?php $this->load->view('user/template/footer'); ?>
	<!-- footer -->
</body>
</html>