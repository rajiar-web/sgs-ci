<div class="col-4 col-lg-3 profile-sidebar card d-flex px-2 px-lg-3">
	<div class="profile-view px-3">
		<h3 class="d-flex align-items-center mb-0"> <span class="me-2"><img src="<?=front_images()?>profile-pic.svg"  class="img-fluid"></span><?=$this->session->get_userdata("lg_user")['lg_user']['name']?></h3>
	</div>
	<nav class="category profile-category d-flex align-content-between flex-wrap px-3">
		<ul class="ctgul p-0 p-lg-2 w-100" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-duration="900">

		<li class="ctgli">
			<a href="javascript:void(0);" class="ctga">
				<div class="ok"></div>
				<i class="ti-layout"></i>
				ACCOUNT SETTINGS
				<i class="fas fa-chevron-down down"></i>
			</a>
			<ul class="ctgulChild">
				<li class="ctgliChild">
					<a  class="ctgaChild" id="pro-info">Profile Information</a>
				</li>
				<li class="ctgliChild">
					<a class="ctgaChild" id="manage-add"> Manage Addresses</a>
				</li>
			</ul>
		</li>
		<!-- <li class="ctgli">
			<a href="javascript:void(0);" class="ctga ">
			<i class="ti-write"></i>
			MY STUFF
			<i class="fas fa-chevron-down down "></i>
			</a>
			<ul class="ctgulChild">
				<li class="ctgliChild">
					<a  class="ctgaChild" id="my-coupon">My Coupons</a>
				</li>
			</ul>
		</li> -->
		<li class="ctgli">
			<a href="javascript:void(0);" class="ctga" id="my-order">
				<div class="ok"></div>
				<i class="ti-layout"></i>
				MY ORDERS
			</a>
		</li>
		<hr />
		<li class="ctgli">

			<a href="<?=base_url();?>user-logout" class="ctga" id="my-order">

			<a class="ctga clslogout" id="my-order">

				Logout
			</a>
		</li>
		</ul>
	</nav>
</div>