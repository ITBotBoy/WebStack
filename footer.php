<?php if ( ! defined( 'ABSPATH' ) ) { exit; }?>

            <div class="aside">
                <div class="go-up">
                    <a class="button" rel="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
                <div class="change-theme">
                    <a class="button" rel="change-theme">
                        <i class="iconfont icon-moon"></i>
                    </a>
                </div>

            </div>

        </div>
        <footer class="main-footer footer-type-1">
            <?php echo io_get_option('footer_inner')?>
        </footer>
    </div>
<script>
    $('a[rel="change-theme"]').click(function(ev)
    {
        ev.preventDefault();
        var classList=$('body').prop("class")
        var ajaxurl= '<?php echo admin_url('admin-ajax.php')?>'
        var ajaxdata={'action':'changeTheme','theme':'white'}
        if(classList.indexOf('black')>-1){
            $('body').removeClass('black').addClass('white');
            ajaxdata.theme='white'
        }else {
            $('body').removeClass('white').addClass('black');
            ajaxdata.theme='black'
        }
        $.post(ajaxurl,ajaxdata);
    });
</script>
<?php if (is_home() || is_front_page()): ?>
    <script type="text/javascript">
        // Change theme

    $(document).ready(function() {
        $(document).on('click', '.has-sub', function(){
            var _this = $(this)
            if(!$(this).hasClass('expanded')) {
               setTimeout(function(){
                    _this.find('ul').attr("style","")
               }, 300);
              
            } else {
                $('.has-sub ul').each(function(id,ele){
                    var _that = $(this)
                    if(_this.find('ul')[0] != ele) {
                        setTimeout(function(){
                            _that.attr("style","")
                        }, 300);
                    }
                })
            }
        })
        $('.user-info-menu .hidden-xs').click(function(){
            if($('.sidebar-menu').hasClass('collapsed')) {
                $('.has-sub.expanded > ul').attr("style","")
            } else {
                $('.has-sub.expanded > ul').show()
            }
        })
        $("#main-menu li ul li").click(function() {
            $(this).siblings('li').removeClass('active'); // 删除其他兄弟元素的样式
            $(this).addClass('active'); // 添加当前元素的样式
        });
        $("a.smooth").click(function(ev) {
            ev.preventDefault();
            if($("#main-menu").hasClass('mobile-is-visible') != true)
                return;
            public_vars.$mainMenu.add(public_vars.$sidebarProfile).toggleClass('mobile-is-visible');
            ps_destroy();
            $("html, body").animate({
                scrollTop: $($(this).attr("href")).offset().top - 80
            }, {
                duration: 500,
                easing: "swing"
            });
        });
        return false;
    });

    var href = "";
    var pos = 0;
    $("a.smooth").click(function(e) {
        e.preventDefault();
        if($("#main-menu").hasClass('mobile-is-visible') === true)
            return;
        $("#main-menu li").each(function() {
            $(this).removeClass("active");
        });
        $(this).parent("li").addClass("active");
        href = $(this).attr("href");
        pos = $(href).position().top - 100;
        $("html,body").animate({
            scrollTop: pos
        }, 500);
    });
    </script>
<?php endif; ?>
<?php wp_footer(); ?>
<!-- 自定义代码 -->
<?php echo io_get_option('code_2_footer');?>
<!-- end 自定义代码 -->
</body>
</html>