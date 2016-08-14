<!--头部 begin-->
    <div class="header">
        <div class="inner cf">

            <div class="logo">
                <a href="<?php echo WWW_SITE;?>"><img src="<?php echo STATIC_SITE;?>/images/logo.png?<?php echo RESOURCE_VERSIONS;?>" width="225" height="47" alt="天象有色"></a>
            </div>


     	  	   <span class="user-handle">

                    <?php
                        if(!$this->isLogin){?>
                            <a href="<?php echo USER_SITE.'/index/login';?>" class="go-login">登录</a>
     	  	   	            <a href="<?php echo USER_SITE.'/user/account';?>" class="go-register">开户</a>
                        <?php  } ?>
     	  	   </span>

            <ul class="navigation">
                <li <?php echo (empty($this->class))?'class="active"':'';?>><a href="<?php echo WWW_SITE;?>">首页</a></li>
                <li <?php echo (!empty($this->class) && $this->class == 1 )?'class="active"':'';?>><a href="<?php echo DEAL_SITE;?>">商城</a></li>
                <!--li <?php echo (!empty($this->class) && $this->class == 5 )?'class="active"':'';?>><a href="<?php echo WWW_SITE;?>">金融</a></li-->
                <li <?php echo (!empty($this->class) && $this->class == 6 )?'class="active"':'';?>><a href="<?php echo WWW_SITE."/notice/information";?>">资讯</a></li>
                <li <?php echo (!empty($this->class) && $this->class == 3 )?'class="active"':'';?>><a href="<?php echo WWW_SITE;?>/index/read">交易须知</a></li>
                <li <?php echo (!empty($this->class) && $this->class == 2 )?'class="active"':'';?>><a href="<?php echo WWW_SITE;?>/index/safety">安全保障</a></li>
                <li <?php echo (!empty($this->class) && $this->class == 4 )?'class="active"':'';?>><a href="<?php echo WWW_SITE;?>/index/about">关于我们</a></li>
            </ul>

        </div>
    </div>
    <!-- 内容 -->
	