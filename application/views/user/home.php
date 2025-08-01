<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('user/template/head'); ?>
	<title>Home</title>
</head>
<style type="text/css">
	.owl-nav{
		text-align: center;
		margin-top: 15px ;
	}
</style>
<body>
	<!-- header -->
	<?php $this->load->view('user/template/header'); ?>
	<!-- header -->
	<section id="mainBanner">
		<div class="container">
			<div class="row ">
				<div class="col-md-6 align-self-center">
					<h1 class="f-700">ONLINE<br>MUSIC INSTRUMENTS SELLING</h1>
					<hr class="hr-line-150">
					<p class="f-16 f-500">Music is a vital part of different moments of human life. It spreads happiness and joy in a person's life. Music is the soul of life and gives immense peace to us. In the words of William Shakespeare, “If music is the food of love, play on, Give me excess of it, that surfeiting, The appetite may sicken, and so die.”</p>
					<a class="btn btn-danger mt-3" href="<?=base_url()?>shop">Shop Now</a>
				</div>
				<div class="col-md-6 ">
					<img class="w-100" src="<?=base_url()?>assets/images/banner-img.png">
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row mt-5">
				<div class="col-md-12">
					<div class="owl-carousel owl-theme">
						<?php foreach ($homeProduct as $key => $value) { ?>
							<div class="item">
								<a href="<?=base_url()?>product-view/<?=$value['p_id']?>">
									<div class="card" >
										<img src="<?=base_url()?>uploads/product_images/<?=$value['photos'][0]->p_photo?>" class="card-img-top" alt="...">
										<div class="card-body">
											<h5 class="card-title f-500"><?=$value['p_name']?></h5>
											<p class="card-text f-14 mt-2">₹ <?=$value['p_price']?> </p>
										</div>
									</div>
								</a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row ">
			<div class="col-md-6">
				<img class="w-75" src="<?=base_url()?>assets/images/about_us.png">
			</div>
			<div class="col-md-6 align-self-center">
				<div id='footer-navmenu'>
<svg class='wave-animation' preserveAspectRatio='none' viewBox='0 24 150 28' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
<defs>
<path d='M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z' id='gentle-wave'/>
</defs>
<g class='wave-bg'>
<use fill='rgba(242,193,78,.5)' x='50' xlink:href='#gentle-wave' y='0'/>
<use fill='rgba(242,193,78,.7)' x='50' xlink:href='#gentle-wave' y='3'/>
<use fill='#fff' x='50' xlink:href='#gentle-wave' y='6'/>
</g>
</svg>
</div>
				<h1 class="f-700 mt-5">About Us</h1>
				<hr class="hr-line-150">
				<p class="f-16 f-500">Our firm works on the principle of building goodwill by serving our customers to the highest possible level. You can rely and depend on the musical instruments which you purchase from us, because we believe in delivering the most reliable instruments.</p>
			</div>
		</div>
	</div>
</section>
<!-- footer -->
<?php $this->load->view('user/template/footer'); ?>
<!-- footer -->
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
		loop:false,
		margin:10,
		nav:true,
		dots:false,
		navText : ["<i class='fa fa-angle-left ms-3 fa-2x'></i>","<i class='fa fa-angle-right ms-3 fa-2x' aria-hidden='true'></i>"],
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
</body>
</html>