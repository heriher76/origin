<nav class="menu">
	<div class="container">
		<div class="brand">
			<a href="#">
				<img src="{{ url('front/images/logo.png') }}" alt="Magz Logo">
			</a>
		</div>
		<div class="mobile-toggle">
			<a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
		</div>
		<div class="mobile-toggle">
			<a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
		</div>
		<div id="menu-list">
			<ul class="nav-list">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class="dropdown magz-dropdown">
					<a href="#">Profil <i class="ion-ios-arrow-right"></i></a>
					<ul class="dropdown-menu">
						<li><a href="{{ url('profile/coffee-shop') }}">Kedai Kopi</a></li>
						<li><a href="{{ url('profile/community') }}">Komunitas</a></li>
						<li><a href="{{ url('profile/figure') }}">Sosok</a></li>
					</ul>
				</li>
				<li><a href="{{ url('news') }}">Berita</a></li>
				<li><a href="{{ url('events') }}">Event</a></li>
				<li><a href="{{ url('promotions') }}">Promosi</a></li>
				<li><a href="{{ url('opinions') }}">Kolom Opini</a></li>
				<!-- <li class="dropdown magz-dropdown"><a href="#">Akun Saya <i class="ion-ios-arrow-right"></i></a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon ion-person"></i> Dashboard</a></li>
						<li><a href="#"><i class="icon ion-log-out"></i> Logout</a></li>
					</ul>
				</li> -->
			</ul>
		</div>
	</div>
</nav>