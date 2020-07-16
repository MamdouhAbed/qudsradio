<link href="<?php echo base_url();?>assets/css/plyr.css" rel="stylesheet">
<div class="page_content">
    <section class="content-wrapper newsletters">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li class="_active">نشرات الأخبار</li>
            </ul>
        </div>
        <h3 class="cat_title">نشرات الأخبار</h3>
                <div class="row">
                    <?php
                    $i = 18;
                    $y = 18;
                    foreach ($Letters as $letters)
                    { ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="newsltr">
                            <p><?php echo $letters->name?></p>
                            <a href="<?php echo base_url()?><?php echo $letters->link?>" download="<?php echo $letters->name?>">
                                <img src="<?php echo base_url();?>assets/image/icon/download.svg" class="download2" alt="">
                            </a>
                            <img src="<?php echo base_url();?>assets/image/icon/play-btn.svg" class="play-btn play<?php echo 18- $y--?>" alt="" onclick="playTrack2(<?php echo 18- $i--?>)">
                        </div>
                    </div>

                    <?php } ?>

                </div>
        <div class="wrap-pagination">
            <?php echo $pagination; ?>
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
