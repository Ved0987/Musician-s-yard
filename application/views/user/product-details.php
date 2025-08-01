<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('user/template/head'); ?>
	<title>Product Details</title>
</head>
<style type="text/css">

</style>
<body>
	<!-- header -->
	<?php $this->load->view('user/template/header'); ?>
	<!-- header -->
	<section>
		<div class="container">
			<div class="row py-5">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<img class="w-100 d-md-block d-none" id="img-preview" src="<?=base_url()?>uploads/product_images/<?=$product[0]->photos[0]->p_photo?>">
						</div>
						<div class="col-md-12">
							<div class="owl-carousel owl-theme">
								<?php foreach ($product[0]->photos as $key => $value) { ?>
									<div class="item">
										<a href="javascript:void(0)">
											<div class="card" >
												<a href="javascript:void(0)" class="show-preview" id="show_preview_<?=$key?>">
													<img src="<?=base_url()?>uploads/product_images/<?=$value->p_photo?>" class="card-img-top" alt="...">
												</a>
											</div>
										</a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<h2 class="f-700 my-2"><?=$product[0]->p_name?></h2>
					<p><?=$product[0]->p_dis?></p>
					<div class="d-flex my-2">
						<h2 class="f-700">₹ <?=$product[0]->p_price?></h2>
					</div>
					<?php if($this->session->userdata('user_session')){ ?>
						<?php
						$cart = check_cart($product[0]->p_id);
						
						 ?>
						<div class="row mt-3">
							<div class="d-none">
								<input type="hidden" name="p_id" id="p_id" value="<?=$product[0]->p_id?>">
								<input type="hidden" name="s_id" id="s_id" value="<?=$product[0]->s_id?>">
								<input type="hidden" name="c_id" id="c_id" value="<?= @$cart["c_id"] ?>">
							</div>
							<div class="col-md-6  <?= !empty($cart) ? '' :  'd-none'; ?> " id="mang_cart">
								<div class="input-group align-items-center ">
									<input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1  " min="0" data-field="quantity">
									<input type="number" readonly step="1" max="5" value="<?= !empty($cart) ? @$cart["qty"] :  1; ?>" id="quantity" name="quantity" class="quantity-field border-0 text-center w-25" >
									<input type="button" value="+"  class="button-plus border rounded-circle icon-shape icon-sm lh-0" data-field="quantity">
								</div>	
							</div>
							<div class="col-md-6 align-self-center <?= !empty($cart) ? 'd-none' :  ''; ?> " id="add_cart">
								<a href="javascript:void(0)" id="add_cart_btn" class="btn btn-danger">Add to Cart</a>
							</div>
							<div class="col-md-6 align-self-center  text-end <?= !empty($cart) ? '' :  'd-none'; ?>" id="del_cart">
								<a href="javascript:void(0)" id="del_cart_btn" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							</div>
						</div>
					<?php }else{ ?>
						<div class="row">
							<div class="col-md-3">
								
								<a class="btn btn-danger p-2 f-18 f-700" href="<?=base_url()?>user-login" >Login</a>
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
	<script type="text/javascript">
		$('a[id^="show_preview_"]').click(function(){
			$url = $(this).find('img').attr('src');
			console.log($url);
			$('#img-preview').attr('src', $(this).find('img').attr('src'));
		})
		function incrementValue(e) {
			e.preventDefault();
			var fieldName = $(e.target).data('field');
			var parent = $(e.target).closest('div');
			var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
			if (!isNaN(currentVal)) {
				if(currentVal < 5){
					parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
				}
			} else {
				parent.find('input[name=' + fieldName + ']').val(0);
			}
		}

		function decrementValue(e) {
			e.preventDefault();
			var fieldName = $(e.target).data('field');
			var parent = $(e.target).closest('div');
			var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

			if (!isNaN(currentVal) && currentVal > 1) {
				parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
			} else {
				parent.find('input[name=' + fieldName + ']').val(1);
			}
		}

		$('.input-group').on('click', '.button-plus', function(e) {
			incrementValue(e);
			$c_id = $('#c_id').val();
			$qty = $('#quantity').val();
			update_cart($c_id,$qty);
		});

		$('.input-group').on('click', '.button-minus', function(e) {
			decrementValue(e);
			$c_id = $('#c_id').val();
			$qty = $('#quantity').val();
			update_cart($c_id,$qty);
		});
		$('#add_cart_btn').click(function() {
				$p_id = $('#p_id').val();
				$s_id = $('#s_id').val();
				$quantity = $('#quantity').val();
			$.ajax({
				url:base_path+'product/add_cart',
				type:"POST",
				data: {p_id:$p_id,s_id:$s_id,quantity:$quantity},
				success: function(result){
					$result = JSON.parse(result);
					$('#c_id').val($result);
					$('#mang_cart').removeClass('d-none')
					$('#del_cart').removeClass('d-none')
					$('#add_cart').addClass('d-none')
					notification('success','','Product Add into Cart')
				}
			});
		});
		$('#del_cart_btn').click(function() {
			$c_id = $('#c_id').val();
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
		$('.owl-carousel').owlCarousel({
			loop:false,
			margin:10,
			nav:false,
			dots:false,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:4
				}
			}
		})
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