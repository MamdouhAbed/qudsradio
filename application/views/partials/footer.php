<style>
    /*video_live*/
    .video__icon {
        position: fixed;
        width: 50px;
        right: 25px;
        bottom: 100px;
        z-index: 999;
    }
    .dialog_live {
        display: none;
        box-shadow: 0 5px 30px rgba(25, 94, 200, 0.1);
        box-sizing: border-box;
        position: absolute;
        background: #fff;
        right: 79px;
        bottom: 5px;
        padding: 12px 12px 2px;
        border-radius: 7px;
    }
    .dialog_live:before {
        border: 15px solid transparent;
        border-left-color: #fff;
        width: 0;
        height: 0;
        content: ' ';
        position: absolute;
        right: -30px;
        bottom: 20px;
        z-index: 1000;
        -webkit-filter: drop-shadow(6px 0 3px rgba(1, 13, 87, .05));
        filter: drop-shadow(6px 0 3px rgba(1, 13, 87, .05));
    }
    .video__icon .circle--outer {
        border: 1px solid #df0001;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin: 0 auto 5px;
        position: relative;
        opacity: .8;
        -webkit-animation: circle 2s ease-in-out infinite;
        animation: circle 2s ease-in-out infinite;
    }
    .video__icon .circle--inner {
        background: #df0001;
        left: 10px;
        top: 10px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        position: absolute;
        cursor: pointer;
        opacity: .85;
    }
    .video__icon .circle--inner:after {
        content: '';
        display: block;
        border: 2px solid #df0001;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        top: -5px;
        left: -5px;
        position: absolute;
        opacity: .85;
        -webkit-animation: circle 2s ease-in-out .2s infinite;
        animation: circle 2s ease-in-out .2s infinite;
    }

    @-webkit-keyframes circle {
        from {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
        to {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
            opacity: 0
        }
    }

    @keyframes circle {
        from {
            -webkit-transform: scale(1);
            transform: scale(1)
        }
        to {
            -webkit-transform: scale(1.5);
            transform: scale(1.5);
            opacity: 0
        }
    }

    /*video_live*/

</style>
<?php
if (get_live()== null){
    echo "";
} else
    if(get_live()->activat_id==1){
        ?>
        <div class="video__icon">
            <div class="dialog_live">
                <!--        <iframe src="--><?php // echo $Live->link; ?><!--" width="310" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true"></iframe>-->
                <iframe src="https://www.facebook.com/plugins/video.php?href=<?php  echo get_live()->link; ?>" width="310" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
                <!--        <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FKanaanCom%2Fvideos%2F347842815721186%2F&show_text=0&width=560" width="310" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>-->
            </div>
            <span id="live_btn">

    <div class="circle--outer"></div>
    <div class="circle--inner"></div>
    </span>
            <!--    <p>البث المباشر</p>-->
        </div>
        <?php
    }
?>
<script src="<?php echo base_url();?>assets/js/plugin.js"></script>
<script src="<?php echo base_url();?>assets/js/main.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.3.15/slick.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.sticky-kit.min.js"></script>
<script src="<?php echo base_url()?>assets/js/anime.min.js"></script>
<script src="<?php echo base_url()?>assets/js/pace.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>

<script>

    $('.slider-nav').slick({
        rtl: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        arrows:true,
        centerMode: true,
        centerPadding: '0px',
        focusOnSelect: true,
        autoplay:true,
        prevArrow:'<i class="fas fa-chevron-right"></i>',
        nextArrow:'<i class="fas fa-chevron-left"></i>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            }

        ]

    });
</script>
<script>
    var btnEl = document.getElementsByClassName('btn');

    Array.prototype.forEach.call(btnEl, function(button) {
        button.addEventListener('click', function() {
            var menuEl = this.querySelectorAll('.menu-icon')[0];
            var openedClassname = menuEl.dataset.toggled;
            menuEl.classList.toggle(openedClassname);
            $(".aside").toggleClass("is-active");

        });
    });
</script>
<script>
    $("document").ready(function() {
        $(".copy-link").click(function() {
            $(".share-link").select();
            document.execCommand("copy");
        });
    });
</script>
<script>
    $(".cat_title").html(function(){
        var text= $(this).text().trim().split(" ");
        var last = text.pop();
        return text.join(" ") + (text.length > 0 ? " <span class='cat_orange'>" + last + "</span>" : last);
    });
    $(".cat_pro").html(function(){
        var text= $(this).text().trim().split(" ");
        var last = text.pop();
        return text.join(" ") + (text.length > 0 ? " <span class='cat_white'>" + last + "</span>" : last);
    });
</script>
<script>
    $('.table_live_veiw').click(function(){
        var buttonId = $(this).attr('id');
        $('#modal-container').removeAttr('class').addClass(buttonId);
        $('body').addClass('modal-active');
    })

    $('#btn-close-modal').click(function(){
        $('#modal-container').addClass('out');
        $('body').removeClass('modal-active');
    });
</script>
