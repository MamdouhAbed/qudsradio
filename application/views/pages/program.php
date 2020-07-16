<div class="page_content">
    <section class="content-wrapper episode_news all_news programs_d">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li><a href="<?php echo base_url();?>program">البرامج</a></li>
                <li class="_active"> / <?php echo $Program->name; ?></li>
            </ul>
        </div>
        <h3 class="cat_title"><?php echo $Program->name; ?></h3>
        <div class="row">
        <div class="col-md-4 col-sm-5 program_box">
            <img src="<?php echo base_url();?>thumb.php?src=<?php echo $Program->img; ?>&size=277x300" class="" alt="">
        </div>
        <div class="col-md-8 col-sm-7">
            <div class="program_details">
              <p class="prog_d_title">مقدم البرنامج:</p>
              <p class="prog_d_txt"><?php echo $Program->presenter_program; ?></p>
            </div>
            <div class="clearfix"></div>
            <div class="program_details">
                <p class="prog_d_title">الموضوع:</p>
                <p class="prog_d_txt"><?php echo $Program->description; ?></p>
            </div>
            <div class="clearfix"></div>

            <div class="program_details">
                <p class="prog_d_title">الشريحة:</p>
                <p class="prog_d_txt"><?php echo $Program->target_group; ?></p>
            </div>
        </div>



        </div>
        <h3 class="cat_title cat_pro cat_shedule">جدول البرنامج: </h3>
        <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">العرض / اليوم</th>
                <th scope="col">السبت</th>
                <th scope="col">الأحد</th>
                <th scope="col">الاثنين</th>
                <th scope="col">الثلاثاء</th>
                <th scope="col">الأربعاء</th>
                <th scope="col">الخميس</th>
                <th scope="col">الجمعة</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($TypeLive as $typeLive){
             if ( $typeLive->type==1){
            ?>
            <tr>
                <th scope="row">العرض الأول</th>
                <?php
                foreach ($ProgramLive as $programlive)
                {?>
                <td><?php if($programlive->time!=null&&$programlive->type==$typeLive->type)  {echo ArabicDate4($programlive->time); }else {echo '-';}?></td>
                <?php }
                ?>
            </tr>
            <?php } if ( $typeLive->type==2){
                ?>
                <tr>
                    <th scope="row">إعادة</th>
                    <?php
                    foreach ($ProgramLive1 as $programlive)
                    {?>
                        <td><?php  if($programlive->time!=null&&$programlive->type==$typeLive->type) {echo ArabicDate4($programlive->time); }else {echo '-';}?></td>
                    <?php }
                    ?>
                </tr>
            <?php } if ( $typeLive->type==3){
                    ?>
                    <tr>
                        <th scope="row">إعادة2</th>
                        <?php
                        foreach ($ProgramLive2 as $programlive)
                        {?>
                            <td><?php  if($programlive->time!=null&&$programlive->type==$typeLive->type) {echo ArabicDate4($programlive->time); }else {echo '-';}?></td>
                        <?php }
                        ?>
                    </tr>
                <?php } if ( $typeLive->type==4){
                    ?>
                    <tr>
                        <th scope="row">إعادة3</th>
                        <?php
                        foreach ($ProgramLive3 as $programlive)
                        {?>
                            <td><?php  if($programlive->time!=null&&$programlive->type==$typeLive->type) {echo ArabicDate4($programlive->time); }else {echo '-';}?></td>
                        <?php }
                        ?>
                    </tr>
                <?php } if ( $typeLive->type==5){
                    ?>
                    <tr>
                        <th scope="row">إعادة4</th>
                        <?php
                        foreach ($ProgramLive4 as $programlive)
                        {?>
                            <td><?php  if($programlive->time!=null&&$programlive->type==$typeLive->type) {echo ArabicDate4($programlive->time); }else {echo '-';}?></td>
                        <?php }
                        ?>
                    </tr>
                <?php }
                ?>

            <?php }
            ?>

            </tbody>
        </table>
        </div>
        <h3 class="cat_title cat_pro">حلقات البرنامج: </h3>
        <div class="row">
            <?php
            foreach ($ProgramEpsd as $epsd)
            {?>
            <div class="col-md-3 col-xs-6 col-sm-4 last_episode">
                <a href="<?php echo base_url();?>program/episode/<?php echo $epsd->id; ?>">
                    <img src="<?php echo base_url();?>thumb.php?src=<?php echo $epsd->img; ?>&size=200x185" class="img-responsive img_episode" alt="">
                </a>
                <div class="news_title">
                    <p class="date_episode"><?php echo ArabicDate2($epsd->created_at); ?></p>
                    <a href="<?php echo base_url();?>program/episode/<?php echo $epsd->id; ?>">
                        <h3><img src="<?php echo base_url();?>assets/image/icon/headphone.svg" alt=""> <?php echo $epsd->name; ?></h3>
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