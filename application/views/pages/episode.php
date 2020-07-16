<link href="<?php echo base_url();?>assets/css/plyr.css" rel="stylesheet">
<div class="page_content">
    <section class="content-wrapper">


        <div class="blog">
            <div class="blog-title">
                <h2><?php echo $Episode->name; ?></h2>
            </div>
            <div class="breadcrumb" xmlns="http://www.w3.org/1999/html">
                <ul>
                    <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                    <li><a href="<?php echo base_url() ?>program/<?php echo $Program->p_id; ?>"> <?php echo $Program->p_nam; ?></a></li>
                    <li class="_active"> / عرض الحلقة</li>
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

                    <img src="<?php echo base_url();?>thumb.php?src=<?php echo $Episode->img;?>&size=955x420" class="img-responsive post-img1">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <audio id="audio2" preload controls>
                        <source src="<?php echo base_url();?><?php echo $Episode->audio;?>" type="audio/mp3">
                    </audio>
                </div>
            </div>
            <div class="blog-text">
                <div class="rv-post-meta">
                    <div class="rv-margin-tiny-bottom time1">
                        <i class="far fa-clock"></i>
                        <small class="rv-inline" title="وقت الخبر"><time><?php echo ArabicDate4($Episode->created_at);?></time></small>
                    </div>
                    <div class="rv-margin-tiny-bottom date1">
                        <i class="fas fa-calendar-week" ></i>
                        <small class="rv-inline" title="تاريخ الخبر"><time><?php echo ArabicDate1($Episode->created_at);?></time></small>
                    </div>
                    <div class="rv-margin-tiny-bottom share1">
                        <i class="fas fa-link"></i>
                        <small class="copy-link" title="اضغط لنسخ رابط الخبر">نسخ رابط الخبر:</small>
                        <small><input type="text" class="share-link" value="<?php echo base_url(uri_string()); ?>" /></small>
                    </div>
                </div>

                <div class="post-column"> <?php echo $Episode->info; ?></div>
                <?php foreach ($Episode_video as $episode_video)
                { ?>
                    <div style="margin: 10px 0 30px 0">
                        <?php if ( $episode_video->video!=null){
                            ?>
                            <iframe width="100%" height="450" src="https://www.youtube.com/embed/<?php echo $episode_video->video;?>?rel=0&amp;amp;showinfo=0;theme=light;iv_load_policy=3;modestbranding=1;autohide=1" frameborder="0" allowfullscreen></iframe>
                        <?php }?>

                        <?php if ( $episode_video->fb_link!=null){
                            ?>
                            <div class="fb-video" data-href="<?php echo $episode_video->fb_link;?>" data-width="550" data-show-text="false">&nbsp;</div>
                        <?php }?>
                        <?php if ( $episode_video->local_video!=null){
                            ?>
                            <iframe width="100%" height="450" src="<?php echo base_url()?><?php echo $episode_video->local_video;?>" frameborder="0" allowfullscreen></iframe>

                        <?php }?>


                    </div>

                <?php }
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
