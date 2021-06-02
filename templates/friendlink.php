<?php if (!defined('ABSPATH')) {
    exit;
} ?>

<?php
$default_ico = get_template_directory_uri() .'/images/favicon.png';
if (io_get_option('links')) : ?>
    <div class="friendlinkWrap">
    <h4 class="text-gray" id="friendlink">
        <i class="icon-io-tag" style="margin-right: 30px;"></i>友情链接
    </h4>
    <?php

    $categories = get_categories('type=link');
    $children = get_bookmarks();

    if (io_get_option('columns_type') === 'tab' && !empty($categories)) {
        ?>
        <!-- tab模式菜单 S-->
        <div class="d-flex flex-fill flex-tab">
            <div class="overflow-x-auto">
                <div class="slider_menu mini_tab ajax-list-home" slidertab="sliderTab">
                    <ul class="nav nav-pills menu" role="tablist">
                        <?php
                        foreach ($categories as $index => $category) {

                            ?>
                            <li class="nav-item"><a
                                        class="nav-link <?php if (!$index) echo 'active'; ?>" id="<?php echo 'friendlink'.$category->name ?>"><?php echo $category->name ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- tab模式菜单 E-->
        </div>
        <div class="row friendlink">
        <?php
        foreach ($categories as $index=>$category) {
            foreach (get_bookmarks('category_name=' . $category->name) as $mid):
                ?>
                    <div style="<?php if($index) {echo 'display:none';}?>" class="xe-card <?php echo io_get_option('columns');  echo ' friendlink'.$category->name ;?>">
                        <a href="<?php echo io_get_option('is_go')? home_url().'/go/?url='.base64_encode($mid->link_url) : $mid->link_url ?>" id="<?php echo 'friendlink'.$category->name ;?>" <?php if(io_get_option('po_prompt')!=='null'){ echo 'data-toggle="tooltip" data-placement="bottom" data-original-title="'.$mid->link_description.'"'; }?> target="<?php echo $mid->link_target ;?>"
                           class="xe-widget xe-conversations box2 label-info">
                            <div class="xe-comment-entry">
                                <div class="xe-user-img">
                                    <img class="img-circle lazy" src="<?php echo $mid->link_image ?>"
                                         onerror="javascript:this.src='<?php echo $default_ico ?>'" width="40">
                                </div>
                                <div class="xe-comment">
                                    <div class="xe-user-name overflowClip_1">
                                        <strong><?php echo $mid->link_name ?></strong>
                                    </div>
                                    <p class="overflowClip_2"><?php echo $mid->link_description ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php endforeach;
        } ?>
              </div>
    <?php } else {
            echo '<div class="row friendlink">';
        foreach (get_bookmarks() as $mid):
        ?>
            <div class="xe-card <?php echo io_get_option('columns');  echo ' friendlink'.$category->name ;?>">
                <a href="<?php echo io_get_option('is_go')? home_url().'/go/?url='.base64_encode($mid->link_url) : $mid->link_url ?>" id="<?php echo 'friendlink'.$category->name ?>" <?php if(io_get_option('po_prompt')!=='null'){echo 'data-toggle="tooltip" data-placement="bottom" data-original-title="'+ $mid->link_description +'"';} ?> target="<?php echo $mid->link_target ?>"
                   class="xe-widget xe-conversations box2 label-info" title="<?php echo $mid->link_name ?>">
                    <div class="xe-comment-entry">
                        <div class="xe-user-img">
                            <img class="img-circle lazy" src="<?php echo $mid->link_image ?>"
                                 onerror="javascript:this.src='<?php echo $default_ico ?>'" width="40">
                        </div>
                        <div class="xe-comment">
                            <div class="xe-user-name overflowClip_1">
                                <strong><?php echo $mid->link_name ?></strong>
                            </div>
                            <p class="overflowClip_2"><?php echo $mid->link_description ?></p>
                        </div>
                    </div>
                </a>
            </div>
    <?php endforeach;
        echo '</div>';
    }?>
<?php endif; ?>