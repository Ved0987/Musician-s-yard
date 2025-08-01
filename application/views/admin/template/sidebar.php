<section id="sidebar">
	<ul>
		<a href="<?=base_url()?>dashboard" >
			<li class="px-3 py-2 mt-2 <?=get_active_tab_class('dashboard')?>">
				<i class="fa fa-tachometer me-2" aria-hidden="true"></i>Dashboard
			</li>
		</a>
		<a href="<?=base_url()?>users" >
			<li class="px-3 py-2 mt-2 <?=get_active_tab_class('users')?>">
				<i class="fa fa-users me-2" aria-hidden="true"></i>Users
			</li>
		</a>
		<a href="<?=base_url()?>sellers" >
			<li class="px-3 py-2 mt-2 <?=get_active_tab_class('sellers')?>">
				<i class="fa fa-user me-2" aria-hidden="true"></i>Sellers
			</li>
		</a>
		<a href="<?=base_url()?>menu" >
			<li class="px-3 py-2 mt-2 <?=get_active_tab_class('menu')?>">
				<i class="fa fa-user me-2" aria-hidden="true"></i>Menu
			</li>
		</a>
		<a href="<?=base_url()?>admin-logout" >
			<li class="px-3 py-2 mt-2">
				<i class="fa fa-sign-out me-2" aria-hidden="true"></i>Logout
			</li>
		</a>
	</ul>
</section>