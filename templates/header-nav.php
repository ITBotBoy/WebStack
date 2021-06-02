        <div class="sidebar-menu toggle-others fixed">
            <div class="sidebar-menu-inner">
                <header class="logo-env">
                    <!-- logo -->
                    <h1 class="logo" style="font-size: 0;margin: 0;">
                        <a href="<?php bloginfo('url') ?>" class="logo-expanded">
                            <img src="<?php echo io_get_option('logo_normal') ?>" height="40" alt="<?php bloginfo('name') ?>" />
                        </a>
                        <a href="<?php bloginfo('url') ?>"><?php bloginfo('name') ?></a>
                        <a href="<?php bloginfo('url') ?>" class="logo-collapsed">
                            <img src="<?php echo io_get_option('logo_small') ?>" height="40" alt="<?php bloginfo('name') ?>">
                        </a>
                    </h1>
                    <div class="mobile-menu-toggle visible-xs">
                        <a href="#" data-toggle="mobile-menu">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </header>
                <ul id="main-menu" class="main-menu">
                <?php
                foreach($categories as $category) {
                    if($category->category_parent == 0){
                        $children = get_categories(array(
                            'taxonomy'   => 'favorites',
                            'meta_key'   => '_term_order',
                            'orderby'    => 'meta_value_num',
                            'order'      => 'desc',
                            'child_of'   => $category->term_id,
                            'hide_empty' => 0)
                        );
                        if(empty($children)){ ?>
                        <li>
                            <a href="<?php if (is_home() || is_front_page()): ?><?php else: echo home_url() ?>/<?php endif; ?>#<?php echo $category->name.$category->name;?>" class="smooth">
                               <i class="iconfont <?php echo $category->description ?>"></i>
                               <span class="title"><?php echo $category->name; ?></span>
                            </a>
                        </li> 
                        <?php }else { ?>
                        <li>
                            <a>
                               <i class="fa <?php echo $category->description ?> fa-fw"></i>
                               <span class="title"><?php echo $category->name; ?></span>
                            </a>
                            <ul>
                                <?php foreach ($children as $mid) { ?>

                                <li>
                                    <a href="<?php if (is_home() || is_front_page()): ?><?php else: echo home_url() ?>/<?php endif; ?>#<?php  echo $category->name.$mid->name ;?>" class="smooth"><?php echo $mid->name; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php }
                    }
                }
                ?>
                    <?php
                    if (io_get_option('links')) :
                    if (io_get_option('columns_type') === 'tab'):?>
                    <li class="has-sub">
                        <a>
                            <i class="iconfont icon-friend"></i>
                            <span class="title">友情链接</span>
                        </a>
                        <ul>
                            <?php  $friendsClass = get_categories('type=link');
                            foreach ($friendsClass as $index => $friend) {
                            ?>
                            <li class=" <?php if (!$index){ echo 'active';} ?>"">
                                <a href="<?php if (is_home() || is_front_page()): ?><?php else: echo home_url() ?>/<?php endif; ?><?php echo '#friendlink'.$friend->name?>" class="smooth"><?php echo $friend->name?></a>
                            </li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php else:?>
                    <li class="">
                        <a href="<?php if (is_home() || is_front_page()): ?><?php else: echo home_url() ?>/<?php endif; ?>#friendlink" class="smooth">
                            <i class="iconfont icon-friend"></i>
                            <span class="title">友情链接</span>
                        </a>
                    </li>

                    <?php endif;
                    endif;?>
                    <?php if(io_get_option('message')){?>
                        <li class="">
                            <a href="<?php geturl('message','page');?>">
                                <i class="iconfont icon-message"></i>
                                <span class="title">互动留言</span>
                            </a>
                        </li>
                    <?php  }?>
                     <?php
                        if(function_exists('wp_nav_menu')) wp_nav_menu( array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'nav_main',) ); 
                     ?>
                </ul>
            </div>
        </div>