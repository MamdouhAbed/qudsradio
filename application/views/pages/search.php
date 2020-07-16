<link href="<?php echo base_url();?>assets/css/plyr.css" rel="stylesheet">

<div class="page_content">
    <section class="content-wrapper search_nav">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li class="_active">نتائج البحث عن <?php echo $Keyword ?></li>
            </ul>
        </div>
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active in"><a class="cat-ic" href="#episodes" aria-controls="episodes" role="tab" data-toggle="tab"><span class="title-sub-cat">الحلقات</span></a></li>
            <li role="presentation"><a class="cat-ic" href="#programs" aria-controls="programs" role="tab" data-toggle="tab"><span class="title-sub-cat">البرامج</span></a></li>
            <li role="presentation" class=""><a class="cat-ic" href="#news" aria-controls="news" role="tab" data-toggle="tab"><span class="title-sub-cat">تقارير ومقابلات</span></a></li>
            <li role="presentation" class=""><a class="cat-ic" href="#videos" aria-controls="videos" role="tab" data-toggle="tab"><span class="title-sub-cat">الفيديو</span></a></li>
            <li role="presentation" class=""><a class="cat-ic" href="#letters" aria-controls="letters" role="tab" data-toggle="tab"><span class="title-sub-cat">نشرات الأخبار</span></a></li>
        </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="episodes">
                    <div class="row tab-category  episode_news all_news programs_d">
                        <?php
                        if (count($r_episodes)==0){

                            echo "<img style=\"margin: 60px auto 100px auto;\" class=\"img-responsive\" src=\"assets/image/nofound1.png\" alt=\"لا تتوفر نتائج\">";

                        } else

                            foreach ($r_episodes as $episodes)
                            {?>
                                <div class="col-md-3 col-xs-6 col-sm-4 last_episode">
                                    <a href="<?php echo base_url();?>program/episode/<?php echo $episodes->id; ?>">
                                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $episodes->img; ?>&size=200x185" class="img-responsive img_episode" alt="">
                                    </a>
                                    <div class="news_title">
                                        <p class="date_episode"><?php echo ArabicDate2($episodes->created_at); ?></p>
                                        <a href="<?php echo base_url();?>program/episode/<?php echo $episodes->id; ?>">
                                            <h3><img src="<?php echo base_url();?>assets/image/icon/headphone.svg" alt=""> <?php echo $episodes->name; ?></h3>
                                        </a>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="programs">
                    <div class="row tab-category episode_news all_news all_program all_video">

            <?php
            if (count($r_programs)==0){

                echo "<img style=\"margin: 60px auto 100px auto;\" class=\"img-responsive\" src=\"assets/image/nofound1.png\" alt=\"لا تتوفر نتائج\">";

            } else

                foreach ($r_programs as $programs)
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
                    </div>
                <div role="tabpanel" class="tab-pane fade" id="news">
                    <div class="row tab-category episode_news all_news">
                        <?php
                        if (count($r_news)==0){

                            echo "<img style=\"margin: 60px auto 100px auto;\" class=\"img-responsive\" src=\"assets/image/nofound1.png\" alt=\"لا تتوفر نتائج\">";

                        } else

                            foreach ($r_news as $news)
                            {?>
                                <div class="col-md-4 col-sm-6 last_episode">
                                    <a href="<?php echo base_url();?>post/<?php echo $news->id; ?>">
                                        <img src="<?php echo base_url();?>thumb.php?src=<?php echo $news->img;?>&size=277x216" class="img-responsive img_episode" alt="">
                                    </a>
                                    <div class="news_title">
                                        <p class="date_episode"><?php echo ArabicDate2($news->created_at); ?></p>
                                        <a href="<?php echo base_url();?>post/<?php echo $news->id; ?>">
                                            <h3><img src="<?php echo base_url();?>assets/image/icon/headphone.svg" alt=""> <?php echo $news->title; ?> </h3>
                                        </a>
                                    </div>
                                </div>
                            <?php }
                        ?>
                    </div>
                </div>

                        <div role="tabpanel" class="tab-pane fade" id="videos">
                            <div class="row tab-category episode_news all_video">
            <?php
            if (count($r_videos)==0){

                echo "<img style=\"margin: 60px auto 100px auto;\" class=\"img-responsive\" src=\"assets/image/nofound1.png\" alt=\"لا تتوفر نتائج\">";

            } else

                foreach ($r_videos as $video)
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
                            </div>
                                <div role="tabpanel" class="tab-pane fade" id="letters">
                                    <div class="row tab-category newsletters">

            <?php
            if (count($r_letters)==0){

                echo "<img style=\"margin: 60px auto 100px auto;\" class=\"img-responsive\" src=\"assets/image/nofound1.png\" alt=\"لا تتوفر نتائج\">";

            } else
                $i = 18;
                $y = 18;
                foreach ($r_letters as $letters)
                {?>
                    <div class="col-md-4 col-sm-6">
                        <div class="newsltr">
                            <p><?php echo $letters->name?></p>
                            <a href="<?php echo base_url()?><?php echo $letters->link?>" download="<?php echo $letters->name?>">
                                <img src="<?php echo base_url();?>assets/image/icon/download.svg" class="download2" alt="">
                            </a>
                            <img src="<?php echo base_url();?>assets/image/icon/play-btn.svg" class="play-btn play<?php echo 18- $y--?>" alt="" onclick="playTrack2(<?php echo 18- $i--?>)">
                        </div>
                    </div>
                <?php }
            ?>
                                        </div>
                                    </div>
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

            <?php foreach ($r_letters as $letters)
            { ?>
            {
                "track": <?php echo $letters->id?>,
                "name": "<?php echo $letters->name?>",
                "file": "<?php echo str_replace('.mp3','',$letters->link)?>"
            }
            <?php
            if(array_search($letters, $r_letters) != sizeof($r_letters)-1){?>
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