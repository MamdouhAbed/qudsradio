<style>
    @keyframes unfoldIn {
        0% {
            transform: scaleY(0.005) scaleX(0);
        }
        50% {
            transform: scaleY(0.005) scaleX(1);
        }
        100% {
            transform: scaleY(1) scaleX(1);
        }
    }
    @keyframes unfoldOut {
        0% {
            transform: scaleY(1) scaleX(1);
        }
        50% {
            transform: scaleY(0.005) scaleX(1);
        }
        100% {
            transform: scaleY(0.005) scaleX(0);
        }
    }
    @keyframes zoomIn {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
    }
    @keyframes zoomOut {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
    }
    @keyframes modalContentFadeIn {
        0% {
            opacity: 0;
            top: -20px;
        }
        100% {
            opacity: 1;
            top: 0;
        }
    }
    @keyframes modalContentFadeOut {
        0% {
            opacity: 1;
            top: 0px;
        }
        100% {
            opacity: 0;
            top: -20px;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="bg_aside"></div>
        <div class="aside">
            <div class="main_menu">
<!--                <p class="menu_title">القائمة الرئيسية</p>-->
                <ul class="menu_">
                    <li class="menu_item"><a href="<?php echo base_url();?>" class="menu_item_a"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="menu_icon" alt=""><span class="home2">الرئيسية</span></a></li>
                    <li class="menu_item dropdown"><a href="#" class="dropdown-toggle menu_item_a" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url();?>assets/image/icon/radio.svg" class="menu_icon" alt=""><span class="radio2">البرامج الإذاعية</span><i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>programs">برامج الدورة الحالية</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>programs_archive">كافة البرامج</a></li>

                        </ul>
                    </li>
                    <li class="menu_item dropdown"><a href="#" class="dropdown-toggle menu_item_a" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo base_url();?>assets/image/icon/newspaper.svg" class="menu_icon" alt=""><span class="newspaper2">تقارير ومقابلات</span><i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>category/11">تقارير إذاعية</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>category/12">مقابلات إذاعية</a></li>
<!--                            <li role="separator" class="divider"></li>-->
<!--                            <li><a href="--><?php //echo base_url();?><!--category/13">الأرشيف</a></li>-->
                        </ul>
                    </li>
                    <li class="buttons menu_item"><img src="<?php echo base_url();?>assets/image/icon/calendar.svg" class="menu_icon" alt=""><span id="one" class="calendar2 table_live_veiw">جدول البرامج</span></li>
                    <li class="menu_item"><a href="<?php echo base_url();?>videos" class="menu_item_a"><img src="<?php echo base_url();?>assets/image/icon/video.svg" class="menu_icon" alt=""><span class="video2">قائمة الفيديو</span></a></li>
                </ul>
                <div class="onlive">
                    <a href="">
                        <img src="<?php echo base_url();?>assets/image/icon/live.svg" class="icon_live" alt="">
                        <p>البث المباشر</p>
                    </a>
                </div>
                <div class="sub_pages">
                <p class="menu_title">صفحات فرعية</p>
                    <?php foreach (getSubsite_active() as $subsite)
                    { ?>
                <a href="<?php echo $subsite->link ?>" target="_blank"><img src="<?php echo base_url();?><?php echo $subsite->img ?>" class="img-responsive pages" alt=""></a>
                <?php }?>
                </div>
                <p class="copyright_quds">  جميع الحقوق محفوظة   &copy; <?php echo date("Y"); ?>  <br>تطوير/ البُراق لتكنولوجيا المعلومات  </p>
            </div>
        </div>
        <script>
            $('.menu_icon').each(function() {
                var $img = $(this);
                var imgURL = $img.attr('src');
                $.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = $(data).find('svg');
                    // Replace image with new SVG
                    $img.replaceWith($svg);
                });
            });
        </script>