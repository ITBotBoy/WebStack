<?php if (!defined('ABSPATH')) {
    exit;
} ?>
<?php get_header(); ?>


<?php
$categories = get_categories(array(
        'taxonomy' => 'favorites',
        'meta_key' => '_term_order',
        'orderby' => 'meta_value_num',
        'order' => 'desc',
        'hide_empty' => 0,
    )
);
include('templates/header-nav.php');
?>
    <div class="main-content">

<?php include('templates/header-banner.php'); ?>

<?php get_template_part('templates/bulletin'); ?>

<?php
if (io_get_option('is_search')) {
    include('search-tool.php');
} else {
    ?>
    <div class="no-search"></div>
    <?php
}
?>

    <div class="sites-list" style="margin-bottom: 8.5rem;">
        <?php if (!wp_is_mobile() && io_get_option('ad_home_s')) echo '<div class="row"><div class="ad ad-home col-md-6">' . stripslashes(io_get_option('ad_home')) . '</div><div class="ad ad-home col-md-6 visible-md-block visible-lg-block">' . stripslashes(io_get_option('ad_home')) . '</div></div>'; ?>

        <?php
        foreach ($categories as $category) {
            if ($category->category_parent == 0) {
                $children = get_categories(array(
                        'taxonomy' => 'favorites',
                        'meta_key' => '_term_order',
                        'orderby' => 'meta_value_num',
                        'order' => 'desc',
                        'child_of' => $category->term_id,
                        'hide_empty' => 0
                    )
                );
                if (empty($children)) {
                    echo '<div class="category-item">';
                    nav_item($category, false, false);
                    echo '</div>';
                } else {
                    if (io_get_option('columns_type') === 'tab') {
                        mark_item($category, $children);
                    } else {
                        echo '<div class="tab-item">';
                        foreach ($children as $mid) {
                            nav_item($category, $mid, false);
                        }
                        echo '</div>';
                    }
                }
            }
        }
        get_template_part('templates/friendlink');
        ?>
    </div>
    <script>

        $('a.smooth').click(function (ev) {
            ev.preventDefault();
            $("html, body").animate({
                scrollTop: $($(this).attr("href")).offset().top - 110
            }, {
                duration: 400,
                easing: "swing"
            });
            if ($(this).hasClass('go-search-btn')) {
                $('#search-text').focus();
            }
            var menu = $("a" + $(this).attr("href"));
            menu.click();
            toTarget(menu.parent().parent());
        });

        function toTarget(menu, padding = true, isMult = true) {
            var slider = menu.children(".anchor");
            var target = menu.children(".hover").first();
            if (target && 0 < target.length) {
            } else {
                if (isMult)
                    target = menu.find('.active').parent();
                else
                    target = menu.find('.active');
            }
            if (0 < target.length) {
                if (padding)
                    slider.css({
                        left: target.position().left + target.scrollLeft() + "px",
                        width: target.outerWidth() + "px",
                        opacity: "1"
                    });
                else
                    slider.css({
                        left: target.position().left + target.scrollLeft() + (target.outerWidth() / 4) + "px",
                        width: target.outerWidth() / 2 + "px",
                        opacity: "1"
                    });
            } else {
                slider.css({
                    opacity: "0"
                })
            }
        }

        function initSlider() {
            $(".slider_menu[sliderTab]").each(function () {
                if (!$(this).hasClass('init')) {
                    var menu = $(this).children("ul");
                    menu.prepend('<li class="anchor" style="position:absolute;width:0;height:26px"></li>');
                    var target = menu.find('.active').parent();
                    if (0 < target.length) {
                        menu.children(".anchor").css({
                            left: target.position().left + target.scrollLeft() + "px",
                            width: target.outerWidth() + "px",
                            height: target.height() + "px",
                            opacity: "1"
                        })
                    }
                    $(this).addClass('init');
                }
            })
        }

        // 初始化tab滑块
        initSlider();
        $('.slider_menu').on('click', 'a.nav-link', function (ev) {
            ev.preventDefault();
            $('.' + $(this).attr('id')).show()
            $(this).addClass('active')
            $(this).parent().siblings().each(function (index, ele) {
                var link = $(ele).find('.nav-link')
                link.removeClass('active')
                $('.' + link.attr('id')).hide()
            })
            toTarget($(this).parent().parent());
        });
        //滑块菜单
        $('.slider_menu').children("ul").children("li").not(".anchor").hover(function () {
            $(this).addClass("hover")
            toTarget($(this).parent())
        }, function () {
            $(this).removeClass("hover")
        });
        $('.slider_menu').mouseleave(function (e) {
            var menu = $(this).children("ul");
            window.setTimeout(function () {
                toTarget(menu)
            }, 50)
        });
    </script>
<?php
get_footer();