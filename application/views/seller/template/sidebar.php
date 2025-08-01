<section id="sidebar">
	<ul>
		<a href="<?=base_url()?>seller-dashboard" >
			<li class="px-3 py-2 mt-2 <?=get_active_tab_class('dashboard')?>">
				<i class="fa fa-tachometer me-2" aria-hidden="true"></i>Dashboard
			</li>
		</a>
		<a href="<?=base_url()?>seller-product" >
			<li class="px-3 py-2 mt-2 <?=get_active_tab_class('product')?>">
				<i class="fa fa-product-hunt me-2" aria-hidden="true"></i>Product
			</li>
		</a>
		<a href="<?=base_url()?>seller-order" >
			<li class="px-3 py-2 mt-2 <?=get_active_tab_class('order')?>">
				<i class="fa fa-cart-arrow-down me-2" aria-hidden="true"></i>Order
			</li>
		</a>
		<a href="<?=base_url()?>seller-profile" >
			<li class="px-3 py-2 mt-2 <?=get_active_tab_class('profile')?>">
				<i class="fa fa-address-card me-2" aria-hidden="true"></i>Profile
			</li>
		</a>
		<a href="<?=base_url()?>seller-logout" >
			<li class="px-3 py-2 mt-2">
				<i class="fa fa-sign-out me-2" aria-hidden="true"></i>Logout
			</li>
		</a>
	</ul>
</section>