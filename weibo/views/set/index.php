<div class="content clearfix">
	<?php $this->load->view('components/set_left_nav');?>
	<div class="main">
		<div class="box_center">
			<div class="title clearfix">个人信息<span class="S_txt2 right"><a href="#">预览个人主页</a></span></div>
			<div class="personinfo">
				<div class="item">
					<ul class="clearfix">
						<li>登录名</li>
						<li class="S_txt2">ai*****</li>
						<li><a href="<?php echo site_url('set/security') ?>">修改密码»</a></li>
					</ul>
				</div>
				<div class="item">
					<ul class="clearfix">
						<li>昵称</li>
						<li class="S_txt2">昵称</li>
						<li><a href="javascript:void(0)">编辑</a></li>
					</ul>
					<div class="acc_form hide">
						<div class="info_item clearfix">
							<div class="tit">现昵称</div>
							<div class="inp">airzhe</div>
							<div class="tips"></div>
						</div>
						<div class="info_item clearfix">
							<div class="tit">新昵称</div>
							<div class="inp"><input class="W_input" type="text"></div>
							<div class="tips"><span class="S_txt2">4-30个字符，支持中英文、数字、"_"或减号</span></div>
						</div>
						<div class="info_item clearfix">
							<div class="inp btn"><a href="javascript:void(0)" class="W_btn_a"><span>保存</span></a><a href="javascript:void(0)" class="W_btn_b" action="close_item"><span>关闭</span></a></div>
						</div>
					</div>
				</div>
				<div class="item">
					<ul class="clearfix">
						<li>个人资料</li>
						<li class="S_txt2">完善资料，让大家更了解你</li>
						<li><a href="javascript:void(0)">编辑</a></li>
					</ul>
					<div class="acc_form hide">
						<p class="S_txt2">以下信息将显示在个人资料页，方便大家了解你。</p>
						<div class="info_item clearfix">
							<div class="tit">真实姓名</div>
							<div class="inp"><input class="W_input" type="text" name="truename"></div>
							<div class="tips">填写真实姓名</div>
						</div>
						<div class="info_item clearfix">
							<div class="tit">所在地</div>
							<div class="inp"><select name="" id=""></select></div>
						</div>
						<div class="info_item clearfix">
							<div class="tit">性别</div>
							<div class="inp">
								<label><input type="radio" name="sex">男</label>
								<label><input type="radio" name="sex">女</label>
							</div>
						</div>
						<div class="info_item clearfix">
							<div class="tit">简介</div>
							<div class="inp">
								<textarea class="W_input" name=""></textarea>	
							</div>
							<div class="tips">请不要超过70个字</div>
						</div>
						<div class="info_item clearfix">
							<div class="inp btn"><a href="javascript:void(0)" class="W_btn_a"><span>保存</span></a><a href="javascript:void(0)" class="W_btn_b" action="close_item"><span>关闭</span></a></div>
						</div>
					</div>
				</div>
				<div class="item">
					<ul class="clearfix">
						<li>个性域名</li>
						<li class="S_txt2">设置个性域名，让朋友更容易记住</li>
						<li><a href="javascript:void(0)">编辑</a></li>
					</ul>
					<div class="acc_form domainname hide">
						<p class="S_txt2">设置个性化域名，让朋友更容易记住自己的微博地址</p>
						<div class="W_tips tips_error clearfix">
							<span class="icon icon_errorS left"></span>
							<span class="txt">个性域名设置后不能更改</span>
						</div>
						<?php if (strpos($user['domain'],'u/')===false): ?>
							<p> 您的域名：<?php echo $user['domain'] ?></p>
						<?php else: ?>
							<form action="" method="post" class="form_domain">
								<div class="info_item clearfix">
									<div class="tit"><?php echo base_url() ?></div>
									<div class="inp"><input type="text" name="domain" class="W_input" required></div>
									<div class="tips"><i class="icon_warn"></i><label class="S_txt2">个性化域名请使用长度为4～20个字符的数字或者字母</label></div>
								</div>
								<div class="info_item clearfix">
									<div class="inp btn"><a href="javascript:void(0)" class="W_btn_a save_info"  action="save_domain"><span>保存</span></a><a href="javascript:void(0)" class="W_btn_b" action="close_item"><span>关闭</span></a></div>
								</div>
							</form>
						<?php endif ?>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
