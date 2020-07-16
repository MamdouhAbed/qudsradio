<?php
function ArabicDate($date1) {

    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = date('y-m-d h:i  a',strtotime($date1)); // The Current Date

    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D',strtotime($your_date)); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    $find1 = array ("am", "pm");
    $replace1 = array ("ص", "م");
    $ar_day_format1 = date('a',strtotime($date1)); // The Current Day
    $ar_day1 = str_replace($find1, $replace1, $ar_day_format1);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("0","1","2","3","4","5","6","7","8","9");
    $current_date = date('h:i ',strtotime($your_date)) . $ar_day1 .' - ' .$ar_day.' '.date('d',strtotime($your_date)).' / '.$ar_month.' / '.date('Y',strtotime($your_date));
    $data = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $data;
}
function ArabicDate1($date1) {

    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = date('y-m-d h:i  a',strtotime($date1)); // The Current Date

    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D',strtotime($your_date)); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);



    header('Content-Type: text/html; charset=utf-8');

    $current_date =$ar_day.' '.date('d',strtotime($your_date)).' / '.$ar_month.' / '.date('Y',strtotime($your_date));
    $data = $current_date;

    return $data;
}
function ArabicDate2($date1) {

    $months = array("Jan" => "01", "Feb" => "02", "Mar" => "03", "Apr" => "04", "May" => "05", "Jun" => "06", "Jul" => "07", "Aug" => "08", "Sep" => "09", "Oct" => "10", "Nov" => "11", "Dec" => "12");
    $your_date = date('y-m-d h:i  a',strtotime($date1)); // The Current Date

    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }
    header('Content-Type: text/html; charset=utf-8');
    $current_date =date('d',strtotime($your_date)).'/'.$ar_month.'/'.date('Y',strtotime($your_date));
    $data = $current_date;

    return $data;
}
function ArabicDate3($date1) {

    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = date('y-m-d h:i  a',strtotime($date1)); // The Current Date

    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }
    header('Content-Type: text/html; charset=utf-8');
    $current_date =date($ar_month);
    $data = $current_date;

    return $data;
}
function ArabicDate5($date1) {

    $your_date = date('y-m-d h:i  a',strtotime($date1)); // The Current Date
    header('Content-Type: text/html; charset=utf-8');
    $current_date =date('d',strtotime($your_date));
    $data = $current_date;

    return $data;
}
function ArabicDate6($date1) {

    $your_date = date('y-m-d h:i  a',strtotime($date1)); // The Current Date
    header('Content-Type: text/html; charset=utf-8');
    $current_date =date('Y',strtotime($your_date));
    $data = $current_date;

    return $data;
}
function ArabicDate4($date1) {

    $your_date = date('y-m-d h:i  a',strtotime($date1)); // The Current Date
    $find1 = array ("am", "pm");
    $replace1 = array ("صباحاً", "مساءً");
    $ar_day_format1 = date('a',strtotime($date1)); // The Current Day
    $ar_day1 = str_replace($find1, $replace1, $ar_day_format1);

    header('Content-Type: text/html; charset=utf-8');

    $current_date = date('h:i ',strtotime($your_date)) . $ar_day1 ;
    $data = $current_date;

    return $data;
}
function ArabicDate7() {

    $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = date('y-m-d h:i  a'); // The Current Date

    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { $ar_month = $ar; }
    }

    $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D',strtotime($your_date)); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);

    $find1 = array ("am", "pm");
    $replace1 = array ("ص", "م");
    $ar_day_format1 = date('a',strtotime($your_date)); // The Current Day

    $ar_day1 = str_replace($find1, $replace1, $ar_day_format1);

    header('Content-Type: text/html; charset=utf-8');
    $standard = array("0","1","2","3","4","5","6","7","8","9");
    $eastern_arabic_symbols = array("0","1","2","3","4","5","6","7","8","9");
    $current_date = date('h:i ',strtotime($your_date)) . $ar_day1 .' - ' .$ar_day.' '.date('d',strtotime($your_date)).' / '.$ar_month.' / '.date('Y',strtotime($your_date));
    $data = str_replace($standard , $eastern_arabic_symbols , $current_date);

    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/logo/mini_logo.png" type="image/x-icon">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $Description; ?>"/>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-rtl.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">
    <link rel='stylesheet' href='http://cdn.jsdelivr.net/jquery.slick/1.3.8/slick.css'>

    <!--Custom-css-->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/slide.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/fonts/dinnext/styles.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/responsive-quds.css" rel="stylesheet">
    <!--    js-->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<!--    <link href="--><?php //echo base_url();?><!--assets/css/plyr.css" rel="stylesheet">-->

    <script src="<?php echo base_url();?>assets/js/plyr.js"></script>
<!--    <script src='https://cdnjs.cloudflare.com/ajax/libs/plyr/3.4.7/plyr.min.js'></script>-->
    <script src="<?php echo base_url();?>assets/js/anime.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/test.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css">
    <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>


</head>
<body>
<header class="quds_header">
    <div class="container">
        <div class="row">
    <div class="logo_quds">
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/logo.png" alt=""></a>
        <button class="reset-btn btn" id="btn" role="button">
    <span class="menu-icon" data-toggled="opened-close">
      <span class="menu-icon-bar"></span>
      <span class="menu-icon-bar"></span>
      <span class="menu-icon-bar"></span>
    </span>
        </button>
    </div>

    <div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <form class="" action="<?php echo  base_url() ?>search" method="get" >
                    <div id="search">
                <button id="button">
                    <img src="<?php echo base_url();?>assets/image/icon/search-icon.svg" class="search_icon" alt="">
                </button>
                <div class="controls">
                    <input type="text" id="input" name="keyword" class="form-control search" placeholder="ابحث في  الحلقات، البرامج، التقارير والمقابلات، الفيديو، نشرات الأخبار" required="" data-validation-required-message="أدخـل كلمة بحث"  data-toggle="tooltip" data-trigger="hover" autocomplete="off" />
                </div>

                        </div>
                    </form>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="menu_item"><a href="<?php echo base_url();?>about">من نحن</a></div>
            <div class="menu_item"><a href="<?php echo base_url();?>contact">اتصل بنا</a></div>
            <div class="social_media">
                <ul>
                    <li><a target="_blank" href="<?php echo get_Details()->facebook_link; ?>"><img src="<?php echo base_url();?>assets/image/icon/facebook-header.svg" class="social_svg" alt=""></a></li>
                    <li><a target="_blank" href="<?php echo get_Details()->instagram_link; ?>"><img src="<?php echo base_url();?>assets/image/icon/instagram-logo.svg" class="social_svg" alt=""></a></li>
                    <li><a target="_blank" href="<?php echo get_Details()->twitter_link; ?>"><img src="<?php echo base_url();?>assets/image/icon/twitter-header.svg" class="social_svg" alt=""></a></li>
                    <li><a target="_blank" href="<?php echo get_Details()->tube_link; ?>"><img src="<?php echo base_url();?>assets/image/icon/youtube-header.svg" class="social_svg" alt=""></a></li>
                    <li><a target="_blank" href="<?php echo get_Details()->whatsapp_link; ?>"><img src="<?php echo base_url();?>assets/image/icon/whatsapp-header.svg" class="social_svg" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    </div>
        </div>
    </div>
</header>

<script>
    $('.social_svg').each(function() {
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

<div id="modal-container">
    <div class="modal-background">

        <div class="modal">
            <div class="title_modal">
                <h4>مواعيد بث البرامج بتوقيت القدس المحتلة (+2 جرينتش)</h4>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active in"><a class="cat-ic" href="#sat" aria-controls="sat" role="tab" data-toggle="tab"><span class="title-sub-cat">السبت</span></a></li>
                <li role="presentation"><a class="cat-ic" href="#sun" aria-controls="sun" role="tab" data-toggle="tab"><span class="title-sub-cat">الأحد</span></a></li>
                <li role="presentation" class=""><a class="cat-ic" href="#mon" aria-controls="mon" role="tab" data-toggle="tab"><span class="title-sub-cat">الاثنين</span></a></li>
                <li role="presentation" class=""><a class="cat-ic" href="#tues" aria-controls="tues" role="tab" data-toggle="tab"><span class="title-sub-cat">الثلاثاء</span></a></li>
                <li role="presentation" class=""><a class="cat-ic" href="#wed" aria-controls="wed" role="tab" data-toggle="tab"><span class="title-sub-cat">الأربعاء</span></a></li>
                <li role="presentation" class=""><a class="cat-ic" href="#thur" aria-controls="thur" role="tab" data-toggle="tab"><span class="title-sub-cat">الخميس</span></a></li>
                <li role="presentation" class=""><a class="cat-ic" href="#fri" aria-controls="fri" role="tab" data-toggle="tab"><span class="title-sub-cat">الجمعة</span></a></li>
            </ul>
            <div class="col-md-12 courses_week">

                <div class="courses course_address">
                    <div class="col-md-4 col-xs-8 col-sm-4 course_item day">مادة البث</div>
                    <div class="col-md-2 col-sm-2 course_item sub">
                        نوع البث
                    </div>
                    <div class="col-md-2 col-xs-4 col-sm-2 course_item day">
                        ساعة البث
                    </div>

                    <div class="col-md-4 col-sm-4 course_item teach">
                        مقدم البرنامج

                    </div>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="sat">
                        <?php foreach (get_live_shedule() as $shedule)
                        {  if ( $shedule->day_id==1){
                            ?>
                <div class="courses">
                    <div class="col-md-4 col-xs-8 col-sm-4 course_item day"><?php echo $shedule->pro_name ?></div>
                    <div class="col-md-2 col-sm-2 course_item sub">
                        <?php if($shedule->type==1){  echo 'مباشر';}else if($shedule->type==2){echo 'إعادة';}else if($shedule->type==3){echo 'إعادة2';}else if($shedule->type==4){echo 'إعادة3';}else if($shedule->type==5){echo 'إعادة4';} ?>
                    </div>
                    <div class="col-md-2 col-xs-4 col-sm-2 course_item day">
                        <?php echo ArabicDate4($shedule->time); ?>
                    </div>

                    <div class="col-md-4 col-sm-4 course_item teach">
                        <?php if ( $shedule->p_img!=null){
                        ?>
                            <img src="<?php echo base_url();?>thumb.php?src=<?php echo $shedule->p_img ?>&size=28x28" class="author_modal" alt="">
                        <?php }else{?>
                            <img src="<?php echo base_url();?>thumb.php?src=assets/image/teacher.jpg&size=28x28" class="author_modal" alt="">

                       <?php } ?>

                        <?php echo $shedule->presenter ?>



                    </div>
                </div>
                        <?php }?>
                        <?php }?>
                        </div>
                    <div role="tabpanel" class="tab-pane fade" id="sun">
                        <?php foreach (get_live_shedule() as $shedule)
                        {  if ( $shedule->day_id==2){
                            ?>
                            <div class="courses">
                                <div class="col-md-4 col-xs-8 col-sm-4 course_item day"><?php echo $shedule->pro_name ?></div>
                                <div class="col-md-2 col-sm-2 course_item sub">
                                    <?php if($shedule->type==1){  echo 'مباشر';}else if($shedule->type==2){echo 'إعادة';}else if($shedule->type==3){echo 'إعادة2';}else if($shedule->type==4){echo 'إعادة3';}else if($shedule->type==5){echo 'إعادة4';} ?>
                                </div>
                                <div class="col-md-2 col-xs-4 col-sm-2 course_item day">
                                    <?php echo ArabicDate4($shedule->time); ?>
                                </div>

                                <div class="col-md-4 col-sm-4 course_item teach">
                                    <?php if ( $shedule->p_img!=null){
                                        ?>
                                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $shedule->p_img ?>&size=28x28" class="author_modal" alt="">
                                    <?php }else{?>
                                        <img src="<?php echo base_url();?>thumb.php?src=assets/image/teacher.jpg&size=28x28" class="author_modal" alt="">

                                    <?php } ?>

                                    <?php echo $shedule->presenter ?>



                                </div>
                            </div>
                        <?php }?>
                        <?php }?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="mon">
                        <?php foreach (get_live_shedule() as $shedule)
                        {  if ( $shedule->day_id==3){
                            ?>
                            <div class="courses">
                                <div class="col-md-4 col-xs-8 col-sm-4 course_item day"><?php echo $shedule->pro_name ?></div>
                                <div class="col-md-2 col-sm-2 course_item sub">
                                    <?php if($shedule->type==1){  echo 'مباشر';}else if($shedule->type==2){echo 'إعادة';}else if($shedule->type==3){echo 'إعادة2';}else if($shedule->type==4){echo 'إعادة3';}else if($shedule->type==5){echo 'إعادة4';} ?>
                                </div>
                                <div class="col-md-2 col-xs-4 col-sm-2 course_item day">
                                    <?php echo ArabicDate4($shedule->time); ?>
                                </div>

                                <div class="col-md-4 col-sm-4 course_item teach">
                                    <?php if ( $shedule->p_img!=null){
                                        ?>
                                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $shedule->p_img ?>&size=28x28" class="author_modal" alt="">
                                    <?php }else{?>
                                        <img src="<?php echo base_url();?>thumb.php?src=assets/image/teacher.jpg&size=28x28" class="author_modal" alt="">

                                    <?php } ?>

                                    <?php echo $shedule->presenter ?>



                                </div>
                            </div>
                        <?php }?>
                        <?php }?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tues">
                        <?php foreach (get_live_shedule() as $shedule)
                        {  if ( $shedule->day_id==4){
                            ?>
                            <div class="courses">
                                <div class="col-md-4 col-xs-8 col-sm-4 course_item day"><?php echo $shedule->pro_name ?></div>
                                <div class="col-md-2 col-sm-2 course_item sub">
                                    <?php if($shedule->type==1){  echo 'مباشر';}else if($shedule->type==2){echo 'إعادة';}else if($shedule->type==3){echo 'إعادة2';}else if($shedule->type==4){echo 'إعادة3';}else if($shedule->type==5){echo 'إعادة4';} ?>
                                </div>
                                <div class="col-md-2 col-xs-4 col-sm-2 course_item day">
                                    <?php echo ArabicDate4($shedule->time); ?>
                                </div>

                                <div class="col-md-4 col-sm-4 course_item teach">
                                    <?php if ( $shedule->p_img!=null){
                                        ?>
                                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $shedule->p_img ?>&size=28x28" class="author_modal" alt="">
                                    <?php }else{?>
                                        <img src="<?php echo base_url();?>thumb.php?src=assets/image/teacher.jpg&size=28x28" class="author_modal" alt="">

                                    <?php } ?>

                                    <?php echo $shedule->presenter ?>



                                </div>
                            </div>
                        <?php }?>
                        <?php }?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="wed">
                        <?php foreach (get_live_shedule() as $shedule)
                        {  if ( $shedule->day_id==5){
                            ?>
                            <div class="courses">
                                <div class="col-md-4 col-xs-8 col-sm-4 course_item day"><?php echo $shedule->pro_name ?></div>
                                <div class="col-md-2 col-sm-2 course_item sub">
                                    <?php if($shedule->type==1){  echo 'مباشر';}else if($shedule->type==2){echo 'إعادة';}else if($shedule->type==3){echo 'إعادة2';}else if($shedule->type==4){echo 'إعادة3';}else if($shedule->type==5){echo 'إعادة4';} ?>
                                </div>
                                <div class="col-md-2 col-xs-4 col-sm-2 course_item day">
                                    <?php echo ArabicDate4($shedule->time); ?>
                                </div>

                                <div class="col-md-4 col-sm-4 course_item teach">
                                    <?php if ( $shedule->p_img!=null){
                                        ?>
                                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $shedule->p_img ?>&size=28x28" class="author_modal" alt="">
                                    <?php }else{?>
                                        <img src="<?php echo base_url();?>thumb.php?src=assets/image/teacher.jpg&size=28x28" class="author_modal" alt="">

                                    <?php } ?>

                                    <?php echo $shedule->presenter ?>



                                </div>
                            </div>
                        <?php }?>
                        <?php }?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="thur">
                        <?php foreach (get_live_shedule() as $shedule)
                        {  if ( $shedule->day_id==6){
                            ?>
                            <div class="courses">
                                <div class="col-md-4 col-xs-8 col-sm-4 course_item day"><?php echo $shedule->pro_name ?></div>
                                <div class="col-md-2 col-sm-2 course_item sub">
                                    <?php if($shedule->type==1){  echo 'مباشر';}else if($shedule->type==2){echo 'إعادة';}else if($shedule->type==3){echo 'إعادة2';}else if($shedule->type==4){echo 'إعادة3';}else if($shedule->type==5){echo 'إعادة4';} ?>
                                </div>
                                <div class="col-md-2 col-xs-4 col-sm-2 course_item day">
                                    <?php echo ArabicDate4($shedule->time); ?>
                                </div>

                                <div class="col-md-4 col-sm-4 course_item teach">
                                    <?php if ( $shedule->p_img!=null){
                                        ?>
                                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $shedule->p_img ?>&size=28x28" class="author_modal" alt="">
                                    <?php }else{?>
                                        <img src="<?php echo base_url();?>thumb.php?src=assets/image/teacher.jpg&size=28x28" class="author_modal" alt="">

                                    <?php } ?>

                                    <?php echo $shedule->presenter ?>



                                </div>
                            </div>
                        <?php }?>
                        <?php }?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="fri">
                        <?php foreach (get_live_shedule() as $shedule)
                        {  if ( $shedule->day_id==7){
                            ?>
                            <div class="courses">
                                <div class="col-md-4 col-xs-8 col-sm-4 course_item day"><?php echo $shedule->pro_name ?></div>
                                <div class="col-md-2 col-sm-2 course_item sub">
                                    <?php if($shedule->type==1){  echo 'مباشر';}else if($shedule->type==2){echo 'إعادة';}else if($shedule->type==3){echo 'إعادة2';}else if($shedule->type==4){echo 'إعادة3';}else if($shedule->type==5){echo 'إعادة4';} ?>
                                </div>
                                <div class="col-md-2 col-xs-4 col-sm-2 course_item day">
                                    <?php echo ArabicDate4($shedule->time); ?>
                                </div>

                                <div class="col-md-4 col-sm-4 course_item teach">
                                    <?php if ( $shedule->p_img!=null){
                                        ?>
                                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $shedule->p_img ?>&size=28x28" class="author_modal" alt="">
                                    <?php }else{?>
                                        <img src="<?php echo base_url();?>thumb.php?src=assets/image/teacher.jpg&size=28x28" class="author_modal" alt="">

                                    <?php } ?>

                                    <?php echo $shedule->presenter ?>



                                </div>
                            </div>
                        <?php }?>
                        <?php }?>
                    </div>
                    </div>

            </div>

<!--            <img src="--><?php //echo base_url();?><!--assets/image/radio_img.png" class="bgheader_modal img-responsive" alt="">-->
            <span id="btn-close-modal" class="close1 closebtn" data-dismiss="modal" aria-hidden="true" title="إغلاق">×</span>

        </div>
    </div>
</div>

