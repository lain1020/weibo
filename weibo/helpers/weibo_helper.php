<?php
header("Content-type:text/html;charset=utf8");
/**
 * 格式化输出数组
 */
function p($arr){
	echo '<pre>'.print_r($arr,true).'</pre>';
}
/**
 * 操作成功提示并跳转函数
 * @param string $msg 提示信息
 * @param string $url 要跳转的地址，默认浏览器后退。
 */
function success($msg,$url=null){
	$url=$url?"location.href='".site_url($url)."'":"window.history.go(-1)";
	$html=<<<str
	{$msg}
	<script>
		setTimeout(function(){
			{$url}
		},1000)
</script>
str;
echo $html;
die;
}
/**
 * 操作失败提示并跳转函数
 * @param string $msg 提示信息
 * @param string $url 要跳转的地址，默认浏览器后退。
 */
function error($msg,$url=NULL){
	$url=$url?"location.href='".site_url($url)."'":"window.history.go(-1)";
	$html=<<<str
	{$msg}
	<script>
		setTimeout(function(){
			{$url}
		},1000)
</script>
str;
echo $html;
die;
}
/**
 * 检测微博长度
 * @param string $b 要检测的内容
 */
function getMessageLength ($b) { 
	$preg="@[^\x{00}-\x{80}]@u";
	if(preg_match_all($preg, $b,$a)){
		$len=strlen($b)-count($a[0]);
		return ceil($len/2);
	}else{
		return strlen($b);
	}
}
/**
 * 将消息提醒写入缓存
 * @param  [int]  $uid     [用户uid]
 * @param  [int]  $type    [0：首页新微博、1:评论,2:私信,3:@用户]
 * @param  boolean $flush  [消息总条数是否清0]
 */
function set_msg($uid,$type,$flush=FALSE){
	$CI = &get_instance();
	$CI->load->driver('cache', array('adapter' => 'file'));
	switch ($type) {
		case '0':
		$name='news';
		break;
		case '1':
		$name='comment';
		break;
		case '2':
		$name='letter';
		break;
		case '3':
		$name='at';
		break;
	}
	
	if($CI->cache->get('usermsg_'.$uid)){
		//如果有缓存数据直接操作缓存
		$data=$CI->cache->get('usermsg_'.$uid);
	}else{
		//如果没有就初始化变量
		$data=array('news'=>0,'comment'=>0,'letter'=>0,'at'=>0);
	}
	if($flush){
		$data[$name]=0;
	}else{
		$data[$name]++;
	}
	//消息提醒写入缓存，缓存两年
	$CI->cache->save('usermsg_'.$uid,$data,60*60*24*365*2);
}