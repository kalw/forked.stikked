<?php 
$this->load->view('defaults/header'); 
/*foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
	<meta charset="utf-8" />
*/
?>
	<div>
		<a href='<?php echo site_url('adm/pastes_list')?>'>Pastes</a>
		<a href='<?php echo site_url('adm/users_list')?>'>Users</a>
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
