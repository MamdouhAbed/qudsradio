<div class="page_content">
    <section class="content-wrapper episode_news all_news all_program all_video">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li class="_active">برامج الدورة الحالية</li>
            </ul>
        </div>
        <h3 class="cat_title">برامج الدورة الحالية</h3>
        <div class="row">
            <?php
            foreach ($Programs as $programs)
            {?>
            <div class="col-md-3 col-xs-6 col-sm-4">
                <a href="<?php echo base_url();?>program/<?php echo $programs->id; ?>">
                <div class="video_gallery">
                    <div class="video-hover">
                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $programs->img; ?>&size=200x296" alt="" class="img-responsive vid-quds">
                    </div>
                    <span class="cat_episode">تقديم: <?php echo $programs->presenter_program; ?></span>
                    <h2 class="vid_title"><?php echo $programs->name; ?></h2>
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