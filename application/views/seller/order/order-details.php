<!doctype html>
<html lang="en">
<head>
	<?php $this->load->view('seller/template/head'); ?>
	<title>Order Details</title>
</head>
<body>
	<div class="container-fluid py-3">
		<div class="row">
			<div class="col-md-2 border-end">
				<?php $this->load->view('seller/template/sidebar'); ?>
			</div>
			<div class="col-md-10">
				<div class="container mt-2">
					<div class="row">
						<div class="col-md-12 text-end">
							<a href="<?=base_url()?>seller-logout">Logout</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<h2>#order_<?=$order_master[0]->o_id?></h2>
							<span>Order Date : <?=getDateFormat($order_master[0]->o_date)?> </span>
						</div>
						<div class="col-md-6 text-end align-self-center">
							<?php if($order_master[0]->o_status != 'Delivery' && $order_master[0]->o_status != 'Cancel'){ ?>
								<select class="form-select" aria-label="Default select example" id="filter_status">
									<option value="All" <?php if($order_master[0]->o_status == 'All'){echo 'selected';} ?> >All</option>
									<option value="Pending" <?php if($order_master[0]->o_status == 'Pending'){echo 'selected';} ?>>Pending</option>
									<option value="Accepted" <?php if($order_master[0]->o_status == 'Accepted'){echo 'selected';} ?> >Accepted</option>
									<option value="Shipped" <?php if($order_master[0]->o_status == 'Shipped'){echo 'selected';} ?> >Shipped</option>
									<option value="Delivery" <?php if($order_master[0]->o_status == 'Delivery'){echo 'selected';} ?> >Delivery</option>
									<option value="Cancel" <?php if($order_master[0]->o_status == 'Cancel'){echo 'selected';} ?> >Cancel</option>
								</select>
								<input type="hidden" name="o_id" id="o_id" value="<?=$order_master[0]->o_id?>">
							<?php }else{ 
								if($order_master[0]->o_status == 'Delivery' ){
									?>
									<h3>Delivered</h3>
								<?php } if($order_master[0]->o_status == 'Cancel' ){ ?> 
									<h3>Cancelled</h3>
								<?php } if($order_master[0]->o_status == 'Return' ){ ?> 
									<h3>Return</h3>
								<?php } ?>
							<?php }?>
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
			</div>
		</div>
	</div>
	<?php $this->load->view('seller/template/footer'); ?>
<script type="text/javascript">
		$( "#filter_status" ).change(function() {
			$.ajax({
				url:base_path+'sellers/order/updateStatus',
			type:"POST",
				data: {value:$(this).val(),id:$('#o_id').val()},
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