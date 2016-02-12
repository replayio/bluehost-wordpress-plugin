<?php
//$id = '565f5981-f638-4d4c-9ea8-1c320a141f39'; //Plugin
$search = $_GET['search'];
//$item_type = $_GET['type'];
$query = array(
	'item_type' => 'all',
	'query'     => $search,
	'category'  => 'wordpress',
	'size'      => 50,
	'order'     => 'score',
);
$response = mm_api_cache( add_query_arg( $query, 'https://api.mojomarketplace.com/api/v2/search' ) );
if ( ! is_wp_error( $response ) ) {
	$body = json_decode( $response['body'] );
	$items = $body->items;
	$type = 'search';
?>
<div id="mojo-wrapper">
	<header id="header" class="navbar navbar-default">
		<div class="header-block bg-cover" style="background-image: url('<?php echo MM_BASE_URL; ?>img/tmp/header-bg-001.jpg');">
			<span data-srcset="<?php echo MM_BASE_URL; ?>img/tmp/header-bg-001.jpg, <?php echo MM_BASE_URL; ?>img/tmp/header-bg-001-2x.jpg 2x"></span>
			<nav>
				<div class="container">
					<div class="inner-holder">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="menu-holder dropdown pull-right" style="visibility:hidden;">
							<button type="button" class="dropdown-toggle visible navbar-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="visible-xs-inline-block visible-sm-inline-block">Account</span>
								<span class="sr-only">Toggle menu</span>
								<span class="icon-bar hidden-sm hidden-xs"></span>
								<span class="icon-bar hidden-sm hidden-xs"></span>
								<span class="icon-bar hidden-sm hidden-xs"></span>
							</button>
							<div class="dropdown-menu">
								<div class="avatar-block">
									<div class="avatar"><a href="#"><i class="icon-avatar"></i></a></div>
									<div class="name"><a href="#">Jonnyapplseed_6</a></div>
								</div>
								<ul class="projects-nav list-unstyled">
									<li><a href="#">Bumble Beer</a></li>
									<li><a href="#">Suckerpunch</a></li>
									<li><a href="#">Livin la vida loca</a></li>
									<li><a href="#">Fixie</a></li>
									<li><a href="#">Pepermint Latté</a></li>
								</ul>
							</div>
						</div>
						<div class="header-holder clearfix">
							<a class="navbar-brand" href="#">
								<img src="<?php echo MM_BASE_URL; ?>img/tmp/logo-icon.svg" width="250" height="42" alt="MOJO marketplace">
							</a>
							<form class="navbar-form form-inline navbar-right text-right" role="search" action="admin.php" method="GET">
								<div class="form-group">
									<input type="hidden" name="page" value="mojo-search" />
									<input name="search" type="text" class="form-control input-lg" placeholder="Search Themes, Plugins &amp; Services">
								</div>
								<button type="submit" class="btn btn-info btn-lg">Search</button>
							</form>
						</div>
					</div>
				</div>
				<div class="collapse navbar-collapse" id="navbar-collapse-1">
					<div class="container">
						<div class="inner-holder">
							<div class="nav-holder clearfix">
								<ul class="nav navbar-nav justified-nav">
									<?php
									switch ( $type ) {
										case 'Premium Plugins':
											?>
											<li><a href="admin.php?page=mojo-plugins&items=accounting">Accounting</a></li>
											<li><a href="admin.php?page=mojo-plugins&items=advertising">Advertising</a></li>
											<li><a href="admin.php?page=mojo-plugins&items=ecommerce">Ecommerce</a></li>
											<li><a href="admin.php?page=mojo-plugins&items=media">Media</a></li>
											<li><a href="admin.php?page=mojo-plugins&items=responsive">Responsive</a></li>
											<li><a href="admin.php?page=mojo-plugins&items=shipping">Shipping</a></li>
											<li><a href="admin.php?page=mojo-plugins&items=utilities">Utilities</a></li>
											<li><a href="admin.php?page=mojo-services">Professional Services</a></li>
											<li><a href="admin.php?page=mojo-themes">Premium Themes</a></li>
											<?php
											break;

										case 'Professional Services':
											?>
											<li><a href="admin.php?page=mojo-services&items=analytics">Analytics</a></li>
											<li><a href="admin.php?page=mojo-services&items=ecommerce">Ecommerce</a></li>
											<li><a href="admin.php?page=mojo-services&items=security">Security</a></li>
											<li><a href="admin.php?page=mojo-services&items=seo">SEO</a></li>
											<li><a href="admin.php?page=mojo-services&items=web-design">Web Design</a></li>
											<li><a href="admin.php?page=mojo-services&items=web-development">Web Development</a></li>
											<li><a href="admin.php?page=mojo-themes">Premium Themes</a></li>
											<li><a href="admin.php?page=mojo-plugins">Premium Plugins</a></li>
											<?php
											break;

										default:
											?>
											<li><a href="admin.php?page=mojo-themes&items=popular">Popular</a></li>
											<li><a href="admin.php?page=mojo-themes&items=recent">New Items</a></li>
											<li><a href="admin.php?page=mojo-themes&items=business">Business</a></li>
											<li><a href="admin.php?page=mojo-themes&items=ecommerce">Ecommerce</a></li>
											<li><a href="admin.php?page=mojo-themes&items=real-estate">Real Estate</a></li>
											<li><a href="admin.php?page=mojo-services">Professional Services</a></li>
											<li><a href="admin.php?page=mojo-plugins">Premium Plugins</a></li>
											<?php
											break;
									}
									?>

								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<main id="main">
		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-12 col-sm-8">
							<ol class="breadcrumb">
								<li>Search</li>
								<li class="active"><?php echo ucwords( $search ); ?></li>
							</ol>
						</div>
						<!-- <div class="col-xs-12 col-sm-4">
							<form class="form-horizontal">
								<label class="control-label" for="sort_select">Sort By</label>
								<span class="fake-select">
									<select id="sort_select" class="form-control input-sm">
										<option>Most Popular</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</span>
							</form>
						</div> -->
					</div>
				</div>
				<div class="panel-body">
					<div class="list-group">
					<?php
					foreach ( $items as $item ) {
						if ( '0' == $item->prices->single_domain_license ) { continue; }
						//TODO: this should be a whitelist not a blacklist
						if ( 'Drupal' == $item->category || 'Joomla' == $item->category ) { continue; }
						?>
						<div class="list-group-item theme-item">
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-5">
									<a href="admin.php?page=mojo-theme-preview&id=<?php echo $item->id; ?>&items=popular">
										<img class="img-responsive" src="<?php echo $item->images->preview_url; ?>" alt="image description" width="367" height="205">
									</a>
								</div>
								<div class="col-xs-12 col-sm-5 col-md-5">
									<div class="description-box">
										<h2><?php echo apply_filters( 'the_title', $item->name ); ?></h2>
										<?php if ( isset( $item->short_description ) ) { echo $item->short_description; } ?>
										<?php mm_stars( $item->rating, $item->sales_count ); ?>
									</div>
								</div>
								<div class="col-xs-12 col-sm-3 col-md-2">
									<div class="text-center info-box">
										<div class="price">
											<span class="currency">USD</span>
											<span class="price-number">$<span><?php echo number_format( $item->prices->single_domain_license ); ?></span></span>
										</div>
										<div class="btn-group-vertical" role="group">
											<a href="admin.php?page=mojo-single-item&item_id=<?php echo $item->id; ?>" class="btn btn-primary btn-lg">Details</a>
											<a href="#" class="btn btn-success btn-lg">Buy Now</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
	<?php
}
	/*<!-- include jQuery library from CDN -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" defer></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js" defer><\/script>')</script>
	<!-- include bootstrap JavaScript -->
	<script src="js/bootstrap.min.js" defer></script>
	<!-- include custom JavaScript -->
	<script src="js/jquery.main.js" defer></script>*/