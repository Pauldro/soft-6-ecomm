		<br>
        <div class="container hidden-print">
            <div class="row">
                <div class="col-xs-12">
                    <a id="back-to-top" href="#" class="btn btn-info back-to-top" role="button"><span class="glyphicon glyphicon-chevron-up"></span></a>
                </div>
            </div>
        </div>
        <footer class="hidden-print">
            <div class="container">
				<div class="row">
					<div class="col-sm-4">
	                	<h4>Contact</h4>
						<p><?php echo $site->address; ?></p>
						<ul>
							<li><a href="tel:<?php echo $site->phone800; ?>"><?php echo $site->phone800; ?></a></li>
							<li><a href="mailto:<?php echo $site->company_email; ?>"><?php echo $site->company_email; ?></a></li>
						</ul><br>

	                </div>
					<div class="col-sm-4">
	                	<h4>Hours</h4>
						<p><?php echo $site->hours; ?></p>
	                </div>
					<div class="col-sm-4">
						<h4>Site Links</h4>
						<div class="row">
							<div class="col-xs-6">
								<ul>	
									<?php 
									$homepage = $pages->get('template=home');
									$links = $homepage->children;
									?>
										<li><a href="<?php echo $homepage->url; ?>"><?php echo $homepage->title; ?></a></li>
									
									<?php 
									foreach ($links as $link) { 
										if ($link->showinnavigation) { 
									?>
										<li><a href="<?php echo $link->url; ?>"><?php echo $link->title; ?></a></li>
									<!-- <li><a href="#">Home</a></li>
									<li><a href="#">About</a></li>
									<li><a href="#">Contact</a></li>
									<li><a href="#">Cart</a></li>
									<li><a href="#">Login</a></li>
									<li><a href="#">Site Map</a></li> -->	
									<?php } } ?>
								</ul>
							</div>
							<div class="col-xs-6">
								<ul>
									<li><a href="#">Paints</a></li>
									<li><a href="#">Stains</a></li>
									<li><a href="#">Rollers</a></li>
									<li><a href="#">Brushes</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>
	                </div>
				</div>

				<!-- <p> Web Development by CPTech © 2015 --------- <?php echo session_id(); ?> --- </p>
                <p class="visible-xs-inline-block"> XS </p> <p class="visible-sm-inline-block"> SM </p>
                <p class="visible-md-inline-block"> MD </p> <p class="visible-lg-inline-block"> LG </p> -->

            </div>
        </footer>
        <?php foreach($config->scripts->unique() as $script) : ?>
        	<script src="<?php echo $script; ?>"></script>
        <?php endforeach; ?>
    </body>
</html>
