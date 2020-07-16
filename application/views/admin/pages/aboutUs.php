<div class="robust-content content container-fluid" xmlns="">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">الإعدادات
                    </li>
                </ol>
            </div>

            <div class="content-header-lead col-xs-12 mt-1">
                <?php if($this->session->has_userdata('success')){ ?>
                    <div class="alert alert-success" role="alert">
                        <i class="icon-checkmark"></i> &nbsp;<?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>
                <?php if($this->session->has_userdata('error')){ ?>
                    <div class="contact_form alert alert-danger" role="alert">
                        <i class="icon-close"></i> &nbsp;<?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="content-body">
            <!-- Responsive integration table -->
            <section id="responsive" class="input-validation checkbox-validation">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="icon-tag"></i> الإعدادات </h4>
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
                                        <div class="col-md-10">
                                            <ul class="nav nav-tabs nav-top-border no-hover-bg nav-justified">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="baseOnlyIcon-tab11" data-toggle="tab" href="#tabOnlyIcon11" aria-controls="tabOnlyIcon11" aria-expanded="true"><i class="icon-grid2"></i> بيانات الموقع</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseOnlyIcon-tab12" data-toggle="tab" aria-controls="tabOnlyIcon12" href="#tabOnlyIcon12" aria-expanded="false"><i class="icon-contract"></i>بيانات التواصل</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="baseOnlyIcon-tab13" data-toggle="tab" aria-controls="tabOnlyIcon13" href="#tabOnlyIcon13" aria-expanded="false"><i class="icon-social-android"></i>روابط السوشيال ميديا</a>
                                                </li>

                                            </ul></div></div><br>
                                    <form class="form" novalidate="" action="<?php echo base_url().'admin/updateDetails'?>" method="post" enctype="multipart/form-data"/>
                                    <div class="tab-content px-1 pt-1">
                                        <div role="tabpanel" class="tab-pane fade in active" id="tabOnlyIcon11" aria-expanded="false" aria-labelledby="baseOnlyIcon-tab11">
                                            <br>

                                            <div class="form-body">
                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right">قوالب الأخبار الرئيسية :</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <select id="issueinput52" name="home_news" required="" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="قالب الخبر الرئيسي">

                                                                <option value="1" <?php if($About->home_style==1) echo 'selected'?> >قالب 1 ( 3 أخبار رئيسية )</option>
                                                                <option value="2" <?php if($About->home_style==2) echo 'selected'?>>قالب 2 ( خبرين رئيسيين + أحداث الساعة )</option>
                                                                <option value="3" <?php if($About->home_style==3) echo 'selected'?>>قالب 3 ( 5 أخبار سلايدر + أحداث الساعة )</option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right"> تردد الإذاعة:</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text" id="issueinput1" class="form-control" value="<?php if($About !=null) echo $About->frequency ?>" required="" data-validation-required-message="تردد القناة" placeholder="تردد القناة" name="frequency" data-toggle="tooltip" data-trigger="hover"  data-title="تردد القناة" />
                                                            </div></div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right" >تعريف بالإذاعة :</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <textarea id="issueinput4" rows="10" class="form-control editor" name="txt" placeholder="النص"
                                                                          data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="النص" ><?php if($About !=null) echo $About->about_txt ?></textarea>
                                                            </div></div></div>
                                                </div>


                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right" > خلفية المشغل :</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="file"  accept="image/x-png,image/gif,image/jpeg" name="quds_img" id="filesToUpload"  class="form-control"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                                                            </div></div>
                                                    </div>

                                                </div>
                                                <div class="row" hidden>
                                                    <label class="col-md-2 text-xs-right" > مسار الصورة :</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text"  value="<?php  echo $About->img ?>" name="about_img"  class="form-control" />
                                                            </div></div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="tabOnlyIcon12" aria-labelledby="baseOnlyIcon-tab12" aria-expanded="false">
                                            <br>
                                            <div class="form-body">
                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right"> الموقع:</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text" id="site" class="form-control" value="<?php if($About !=null) echo $About->site ?>" required="" data-validation-required-message="الموقع"  placeholder="الموقع" name="site" data-toggle="tooltip" data-trigger="hover"  data-title="الموقع " />
                                                            </div></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right"> البريد الإلكتروني:</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="email" id="email" class="form-control" value="<?php if($About !=null) echo $About->email ?>" required="" data-validation-required-message="البريد الالكتروني" placeholder="البريد الالكتروني" name="email" data-toggle="tooltip" data-trigger="hover"  data-title="البريد الالكتروني" />
                                                            </div></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right"> الهاتف:</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text" id="phone" class="form-control" value="<?php if($About !=null) echo $About->phone ?>" required="" data-validation-required-message="الهاتف" placeholder="الهاتف" name="phone" data-toggle="tooltip" data-trigger="hover"  data-title="الهاتف" />
                                                            </div></div>
                                                    </div>
                                                </div>

                                            </div>

                                            <br><br>

                                        </div>
                                        <div class="tab-pane fade" id="tabOnlyIcon13" aria-labelledby="baseOnlyIcon-tab13" aria-expanded="false">
                                            <br>
                                            <div class="form-body">
                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right"> رابط الفيس بوك:</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text" id="fb" class="form-control" value="<?php if($About !=null) echo $About->facebook_link ?>"  placeholder="الفيس بوك" name="fb_name" data-toggle="tooltip" data-trigger="hover"  data-title="الفيس بوك" />
                                                            </div></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right"> رابط الانستجرام:</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text" id="tw" class="form-control" value="<?php if($About !=null) echo $About->instagram_link ?>"  placeholder="انستجرام" name="insta_name" data-toggle="tooltip" data-trigger="hover"  data-title="انستجرام" />
                                                            </div></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right"> رابط تويتر:</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text" id="mg" class="form-control" value="<?php if($About !=null) echo $About->twitter_link ?>" placeholder="تويتر" name="tw_name" data-toggle="tooltip" data-trigger="hover"  data-title="تويتر" />
                                                            </div></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right"> رابط اليوتيوب:</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text" id="yt" class="form-control" value="<?php if($About !=null) echo $About->tube_link ?>"  placeholder="اليوتيوب" name="yt_name" data-toggle="tooltip" data-trigger="hover"  data-title="اليوتيوب" />
                                                            </div></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label class="col-md-2 text-xs-right"> رابط الواتس أب:</label>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <input type="text" id="wp" class="form-control" value="<?php if($About !=null) echo $About->whatsapp_link ?>"  placeholder="الواتس أب" name="wp_name" data-toggle="tooltip" data-trigger="hover"  data-title="الواتس أب" />
                                                            </div></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <br><br>

                                        </div>
                                        <div class="form-actions">
                                            <div class="text-xs-right">
                                                <button type="submit" name="fileSubmit" class="btn btn-success"> تنفيذ <i class="icon-thumbs-up position-right"></i></button>
                                                <button type="reset" class="btn btn-danger"> مسح الحقول <i class="icon-refresh position-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <!--</form>-->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--</div>-->
            </section>

            <script src='<?php echo base_url()?>admin-assets/js/tinymce/tinymce.min.js'></script>
            <script src="<?php echo base_url()?>admin-assets/js/index.js" type="text/javascript"></script>
        </div>
    </div>
</div>

<script>
    window.setTimeout(function() {
        $(".alert-success, .alert-danger").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);

</script>
<!-- ////////////////////////////////////////////////////////////////////////////-->



