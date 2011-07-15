  <div id="content_right">
<?php if($this->tank_auth->is_logged_in()){?>
    <div class="content_right_menu">
      <div class="content_right_title">
        <a href="<?php echo config_item('base_url');  ?>lists">My Pastes</a>
      </div>
	<?php 
	$username = $this->tank_auth->get_username();
	$data = $this->pastes->getMyLists("","",$username);
	$count=0;
	foreach($data['pastes'] as $paste) {
	$count++;
	if($count == 5){break;}
	?>
      <ul class="right_menu">
        <li><a href="<?php echo site_url("view/".$paste['pid']) ?>"><?php echo $paste['title']  ?></a><span><?php echo $paste['name']  ?> | <?php  $p = explode(",", timespan($paste['created'], time())); echo $p[0];  ?> ago</span></li>
      </ul>
	<?php }?>
    </div>
<?php }?>

    <div class="content_right_menu">
      <div class="content_right_title">
        <a href="<?php echo config_item('base_url');  ?>lists">Public Pastes</a>
      </div>
	<?php 
	$data = $this->pastes->getLists();
	$count=0;
	foreach($data['pastes'] as $paste) {
	$count++;
	if($count == 5){break;}
	?>
      <ul class="right_menu">
        <li><a href="<?php echo site_url("view/".$paste['pid']) ?>"><?php echo $paste['title']  ?></a><span><?php echo $paste['name']  ?> | <?php  $p = explode(",", timespan($paste['created'], time())); echo $p[0];  ?> ago</span></li>
      </ul>
	<?php }?>

    </div>

      <div class="menu_users"></div>
    </div>
  </div>


