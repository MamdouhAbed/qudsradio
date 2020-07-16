<div class="page_content">
    <section class="content-wrapper episode_news all_news all_program all_video">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li class="_active">كافة البرامج</li>
            </ul>
        </div>
        <h3 class="cat_title">كافة البرامج الإذاعية</h3>
        <div class="row">
            <?php
            foreach ($Programsall as $programsall)
            {?>
                <div class="col-md-3 col-xs-6 col-sm-4">
                    <a href="<?php echo base_url();?>program/<?php echo $programsall->id; ?>">
                        <div class="video_gallery">
                            <div class="video-hover">
                                <img src="<?php echo base_url();?>thumb.php?src=<?php echo $programsall->img; ?>&size=200x296" alt="" class="img-responsive vid-quds">
                            </div>
                            <span class="cat_episode">تقديم: <?php echo $programsall->presenter_program; ?></span>
                            <h2 class="vid_title"><?php echo $programsall->name; ?></h2>
                        </div>
                    </a>
                </div>

            <?php }
            ?>





        </div>
        <div class="wrap-pagination">
            <?php echo $pagination; ?>
        </div>
    </section>
</div>