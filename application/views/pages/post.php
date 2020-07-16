<link href="<?php echo base_url();?>assets/css/plyr.css" rel="stylesheet">
<div class="page_content">
    <section class="content-wrapper">


        <div class="blog">
                        <div class="blog-title">
                            <h4 class="blog-caption"><?php echo $Post->caption; ?></h4>
                            <h2><?php echo $Post->title; ?></h2>
                        </div>
            <div class="breadcrumb" xmlns="http://www.w3.org/1999/html">
                <ul>
                    <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                    <li><a href="<?php echo base_url() ?>category/<?php echo $Category->id; ?>"> <?php echo $Category->cat_name; ?></a></li>
                    <li class="_active"> / عرض التقرير</li>
                </ul>
            </div>

                                <div class="img_post">
                                        <div class="share">
                                            <div class="fa fa-share-alt"></div>
                                            <div class="social">
                                                <div class="fab fa-google-plus-g"></div>
                                                <div class="fab fa-twitter"></div>
                                                <div class="fab fa-facebook-f"></div>
                                                <div class="fa fa-close"></div>
                                            </div>
                                        </div>
<!--                                        <img src="--><?php //echo base_url();?><!--thumb.php?src=assets/image/uu.jpg&size=955x420" class="img-responsive post-img1">-->
                                    <?php if(count($Post_img)==0) {
                                        ?>
                                        <img  title='<?php echo $Post->title; ?>' alt='<?php echo $Post->title; ?>' src="<?php echo base_url();?>thumb.php?src=<?php echo $Post->img;?>&size=955x420" class="img-responsive post-img1">

                                        <?php
                                    }
                                    ?>
                                    <?php if(count($Post_img)!=0) {
                                    ?>
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <a data-fancybox="post_img" href="<?php echo base_url()?><?php echo $Post->img;?>"><img src="<?php echo base_url();?>thumb.php?src=<?php echo $Post->img;?>&size=955x420" alt="" class="img-responsive post-img1"></a>
                                            </div>
                                            <?php foreach ($Post_img as $post_img)
                                            { ?>

                                                <div class="item">
                                                    <a data-fancybox="post_img" href="<?php echo base_url()?><?php echo $post_img->name;?>"><img class="img-responsive post-img1" src="<?php echo base_url();?>thumb.php?src=<?php echo $post_img->name;?>&size=955x420" alt=""> </a>
                                                </div>

                                            <?php }
                                            ?>

                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span>
                            <svg class="chevon-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 407.436 407.436;" xml:space="preserve" width="40px" height="40px">
                            <polygon points="315.869,21.178 294.621,0 91.566,203.718 294.621,407.436 315.869,386.258 133.924,203.718 " fill="#ffffff"/><g></g></svg>
                        </span>
                                            <span class="sr-only">السابق</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span>
                            <svg class="chevon-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 407.436 407.436" style="enable-background:new 0 0 407.436 407.436;" xml:space="preserve" width="40px" height="40px">
                            <polygon points="112.814,0 91.566,21.178 273.512,203.718 91.566,386.258 112.814,407.436 315.869,203.718 " fill="#ffffff"/><g></g></svg>
                        </span>
                                            <span class="sr-only">التالي</span>
                                        </a>
                                    </div>
                                        <?php
                                    }
                                    ?>
                                </div>
            <?php if ( $Post->sound!=null){
                ?>
            <div class="row">
            <div class="col-md-12">
                <audio id="audio2" preload controls>
                    <source src="<?php echo base_url();?><?php echo $Post->sound; ?>" type="audio/mp3">
                </audio>
            </div>
            </div>

                <script>
//                    $("#audio2 source[src^='<?php //echo base_url();?>//./admin-assets/uploads/']").attr('src', 'http://www.google.com/')
$('#audio2 source[src*="<?php echo base_url();?>uplooooads/"]').each(function() {
    $('#audio2 source').attr('src',function(){this.src = this.src.replace('<?php echo base_url();?>uplooooads/','http://www.google.com/uplooooads/')});

});

                </script>
            <?php }?>
                            <div class="blog-text">
                                <div class="rv-post-meta">
                                    <div class="rv-margin-tiny-bottom time1">
                                        <i class="far fa-clock"></i>
                                        <small class="rv-inline" title="وقت الخبر"><time><?php echo ArabicDate4($Post->created_at);?></time></small>
                                    </div>
                                    <div class="rv-margin-tiny-bottom date1">
                                        <i class="fas fa-calendar-week" ></i>
                                        <small class="rv-inline" title="تاريخ الخبر"><time><?php echo ArabicDate1($Post->created_at);?></time></small>
                                    </div>
                                    <div class="rv-margin-tiny-bottom share1">

                                        <i class="fas fa-link"></i>
                                        <small class="copy-link" title="اضغط لنسخ رابط الخبر">نسخ رابط الخبر:</small>

                                        <small><input type="text" class="share-link" value="<?php echo base_url(uri_string()); ?>" /></small>
                                    </div>
                                </div>

                                <div class="post-column"> <?php echo $Post->post_text; ?> </div>
                                <?php foreach ($Post_video as $post_video)
                                { ?>
                                    <div style="margin: 10px 0 30px 0">
                                        <?php if ( $post_video->video!=null){
                                            ?>
                                            <iframe width="100%" height="450" src="https://www.youtube.com/embed/<?php echo $post_video->video;?>?rel=0&amp;amp;showinfo=0;theme=light;iv_load_policy=3;modestbranding=1;autohide=1" frameborder="0" allowfullscreen></iframe>
                                        <?php }?>

                                        <?php if ( $post_video->fb_link!=null){
                                            ?>
                                            <div class="fb-video" data-href="<?php echo $post_video->fb_link;?>" data-width="550" data-show-text="false">&nbsp;</div>
                                        <?php }?>
                                        <?php if ( $post_video->local_video!=null){
                                            ?>
                                            <iframe width="100%" height="450" src="<?php echo base_url()?><?php echo $post_video->local_video;?>" frameborder="0" allowfullscreen></iframe>

                                        <?php }?>


                                    </div>

                                <?php }
                                ?>
                                <?php if(count($Tags)>0){

                                    ?>
                                    <div id="recent-comments-2" class="widget widget--sidebar widget_recent_comments">
                                        <ul id="recentcomments">
                                            <?php foreach ($Tags as $tags)
                                            {?>
                                                <li class="recentcomments"><a href="<?php echo base_url()?>post_tags/<?php echo $tags->tag_id; ?>">#<?php echo $tags->name2;?></a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                }
                                ?>

                            </div>




        </div>



    </section>



</div>

<script>
    $(".fa-share-alt").click(function(){
        $(".share").animate({
            width: "100%",
            height: "100%"
        }, 400, function(){
            $(".fa-share-alt").animate({
                opacity: 0
            }, 400, function(){
                $(".social").animate({
                    bottom:"40%",
                    opacity: 1,
                    easing: "ease-in"
                }, 1000)
            })
        });
    })
    jQuery(document).ready(function() {

        var window_width = jQuery( window ).width();
        if (window_width < 768) {
            $(".fa-share-alt").click(function(){
                $(".share").animate({
                    width: "100%",
                    height: "100%"
                }, 400, function(){
                    $(".fa-share-alt").animate({
                        opacity: 0
                    }, 400, function(){
                        $(".social").animate({
                            bottom:"30%",
                            opacity: 1,
                            easing: "ease-in"
                        }, 1000)
                    })
                });
            })
            $(".fa-close").click(function(){
                $(".social").animate({
                    bottom: "-740%",
                    opacity: 0,
                    easing: "ease-out"
                }, 500, function(){
                    $(".share").animate({
                        width: "35px",
                        height: "35px"
                    }, 400, function(){
                        $(".fa-share-alt").animate({
                            opacity: 1
                        }, 400)
                    })
                });
            })
        }
    });
    $(".fa-twitter").click(function(){
        $(this).toggleClass("shared");
    })
    $(".fa-facebook-f").click(function(){
        $(this).toggleClass("shared");
    })
    $(".fa-google-plus-g").click(function(){
        $(this).toggleClass("shared");
    })

    $(".fa-close").click(function(){
        $(".social").animate({
            bottom: "-740%",
            opacity: 0,
            easing: "ease-out"
        }, 500, function(){
            $(".share").animate({
                width: "50px",
                height: "50px"
            }, 400, function(){
                $(".fa-share-alt").animate({
                    opacity: 1
                }, 400)
            })
        });
    })
</script>
<script>
    const player = new Plyr('#audio2', {
        controls: [
            'download',
            'restart',
            'play',
            'progress',
            'current-time',
            'duration',
            'mute',
            'volume'
        ]
    });

    // Expose player so it can be used from the console
    window.player = player;
</script>
<script>
    $('.plyr__controls [data-plyr="download"]').on('click', function() {
        $('.plyr__controls [data-plyr="download"]').attr("download", "تحميل");
    })
</script>
