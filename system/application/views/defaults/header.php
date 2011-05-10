<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title><?php echo $config['site_name'];?></title>
		<!-- <link rel="stylesheet" href="<?echo $config['base_url']?>static/styles/fonts.css" type="text/css" /> -->
		<!-- <link rel="stylesheet" href="<?php ?>static/styles/main.css" type="text/css" media="screen" title="main" charset="utf-8" /> -->
		<link href="<?php echo config_item('base_url');  ?>static/styles/style.css" rel="stylesheet" type="text/css" />

		<?php if(!empty($scripts)){?>
		<?php foreach($scripts as $script){?>
		<script src="<?php  echo config_item('base_url'); ?>static/js/<?=$script?>" type="text/javascript"></script>
		<?}}?>		
	</head>
	<body>
		<div id="header">
			<div id="header_top">
				<span class="span_left more">Forked.Stikked</span><span class="span_left less"> &nbsp;|&nbsp; paste tool </span>
				<ul class="top_menu">
					<li class="no_border_li"><a href="<?php echo config_item('base_url');  ?>">create new paste</a></li>
					<li><a href="<?php echo config_item('base_url');  ?>tools">tools</a></li>
					<li><a href="<?php echo config_item('base_url');  ?>api">api</a></li>
					<li><a href="<?php echo config_item('base_url');  ?>lists">archive</a></li>
					<li><a href="<?php echo config_item('base_url');  ?>faq">faq</a></li>
					<li class="twitter"><a href="http://twitter.com/pastebincom">twitter</a></li>

				</ul>
			</div>
			<div id="header_middle">
				<span class="span_left big"><a href="<?php echo config_item('base_url');  ?>/">Forked.Stikked</a></span> <span id="title_extra"></span>
				<div id="header_middle_search">
					<form id="cse-search-box" action="search" method="get" name="search_form" class="search_form">
						<input type="text" onfocus="this.value=''" value="search..." size="5" name="q" class="search_input">
						<input type="image" value="Search" alt="" src="http://pastebin.com/i/dot.gif" class="search_button" name="sa" alt="Search...">
					</form>
				</div>					
			</div>
			<div id="header_bottom">
				<div class="div_top_menu">
					<ul class="top_menu no_border">
						<li><a href="/">create new paste</a></li>
						<li class="trending"><a href="/trends">trending pastes</a></li>
					</ul>
				</div>
				<ul class="top_menu">
					<li class="no_border_li"><a href="<?php echo config_item('base_url');  ?>/auth/register">sign up</a></li><li><a href="<?php echo config_item('base_url');  ?>/auth/login">login</a></li><li><a href="<?php echo config_item('base_url');  ?>settings">my settings</a></li><li><a href="<?php echo config_item('base_url');  ?>profile">my profile</a></li>				
				</ul>		
			</div>			
		</div>
				<div class="frame_spacer"><!-- --></div>
				<div class="content" id="monster_frame">
					<div class="container">
						<?php if(isset($status_message)){?><script type="text/javascript" charset="utf-8">
							$(document).ready(function(){
								$(".change").oneTime(3000, function() {
								$(this).fadeOut(2000);
							});						
						});</script>
						<div class="message success change">
							<div class="container">
								<?php echo($status_message); ?>
							</div>
						</div>
						<?php }?>				
