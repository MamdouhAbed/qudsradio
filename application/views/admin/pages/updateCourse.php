<div class="robust-content content container-fluid" xmlns="">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dtableCourse">البرامج</a>
                    </li>
                    <li class="breadcrumb-item active">تعديل برنامج
                    </li>
                </ol>
            </div>

            <div class="content-header-lead col-xs-12 mt-1">

            </div>
        </div>
        <div class="content-body">
            <!-- Responsive integration table -->
            <section id="responsive" class="input-validation checkbox-validation">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="icon-tag"></i> تعديل برنامج </h4>
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
                                        <div class="col-md-8">
                                            <ul class="nav nav-tabs nav-top-border no-hover-bg nav-justified">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="baseOnlyIcon-tab11" data-toggle="tab" href="#tabOnlyIcon11" aria-controls="tabOnlyIcon11" aria-expanded="true"><i class="icon-grid2"></i> بيانات البرنامج</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseOnlyIcon-tab12" data-toggle="tab" aria-controls="tabOnlyIcon12" href="#tabOnlyIcon12" aria-expanded="false"><i class="icon-contract"></i>مواعيد البث</a>
                                                </li>


                                            </ul></div></div><br>
                                    <form class="form" novalidate="" action="<?php echo base_url().'admin/saveUpdateCourse/'.$Course->id?>" method="post" onsubmit="return validateForm()" enctype="multipart/form-data"/>
                                    <div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane fade in active" id="tabOnlyIcon11" aria-expanded="false" aria-labelledby="baseOnlyIcon-tab11">
                                            <br>
                                    <div class="form-body">
                                        <div class="row">
                                            <label class="col-md-2 text-xs-right"> اسم البرنامج:</label>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <input type="text" value="<?php  echo $Course->name ?>" id="issueinput1" class="form-control" required="" data-validation-required-message=" اسم البرنامج" placeholder="اسم البرنامج" name="course_name" data-toggle="tooltip" data-trigger="hover"  data-title="اسم البرنامج" />
                                                    </div></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-xs-right"> مقدم البرنامج:</label>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <input type="text" value="<?php  echo $Course->presenter_program ?>" id="issueinput1" class="form-control" required="" data-validation-required-message=" مقدم البرنامج" placeholder="مقدم البرنامج" name="presenter_program" data-toggle="tooltip" data-trigger="hover"  data-title="مقدم البرنامج" />
                                                    </div></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-xs-right"> وصف البرنامج:</label>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <input type="text" value="<?php  echo $Course->description ?>" id="issueinput1" class="form-control" required="" data-validation-required-message=" وصف البرنامج" placeholder="وصف البرنامج" name="description" data-toggle="tooltip" data-trigger="hover"  data-title="وصف البرنامج" />
                                                    </div></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-2 text-xs-right"> الشريحة:</label>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <input type="text" value="<?php  echo $Course->target_group ?>" id="issueinput1" class="form-control" required="" data-validation-required-message=" الشريحة" placeholder="الشريحة" name="target_group" data-toggle="tooltip" data-trigger="hover"  data-title="الشريحة" />
                                                    </div></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label class="col-md-2 text-xs-right" > صورة البرنامج :</label>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <input type="file"  accept="image/x-png,image/gif,image/jpeg" name="course_img" id="filesToUpload"  class="form-control"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                                                    </div></div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-2 col-sm-2 text-xs-right">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <input type="checkbox" <?php  if($Course->important==1) echo 'checked';?> id="input-155" name="important" value="1" />
                                                        <label for="input-155">تعيينه كأهم البرامج</label>
                                                    </div></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div id="presenter" <?php  if($Course->important==1){ echo 'style="display:block"';} else {echo 'style="display:none"';}?>>
                                                <label class="col-md-2 text-xs-right" > صورة مقدم البرنامج :</label>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <input type="file"  accept="image/x-png,image/gif,image/jpeg" name="presenter_img" id="filesToUpload"  class="form-control"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                                                        </div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $('#input-155').change(function(){
                                                var x = document.getElementById("presenter");
                                                if($(this).is(":checked")) {
                                                    x.style.display = "block";
                                                } else {
                                                    x.style.display = "none";

                                                }
                                            });
                                        </script>


                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 ">
                                                <div class="controls">
                                                    <div class="skin skin-square">
                                                        <input type="checkbox" <?php  if($Course->activated==1) echo 'checked';?> name="hide_home" value="1" id="input-15"  />
                                                        <label for="input-15">التفعيل</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        </div>

                                    <div class="tab-pane fade" id="tabOnlyIcon12" aria-labelledby="baseOnlyIcon-tab12" aria-expanded="false">
                                        <br>
                                        <div class="form-body" id="live">
                                            <?php
                                            $i = 0;
                                            foreach ($ProgramLive as $programlive)
                                            { $i++; ?>
                                            <div class="row programlive" id="row2<?php echo $i?>">
                                                <label class="col-md-1 text-xs-right">الساعة: </label>
                                                <div class="col-md-2 col-sm-2 col-xs-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
								<span class="input-group-addon">
									<span class="icon-clock5"></span>
								</span>
                                                            <input type='time' class="form-control" required name="live_time<?php echo $i?>" value="<?php  echo $programlive->time ?>" placeholder="" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <label class="col-md-1 text-xs-right">اليــوم: </label>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <select name="day<?php echo $i?>" class="form-control">
                                                            <?php
                                                            foreach ($Days as $day)
                                                            {?>
                                                            <option value="<?php  echo $day->id ?>" <?php if($programlive->day_id==$day->id) echo 'selected'?>><?php  echo $day->name ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <label class="col-md-1 text-xs-right">نوع البــث: </label>
                                                <div class="col-md-2 col-sm-2 col-xs-12">
                                                    <div class="form-group">
                                                        <select id="issueinput53" name="live_type<?php echo $i?>" required="" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="نوع البث">

<!--                                                            <option value="--><?php // echo $programlive->type ?><!--">--><?php //if($programlive->type==1) echo 'مباشر'; else echo 'إعادة'; ?><!--</option>-->
                                                            <option value="1" <?php if($programlive->type==1) echo 'selected'?>>مباشر</option>
                                                            <option value="2" <?php if($programlive->type==2) echo 'selected'?>>إعادة</option>
                                                            <option value="3" <?php if($programlive->type==3) echo 'selected'?>>إعادة2</option>
                                                            <option value="4" <?php if($programlive->type==4) echo 'selected'?>>إعادة3</option>
                                                            <option value="5" <?php if($programlive->type==5) echo 'selected'?>>إعادة4</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1"><button type="button" name="remove" class="remove_field_button2<?php echo $i?> btn btn-danger"><i class="icon-minus4"></i></button></div>
                                            </div>

                                                <script>
                                                    $(document).on('click','.remove_field_button2<?php echo $i?>', function () {
                                                        var btn_id = $(this).attr("id");
                                                        $('#row2<?php echo $i?>').remove();
                                                    }) ;

                                                </script>

                                            <?php }?>
                                            <div class="form-body row">
                                                <div class="col-md-10"></div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <button type="button" name="plus" class="plus2 btn btn-success"><i class="icon-plus"></i></button></div>
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function () {

                                                    var i = <?php echo $i?>;
                                                    $(document).on('click','.plus2', function () {
                                                        i++;
                                                        $("#live").append('<div class="row programlive" id="row2'+i+'"><label class="col-md-1 text-xs-right">الساعة: </label><div class="col-md-2 col-sm-2 col-xs-12"><div class="form-group">'+
                                                            '<div class="input-group"><span class="input-group-addon"><span class="icon-clock5"></span></span>'+
                                                            '<input type="time" class="form-control" name="live_time'+i+'" value="" placeholder="" /></div></div></div>'+
                                                            '<label class="col-md-1 text-xs-right">اليــوم: </label><div class="col-md-3">'+
                                                            '<select name="day'+i+'" class="form-control">'+
                                                            '<option value="1">السبت</option><option value="2">الأحد</option><option value="3">الاثنين</option><option value="4">الثلاثاء</option>'+
                                                            '<option value="5">الأربعاء</option><option value="6">الخميس</option><option value="7">الجمعة</option></select></div>'+
                                                            '<label class="col-md-1 text-xs-right">نوع البــث: </label><div class="col-md-2 col-sm-2 col-xs-12">'+
                                                            '<div class="form-group"><select id="issueinput53" name="live_type'+i+'" required="" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="نوع البث">'+
                                                            '<option value="1">مباشر</option><option value="2">إعادة</option><option value="3">إعادة 2</option><option value="4">إعادة 3</option><option value="5">إعادة 4</option></select></div></div>'+
                                                            '<div class="col-md-2"><button type="button" name="remove" id="'+i+'" class="remove_field_btn btn btn-danger"><i class="icon-minus4"></i></button></div></div>');

                                                    });
                                                    $(document).on('click','.remove_field_btn', function () {
                                                        var btn_id = $(this).attr("id");
                                                        $('#row2'+btn_id+'').remove();
                                                    }) ;
                                                });
                                            </script>

                                        </div>

                                    </div>


                                    <div class="form-actions">
                                        <div class="text-xs-right">
                                            <button type="submit" value = "upload" name="fileSubmit" class="btn btn-success"> تنفيذ <i class="icon-thumbs-up position-right"></i></button>
                                            <button type="reset" class="btn btn-danger"> مسح الحقول <i class="icon-refresh position-right"></i></button>
                                        </div>
                                    </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <script src='<?php echo base_url()?>admin-assets/js/tinymce/tinymce.min.js'></script>
            <script src="<?php echo base_url()?>admin-assets/js/index.js" type="text/javascript"></script>
        </div>
    </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->



