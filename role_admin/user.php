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
					<?php
					include 'sidebar_dash.php';
					?>
					<div class="pcoded-content">
						<div class="pcoded-inner-content">
							<div class="main-body">
								<div class="page-wrapper">
									<div class="page-body">
										<div class="row">
											<div class="col-sm-12">
												<!-- Basic Button table start -->
												<div class="card">
													<div class="col-md-12">

													</div>
													<div class="card-block">
														<div class="dt-responsive table-responsive">
															<table id="simpletable" class="table table-striped table-bordered nowrap">
																<?php
																include "dt_user.php";
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