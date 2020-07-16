<div class="page_content">
    <section class="content-wrapper episode_news all_video">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li class="_active">قائمة الفيديو</li>
            </ul>
        </div>
        <h3 class="cat_title">مكتبة <span>الفيديو</span></h3>
        <div class="row">
            <?php
            foreach ($Video as $video)
            {?>
            <div class="col-md-3 col-xs-6 col-sm-4">
                <div class="video_gallery">
                    <div class="video-hover">
                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $video->imghome; ?>&size=216x320" alt="" class="img-responsive vid-quds">
                    </div>
                    <a href="<?php echo base_url();?>video/<?php echo $video->id;?>"><img src="<?php echo base_url();?>assets/image/icon/play-button.svg" alt="" class="vid_icon"</a>
                    <h2 class="vid_title"><a href="<?php echo base_url();?>video/<?php echo $video->id;?>"><?php echo $video->title; ?></a></h2>
                </div>
            </div>
            <?php }
            ?>



        </div>
        <div class="wrap-pagination">
            <?php echo $pagination; ?>
        </div>
    </section>
</div>