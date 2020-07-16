<!-- main menu-->
<div id="main-menu" data-scroll-to-active="true" class="main-menu menu-dark menu-fixed menu-shadow menu-accordion">
    <!-- main menu header-->
    <div class="main-menu-header">
<!--        <input type="text" placeholder="بحث" class="menu-search form-control round" />-->
    </div>
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class=" nav-item"><a href=" <?php echo base_url();?>admin/index "><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">الرئيسية</span></a>
            </li>
            <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(4,$this->session->userdata('roles'))
            ||in_array(11,$this->session->userdata('roles'))||in_array(12,$this->session->userdata('roles'))){?>
            <li class=" nav-item"><a href="#"><i class="icon-note"></i><span data-i18n="nav.templates.main" class="menu-title">الأخبار </span></a>
                <ul class="menu-content">

                    <li><a href=" <?php echo base_url();?>admin/dtableNews" data-i18n="nav.templates.vert.classic_menu" class="menu-item">قائمة الأخبار</a>
                    </li>
                    <li><a href="<?php echo base_url();?>admin/addNews" data-i18n="nav.templates.vert.compact_menu" class="menu-item">إضافة خبر</a>
                    </li>

                    <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(9,$this->session->userdata('roles'))){?>
                        <li><a href="#" data-i18n="nav.page_layouts.3_columns.main" class="menu-item">عاجل</a>
                        <ul class="menu-content">
                            <li><a href="<?php echo base_url();?>admin/dtableBreaknews" data-i18n="nav.templates.vert.content_menu" class="menu-item">قائمة الأخبار العاجلة </a>
                            </li>
                            <li><a href="<?php echo base_url();?>admin/addBreakNew" data-i18n="nav.templates.vert.content_menu" class="menu-item">إضافة خبر عاجل</a>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>

                    <?php if (in_array(1,$this->session->userdata('roles'))){?>
                        <li class=" nav-item"><a href="#"><span data-i18n="nav.page_layouts.main" class="menu-title"> أقسام الأخبار</span></a>
                            <ul class="menu-content">
                                <li><a href=" <?php echo base_url();?>admin/addSubDept " data-i18n="nav.page_layouts.3_columns_detached.detached_sticky_left_sidebar" class="menu-item">إضافة قسم</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){?>
            <li class=" nav-item"><a href="#"><i class="icon-book"></i><span data-i18n="nav.vertical_nav.main" class="menu-title">البرامج والحلقات</span></a>
                <ul class="menu-content">
                    <li><a href=" <?php echo base_url();?>admin/dtableCourse " data-i18n="nav.vertical_nav.vertical_nav_static" class="menu-item">قائمة البرامج</a>
                    </li>
                    <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))){?>
                    <li><a href=" <?php echo base_url();?>admin/addCourse " data-i18n="nav.vertical_nav.vertical_nav_static" class="menu-item">إضافة برنامج</a>
                    </li>
                    <?php } ?>
                    <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){?>
                        <li><a href=" <?php echo base_url();?>admin/allEpisodes " data-i18n="nav.vertical_nav.vertical_nav_static" class="menu-item">قائمة الحلقات</a>
                        </li>
                        <li><a href=" <?php echo base_url();?>admin/addEpisode " data-i18n="nav.vertical_nav.vertical_nav_static" class="menu-item">إضافة حلقة</a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>

            <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){?>
            <li class=" nav-item"><a href="#"><i class="icon-navicon2"></i><span data-i18n="nav.vertical_nav.main" class="menu-title">نشرات الأخبار</span></a>
                <ul class="menu-content">
                    <li><a href=" <?php echo base_url();?>admin/dtableLetters " data-i18n="nav.vertical_nav.vertical_nav_static" class="menu-item">قائمة نشرات الأخبار </a>
                    </li>
                    <li><a href=" <?php echo base_url();?>admin/addLetter " data-i18n="nav.vertical_nav.vertical_nav_static" class="menu-item">إضافة نشرة أخبار</a>
                    </li>


                </ul>
            </li>
            <?php } ?>
            <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(7,$this->session->userdata('roles'))){?>
                    <li class=" nav-item"><a href="#"><i class="icon-video"></i><span data-i18n="nav.navbars.main" class="menu-title">الفيديو</span></a>
                        <ul class="menu-content">
                            <li><a href=" <?php echo base_url();?>admin/dtableVideos " data-i18n="nav.page_layouts.3_columns_detached.detached_left_sidebar" class="menu-item">إدارة الفيديو</a>
                            </li>
                            <li><a href=" <?php echo base_url();?>admin/addVideo " data-i18n="nav.page_layouts.3_columns_detached.detached_sticky_left_sidebar" class="menu-item">إضافة فيديو</a>
                            </li>
                        </ul>
                    </li>

            <?php } ?>
            <!-- @start 5-7-2020 Mamdouh-->
            <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(15,$this->session->userdata('roles'))){?>
                <li class=" nav-item"><a href="#"><i class="icon-file"></i><span data-i18n="nav.navbars.main" class="menu-title">الملف الخاص</span></a>
                    <ul class="menu-content">
                        <li><a href=" <?php echo base_url();?>admin/dtablePrivateFiles " data-i18n="nav.page_layouts.3_columns_detached.detached_left_sidebar" class="menu-item">إدارة الملفات</a>
                        </li>
                        <li><a href=" <?php echo base_url();?>admin/addPrivateFile " data-i18n="nav.page_layouts.3_columns_detached.detached_sticky_left_sidebar" class="menu-item">إضافة ملف خاص</a>
                        </li>
                    </ul>
                </li>

            <?php } ?>
            <!-- @end-->


            <!--            --><?php //if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){?>
<!--            <li class=" nav-item"><a href="#"><i class="icon-user"></i><span data-i18n="nav.vertical_nav.main" class="menu-title">الكُتاب</span></a>-->
<!--                <ul class="menu-content">-->
<!--                    <li><a href=" --><?php //echo base_url();?><!--admin/dtableAuthor " data-i18n="nav.vertical_nav.vertical_nav_static" class="menu-item">قائمة الكُتاب</a>-->
<!--                    </li>-->
<!--                    <li><a href=" --><?php //echo base_url();?><!--admin/addAuthor " data-i18n="nav.vertical_nav.vertical_nav_static" class="menu-item">إضافة كاتب</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            --><?php //} ?>

<!--            --><?php //if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(9,$this->session->userdata('roles'))){?>
<!--            <li class=" nav-item"><a href=" --><?php //echo base_url();?><!--admin/addCurrency"><i class="icon-money"></i><span data-i18n="nav.dash.main" class="menu-title">إضافة أسعار العملات </span></a>-->
<!--                --><?php //} ?>

                <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(10,$this->session->userdata('roles'))){?>
                            <li class=" nav-item"><a href="#"><i class="icon-panorama_horizontal"></i><span data-i18n="nav.horz_nav.main" class="menu-title">الاعلانات</span></a>
                <ul class="menu-content">
                    <li><a href=" <?php echo base_url();?>admin/dtableBanner " data-i18n="nav.horz_nav.horizontal_nav_mega_menu" class="menu-item">قائمة الاعلانات</a>
                    </li>
                    <li><a href=" <?php echo base_url();?>admin/addAds " data-i18n="nav.horz_nav.horizontal_nav_fixed" class="menu-item">إضافة اعلان</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))){?>
                <li class=" nav-item"><a href=" <?php echo base_url();?>admin/dtableContact"><i class="icon-user1"></i><span data-i18n="nav.dash.main" class="menu-title">طلبات الزوار </span></a></li>
            <?php } ?>
            <?php if (in_array(1,$this->session->userdata('roles'))){?>
                <li class=" nav-item"><a href="#"><i class="icon-ios-people"></i><span data-i18n="nav.page_headers.main" class="menu-title">المستخدمين</span></a>
                    <ul class="menu-content">
                        <li><a href=" <?php echo base_url();?>admin/dtableUsers " data-i18n="nav.page_headers.headers_breadcrumbs_basic" class="menu-item">قائمة المستخدمين</a>
                        </li>
                        <li><a href=" <?php echo base_url();?>admin/addUser " data-i18n="nav.page_headers.headers_breadcrumbs_top" class="menu-item">إضافة مستخدم</a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item"><a href="#"><i class="icon-ios-pricetag"></i><span data-i18n="nav.templates.main" class="menu-title">ثوابت النظام </span></a>

                    <ul class="menu-content">
<!--                        <li class=" nav-item"><a href=" --><?php //echo base_url();?><!--admin/Shedule"><i class="icon-table"></i><span data-i18n="nav.dash.main" class="menu-title">جدول البث </span></a></li>-->
                        <li class=" nav-item"><a href=" <?php echo base_url();?>admin/aboutUs"><i class="icon-settings"></i><span data-i18n="nav.dash.main" class="menu-title">الإعدادات </span></a></li>
                        <li><a href="#" data-i18n="nav.page_layouts.3_columns.main" class="menu-item"><i class="icon-sitemap"></i><span data-i18n="nav.dash.main">صفحات فرعية</a>
                            <ul class="menu-content">
                                <li><a href="<?php echo base_url();?>admin/dtableSubsite" data-i18n="nav.templates.vert.content_menu" class="menu-item">قائمة الصفحات فرعية </a>
                                </li>
                                <li><a href="<?php echo base_url();?>admin/addSubsite" data-i18n="nav.templates.vert.content_menu" class="menu-item">إضافة صفحة</a>
                                </li>
                            </ul>
                        </li>
                    </ul>


                </li>
            <?php } ?>

        </ul>
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <div class="main-menu-footer footer-close">
        <div class="header text-xs-center"><a href="#" class="col-xs-12 footer-toggle"><i class="icon-ios-arrow-up"></i></a></div>
        <div class="content">
            <div class="actions"><?php if (in_array(1,$this->session->userdata('roles'))){?><a href="<?php echo base_url();?>admin/aboutUs" data-placement="top" data-toggle="tooltip" data-original-title="من نحن"><span aria-hidden="true" class="icon-cog3"></span></a><?php } ?><a href="<?php echo base_url();?>" data-placement="top" data-toggle="tooltip" data-original-title="الموقع"><span aria-hidden="true" class="icon-home"></span></a><a href="<?php echo base_url();?>admin/logout" data-placement="top" data-toggle="tooltip" data-original-title="تسجيل خروج"><span aria-hidden="true" class="icon-power3"></span></a></div>
        </div>
    </div>
    <!-- main menu footer-->
</div>
<!-- / main menu-->