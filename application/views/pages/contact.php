<div class="page_content">
    <section class="content-wrapper contact">
        <div class="breadcrumb breadcrumb_top" xmlns="http://www.w3.org/1999/html">
            <ul>
                <li><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/image/icon/home.svg" class="home_post" alt=""> الرئيسية </a> / </li>
                <li class="_active">اتصل بنا</li>
            </ul>
        </div>
        <h3 class="cat_title">اتصل بنا</h3>
        <img src="<?php echo base_url();?>assets/image/contact2.png" class="contact_img img-responsive" alt="">
        <div class="contact-3">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact_box">
                    <i> <img src="<?php echo base_url();?>assets/image/icon/placeholder.svg" alt=""></i>
                        <div class="contact-title">المـوقع: </div>
                        <div class="contact-info"><?php echo $About->site; ?></div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="contact_box contact_email">
                    <i> <img src="<?php echo base_url();?>assets/image/icon/mail.svg" alt=""></i>
                        <div class="contact-title">الايميل: </div>
                        <div class="contact-info"><?php echo $About->email; ?></div>
                        </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="contact_box contact_mobile">
                    <i> <img src="<?php echo base_url();?>assets/image/icon/mobile-phone.svg" alt=""></i>
                        <div class="contact-title">الهاتف: </div>
                        <div class="contact-info"><?php echo $About->phone; ?></div>
                        </div>
                </div>

        </div>
        <?php if($this->session->has_userdata('success')){ ?>
            <div class="stu_alert">
                <div class="col-md-12 alert alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div></div>
        <?php } ?>
        <?php if($this->session->has_userdata('error')){ ?>
            <div class="stu_alert">
                <div class="col-md-12 alert alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div></div>
        <?php } ?>
        <div class="contact_form">

            <form data-fw-form-id="fw_form" novalidate="" action="<?php echo base_url().'saveContact'?>" method="post" enctype="multipart/form-data"  class="fw_form_fw_form form" data-fw-ext-forms-type="contact-forms">
                <div class="wrap-forms">
                    <div class="row c-gutter-20 c-mb-20">
                        <div class="col-xs-12 col-12 col-lg-6 col-sm-6 form-builder-item">
                            <div class="form-group has-placeholder">
                                <label for="id-3">الاسم			<sup>*</sup>		</label>
                                <i class="fa fa-user"></i>
                                <div class="controls">
                                    <input class="form-control" type="text" name="name" placeholder="الاسم" value="" id="id-3" required="" data-validation-required-message="هذا الحقل مطلوب">
                                    <div class="help-block"></div></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-12 col-lg-6 col-sm-6 form-builder-item">
                            <div class="form-group has-placeholder">
                                <label for="id-2">البريد الإلكتروني			<sup>*</sup>		</label>
                                <i class="fa fa-envelope"></i>
                                <div class="controls">
                                    <input class="form-control" type="email" name="email" placeholder="البريد الإلكتروني" value="" id="id-2" required="" data-validation-required-message="هذا الحقل مطلوب">
                                    <div class="help-block"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="row c-gutter-20 c-mb-20">
                        <div class="col-xs-12 col-12 col-lg-6 col-sm-6 form-builder-item">
                            <div class="form-group has-placeholder">
                                <label for="id-1">رقم الجوال			<sup>*</sup>		</label>
                                <i class="fa fa-phone"></i>
                                <div class="controls">
                                    <input class="form-control" type="number" name="mobile" maxlength="10" placeholder="رقم الجوال" value="" id="id-1" required="" data-validation-required-message="هذا الحقل مطلوب" data-validation-maxlength-message="رقم الجوال غير صحيح " data-validation-number-message="يجب ادخال رقم صحيح"  >
                                    <div class="help-block"></div></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-12 col-lg-6 col-sm-6 form-builder-item">
                            <div class="form-group has-placeholder">
                                <label for="id-4">الموضوع			<sup>*</sup>		</label>
                                <i class="fa fa-tag"></i>
                                <div class="controls">
                                    <input class="form-control" type="text" name="subject" placeholder="الموضوع" value="" id="id-4" required="" data-validation-required-message="هذا الحقل مطلوب">
                                    <div class="help-block"></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="row c-gutter-20 c-mb-20"><div class="col-xs-12 col-12 form-builder-item">
                            <div class="form-group has-placeholder">
                                <label for="id-5">نص الرسالة			<sup>*</sup>		</label>
                                <i class="fa fa-comment"></i>
                                <div class="controls">
                                    <textarea class="form-control" name="text" placeholder="نص الرسالة" id="id-5" required="" data-validation-required-message="هذا الحقل مطلوب"></textarea>
                                    <div class="help-block"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-forms btn_cont">
                    <div class="c-gutter-20 c-mb-20">
                        <div>
                            <button class="btn-contact" type="submit">أرسل</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<script src="<?php echo base_url();?>assets/js/jqBootstrapValidation.js"></script>
<script src="<?php echo base_url();?>assets/js/form-validation.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);

</script>