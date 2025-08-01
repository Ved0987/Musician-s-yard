<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('user/template/head'); ?>
	<title>Cart</title>
</head>

<body>
	<!-- header -->
	<?php $this->load->view('user/template/header'); ?>
	<!-- header -->
	<?php 
	if(count($getCart) > 0){?> 
		
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-8" >
						<div class="d-flex justify-content-between align-items-center">
							<h1>Shopping cart</h1>
							<p><?= count($getCart) ?> Items</p>
						</div >

						<div class="row">
							<?php 
							$finalTotal = 0;
							$total_Pd_price = 0;
							foreach ($getCart as $key => $value) { 
								$qty = intval($value->qty);
								$product_price = intval($value->product[0]->p_price);
								$total_Pd_price = $qty * $product_price;
								$finalTotal = $finalTotal + $total_Pd_price;
								?>
								<div class="col-md-12">
									<div class="card border-0">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-md-2">
													<img class="w-100" src="<?=base_url()?>uploads/product_images/<?=$value->product_img[0]->p_photo?>">
												</div>
												<div class="col-md-4">
													<p><?= $value->product[0]->p_name ?></p>
												</div>
												<div class="col-md-3">
													<div class="input-group align-items-center ">
														<a  href="javascript:void(0)" id="btnMin_<?= $value->product[0]->p_id
													?>" class="btn btn-danger" class="button-minus border rounded-circle f-white  icon-shape icon-sm mx-1 "  data-id="<?=$value->c_id?>">-</a>
													<input type="number" readonly step="1" max="5" value="<?= $value->qty ?>" id="quantity_<?= $value->c_id
												?>" name="quantity" class="quantity-field border-0 text-center w-25" >
												<a href="javascript:void(0)" id="btnPls_<?= $value->product[0]->p_id
											?>"  class="btn btn-danger" class="button-plus border rounded-circle icon-shape icon-sm lh-0 f-white" data-id="<?=$value->c_id?>" >+</a>
										</div>	
									</div>
									<div class="col-md-2">
										<p>₹ <?= $total_Pd_price ?></p>
									</div>
									<div class="col-md-1">
										<a href="javascript:void(0)" id="del_cart_btn_<?= $value->c_id
									?>" data-id="<?= $value->c_id?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>											</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
				<?php } ?>

			</div>
		</div>
		<div class="col-md-4 align-self-center" >
			<div class="row">
				<div class="col-md-12">
					
				</div>
			</div>
			<div class="text-center">
				<h3> Total : ₹ <?=$finalTotal?></h3>
				<a href="<?=base_url()?>checkout" class="btn btn-danger mt-3">Checkout</a>
			</div>
		</div>
	</div>
</div>
</section>
<?php } else { ?> 
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Please Add Product into Cart</h1>
			</div>
		</div>
	</div>
</section>
<?php } ?>



<!-- footer -->
<?php $this->load->view('user/template/footer'); ?>
<!-- footer -->
<script type="text/javascript">
	function incrementValue(e,$c_id) {
		e.preventDefault();
				// var fieldName = $(e.target).data('field');
				// var parent = $(e.target).closest('div');
		var currentVal = parseInt($('#quantity_'+$c_id).val(), 10);
		if (!isNaN(currentVal)) {
			if(currentVal < 5){
				$('#quantity_'+$c_id).val(currentVal + 1);
			}
		} else {
			$('#quantity_'+$c_id).val(0);
		}
	}

	function decrementValue(e,$c_id) {
		e.preventDefault();
			// var fieldName = $(e.target).data('field');
			// var parent = $(e.target).closest('div');
		var currentVal = parseInt($('#quantity_'+$c_id).val(), 10);

		if (!isNaN(currentVal) && currentVal > 1) {
			$('#quantity_'+$c_id).val(currentVal - 1);
		} else {
			$('#quantity_'+$c_id).val(1);
		}
	}

	$('.input-group').on('click', '.button-plus', function(e) {
		incrementValue(e);
	});

	$('a[id^="btnMin_"]').click(function (e) {
		$c_id = $(this).attr('data-id');
		decrementValue(e,$c_id);
		$qty = $('#quantity_'+$c_id).val();
		update_cart($c_id,$qty)
	})
	$('a[id^="btnPls_"]').click(function (e) {
		$c_id = $(this).attr('data-id');
		incrementValue(e,$c_id);
		$qty = $('#quantity_'+$c_id).val();
		console.log($c_id);
		console.log($qty); 
		update_cart($c_id,$qty)
	})
	$('a[id^="del_cart_btn_"]').click(function (e) {
		console.log($(this).attr('data-id'));
		$c_id = $(this).attr('data-id');
		$.ajax({
			url:base_path+'product/delete_cart',
			type:"POST",
			data: {c_id:$c_id},
			success: function(result){
				if(result == 'success'){
					location.reload();
				}
			}
		});
	});

	$('.input-group').on('click', '.button-minus', function(e) {
		decrementValue(e);
	});
</script>
<script type="text/javascript">
	function update_cart($c_id,$qty) {
		console.log($c_id,$qty);
		$.ajax({
			url:base_path+'product/update_cart',
			type:"POST",
			data: {c_id:$c_id,qty:$qty},
			success: function(result){
				if(result == 'success'){
					location.reload();
				}
			}
		});
	}
</script>
</body>
</html>