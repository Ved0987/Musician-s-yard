<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('user/template/head'); ?>
	<title>Orders</title>
</head>

<body>
	<!-- header -->
	<?php $this->load->view('user/template/header'); ?>
	<!-- header -->
	<section>
		<div class="container">
			<div class="row">
				<?php foreach ($order_master as $key => $value) { ?>
					<a href="<?=base_url()?>order-details/<?=$value->o_id?>">
					<div class="col-md-12 mt-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<p>
											Order Id: <span>#order_<?=$value->o_id?></span>
										</p>		
									</div>
									<div class="col-md-3">
										<p>
											Order Total: <span>₹<?=$value->total?></span>
										</p>		
									</div>
									<div class="col-md-3">
										<p>
											Payment Type: <span><?=$value->payment_type?></span>
										</p>		
									</div>
									<div class="col-md-3">
										<p>
											Order Date: <span><?= getDateFormat($value->o_date) ?></span>
										</p>		
									</div>
									<div class="col-md-3">
										<p>
											Order Status: <span> <?php if($value->o_status == 'Pending'){ ?> 
												<span class="badge text-bg-warning">Pending</span>
											<?php }elseif($value->o_status == 'Accepted'){ ?>
												<span class="badge text-bg-success">Accepted</span>
											<?php }elseif($value->o_status == 'Shipped'){ ?>
												<span class="badge text-bg-info ">Shipped</span>
											<?php }elseif($value->o_status == 'Delivery'){ ?>
												<span class="badge text-bg-secondary">Delivery</span>
											<?php }elseif($value->o_status == 'Cancel'){ ?>
												<span class="badge text-bg-danger">Cancel</span>
											<?php }else{?>
												<span class="badge text-bg-danger">Return</span>
												<?php } ?></span>
											</p>		
										</div>
									
									<?php if($value->o_status == 'Delivery'){ ?> 
										<div class="col-md-3">
										<p>
											Delivered Date: <span><?= getDateFormat($value->updated) ?></span>
										</p>		
									</div>
									<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</a>
					<?php } ?>
				</div>
			</div>
		</section>

		<!-- footer -->
		<?php $this->load->view('user/template/footer'); ?>
		<!-- footer -->
	</body>
	</html>