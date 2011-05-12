<?php $this->load->view('defaults/header'); ?>
<?php $this->load->view('defaults/right_side'); ?>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$(".expand").click(function(){
			$(".paste").css("width", "90%");
			$(".text_formatted").hide();
			$(".text_formatted").css("width", "100%");
			$(".text_formatted").css("margin-left", "0");
			$(".text_formatted").fadeIn(500);
			return false;
		});
	});
</script>

<?php if(isset($insert)){
	echo $insert;
}?>

<div id="content_left">
<div class="paste_box_frame">
		<div class="paste_box_icon">
		<img border="0" alt="Guest" src="<?php echo config_item('base_url'); ?>static/images/guest.gif">	
		</div>
	<div class="paste_box_info">
		<h1 class="pagetitle right"><?=$title?></h1>
		<div class="meta">
			<span class="detail by">By <?=$name?>, <? $p = explode(',', timespan($created, time())); echo $p[0]?> ago, written in <?=$lang?>.</span>
			<?php if(isset($inreply)){?><span class="detail by">This paste is a reply to <a href="<?php echo $inreply['url']?>"><?php echo $inreply['title']; ?></a> by <?php echo $inreply['name']; ?></span><?php }?>
			<div class="spacer"></div>
			<span class="detail"><span class="item">URL </span><a href="<?=$url?>"><?=$url?></a></span>
			
			<?php if(!empty($snipurl)){?>
				<span class="detail"><span class="item">Snipurl </span><a href="<?=$snipurl?>"><?php echo htmlspecialchars($snipurl) ?></a></span>
			<?php }?>
			
			<div class="spacer"></div>
			
			<span class="detail"><a class="control" href="<?=site_url("view/download/".$pid)?>">Download Paste</a> or <a class="control" href="<?=site_url("view/raw/".$pid)?>">View Raw</a> &mdash; <a href="#" class="expand control">Expand paste</a> to full width of browser | <a href="<?=site_url("view/options")?>">Change Viewing Options</a></span>
		</div>
	</div>
</div>
<div class="layout_clear"></div>
<div class="paste <?php if($full_width){ echo "full"; }?>">
	<div class="text_formatted <?php if($full_width){ echo "full"; }?>">
		<div id="code_frame">
			<?=$paste?>
		</div>
	</div>
</div>

<div class="spacer"></div>

<div class="replies">

	<div class="container">
		<?php
		
		function checkNum($num){
			return ($num%2) ? TRUE : FALSE;
		}
		
		if(isset($replies) and !empty($replies)){		
			$n = 1;
		?>
			<h1>Replies to <?php echo $title; ?></h1>
			
			<table class="recent">
				<tbody>
					<tr>
						<th class="title">Title</th>
						<th class="name">Name</th>
						<th class="time">When</th>
					</tr>

			<?php foreach($replies as $reply){
					if(checkNum($n)){
						$eo = "even";
					} else {
						$eo = "odd";
					}
					$n++;
			?>
				
				<tr class="<?=$eo?>">
					<td class="first"><a href="<?=site_url("view/".$reply['pid'])?>"><?=$reply['title']?></a></td>
					<td><?=$reply['name']?></td>
					<td><? $p = explode(",", timespan($reply['created'], time())); echo $p[0];?> ago.</td>
				</tr>
		
			<?php }?>
			</tbody>
			</table>
		<div class="spacer high"></div><div class="spacer high"></div>
		<?php }?>
		
		<?php 
			$reply_form['page']['title'] = "Reply to \"$title\"";
			$reply_form['page']['instructions'] = 'Here you can reply to the paste above';
		$this->load->view('defaults/paste_form', $reply_form); ?>
	</div>

</div>
</div>

<?php $this->load->view('view/view_footer'); ?>
