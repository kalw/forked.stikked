<?php header("HTTP/1.1 404 Not Found"); 
	include("system/application/config/config.php"); 
	include("system/application/config/stikked.php");
?>
		<?php include("system/application/views/defaults/header.php"); ?>
		<div id="container">
			<div class="container">
				
				<div class="page">
					<div class="content">
						<div class="container">
							<h1><?=$heading?></h1>
							<div class="about">
								<?=$message?>
								<p><a href="<?=$config['base_url']?>">Go Home</a></p>
							</div>
						</div>
					</div>
				</div>
			
			<div class="footer">
				<?php include("system/application/views/defaults/footer_message.php"); ?>
				<?php include("system/application/views/defaults/stats.php"); ?>
			</div>
			</div>
		</div>
	</body>
</html>
