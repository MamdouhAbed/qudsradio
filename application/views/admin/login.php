<!DOCTYPE html>
<html lang="en" data-textdirection="RTL" class="loading">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="لوحة التحكم - قناة القدس اليوم" />
    <meta name="keywords" content="" />
    <meta name="author" content="PIXINVENT" />
    <title> تسجيل الدخول </title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>admin-assets/ico/apple-icon-60.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>admin-assets/ico/apple-icon-76.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>admin-assets/ico/apple-icon-120.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>admin-assets/ico/apple-icon-152.png" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>admin-assets/ico/favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>admin-assets/ico/favicon-32.png" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <link rel="stylesheet" href="<?php echo base_url();?>admin-assets/css/vendors.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>admin-assets/fonts/icomoon.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>admin-assets/css/app.min.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body data-open="click" data-menu="vertical-content-menu" data-col="1-column" class="vertical-layout vertical-content-menu 1-column bg-cyan bg-lighten-2">


<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="robust-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="col-md-4 offset-md-4  box-shadow-2 p-0 " style="margin-top: 30px">
                <div class="card border-grey border-lighten-3 px-2 py-2 row mb-0">
                    <div class="card-header no-border">
                        <div class="card-title text-xs-center">
                            <img src="<?php echo base_url()?>assets/logo/logo-login.png" alt="logo" />
                        </div>
<!--                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span> الدخـول إلى لوحة التحكم </span></h6>-->
                    </div>
                    <div class="card-body collapse in">
                        <div class="card-block">
                            <?php if($this->session->has_userdata('error')){ ?>
                                <div>
                                    <div class="alert alert-danger" role="alert">
                                        <i class="icon-close"></i> &nbsp;<?php echo $this->session->flashdata('error'); ?>
                                    </div></div>
                            <?php } ?>
                            <form class="form form-horizontal" action="<?php echo base_url().'admin/loginpost'?>" novalidate="" method="post" />
                            <div class="form-body">
                                <fieldset class="form-group has-feedback has-icon-left">
                                    <div class="controls">
                                        <input type="text" name="username" class="form-control input-lg" id="user-name" placeholder="اسم المستخدم" tabindex="1" required="" data-validation-required-message="الرجاء ادخال اسم المستخدم" />
                                    </div>
                                    <div class="form-control-position">
                                        <i class="icon-head"></i>
                                    </div>
                                    <div class="help-block font-small-3"></div>
                                </fieldset>
                                <fieldset class="form-group has-feedback has-icon-left">
                                    <input type="password" name="password" class="form-control input-lg" id="password" placeholder="كلمة المرور" tabindex="2" required="" data-validation-required-message="الرجاء ادخال كلمة المـرور" />
                                    <div class="form-control-position">
                                        <i class="icon-key3"></i>
                                    </div>
                                    <div class="help-block font-small-3"></div>
                                </fieldset>
                                <fieldset class="form-group row">
                                    <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                        <fieldset>
                                            <input type="checkbox" id="remember-me" class="chk-remember" />
                                            <label for="remember-me"> تذكرني</label>
                                        </fieldset>
                                    </div>
                                    <!--                                <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="./recover-pass.html" class="card-link">نسيت كلمة المرور؟</a></div>-->
                                </fieldset>
                                <button type="submit" class="btn btn-danger btn-block btn-lg"><i class="icon-unlock2"></i> دخول</button>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
</div>

<script src="<?php echo base_url()?>admin-assets/js/vendors.min.js"></script>
<script src="<?php echo base_url()?>admin-assets/js/plugins/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>admin-assets/js/components/forms/validation/form-validation.js" type="text/javascript"></script>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<script>
    window.setTimeout(function() {
        $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);

</script>
</body>
</html>