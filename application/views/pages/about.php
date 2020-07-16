<div class="page_content">
    <section class="content-wrapper">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li class="_active">من نحن</li>
            </ul>
        </div>
        <h3 class="cat_title">من نحن</h3>
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
    <section class="content-wrapper">
        <div class="about_txt">
            <?php echo $About->about_txt; ?>
        </div>
    </section>


</div>
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

    document.getElementById('mute').addEventListener('click', function (e)
    {
        e = e || window.event;
        audio2.muted = !audio2.muted;
        e.preventDefault();
    }, false);


    if (window.matchMedia('screen and (max-width: 480px)').matches) {
        $('.video_library .slick-slide:not(.slick-center) .video-hover').innerHTML = '<img src="' + baseURL + 'thumb.php?src=assets/image/img_episode.jpg&size=85x230" alt="">';
    }

</script>