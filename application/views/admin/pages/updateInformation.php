

<div class="robust-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
                    </li>
                    <!--                    <li class="breadcrumb-item"><a href="--><?php //echo base_url();?><!--admin/dtableUsers">المستخدمين</a>-->
                    <!--                    </li>-->
                    <li class="breadcrumb-item active"> تعديل بياناتي الشخصية
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
            <section id="responsive">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="icon-user"></i> تعديل بياناتي الشخصية</h4>
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

                                    <form class="form" novalidate="" action="<?php echo base_url().'admin/saveUpdateInformation/'?>" method="post" enctype="multipart/form-data"/>

                                    <div class="form-body">

                                        <div class="row">
                                            <label class="col-md-2 text-xs-right">اسم المستخدم:</label>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <input type="text" id="issueinput2" name="username" class="form-control" placeholder="اسم المستخدم" required=""
                                                               data-validation-required-message="أدخـل اسم المستخـدم"  data-toggle="tooltip" data-trigger="hover"
                                                               data-title="اسم المستخدم" value="<?php  echo $users2->name ?>" />
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
                                                               data-trigger="hover" data-title="الايميل" value="<?php  echo $users2->email ?>" />
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



                                    <div class="form-actions">
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-success"> تنفيذ <i class="icon-thumbs-up position-right"></i></button>
                                            <button type="reset" class="btn btn-danger"> مسح الحقول <i class="icon-refresh position-right"></i></button>
                                        </div></div>



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


