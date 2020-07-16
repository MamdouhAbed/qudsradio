<!DOCTYPE html>
<html lang="en" data-textdirection="RTL" class="loading">
<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/logo/mini_logo.png" type="image/x-icon">

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>admin-assets/css/vendors.min.css" />
    <!-- BEGIN VENDOR CSS-->
    <!-- BEGIN Font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/fonts/icomoon.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/fonts/flag-icon-css/css/flag-icon.min.css" />
    <!-- END Font icons-->
    <!-- BEGIN Plugins CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/sliders/slick/slick.css" />
    <!-- END Plugins CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/forms/selects/select2.min.css" />
    <!-- BEGIN Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/charts/jquery-jvectormap-2.0.3.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/charts/morris.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/extensions/unslider.css" />
    <!-- END Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/pickers/colorpicker/bootstrap-colorpicker.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/pickers/miniColors/jquery.minicolors.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/pickers/spectrum/spectrum.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/pagination/bootstrap-datepaginator.min.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/forms/icheck/icheck.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/forms/icheck/custom.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/forms/spinner/jquery.bootstrap-touchspin.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/forms/toggle/bootstrap-switch.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/forms/toggle/switchery.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/file-uploaders/blueimp-gallery.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/file-uploaders/jquery.fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/tables/extensions/buttons.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/tables/datatable/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/tables/datatable/select.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/tables/extensions/responsive.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/tables/extensions/colReorder.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/plugins/tables/extensions/fixedHeader.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/js/plugins/gallery/photo-swipe/photoswipe.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/js/plugins/gallery/photo-swipe/default-skin/default-skin.css" />

    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>admin-assets/css/app.min.css" />
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/components/weather-icons/climacons.min.css" />
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/style.css" />
    <!-- END Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/css/style-rtl.css" />
    <script src="<?php echo base_url()?>admin-assets/jQuery/jQuery.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns ">
<!-- START PRELOADER-->

<!--<div id="preloader-wrapper">-->
<!--    <div id="loader">-->
<!--        <div class="line-scale-pulse-out-rapid loader-white">-->
<!--            <div></div>-->
<!--            <div></div>-->
<!--            <div></div>-->
<!--            <div></div>-->
<!--            <div></div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="loader-section section-top bg-cyan"></div>-->
<!--    <div class="loader-section section-bottom bg-cyan"></div>-->
<!--</div>-->

<!-- END PRELOADER-->
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
?>
<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
                <li class="nav-item"><a href="<?php echo base_url();?>admin/index" class="navbar-brand nav-link"><img alt="logo" src="<?php echo base_url()?>thumb.php?src=assets/logo/logo.png&size=120x50" data-expand="<?php echo base_url()?>thumb.php?src=assets/logo/logo.png&size=120x50" data-collapse="<?php echo base_url()?>thumb.php?src=assets/logo/mini_logo2.png&size=31x42"  width="" class="brand-logo" /></a></li>
                <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
                    <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
                    <li class="nav-item nav-search site_home"><a target="_blank" href="<?php echo base_url();?>" class="nav-link nav-link-search fullscreen-search-btn"><i class="ficon icon-eye"></i>معاينة الموقع</a></li>
                </ul>
                <ul class="nav navbar-nav float-xs-right">
                    <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="<?php echo base_url();?>thumb.php?src=<?php echo $this->session->userdata('img_user')?>&size=30x30" alt="avatar" /><i></i></span><span class="user-name"><?php echo $this->session->userdata('username')?></span></a>
                        <div class="dropdown-menu dropdown-menu-right"><a href="<?php echo base_url();?>admin/updateInformation/" class="dropdown-item"><i class="icon-head"></i> تعديل بياناتي</a>
                            <div class="dropdown-divider"></div><a href="<?php echo base_url();?>admin/logout" class="dropdown-item"><i class="icon-power3"></i> تسجيل الخروج</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>




<!-- ////////////////////////////////////////////////////////////////////////////-->
