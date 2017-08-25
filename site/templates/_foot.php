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
				<div class="col-sm-4">
                	<h4>Contact</h4>
					<p>
						123 Main St<br>
						Minneapolis, MN 55414
					</p>
					<p>
						<a href="tel:+15555555555">555-555-5555</a><br>
						<a href="mailto:info@spectrumpaint.com">info@spectrumpaint.com</a>
					</p><br>

                </div>
				<div class="col-sm-4">
                	<h4>Hours</h4>
					<p>
						Monday - Friday&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;9:00AM - 8:00PM<br>
						Saturday and Sunday&emsp;&nbsp;10:00AM - 6:00PM
					</p><br>
                </div>
				<div class="col-sm-4 bottom">
					<h4>Site Map</h4>
					<div class="row">
						<div class="col-sm-6">
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Contact</a></li>
								<li><a href="#">Cart</a></li>
								<li><a href="#">Login</a></li>
							</ul>
						</div>
						<div class="col-sm-6">
							<ul>
								<li><a href="#">Products</a></li>
								<li><a href="#">Paints</a></li>
								<li><a href="#">Stains</a></li>
								<li><a href="#">Rollers</a></li>
								<li><a href="#">Brushes</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
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
