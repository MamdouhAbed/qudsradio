

<div class="robust-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
                    </li>
<!--                    <li class="breadcrumb-item"><a href="--><?php //echo base_url();?><!--admin/dtableUsers">المستخدمين</a>-->
<!--                    </li>-->
                    <li class="breadcrumb-item active"> تعديل بيانات المستخدم
                    </li>
                </ol>
            </div>

            <div class="content-header-lead col-xs-12 mt-1">

            </div>
        </div>
        <div class="content-body">
            <!-- Responsive integration table -->
            <section id="responsive">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="icon-user"></i> تعديل بيانات المستخدم</h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="nav nav-tabs nav-top-border no-hover-bg nav-justified">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="baseOnlyIcon-tab11" data-toggle="tab" href="#tabOnlyIcon11" aria-controls="tabOnlyIcon11" aria-expanded="true"><i class="icon-grid2"></i> بيانات المستخدم</a>
                                                </li>
<!--                                                --><?php //if($this->session->userdata('role')==1){?>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="baseOnlyIcon-tab12" data-toggle="tab" aria-controls="tabOnlyIcon12" href="#tabOnlyIcon12" aria-expanded="false"><i class="icon-head"></i>صلاحيات المستخدم</a>
                                                    </li>
<!--                                                --><?php //} ?>


                                            </ul></div></div>
                                    <form class="form" novalidate="" action="<?php echo base_url().'admin/saveUpdateUser/'.$user->id?>" method="post" enctype="multipart/form-data"/>
                                    <div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane fade in active" id="tabOnlyIcon11" aria-expanded="false" aria-labelledby="baseOnlyIcon-tab11">
                                            <br>
                                            <div class="form-body">

                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right">اسم المستخدم:</label>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text" id="issueinput2" name="username" class="form-control" placeholder="اسم المستخدم" required=""
                                                                       data-validation-required-message="أدخـل اسم المستخـدم"  data-toggle="tooltip" data-trigger="hover"
                                                                       data-title="اسم المستخدم" value="<?php  echo $user->name ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right">الايميل:</label>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="email" name="email" class="form-control" placeholder="الايميل" required=""
                                                                       data-validation-required-message="أدخـل الايميـل" data-toggle="tooltip"
                                                                       data-trigger="hover" data-title="الايميل" value="<?php  echo $user->email ?>" />
                                                            </div></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right" >اضافة صورة:</label>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="file"  name="userfile" id="filesToUpload"  class="form-control"  placeholder="" data-toggle="tooltip"
                                                                       data-trigger="hover" data-placement="top" data-title=""/>
                                                            </div></div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right">كلمة المرور:</label>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="password" name="password" class="form-control" placeholder="كلمة المرور"  data-toggle="tooltip" data-trigger="hover" data-title="كلمة المرور"/>
                                                            </div></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tabOnlyIcon12" aria-labelledby="baseOnlyIcon-tab12" aria-expanded="false">
                                            <br>
                                            <div class="col-md-4">
                                                <h6 class="form-section"> الصلاحيات الرئيسية :</h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <fieldset>
                                                        <input type="checkbox" id="input-1" name="admin" <?php  if(in_array(1,$users)) echo 'checked';?> value="1"/>
                                                        <label for="input-1">مدير عام</label>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-1">
                                                    <fieldset>
                                                        <input type="checkbox" id="input-2" name="supervisor" <?php  if(in_array(2,$users)) echo 'checked';?><?php  if(in_array(1,$users)) echo 'checked disabled';?> value="1"/>
                                                        <label for="input-2">مشرف عام</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-1">
                                                    <fieldset>
                                                        <input type="checkbox" id="input-3"  <?php  if(in_array(3,$users)||in_array(5,$users)||in_array(6,$users)||in_array(7,$users)||in_array(8,$users)||in_array(9,$users)||in_array(10,$users)||in_array(14,$users)||in_array(15,$users)) echo 'checked';?><?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?> />
                                                        <label for="input-3">أقسام رئيسية</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-1">
                                                    <fieldset>
                                                        <input type="checkbox" id="input-4" <?php  if(in_array(4,$users)||in_array(11,$users)||in_array(12,$users)) echo 'checked';?><?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?> />
                                                        <label for="input-4">مشرف قسم</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div id="cat_role" <?php  if(in_array(3,$users)||in_array(5,$users)||in_array(6,$users)||in_array(7,$users)||in_array(8,$users)||in_array(9,$users)||in_array(10,$users)||in_array(14,$users)||in_array(15,$users)) echo 'style=display:block';?>>

                                                <div class="col-md-4">
                                                    <h6 class="form-section" style="margin-bottom: 30px"> الصلاحيات على الأقسام :</h6>
                                                </div>
                                                <div class="row chall">
                                                    <div class="col-md-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="all1" name="all_category" <?php  if(in_array(3,$users)) echo 'checked';?><?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?> value="1" />
                                                            <label for="all1">الكـــــــل</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="chinput1">
                                                    <div class="col-md-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="input-5" class="ch" name="programs" <?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?><?php  if(in_array(3,$users)||in_array(5,$users)) echo 'checked';?> value="1"/>
                                                            <label for="input-5">البرامج</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="input-6" class="ch" name="episodes" <?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?><?php  if(in_array(3,$users)||in_array(6,$users)) echo 'checked';?> value="1" />
                                                            <label for="input-6">الحلقات</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="input-7" class="ch" name="media" <?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?><?php  if(in_array(3,$users)||in_array(7,$users)) echo 'checked';?> value="1" />
                                                            <label for="input-7">الفيديو</label>
                                                        </fieldset><br>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="input-8" class="ch" name="letters" <?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?><?php  if(in_array(3,$users)||in_array(8,$users)) echo 'checked';?> value="1" />
                                                            <label for="input-8">نشرات الأخبار</label>
                                                        </fieldset><br>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="input-9" class="ch" name="breaknews" <?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?><?php  if(in_array(3,$users)||in_array(9,$users)) echo 'checked';?> value="1" />
                                                            <label for="input-9">أخبار عاجلة</label>
                                                        </fieldset><br>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="input-10" class="ch" name="ads" <?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?><?php  if(in_array(3,$users)||in_array(10,$users)) echo 'checked';?> value="1" />
                                                            <label for="input-10">الاعلانات</label>
                                                        </fieldset><br>
                                                    </div>
                                                        <div class="col-md-1">
                                                            <fieldset>
                                                                <input type="checkbox" id="input-14" class="ch" name="live" <?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?><?php  if(in_array(3,$users)||in_array(14,$users)) echo 'checked';?> value="1" />
                                                                <label for="input-14">البث المباشر</label>
                                                            </fieldset><br>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <fieldset>
                                                                <input type="checkbox" id="input-15" class="ch" name="private_file" <?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?><?php  if(in_array(3,$users)||in_array(15,$users)) echo 'checked';?> value="1" />
                                                                <label for="input-15">ملف خاص</label>
                                                            </fieldset><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div id="news_role" <?php  if(in_array(4,$users)||in_array(11,$users)||in_array(12,$users)) echo 'style=display:block';?>>

                                                <div class="col-md-4">
                                                    <h6 class="form-section" style="margin-bottom: 30px"> الصلاحيات على الأقسام الإخبارية :</h6>
                                                </div>
                                                <div class="row chall">
                                                    <div class="col-md-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="all2" name="all_catnews" <?php  if(in_array(4,$users)) echo 'checked';?><?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?> value="1" />
                                                            <label for="all2">الكـــــــل</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="chinput2">
                                                    <div class="col-md-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11" class="ch" name="reports" <?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?><?php  if(in_array(4,$users)||in_array(11,$users)) echo 'checked';?> value="1" />
                                                            <label for="input-11">تقارير إذاعية</label>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <fieldset>
                                                            <input type="checkbox" id="input-12" class="ch" name="interviews" <?php  if(in_array(1,$users)||in_array(2,$users)) echo 'checked disabled';?><?php  if(in_array(4,$users)||in_array(12,$users)) echo 'checked';?> value="1" />
                                                            <label for="input-12">مقابلات إذاعية</label>
                                                        </fieldset>
                                                    </div>
                                                        </div>
                                                </div>
                                            </div>
                                            <br><br>
                                        </div>


                                        <div class="form-actions">
                                            <div class="text-xs-right">
                                                <button type="submit" class="btn btn-success"> تنفيذ <i class="icon-thumbs-up position-right"></i></button>
                                                <button type="reset" class="btn btn-danger"> مسح الحقول <i class="icon-refresh position-right"></i></button>
                                            </div></div>
                                    </div>



                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Responsive integration table -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<!-- @start 5-7-2020 Mamdouh-->

<script>
    $('#input-1').change(function(){
        var x = document.getElementById("cat_role");
        var y = document.getElementById("news_role");
        if($(this).is(":checked")) {
            x.style.display = "none";
            y.style.display = "none";
            $('#input-2,#input-3,#input-4,#input-5,#input-6,#input-7,#input-8,#input-9,#input-10,#input-14,#input-15,#input-11,#input-12,#all1,#all2').prop('checked', true);
            $('#input-2,#input-3,#input-4,#input-5,#input-6,#input-7,#input-8,#input-9,#input-10,#input-14,#input-15,#input-11,#input-12,#all1,#all2').prop('disabled', true);
        } else {
            $('#input-2,#input-3,#input-4,#input-5,#input-6,#input-7,#input-8,#input-9,#input-10,#input-14,#input-15,#input-11,#input-12,#all1,#all2').prop('checked', false);
            $('#input-2,#input-3,#input-4,#input-5,#input-6,#input-7,#input-8,#input-9,#input-10,#input-14,#input-15,#input-11,#input-12,#all1,#all2').prop('disabled', false);
        }
    });
</script>
<script>
    $('#input-2').change(function(){
        var x = document.getElementById("cat_role");
        var y = document.getElementById("news_role");
        if($(this).is(":checked")) {
            x.style.display = "none";
            y.style.display = "none";
            $('#input-3,#input-4,#input-5,#input-6,#input-7,#input-8,#input-9,#input-10,#input-14,#input-15,#input-11,#input-12,#all1,#all2').prop('checked', true);
            $('#input-3,#input-4,#input-5,#input-6,#input-7,#input-8,#input-9,#input-10,#input-14,#input-15,#input-11,#input-12,#all1,#all2').prop('disabled', true);
        } else {
            $('#input-3,#input-4,#input-5,#input-6,#input-7,#input-8,#input-9,#input-10,#input-14,#input-15,#input-11,#input-12,#all1,#all2').prop('checked', false);
            $('#input-3,#input-4,#input-5,#input-6,#input-7,#input-8,#input-9,#input-10,#input-14,#input-15,#input-11,#input-12,#all1,#all2').prop('disabled', false);
        }
    });
</script>
<script>
    var checkAllBox = document.querySelector(".chall #all1")
    var checkBoxes = document.querySelectorAll(".chinput1 .ch")

    checkAllBox.addEventListener('click', function() {
        checkBoxes.forEach(function(e) {
            e.checked = checkAllBox.checked
        })
    })

    document.querySelector(".chall .chinput1").addEventListener('click', function() {
        var allChecked = true
        checkBoxes.forEach(function(box) {
            if (!box.checked) allChecked = false;
        });
        checkAllBox.checked = allChecked;
    });


</script>

<script>
    var checkAllBox2 = document.querySelector(".chall #all2")
    var checkBoxes2 = document.querySelectorAll(".chinput2 .ch")

    checkAllBox2.addEventListener('click', function() {
        checkBoxes2.forEach(function(e) {
            e.checked = checkAllBox2.checked
        })
    })

    document.querySelector(".chall .chinput2").addEventListener('click', function() {
        var allChecked2 = true
        checkBoxes2.forEach(function(box) {
            if (!box.checked) allChecked2 = false;
        });
        checkAllBox2.checked = allChecked2;
    });


</script>
<script>
    $('#input-3').change(function(){
        var x = document.getElementById("cat_role");
        if($(this).is(":checked")) {
            x.style.display = "block";
            $('#all1,#input-5,#input-6,#input-7,#input-8,#input-9,#input-10,#input-14,#input-15').prop('checked', true);
        } else {
            x.style.display = "none";
            $('#all1,#input-5,#input-6,#input-7,#input-8,#input-9,#input-10,#input-14,#input-15').prop('checked', false);
        }
    });
</script>
<script>
    $('#input-4').change(function(){
        var x = document.getElementById("news_role");
        if($(this).is(":checked")) {
            x.style.display = "block";
            $('#all2,#input-11,#input-12').prop('checked', true);
        } else {
            x.style.display = "none";
            $('#all2,#input-11,#input-12').prop('checked', false);

        }
    });
</script>