<link href="<?php echo base_url();?>assets/css/plyr.css" rel="stylesheet">
<div class="page_content">
        <section class="content-wrapper">
                <div class="radio_live">

                <img src="<?php echo base_url();?><?php echo $About->img; ?>" class="radio_img img-responsive" alt="">

                    <audio id="background_audio" autoplay="autoplay">
                        <source src="http://live.alboraq.ps:8000/;stream.mp3" />
                    </audio>

                    <div class="now playing" id="music">
                        <span class="bar n1">A</span>
                        <span class="bar n2">B</span>
                        <span class="bar n3">c</span>
                        <span class="bar n4">D</span>
                        <span class="bar n5">E</span>
                        <span class="bar n6">F</span>
                        <span class="bar n7">G</span>
                        <span class="bar n8">H</span>
                        <span class="bar n1 n12">A</span>
                        <span class="bar n2 n22">B</span>
                        <span class="bar n3 n32">c</span>
                        <span class="bar n4 n42">D</span>
                        <span class="bar n5 n52">E</span>
                        <span class="bar n6 n62">F</span>
                        <span class="bar n7 n72">G</span>
                        <span class="bar n8 n82">H</span>
                    </div>
                    <button class="speakers" id="mute" onclick="toggle(this)"><img src="<?php echo base_url();?>assets/image/icon/speakers.svg" alt=""></button>
                </div>
        </section>

        <section class="content-wrapper ads_quds">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php

                if(empty($Banner_place1)){
                    ?>
                    <a href="javascript:void(0)"><img src="<?php echo base_url()?>assets/image/defult ads.jpg" title="مساحة إعلانية" class="img-responsive ads_quds_img"></a>
                    <?php

                }else{
                    ?>
                    <a target="_blank" href="<?php echo $Banner_place1->link ?> "><img src="<?php echo base_url();?>thumb.php?src=<?php echo $Banner_place1->img; ?>&size=425x80" title="<?php echo $Banner_place1->name ?>" class="img-responsive ads_quds_img"></a>
                <?php }
                ?>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php

                if(empty($Banner_place2)){
                    ?>
                    <a href="javascript:void(0)"><img src="<?php echo base_url()?>assets/image/defult ads.jpg" title="مساحة إعلانية" class="img-responsive ads_quds_img"></a>
                    <?php

                }else{
                    ?>
                    <a target="_blank" href="<?php echo $Banner_place2->link ?> "><img src="<?php echo base_url();?>thumb.php?src=<?php echo $Banner_place2->img; ?>&size=425x80" title="<?php echo $Banner_place2->name ?>" class="img-responsive ads_quds_img"></a>
                <?php }
                ?>
            </div>
        </div>
        </section>
        <section class="content-wrapper r_programs rd_programs">
                <h3 class="cat_title">البرامج الإذاعية</h3>
            <div class="row_progrms">
            <div class="radio_program">
                <?php

                foreach ($Programs as $programs)

                {?>
                <a href="<?php echo base_url();?>program/<?php echo $programs->id; ?>">
                    <div class="post-box">
                    <img src="<?php echo base_url();?>thumb.php?src=<?php echo $programs->img;?>&size=158x204" alt="">
                    <div class="entry-content">
<!--                        <p>شهداء انتفاضة_قدس</p>-->
                    </div>
                </div>
                </a>
                    <?php
                } ?>

            </div>

            </div>
        </section>
        <div class="content-wrapper bg_ bg_episode_news"></div>
<!--    <div class="clearfix"></div>-->
        <section class="content-wrapper episode_news episode_news_mob">
            <h3 class="cat_title">آخر الحلقات</h3>
                    <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <?php foreach (array_slice($Episodes,0,1) as $episodes)
                        {?>
                            <div class="last_episode">
                                <a href="<?php echo base_url();?>post"><div class="bg_img"><img src="<?php echo base_url();?>thumb.php?src=assets/image/img_episode.jpg&size=424.59x278" class="img-responsive img_episode" alt=""></div></a>
                                    <div class="news_title">
                                        <a href="#">
                                            <span class="cat_episode"><?php echo $episodes->course_name; ?></span>
                                        </a>
                                        <p class="date_episode"><?php echo ArabicDate2($episodes->created_at); ?></p>
                                        <a href="<?php echo base_url();?>program/episode/<?php echo $episodes->id; ?>">
                                            <h3><img src="<?php echo base_url();?>assets/image/icon/headphone.svg" alt=""> <?php echo $episodes->name; ?></h3>
                                        </a>
                                    </div>
                            </div>
                        <?php }?>
                        <?php foreach (array_slice($Episodes,1,1) as $episodes)
                        {?>
                        <div class="other_episode">
                            <a href="<?php echo base_url();?>post"><img src="<?php echo base_url();?>assets/image/img_episode.jpg" class="img-responsive o_img_episode" alt=""></a>
                            <div class="news_title">
                                <a href="#">
                                    <span class="cat_episode"><?php echo $episodes->course_name; ?></span>
                                </a>
                                <p class="date_episode"><?php echo ArabicDate2($episodes->created_at); ?></p>
                                <a href="<?php echo base_url();?>program/episode/<?php echo $episodes->id; ?>">
                                    <h3><img src="<?php echo base_url();?>assets/image/icon/headphone.svg" alt=""> <?php echo $episodes->name; ?></h3>
                                </a>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                        <div class="col-md-6 col-sm-6">
                            <?php foreach (array_slice($Episodes,2,6) as $episodes)
                            {?>
                            <div class="other_episode">
                                <a href="#"><img src="<?php echo base_url();?>assets/image/img_episode.jpg" class="img-responsive o_img_episode" alt=""></a>
                                <div class="news_title">
                                    <a href="<?php echo base_url();?>post">
                                        <span class="cat_episode"><?php echo $episodes->course_name; ?></span>
                                    </a>
                                    <p class="date_episode"><?php echo ArabicDate2($episodes->created_at); ?></p>
                                    <a href="<?php echo base_url();?>program/episode/<?php echo $episodes->id; ?>">
                                        <h3><img src="<?php echo base_url();?>assets/image/icon/headphone.svg" alt=""> <?php echo $episodes->name; ?></h3>
                                    </a>
                                </div>
                            </div>
                            <?php }?>
                        </div>



                    </div>
        </section>
        <section class="content-wrapper newsletters">
            <h3 class="cat_title">نشرات الأخبار</h3>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <?php
                        $i = 4;
                        $y = 4;
                        foreach ($Letters as $letters)

                        {?>
                            <div class="col-md-6 col-sm-6">
                                <div class="newsltr">
                                    <p><?php echo $letters->name;?></p>
                                    <a href="<?php echo base_url()?><?php echo $letters->link;?>" download="<?php echo $letters->name;?>">
                                        <img src="<?php echo base_url();?>assets/image/icon/download.svg" class="download2" alt="">
                                    </a>
                                    <img src="<?php echo base_url();?>assets/image/icon/play-btn.svg" class="play-btn play<?php echo 4- $y--?>" alt="" onclick="playTrack2(<?php echo 4- $i--?>)">
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>

                <div class="col-md-4 ads">
                    <?php

                    if(empty($Banner_place3)){
                        ?>
                        <a href="javascript:void(0)"><img src="<?php echo base_url()?>assets/image/ads2.png" title="مساحة إعلانية" class="img-responsive"></a>
                        <?php

                    }else{
                        ?>
                        <a target="_blank" href="<?php echo $Banner_place3->link ?> "><img src="<?php echo base_url();?>thumb.php?src=<?php echo $Banner_place3->img; ?>&size=273x164" title="<?php echo $Banner_place3->name ?>" class="img-responsive"></a>
                    <?php }
                    ?>
                </div>
            </div>

        </section>
    <div class="content-wrapper bg_ bg_imp_prog"></div>
<!--    <div class="clearfix"></div>-->
        <section class="content-wrapper imp_prog r_programs">
            <h3 class="cat_title">أهم البرامج</h3>
            <div class="row">
                <div class="program_important">
                    <?php foreach ($Important as $important)
                    { ?>
                        <div class="post_imp">
                            <div class="content_imp">
                                <div class="img5"><img src="<?php echo base_url();?>thumb.php?src=<?php echo $important->presenter_img; ?>&size=126x197" alt=""></div>
                            <div class="name_prog cat_title">
                                <h2><?php echo $important->name; ?></h2>
                            </div>
                                <a href="<?php echo base_url();?>program/<?php echo $important->id; ?>">
                                    <span class="cat_episode">عرض الحلقات</span>
                                </a>
                            </div>

                        </div>
                    <?php }?>
                </div>

            </div>
        </section>


    <div class="content-wrapper bg_ bg_video_library"></div>
<!--    <div class="clearfix"></div>-->
    <section class="content-wrapper video_library">
            <h3 class="cat_title video_title">مكتبة الفيديو</h3>
            <div dir="rtl" class="slider slider-nav">
                <?php foreach ($Video as $video)
                { ?>
                    <div class="video_gallery">
                        <div class="video-hover">
                            <img src="<?php echo base_url();?>thumb.php?src=<?php echo $video->imghome; ?>&size=216x320" alt="" class="img-responsive vid-quds">
                        </div>
                        <a href="<?php echo base_url();?>video/<?php echo $video->id;?>"><img src="<?php echo base_url();?>assets/image/icon/play-button.svg" alt="" class="vid_icon" style="display: none"></a>
                        <h2 class="vid_title" style="display: none"><a href="<?php echo base_url();?>video/<?php echo $video->id;?>"><?php echo $video->title; ?></a></h2>
                    </div>
                    <?php
                } ?>


            </div>
        </section>
        <section class="content-wrapper episode_news last_news home_news">
            <h3 class="cat_title">مقابلات وتقارير</h3>
            <div class="row">
                <div class="col-md-12 gallery">
                    <?php

                    foreach ($More_News as $more_news)

                    {?>
                <div>
                    <div class="last_episode">
                        <a href="<?php echo base_url() ?>post/<?php echo $more_news->id;?>">
                            <img src="<?php echo base_url();?>thumb.php?src=<?php echo $more_news->img;?>&size=351.39x" class="img-responsive img_episode" alt="">
                        </a>
                        <div class="news_title">
                            <a href="<?php echo base_url();?>category/<?php echo $more_news->cat_id; ?>">
                                <span class="cat_episode"><?php echo $more_news->cat_name; ?></span>
                            </a>
                            <p class="date_episode"><?php echo ArabicDate2($more_news->created_at); ?></p>
                            <a href="<?php echo base_url();?>post/<?php echo $more_news->id;?>">
                                <h3><img src="<?php echo base_url();?>assets/image/icon/headphone.svg" alt=""> <?php echo $more_news->title;?></h3>
                            </a>
                        </div>
                    </div>
                </div>
                        <?php
                    } ?>


                </div>
            </div>
            <div class="eael-load-more-button-wrap load_more_btn">
                <button class="eael-load-more-button" onclick="load_more_news()">
                    <div class="eael-btn-loader button__loader"></div>
                    <span>تحميل المزيد </span>
                </button>
            </div>
        </section>
        </div>
        <div class="tawjihi_player close_player">
        <div class="container">
            <div class="column add-bottom">
                <div id="mainwrap">

                    <div id="audiowrap">
                        <div id="nowPlay">
                            <div class="music-player"><img src="<?php echo base_url();?>assets/image/icon_player/music-player.svg"  class="" alt=""></div>
                            <span id="npTitle"></span>

                        </div>
                        <div id="audio0">
                            <audio id="audio1" preload controls>Your browser does not support HTML5 Audio! 😢</audio>
                            <div id="tracks">
                                <a id="btnPrev"><img src="<?php echo base_url();?>assets/image/icon_player/skip.svg" width="23px" class="skip-prev" alt=""></a>
                                <a id="btnNext"><img src="<?php echo base_url();?>assets/image/icon_player/skip.svg" width="23px" class="skip-next" alt=""></a>
                            </div>
                            <i class="fa fa-list-ul"></i>

                        </div>

                    </div>
                    <div class="ms_player_close">
                        <i class="fa fa-angle-up" aria-hidden="true"></i>
                    </div>
                    <div id="plwrap">
                        <ul id="plList"></ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

        <script>
            $(".radio_program").owlCarousel({
                rtl: true,
                loop: true,
                nav: true,
                dots: false,
                autoplay: true,
                navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
                autoplayHoverPause: true,
                smartSpeed: 3000,
                responsive: {
                    0: {items: 2},
                    600: {items: 2},
                    768: {items: 5}
                }
            });
            $(".program_important").owlCarousel({
                rtl: true,
                loop: true,
                nav: true,
                dots: false,
                autoplay: true,
                navText:["<i class='fas fa-chevron-right'></i>","<i class='fas fa-chevron-left'></i>"],
                autoplayHoverPause: true,
                smartSpeed: 3000,
                responsive: {
                    0: {items: 1},
                    600: {items: 2},
                    768: {items: 3},
                    1000: {items: 4}
                }
            });
        </script>
        <script>
            const button = document.querySelector('.eael-load-more-button');

            button.addEventListener('click', simulateLoad);
            button.addEventListener('touchend', simulateLoad);

            function simulateLoad() {
                button.classList.add('button--loading');
                button.querySelector('span').innerHTML = 'جاري التحميل ...';
            }
        </script>
        <script>
            var baseURL= "<?php echo base_url();?>";
            function toggle(button) {
                var player = document.getElementById("music");
                player.classList.toggle("mute");
                if (button.innerHTML == '<img src="'+ baseURL +'assets/image/icon/speakers.svg" alt="">') {
                    button.innerHTML = '<img src="'+ baseURL +'assets/image/icon/mute.svg" alt="">';
                } else {
                    button.innerHTML = '<img src="'+ baseURL +'assets/image/icon/speakers.svg" alt="">';
                }
            }
var audio2 = document.getElementById('background_audio');

//document.getElementById('mute').addEventListener('click', function (e)
//{
//    e = e || window.event;
//    audio2.pause = !audio2.pause;
//    e.preventDefault();
//}, false);

            document.getElementById('mute').addEventListener('click', function (e)
            {
                if (audio2.paused == false) {
                    audio2.pause();
                    audio2.currentTime = 1;

                } else {
                    audio2.play();
                }
            });
                if (window.matchMedia('screen and (max-width: 480px)').matches) {
                    $('.video_library .slick-slide:not(.slick-center) .video-hover').innerHTML = '<img src="' + baseURL + 'thumb.php?src=assets/image/img_episode.jpg&size=85x230" alt="">';
                }

        </script>
<script>
    $(".ms_player_close").on('click', function() {
        $(".tawjihi_player").toggleClass("close_player");
        $("#plwrap").toggleClass("hide_list");
        $("body").toggleClass("main_class")
    })

    $(".fa-list-ul").on('click', function() {
        $("#plwrap").toggleClass("show_list");

    })
</script>

<script>

    var player = new Plyr('#audio1', {
        controls: [
            'restart',
            'play',
            'progress',
            'current-time',
            'duration',
            'mute',
            'volume'
        ]
    });
    var index = 0,
        playing = false,
        mediaPath = '<?php echo base_url();?>',
        extension = '',
        tracks = [

            <?php foreach ($Letters as $letters)
            { ?>
            {
                "track": <?php echo $letters->id?>,
                "name": "<?php echo $letters->name?>",
                "file": "<?php echo str_replace('.mp3','',$letters->link)?>"
            }
            <?php
            if(array_search($letters, $Letters) != sizeof($Letters)-1){?>
            ,

            <?php
            }
            }?>
        ],
        extension = '',
        buildPlaylist = $(tracks).each(function(key, value) {

            var trackNumber = value.track,
                trackName = value.name,
                trackDuration = value.duration;
            if (trackNumber.toString().length === 1) {
                trackNumber = '0' + trackNumber;
            }
            $('#plList').append('<li> \
                    <div class="plItem"> \
                        <span class="plNum">' + trackNumber + '.</span> \
                        <span class="plTitle">' + trackName + '</span> \
                    </div> \
                </li>');
        }),
        trackCount = tracks.length,
        npAction = $('#npAction'),
        npTitle = $('#npTitle'),
        audio = $('#audio1').on('play', function () {
            playing = true;
            npAction.text('Now Playing...');
            $('.Play_Now').attr('src',"<?php echo base_url();?>assets/image/icon/pause-btn.svg");
        }).on('pause', function () {
            playing = false;
            npAction.text('Paused...');
            $('.Play_Now').attr('src',"<?php echo base_url();?>assets/image/icon/play-btn.svg");
        }).on('ended', function () {
            npAction.text('Paused...');
            if ((index + 1) < trackCount) {
                index++;
                loadTrack(index);
                audio.play();
            } else {
                audio.pause();
                index = 0;
                loadTrack(index);
            }
        }).get(0),
        btnPrev = $('#btnPrev').on('click', function () {
            if ((index - 1) > -1) {
                index--;
                loadTrack(index);
                if (playing) {
                    audio.play();
                }
            } else {
                audio.pause();
                index = 0;
                loadTrack(index);
            }
        }),
        btnNext = $('#btnNext').on('click', function () {

            if ((index + 1) < trackCount) {
                index++;
                loadTrack(index);
                if (playing) {
                    audio.play();
                }
            } else {
                audio.pause();
                index = 0;
                loadTrack(index);
            }
        }),
        li = $('#plList li').on('click', function () {

            var id = parseInt($(this).index());
            if (id !== index) {
                playTrack(id);
            }
        }),
        loadTrack = function (id) {

            $('.plSel').removeClass('plSel');
            $('#plList li:eq(' + id + ')').addClass('plSel');
            npTitle.text(tracks[id].name);
            index = id;
            audio.src = mediaPath + tracks[id].file + extension;
        },
        playTrack = function (id) {
            $('.tawjihi_player').removeClass('close_player');
            if(id==index){
                if(playing)
                    audio.pause();
                else
                    audio.play();
            }else {
                loadTrack(id);
                audio.play();
            }
        },
        playTrack2 =function (id) {
            $('.tawjihi_player').removeClass('close_player');
            if(id==index) {
                if (playing) {
                    $('.play'+id).removeClass("Play_Now");
                    $('.play'+id).attr('src',"<?php echo base_url();?>assets/image/icon/play-btn.svg");

                    audio.pause();
                }else{
                    $('.play'+id).addClass("Play_Now");
                    $('.play'+id).attr('src',"<?php echo base_url();?>assets/image/icon/pause-btn.svg");
                    audio.play();
                }
            }else {
                $('.Play_Now').removeClass("Play_Now");
                $('.play'+index).attr('src',"<?php echo base_url();?>assets/image/icon/play-btn.svg");
                $('.play'+id).attr('src',"<?php echo base_url();?>assets/image/icon/pause-btn.svg");
                $('.play'+id).addClass("Play_Now");
                loadTrack(id);
                audio.play();
            }
        };
    extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
    loadTrack(index);



</script>
<script>

</script>