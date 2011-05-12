<script type="text/javascript">
	$(document).ready(function(){
		$(".show").click(function(){
			$(".advanced").hide();
			$(".advanced_options").show();					
			return false;
		});
	});
</script>

<?php if(isset($this->validation->error_string)){ echo $this->validation->error_string; }?>
<div id="content_left" class="form_wrapper margin">
	<div class="content_title">


		<h1><?php if(!isset($page['title'])){ ?>
			Create a new paste
		<?php } else { ?>
			<?php echo $page['title']; ?>
		<?php } ?></h1>
		<p class="explain border"><?php if(!isset($page['instructions'])){ ?>
			Here you can create a new paste
		<?php } else { ?>
			<?php echo $page['instructions']; ?>
		<?php } ?></p>								
	</div>	
		<form action="<?=base_url()?>" method="post">
	<div class="textarea_border">
		<textarea onkeydown="return catchTab(this,event)" id="paste_code" name="code" class="paste_code" rows="15" cols="50"></textarea>
	</div>	
	<div class="content_title settings">
		Optional Paste Settings
	</div>
	<div class="form_frame_left">								
		<div class="form_frame">
			<div class="form_left">
				<span class="instruction">What's your name?</span>
			</div>
			<div class="form_righ">
				<?php $set = array('name' => 'name', 'id' => 'name', 'value' => $name_set, 'maxlength' => '32', 'tabindex' => '1');
				echo form_input($set);?>
			</div>
		</div>
		
		<div class="form_frame">
			<div class="form_left">
				<span class="instruction">Give a title.</span>
			</div>
			<div class="form_right">
				<input value="<?php if(isset($title_set)){ echo $title_set; }?>" type="text" id="title" name="title" tabindex="2"  />
			</div>
		</div>
																
		<div class="form_frame">
			<div class="form_left">
				<span class="instruction">Language</span>
			</div>
			<div class="form_right">
				<?php $lang_extra = 'id="lang" class="select" tabindex="3"'; echo form_dropdown('lang', $languages, $lang_set, $lang_extra); ?>
			</div>
		</div>															
		


	</div>
		</form>
	<div class="form_frame_right">
		<div class="">
			Set some <a href="#" class="show control">advanced</a> options.
		</div>	
	
		<div class="advanced_options hidden item_group">																
			<div class="">
				<div class="">
					<span class="instruction">Copy link to clipboard ?</span>
				</div>
				<div class="">					
					<?php
						$set = array('name' => 'acopy', 'id' => 'acopy', 'tabindex' => '8', 'value' => '1', 'checked' => $acopy_set);
						echo form_checkbox($set);
					?>
				</div>				
			</div>
		
			<div class="">
				<div class="">
					<span class="instruction">Remember your settings ?</span>
				</div>
				<div class="">
					<?php
						$set = array('name' => 'remember', 'id' => 'remember', 'tabindex' => '9', 'value' => '1', 'checked' => $remember_set);
						echo form_checkbox($set);
					?>
				</div>
			</div>
			<div class="">
				<div class="">
					<span class="instruction">Create a snipurl ?</span>
				</div>
				<div class="">
					<?php
						$set = array('name' => 'snipurl', 'id' => 'snipurl', 'value' => '1', 'tabindex' => '5', 'checked' => $snipurl_set);
						echo form_checkbox($set);
					?>
				</div>
			</div>
	
			<div class="">
				<div class="">
					<span class="instruction">Private ?</span>
				</div>
				<div class="">
					<?php
						$set = array('name' => 'private', 'id' => 'private', 'tabindex' => '6', 'value' => '1', 'checked' => $private_set);
						echo form_checkbox($set);
					?>
				</div>
			</div>						
	
			<div class="">
				<div class="">
					<span class="instruction">When to delete ?</span>
				</div>
				<div class="">
					<?php 
						$expire_extra = 'id="expire" class="select" tabindex="7"';
						$options = array(
									"0" => "Keep Forever",
									"30" => "30 Minutes",
									"60" => "1 hour",
									"360" => "6 Hours",
									"720" => "12 Hours",
									"1440" => "1 Day",
									"100080" => "1 Week",
									"40320" => "4 Weeks"
									);
						echo form_dropdown('expire', $options, $expire_set, $expire_extra); 
					?>
				</div>
			</div>
		
	
			<?php if($reply){?>
				<input type="hidden" value="<?php echo $reply; ?>" name="reply" />
			<?php }?>
	
			<div class="">
				<div class="">
					<button type="submit" value="submit" name="submit">Create</button>
				</div>
			</div>
		</div>
	</div>
</div>
