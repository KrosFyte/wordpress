<?php 

register_nav_menu( 'primary', __( '导航菜单', 'Winnd' ) );

add_filter('the_excerpt_rss', 'feedlove');
add_filter('the_content_rss', 'feedlove');

if (is_admin() ){
	get_template_part( 'functions/function-setting' );
}else{
	get_template_part( 'functions/function-ajax' );
}

add_filter( 'pre_option_link_manager_enabled', '__return_true' );

//Toggle 伸缩

function single_toggle($atts, $content=null){
 
extract(shortcode_atts(array("title"=>' 点击查看 '),$atts));	
 
return '<div class="tga icon-plus"><p>'.$title.'</p> </div><div class="tgb" style="display:none;" >'.$content.'</div>';
 
}
add_shortcode('toggle','single_toggle');

add_action( 'admin_print_footer_scripts', 'toggle_buttons', 100 );
function toggle_buttons() {
    ?>
<script type="text/javascript">
        QTags.addButton( 't', 'toggle', '[toggle title="  "]  [/toggle]');
</script>   <?php }


//TAB

function bigfa_tabs($atts, $content = null)
{
    if (!preg_match_all("/(.?)\[(item)\b(.*?)(?:(\/))?\](?:(.+?)\[\/item\])?(.?)/s", $content, $matches)) {
        return do_shortcode($content);
    }
    else
    {
        for ($i = 0; $i < count($matches[0]); $i++) {
            $matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
        }
        $out = '<div class="st-tabs">';
        $out.= '<ul class="tabs-title">';
        for ($i = 0; $i < count($matches[0]); $i++) {
            $out.= '<li';
            if($i == 0 ){$out.=' class="active"';}
            $out.= '><a href="#tab-'. $i .'">'. $matches[3][$i]['title'] .'</a></li>';
        }
        $out.= '</ul>';
        $out.= '<div class="tabs-container">';
        for ($i = 0; $i < count($matches[0]); $i++) {
            $out.= '<div id="tab-'. $i .'" ';
            if($i == 0 ){$out.= ' style="display:block"';}
            $out.='class="tabs-content">'. bigfa_do_shortcode(trim($matches[5][$i]), TRUE) .'</div>';
        }
        $out.= '</div>';
        $out.= '</div>';
        return $out;
    }
}
add_shortcode('tabs', 'bigfa_tabs');
function bigfa_do_shortcode($content, $autop = FALSE)
{
    $content = do_shortcode( $content );
    if ( $autop ) {
        $content = wpautop($content);
    }
    return $content;
}

add_action( 'admin_print_footer_scripts', 'tab_buttons', 100 );
function tab_buttons() {
    ?>
<script type="text/javascript">
        QTags.addButton( 'tab', 'Tabs', '[tabs]\n[item title="TITLE"] YOUR CONTENT HERE [/item]\n[item title="TITLE"] YOUR CONTENT HERE [/item]\n[/tabs]');
</script>   
<?php }

 //图片Alt

function photo_alt($c) {         
    global $post;//全局量   
    $aad = 100;        
    $title = $post->post_title;//文章标题         
    $s = array('/src="(.+?.(jpg|bmp|png|jepg|gif))"/i' => 'src="$1" alt="'.$title.'" title="'.$title.'"  ');         
    foreach($s as $p => $r){         
        $c = preg_replace($p,$r,$c);         
    }         
    return $c;         
}         
add_filter( 'the_content', 'photo_alt' );    

function warn($atts, $content=null, $code="") 
{
    $return = '<div class="warn">';
    $return .= $content;
    $return .= '</div>';
    return $return;
}
	add_shortcode('warn', 'warn');

add_action( 'admin_print_footer_scripts', 'warn_buttons', 100 );
function warn_buttons() {
    ?>
<script type="text/javascript">
        QTags.addButton( 'w', '警告', '[warn][/warn]');
</script>   <?php }

function about($atts, $content=null, $code="") 
{
    $return = '<div class="about">';
    $return .= $content;
    $return .= '</div>';
    return $return;
}
	add_shortcode('about', 'about');

add_action( 'admin_print_footer_scripts', 'about_buttons', 100 );
function about_buttons() {
    ?>
<script type="text/javascript">
        QTags.addButton( 'a', '关于', '[about][/about]');
</script>   <?php }

function mostactive($num = 20,$day = 365) {   
    if(!$mostactive = get_option('mostactive')){   
        $array = array();   
        $comments = get_comments( array('status' => 'approve',user_id=>0) );   
        $admin_mail = get_option('admin_email');   
        foreach($comments as $comment){   
            $email = $comment->comment_author_email;   
            $author = $comment->comment_author;   
            $url = $comment->comment_author_url;
            $month = strtotime(date("Y-m"));   
            $com_date = abs(strtotime($comment->comment_date_gmt . "GMT"));   
            $month_before = strtotime(date("Y-m")) + $day*24*60*60;       
            if($email!="" && $email!=$admin_mail && $com_date>=$month && $com_date<= $month_before){ // 排除邮箱   
                $index = deep_in_array($email, $array);   
                if( $index > -1){   
                    $array[$index]["number"] +=1;   
                }else{   
                    array_push($array, array(   
                        "email" => $email,   
                        "author" => $author,   
                        "url" => $url,   
                        "number" => 1   
                    ));   
                }   
            }   
        }   
        foreach ($array as $k => $v) {   
            $edition[] = $v['number'];   
        }   
        array_multisort($edition, SORT_DESC, $array); // 数组倒序排列   
        if(empty($array)) {   
            $mostactive_mf = '<ul><li>none data.</li></ul>';   
        } else {  
            $mostactive = "<ul class='wall'>";
            $key = ( count($array) < $num  ) ? count($array) : $num;
            for ($i = 0 ; $i < $key ;$i++) {   
                $mf_avatar = get_avatar($array[$i]["email"],$size='90',$default='');   
                $mf_url = $array[$i]["url"]; 
                $mf_author = $array[$i]["author"];   
$mf_alt = $array[$i]["author"] . ' ('. $array[$i]["number"]. ' comments)';   
                $mostactive .= "<li class='wall li' data-tooltip='$mf_alt'><a rel='external nofollow' target='_blank' href='$mf_url'>$mf_avatar<span>$mf_author</span></a></li>";   
            }  
$mostactive .= "</ul>";            
        }   
        update_option('mostactive', $mostactive);   
    }   
    echo $mostactive;   
}   
function deep_in_array($value, $array) { // 返还数组序号   
    $i = -1;   
    foreach($array as $item => $v) {    
        $i++;   
        if($v["email"] == $value){   
            return $i;   
        }   
    }    
    return -1;    
}   
function clear_mostactive() {   
  update_option('mostactive', ''); // 清空 mostactive_mf   
}   
add_action('comment_post', 'clear_mostactive'); // 新评论发生时   
add_action('edit_comment', 'clear_mostactive'); // 评论被编辑过

//以下有关评论的代码来自咚门叔，http://www.dearzd.com/DBlog/

//评论列表
function commentlist( $comment, $args, $depth){
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="author"><?php echo get_avatar($comment,'44'); ?></div>
			<span class="name"><?php printf( __( '%s' ), get_comment_author_link() ); ?></span>
			<span class="time"><?php echo time_ago(); ?></span>
			<div class="reply"><?php comment_reply_link(array_merge( $args, array( 'reply_text' => '回复', 'depth' =>$depth, 'max_depth' =>$args['max_depth'] ) ) ); ?></div>
			<div class="text">
				<?php
					if ($comment->comment_parent):
						$parent_id = $comment->comment_parent;
						$comment_parent = get_comment($parent_id);
				?>
					<span class="comment-to"><a href="<?php echo "#comment-".$parent_id; ?>" title="<?php echo mb_strimwidth(strip_tags(apply_filters( 'the_coment', $comment_parent->comment_content )), 0, 100, "..."); ?>">@<?php echo $comment_parent->comment_author; ?></a></span>
					<?php echo get_comment_text(); ?>
				<?php else: comment_text(); ?>
				<?php endif; ?>
			</div>
			<?php if ( $comment->comment_approved == '0'): ?>
				<em><span class="moderation"><?php _e('Your comment is avaiting moderation.'); ?></span></em>
			<?php endif; ?>
		</div>
<?php
}

//评论作者新标签打开
function hu_popuplinks($text) {
	$text = preg_replace('/<a (.+?)>/i', "<a $1 target='_blank'>", $text);
	return $text;
}
add_filter('get_comment_author_link', 'hu_popuplinks', 6);

//冒充评论检验
function CheckEmailAndName(){
	global $wpdb;
	$comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
	$comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
	if(!$comment_author || !$comment_author_email){
		return;
	}
	$result_set = $wpdb->get_results("SELECT display_name, user_email FROM $wpdb->users WHERE display_name = '" . $comment_author . "' OR user_email = '" . $comment_author_email . "'");
	if ($result_set) {
		if ($result_set[0]->display_name == $comment_author){
			err(__('警告: 您不能使用博主的昵称！'));
		}else{
			err(__('警告: 您不能使用博主的邮箱！'));
		}
		fail($errorMessage);
	}
}
add_action('pre_comment_on_post', 'CheckEmailAndName');

//评论时间
function time_ago( $type = 'commennt', $day = 30 ) {
	$d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
	$timediff = time() - $d('U');
	if ($timediff <= 60*60*24*$day){
		echo  human_time_diff($d('U'), strtotime(current_time('mysql', 0))), '前';
	}
	if ($timediff > 60*60*24*$day){
		echo  date('Y/m/d',get_comment_date('U'));
	};
}

//邮件回复
function comment_mail_notify($comment_id) {
	$admin_notify = '1';
	$admin_email = get_bloginfo ('admin_email');
	$comment = get_comment($comment_id);
	$comment_author_email = trim($comment->comment_author_email);
	$parent_id = $comment->comment_parent ? $comment->comment_parent : '';
	global $wpdb;
	if ($wpdb->query("Describe {$wpdb->comments} comment_mail_notify") == '')
		$wpdb->query("ALTER TABLE {$wpdb->comments} ADD COLUMN comment_mail_notify TINYINT NOT NULL DEFAULT 0;");
	if (($comment_author_email != $admin_email && isset($_POST['comment_mail_notify'])) || ($comment_author_email == $admin_email && $admin_notify == '1'))
		$wpdb->query("UPDATE {$wpdb->comments} SET comment_mail_notify='1' WHERE comment_ID='$comment_id'");
	$notify = $parent_id ? '1' : '0';
	$spam_confirmed = $comment->comment_approved;
	if ($parent_id != '' && $spam_confirmed != 'spam' && $notify == '1') {
		$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME']));
		$to = trim(get_comment($parent_id)->comment_author_email);
		$subject = '你在' . get_option("blogname") . '的留言有了回复';
		$message = '
		<div id="mailtou" style="width:39em;max-width:90%;height:auto;margin-top:10px;margin-bottom:48px;margin-left:auto;margin-right:auto;padding:40px;border:1px solid #ededed;font-size:13px;line-height:14px;">
			<p class="mail_title" style="font-size:15px;color:#333;margin-bottom:30px;">你在&#8968; '. get_the_title($comment->comment_post_ID) .' &#8971;留言：</p>
			<p style="border:1px solid #EEE;overflow:auto;padding:10px;margin:1em 0;"><span style="color:#1CA838;">'. trim(get_comment($parent_id)->comment_author) .'</span>:'. trim(get_comment($parent_id)->comment_content) .'</p>
			<p style="border:1px solid #EEE;overflow:auto;padding:10px;margin:1em 0 1em 60px;"><span style="color:#1CA838;">'. trim($comment->comment_author) .'</span>:'. trim($comment->comment_content) .'</p>
			<p style="margin-bottom:10px">点击<a href="' . htmlspecialchars(get_comment_link($parent_id)) . '" style="color:#1CA838;text-decoration:none;outline:none;">查看完整内容</a></p>
			<p style="margin-bottom:10px">(此邮件由系统发出,无需回复.)</p>
		</div>';
		$from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
		$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
		wp_mail( $to, $subject, $message, $headers );
	}
}
add_action('comment_post', 'comment_mail_notify');
?>  