<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('user/template/head'); ?>
	<title>Orders Details</title>
</head>

<body>
	<!-- header -->
	<?php $this->load->view('user/template/header'); ?>
	<!-- header -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h2>#order_<?=$order_master[0]->o_id?></h2>
					<span>Order Date : <?=getDateFormat($order_master[0]->o_date)?> </span><br>
					<?php if($order_master[0]->o_status == 'Delivery'){ ?> 
										<span>
											Delivered Date: <span><?= getDateFormat($order_master[0]->updated) ?></span>
										</span>		
									<?php } ?>
				</div>
				<div class="col-md-6 text-end align-self-center">
					<span> <?php if($order_master[0]->o_status == 'Pending'){ ?> 
						<span class="badge text-bg-warning">Pending</span>
					<?php }elseif($order_master[0]->o_status == 'Accepted'){ ?>
						<span class="badge text-bg-success">Accepted</span>
					<?php }elseif($order_master[0]->o_status == 'Shipped'){ ?>
						<span class="badge text-bg-info ">Shipped</span>
					<?php }elseif($order_master[0]->o_status == 'Delivery'){ ?>
						<span class="badge text-bg-secondary">Delivery</span>
					<?php }elseif($order_master[0]->o_status == 'Cancel'){ ?>
						<span class="badge text-bg-danger">Cancel</span>
					<?php }else{?>
						<span class="badge text-bg-danger">Return</span>
						<?php } ?></span>
					</div>
				</div>
				<div class="row mt-4">
					<?php 
					$finalTotal = 0;
					$total_Pd_price = 0;
					foreach ($order_items as $key => $value) { ?>
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
											<p>₹ <?= $value->price ?></p>
										</div>
									</div>
								</div>
							</div>
							<hr>
						</div>
					<?php	} ?>
				</div>
				<div class="row mt-3">
					<div class="col-md-10">
						Mode of Payment
					</div>
					<div class="col-md-2 text-end">
						COD
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-10">
						Total Payment
					</div>
					<div class="col-md-2 text-end">
						₹ <?=$order_master[0]->total?>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-6">

						Shipping address
					</div>
					<div class="col-md-6 text-end">
						<?=$user_details[0]->u_add?>,<?=$user_details[0]->u_city?>, <?=$user_details[0]->u_state?>, <?=$user_details[0]->u_country?>, <?=$user_details[0]->u_pincode ?>  
					</div>
				</div>
			</div>
		</section>

		<!-- footer -->
		<?php $this->load->view('user/template/footer'); ?>
		<!-- footer -->
	</body>
	</html>