
<!--		<aside class="lang">-->
<!--			<ul>-->
<!--				<li><a href="--><?php //echo site_url('home/'); ?><!--?lang=english"><img src="--><?php //echo base_url(); ?><!--static/css/flag/ru.png" alt="ru"/></a></li>-->
<!--				<li><a href="--><?php //echo site_url('home/'); ?><!--?lang=russian"><img src="--><?php //echo base_url(); ?><!--static/css/flag/en.png" alt="en"/></a></li>-->
<!--			</ul>			-->
<!--		</aside>-->


        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url('home/'); ?>"><?php echo lang('home_igt')?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo site_url('/offers/') ?>"><?php echo lang('home_offers')?></a></li>
                        <!--<li><a href="<?php echo site_url('/home/ireland/') ?>"><?php echo lang('home_ireland')?></a></li> -->
                        <li><a href="<?php echo site_url('/home/contact/') ?>"><?php echo lang('home_contact_us')?></a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <?php if(!empty($email_user)) { ?>
                        <li><a href="<?php echo site_url('user/logout'); ?>"><?php echo $email_user ?></a></li>
                        <?php } else {    ?>
                        <li><a href="<?php echo site_url('user/auth'); ?>"><?php echo lang('signin')?></a></li>
                        <?php }?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo lang('home_langs')?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('home/setLang'); ?>?language=en&redirect_to=<?php echo site_url(uri_string()) ?>"><?php echo lang('home_langs_en')?></a></li>
                                <li><a href="<?php echo site_url('home/setLang'); ?>?language=ru&redirect_to=<?php echo site_url(uri_string()) ?>"><?php echo lang('home_langs_ru')?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->

        </nav>

