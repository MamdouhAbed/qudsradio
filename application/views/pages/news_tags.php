<div class="page_content">
    <section class="content-wrapper episode_news all_news news_tag">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li class="_active">#<?php echo $Tag_name[0]->name; ?></li>
            </ul>
        </div>
        <h3 class="cat_title">#<?php echo $Tag_name[0]->name; ?></h3>
        <div class="row">
            <?php
            foreach ($News_Tags as $news_tag)
            {?>
                <div class="col-md-4 col-sm-6 last_episode">
                    <a href="<?php echo base_url();?>post/<?php echo $news_tag->id; ?>">
                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $news_tag->img;?>&size=277x216" class="img-responsive img_episode" alt="">
                    </a>
                    <div class="news_title">
                        <a href="<?php echo base_url();?>category/<?php echo $news_tag->cat_id; ?>">
                            <span class="cat_episode"><?php echo $news_tag->cat_name; ?></span>
                        </a>
                        <p class="date_episode"><?php echo ArabicDate2($news_tag->created_at); ?></p>
                        <a href="<?php echo base_url();?>post/<?php echo $news_tag->id; ?>">
                            <h3><img src="<?php echo base_url();?>assets/image/icon/headphone.svg" alt=""> <?php echo $news_tag->title; ?> </h3>
                        </a>
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