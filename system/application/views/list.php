<?php $this->load->view('defaults/header');?>
<?php $this->load->view('defaults/right_side'); ?>
<div id="content_left">
<small><a class="control" href="<?php echo site_url("view/options")?>">Change paste viewing options</a></small><br/><br/>
<h1>Recent Pastes</h1>

		<?php 
		function checkNum($num){
			return ($num%2) ? TRUE : FALSE;
		}
		$n = 0;		
		if(!empty($pastes)){ ?>
			<table class="maintable">
				<tbody>
					<tr class="top">
						<th class="title">Title</th>
						<th class="name">Name</th>
						<th class="lang">Language</th>
						<th class="time">When</th>
					</tr>
		<?	foreach($pastes as $paste) {
				if(checkNum($n) == TRUE) {
					$eo = "";
				} else {
					$eo = "g";
				}
				$n++;
		?>	

		<tr class="<?=$eo?>">
			<td class="first"><a href="<?=site_url("view/".$paste['pid'])?>"><?=$paste['title']?></a></td>
			<td><?=$paste['name']?></td>
			<td><?=$paste['lang']?></td>
			<td><? $p = explode(",", timespan($paste['created'], time())); echo $p[0];?> ago.</td>
		</tr>

		<? }?>
				</tbody>
			</table> 
		<?} else { ?>
			<p>There have been no pastes :(</p>
		<? }?>
<?=$pages?>
<div class="spacer"><p></div>
</div>
<?php $this->load->view('defaults/footer');?>
