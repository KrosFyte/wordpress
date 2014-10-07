<?php
add_action('admin_menu','Winnd_admin_menu');
function Winnd_admin_menu(){
	add_theme_page('主题设置','主题设置','edit_themes',basename(__FILE__),'Winnd_setting_page');
	add_action('admin_init','Winnd_setting');
}

function Winnd_setting(){
	register_setting('Winnd_setting_group','Winnd_options');
}

function Winnd_setting_page(){
	if ( isset($_REQUEST['settings-updated']) )
		echo '<div id="message" class="updated fade"><p><strong>主题设置已保存!</strong></p></div>';
	if ( 'reset' == isset($_REQUEST['reset']) ){
		delete_option('Winnd_options');
		echo '<div id="message" class="updated fade"><p><strong>主题设置已重置!</strong></p></div>';
	}
	?>

<style type="text/css">
.Winnd_reset_from,.Winnd_submit_form{border:1px solid #D5D2D2;;background:#fff;cursor:pointer;padding:8px;margin:5px;outline: none;}
.Winnd_reset_from:hover,.Winnd_submit_form:hover{background:#2E2E2E;color:#fff}
.wrap h2{color: #fff;font-family: cursive,"Microsoft Yahei";text-align: center;padding-bottom: 50px;}
.form-table td p{color:#B1B1B1;text-align:left}
</style>
	<div class="wrap" style="width: 800px;margin: 100px auto;padding: 100px 40px 40px 40px;border: 1px solid #ededed;background: #fff url(http://drp.io/files/5368fd7c29166.jpg) top center no-repeat;">
		<div id="icon-options-general" class="icon32"><br></div><h2>Winnd主题设置</h2><br>
		<form method="post" action="options.php"  style="text-align:center">
			<?php settings_fields('Winnd_setting_group'); ?>
			<?php $options = get_option('Winnd_options'); ?>
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row"><label>心情：</label></th>
						<td>
							<p>显示在分类菜单下方的通知</p>
							<p><textarea type="textarea" name="Winnd_options[notice]" class="large-text"><?php echo $options['notice']; ?></textarea></p>
						</td>
					</tr>
<tr valign="top">
						<th scope="row"><label>背景：</label></th>
						<td>
							<p>背景图片地址</p>
							<p><textarea type="textarea" name="Winnd_options[bg]" class="large-text"><?php echo $options['bg']; ?></textarea></p>
						</td>
					</tr>
<tr valign="top">
							<th scope="row"><label>网站描述</label></th>
							<td>
								<p>用简洁凝练的话对你的网站进行描述</p>
								<p><textarea type="textarea" name="Winnd_options[description]"  class="large-text"><?php echo $options['description']; ?></textarea></p>
							</td>
						</tr>	
						<tr valign="top">
							<th scope="row"><label>网站关键词</label></th>
							<td>
								<p>多个关键词请用英文逗号隔开</p>
								<p><textarea type="textarea" class="large-text" name="Winnd_options[keywords]"><?php echo $options['keywords']; ?></textarea></p>
							</td>
						</tr>
				</tbody>
			</table>
					<input type="submit" class="Winnd_submit_form" name="save" value="<?php _e('Save Changes') ?>"/>
			</form>
			<form method="post"  style="text-align:center">
					<input type="submit" name="reset" value="<?php _e('Reset') ?>" class="Winnd_reset_from" />
					<input type="hidden" name="reset" value="reset" />
			</form>

		<p style="text-align:center">有问题请发邮件咨询：lizimuah@gmail.com，或访问lizimu.net<p>
	</div>
	<?php
}
?>