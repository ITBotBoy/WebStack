<?php if ( ! defined( 'ABSPATH' ) ) { exit; }
function mark_item($category,$children) {?>
    <!-- tab模式菜单 S-->
    <h4 class="text-gray"><i class="icon-io-tag" style="margin-right: 30px;"></i><?php echo $category->name; ?></h4>
    <div class="d-flex flex-fill flex-tab">
        <div class="overflow-x-auto">
            <div class="slider_menu mini_tab ajax-list-home" slidertab="sliderTab">
                <ul class="nav nav-pills menu" role="tablist">
                    <?php foreach ($children as $index=>$mid): ?>
                        <li class="nav-item"><a class="nav-link <?php if(!$index){echo 'active';}?>" id="<?php echo $category->name.$mid->name ?>"><?php echo $mid->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php
    echo '<div class="tab-item">';
    foreach ($children as $mid) {
        nav_item($category,$mid,true);
    }
    echo '</div>';
    ?>
    <!-- tab模式菜单 E-->
<?php } ?>
