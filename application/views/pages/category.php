<div class="page_content">
    <section class="content-wrapper episode_news all_news">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li class="_active"><?php echo $category->cat_name; ?></li>
            </ul>
        </div>
        <h3 class="cat_title"><?php echo $category->cat_name; ?></h3>
        <div class="row">
            <?php
            foreach ($Category as $_category)

            { ?>
                <div class="col-md-4 col-sm-6 last_episode">
                    <a href="<?php echo base_url();?>post/<?php echo $_category->id; ?>">
                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $_category->img;?>&size=277x216" class="img-responsive img_episode" alt="">
                    </a>
                    <div class="news_title">
                        <p class="date_episode"><?php echo ArabicDate2($_category->created_at); ?></p>
                        <a href="<?php echo base_url();?>post/<?php echo $_category->id; ?>">
                            <h3><img src="<?php echo base_url();?>assets/image/icon/headphone.svg" alt=""> <?php echo $_category->title; ?> </h3>
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