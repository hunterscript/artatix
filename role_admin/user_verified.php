<?php
include "auth.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Dashboard</title>
	<!-- Library CSS -->
	<?php
	include "../bundle_css.php";
	?>

</head>

<body>
	<!-- Pre-loader start -->
	<div class="theme-loader">
		<div class="ball-scale">
			<div class='contain'>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
				<div class="ring">
					<div class="frame"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pre-loader end -->
	<div id="pcoded" class="pcoded">
		<div class="pcoded-overlay-box"></div>
		<div class="pcoded-container navbar-wrapper">
			<?php
			include "../role_member/navbar.php";
			?>


			<div class="pcoded-main-container">
				<div class="pcoded-wrapper">
					<nav class="pcoded-navbar">
						<div class="pcoded-inner-navbar main-menu">
							<div class="pcoded-navigatio-lavel">Menu</div>
							<ul class="pcoded-item pcoded-left-item">
								<li class="pcoded ">
									<a href="index.php">
										<span class="pcoded-micon "><i class="feather icon-home"></i></span>
										<span class="pcoded-mtext">Dashboard</span>
									</a>
								</li>
							</ul>
							<div class="pcoded-navigatio-lavel">Management</div>
							<ul class="pcoded-item">
								<li class="pcoded-hasmenu">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
										<span class="pcoded-mtext">Event</span>
									</a>
									<ul class="pcoded-submenu">
										<li class="">
											<a href="admin_event_all.php">
												<span class="pcoded-mtext active">Semua</span>
											</a>
										</li>


									</ul>
								</li>
								<li class="pcoded-hasmenu">
									<a href="javascript:void(0)">

										<span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
										<span class="pcoded-mtext">Report</span>
									</a>
									<ul class="pcoded-submenu">
										<li class=" ">
											<a href="icon-font-awesome.htm">
												<span class="pcoded-mtext">Report Event</span>
											</a>
										</li>
										<li class=" ">
											<a href="icon-font-awesome.htm">
												<span class="pcoded-mtext">Report Revenue</span>
											</a>
										</li>

									</ul>
								</li>
								<li class="pcoded-hasmenu">
									<!-- <a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="feather icon-command"></i></span>
										<span class="pcoded-mtext">Withdraw</span>
									</a> -->
									<ul class="pcoded-submenu">
										<li class=" ">
											<a href="icon-font-awesome.htm">
												<span class="pcoded-mtext">Status</span>
											</a>
										</li>

									</ul>
								</li>

								<li class="pcoded-hasmenu active">
									<a href="javascript:void(0)">
										<span class="pcoded-micon"><i class="fa fa-user"></i></span>
										<span class="pcoded-mtext">User</span>
									</a>
									<ul class="pcoded-submenu ">
										<li class=" ">
											<a href="user.php">
												<span class="pcoded-mtext">All User</span>
											</a>
										</li>

									</ul>
									<ul class="pcoded-submenu">
										<li class=" ">
											<a href="user_verification.php">
												<span class="pcoded-mtext">Need Verification</span>
											</a>
										</li>
									</ul>
									<ul class="pcoded-submenu">
										<li class=" active">
											<a href="user_verified.php">
												<span class="pcoded-mtext">Verified</span>
											</a>
										</li>
									</ul>

								</li>
							</ul>

						</div>
					</nav>
					<div class="pcoded-content">
						<div class="pcoded-inner-content">
							<div class="main-body">
								<div class="page-wrapper">
									<div class="page-header">
										<div class="row align-items-end">
											<div class="col-lg-8">
												<div class="page-header-title">
													<div class="d-inline">
														<h4>Data User Verified</h4>
													</div>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="page-header-breadcrumb">
													<ul class="breadcrumb-title">
														<li class="breadcrumb-item">
															<a href="index.php"> <i class="feather icon-home"></i> </a>
														</li>
														<li class="breadcrumb-item"><a href="#!">User Verified</a>
														</li>
													</ul>
												</div>
											</div>
										</div><br>
										<!-- Basic Button table start -->
										<div class="card">
											<div class="col-md-12">

											</div>
											<div class="card-block">
												<div class="dt-responsive table-responsive">
													<table id="simpletable" class="table table-striped table-bordered nowrap">
														<?php
														include "dt_user_verified.php";
														?>

													</table>
												</div>
											</div>
										</div>
										<!-- Alternative Pagination table end -->
									</div>
								</div>
								<!-- Basic Button table end -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- Library Scripts -->
	<?php
	include "../bundle_script.php";
	?>

	</script>
</body>

</html>