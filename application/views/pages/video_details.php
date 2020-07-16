<link href="<?php echo base_url();?>assets/css/plyrlist.css" rel="stylesheet">
<div class="page_content">
    <section class="content-wrapper video_details">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li><a href="<?php echo base_url();?>videos">قائمة الفيديو</a></li>
                <li class="_active"> / عرض الفيديو</li>
            </ul>
        </div>
        <div class="blog-title">
            <h2><?php echo $Video->title;?></h2>
        </div>

        <!--                    <div class="more_video">المزيد من الفيديوهات-->
        <!--                        <img src="--><?php //echo base_url();?><!--assets/image/icon/play.svg" alt="">-->
        <!--                    </div>-->
        <div id="player">
            <div class="js-player" data-type="youtube" data-video-id="" data-ytpls="RDQMyFModNyxXx8"></div>
        </div>
        <script src="<?php echo base_url();?>assets/js/plyrlist.js"></script>
        <script>
            const player = new Plyr('#player');
        </script>

        <script>
            var addbuttons = true ;

            var players = plyr.setup(".js-player");
            /* PLAYLIST  */
            var myPlaylist = [
                <?php if($Video!=null){?>
                {
                    type: "youtube",
                    title: "<?php echo $Video->title ?>",
                    sources: [{
                        src: "<?php if($Video->video==null){ echo base_url().$Video->local_video;}  else {echo $Video->video; }?>",
                        type: "<?php if($Video->video==null){echo 'video/mp4';} else{echo 'youtube';}?>"
                    }],
                    poster: "<?php echo base_url();?>thumb.php?src=<?php echo $Video->imghome; ?>&size=80x60"
                },

                <?php foreach($More_Video as $more_video): ?>
                {
                    type: "youtube",
                    title: "<?php echo $more_video->title ?>",
                    sources: [{
                        src: "<?php if($more_video->video==null){ echo  base_url().$more_video->local_video;}  else {echo $more_video->video; }?>",
                        type: "<?php if($more_video->video==null){echo 'video/mp4';} else{echo 'youtube';}?>"
                    }],
                    poster: "<?php echo base_url();?>thumb.php?src=<?php echo $more_video->imghome; ?>&size=80x60"

                },
            <?php  endforeach ?>
<?php }?>
            ];

            var apikey = "AIzaSyDDBk8tAkod1VRRNyFZF09fgQyMpnSe5HI"; // GET YOUR YOUTUBE API KEY
            //var apikey = ""; // ONLY FOR MY CUSTOM PLAYLIST NO NEED FOR YOUTUBE API KEY
            var target = ".js-player";
            var limit = 30;

            $(document).ready(function(){
                // loadPlaylist(target, apikey, limit = 20, myPlaylist); // LOAD JSON PLAYLIST
                loadPlaylist(target, apikey, limit, myPlaylist);  // LOAD YOUTUBE OR USER VIDEO LIST

            }); // JQUERY READY END

            function loadPlaylist(target, apikey, limit = 20, myPlaylist) {

                $("li.pls-playing").removeClass("pls-playing");
                $(".plyr-playlist-wrapper").remove();


                limit = limit-1;

                if (myPlaylist) {

                    PlyrPlaylist(".plyr-playlist", myPlaylist, limit);
                    //return
                } else{

                    var ytplaylist = $(target).attr("data-ytpls");
                    var ytuser = $(target).attr("data-user");

                    //if ($('.js-player[data-ytpls]').length > 0){
                    if (ytplaylist) {
                        getTYPlaylist(ytplaylist, apikey, limit)
                        //alert(ytplaylist);
                    } else if (ytuser) {
                        alert(ytuser);
                    }

                }

                function getTYPlaylist(playlistId, apikey, limit) {

                    $.ajax({
                        url:
                        "https://content.googleapis.com/youtube/v3/playlistItems?&key=" +
                        apikey +
                        "&maxResults=" +
                        limit +
                        "&part=id,snippet&playlistId=" +
                        playlistId +
                        "&type=video",
                        dataType: "jsonp",
                        success: function(data) {
                            console.log(data.items);

                            resultData = youtubeParser(data);

                            console.log(resultData);

                            PlyrPlaylist(".plyr-playlist", resultData, limit);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert(textStatus, +" | " + errorThrown);
                        }
                    });

                }


                function PlyrPlaylist(target, myPlaylist, limit) {
                    $('<div class="plyr-playlist-wrapper"><ul class="plyr-playlist"></ul></div>').insertAfter("#player");

                    var startwith = 0; // Maybe a playlist option to start with choosen video

                    var playingclass = "";
                    var items = [];
                    //var playing == 1 ;
                    $.each(myPlaylist, function(id, val) {
                        if (0 === id) playingclass = "pls-playing";
                        else playingclass = "";

                        items.push(
                            '<li class="' +playingclass +'"><a href="#" data-type="' +val.sources[0].type +'" data-video-id="' +val.sources[0].src +'"><img class="plyr-miniposter" src="' + val.poster + '"> ' +
                            val.title +"</a></li> ");

                        if (id == limit)
                            return false;

                    });
                    $(target).html(items.join(""));

                    setTimeout(function(){

                    }, 500);

                }

                players[0].on("ready", function(event) {
                    console.log("Ready.....................................................");
                    players[0].play();


                    if(addbuttons){

                        $(".plyr-playlist .pls-playing").find("a").trigger("click");

                        $('<button type="button" class="plyr-prev"><i class="fa fa-step-backward fa-lg"></i></button>').insertBefore('.plyr__controls [data-plyr="play"]');

                        $('<button type="button" class="plyr-next"><i class="fa fa-step-forward fa-lg"></i></button>').insertAfter('.plyr__controls [data-plyr="pause"]');

                        addbuttons = false ;
                    }

                }).on("ended", function(event) {
                    var $next = $(".plyr-playlist .pls-playing")
                        .next()
                        .find("a")
                        .trigger("click");
                });

                $(document).on("click", "ul.plyr-playlist li a", function(event) {
                    event.preventDefault();

                    $("li.pls-playing").removeClass("pls-playing");
                    $(this)
                        .parent()
                        .addClass("pls-playing");

                    var video_id = $(this).data("video-id");
                    var video_type = $(this).data("type");
                    var video_title = $(this).text();

                    players[0].source({
                        type: "video",
                        title: "video_title",
                        sources: [{ src: video_id, type: video_type }]
                    });


                    $(".plyr-playlist").scrollTo(".pls-playing", 300);

                })
                    .on("click", ".plyr-prev", function(event) {
                        var $next = $(".plyr-playlist .pls-playing")
                            .prev()
                            .find("a")
                            .trigger("click");
                    })
                    .on("click", ".plyr-next", function(event) {
                        var $next = $(".plyr-playlist .pls-playing")
                            .next()
                            .find("a")
                            .trigger("click");
                    });

                ///////////////////////

                function youtubeParser(data) {
                    var new_Data = data.items.map(function(item) {
                        var thumb;

                        if (item.snippet.thumbnails) {
                            if (item.snippet.thumbnails.default)
                            //live?
                                thumb = item.snippet.thumbnails.default.url;

                            if (item.snippet.thumbnails.medium)
                            //live?
                                thumb = item.snippet.thumbnails.default.url;
                        }

                        return {
                            //type: "youtube",
                            title: item.snippet.title,
                            description: item.snippet.description,
//                    author: item.snippet.channelTitle,
                            sources: [{
                                src: item.snippet.resourceId.videoId,
                                type: item.kind.split('#')[0]
                            }],
                            poster: thumb
                        };
                    });

                    console.log(new_Data);

                    // var output = {
                    //   item: new_Data
                    // };

                    return new_Data;
                }
            }

            /****** GC ScrollTo **********/
            jQuery.fn.scrollTo = function(elem, speed, margin) {
                jQuery(this).animate(
                    {
                        scrollTop:
                        jQuery(this).scrollTop() -
                        jQuery(this).offset().top +
                        jQuery(elem).offset().top
                    },
                    speed == undefined ? 1000 : speed
                );
                return this;
            };
        </script>

    </section>
</div>