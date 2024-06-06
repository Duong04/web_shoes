<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="./"><img src="public/img/logo.png" alt=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="./">Home</a></li>
						<li class="nav-item submenu dropdown">
							<a href="./?page=shop" class="nav-link dropdown-toggle">Shop</a>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="./?page=blog" class="nav-link dropdown-toggle">Blog</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="./?page=contact">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
						<li class="nav-item">
							<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
						</li>
						<?php if (!isset($_SESSION['user_id'])) { ?>
						<li class="nav-item"><a href="./?page=login" class="cart"><span class="ti-user"></span></a></li>
						<?php }else { ?>
						<li class="d-flex align-items-center position-relative">
							<img width="35px" height="35px" class="dropdown-toggle rounded-circle" data-toggle="dropdown" role="button"
								 aria-expanded="false" src="./public/img/users/z4885097517559_dfcda27d81f3d4d5aa2eb33563833159.jpg" alt="">
							<ul class="dropdown-menu" style="left: -80px;">
								<li class="nav-item" style="margin-left: 25px;"><a class="nav-link" href="">Profile</a></li>
								<?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') { ?>
									<li class="nav-item" style="margin-left: 25px;"><a class="nav-link" href="./?role=admin&page=dashboard">Administrators</a></li>
								<?php } ?>
								<li class="nav-item"><a class="nav-link" href="./?page=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
							</ul>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="search_input" id="search_input_box">
		<div class="container">
			<form class="d-flex justify-content-between">
				<input type="text" class="form-control" id="search_input" placeholder="Search Here">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div>
</header>