<style>
    .newsltr::before {
        background-color: rgba(2,99,116,0.5);
        bottom: 0;
        content: "";
        display: inline-block;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        z-index: 1;
    }
    .newsltr {
        height: 170px;
    }
    .embed-responsive {
        height: 170px;
    }
    .search_panel{
        position: absolute;
        top: 10px;
        right: 180px;
        width: 30%;
    }
    .search{
        border: none;
        height: 40px;
        border-radius: 0px;
        padding: 12px;
        box-shadow: none;
    }
    .search::placeholder{
        color: #e0dfdf;
        font-size: 16px;
    }
    .search[type="text"]{
        padding-right: 45px;
    }
    .search:focus{
        box-shadow: none;
    }
    .content-wrapper .form-group{
        position: relative;
        margin-bottom: 0;
    }
    .search_icon{
        position: absolute;
        top: 50%;
        transform: translate(0%,-50%);
        right: 15px;
    }
    #search button{
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: transparent;
        border: 0;
        color: inherit;
        outline: 0;
        padding: 0;
        display: block;
    }
    @media (max-width:767px) {
        .search_panel{
            position: inherit;
            width: 100%;
        }
    }
</style>
<div class="robust-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">قائمة البرامج
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

            <section id="image-grid" class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="icon-tag"></i> إدارة البرامج</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="search_panel">
                        <div class="form-group">
                            <form class="" action="<?php echo  base_url() ?>admin/searchProgram" method="get" >
                                <div id="search">
                                    <button id="button">
                                        <img src="<?php echo base_url();?>assets/image/icon/search-icon.svg" class="search_icon" alt="">
                                    </button>
                                    <div class="controls">
                                        <input type="text" id="input" name="keyword" class="form-control search" placeholder="ابحث في  البرامج" required="" data-validation-required-message="أدخـل كلمة بحث"  data-toggle="tooltip" data-trigger="hover" autocomplete="off" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))){?>
                    <div class="buttons-group btn-add-letter">
                        <a href="<?php echo base_url();?>admin/addCourse" class="btn btn-info float-md-right"><i class="icon-plus4"></i> إضافة برنامج</a>
                    </div>
                    <?php }?>
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
                    <div class="card-block">
                        <div class="card-deck-wrapper">
                            <div class="card-deck row dletter">
                                <?php
                                foreach ($Course as $course)
                                {?>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="card border-grey border-lighten-2">
                                            <div class="card-img-top embed-responsive embed-responsive-item embed-responsive-16by9">
                                                <div class="newsltr">
                                                    <img class="gallery-thumbnail" src="<?php echo base_url();?>thumb.php?src=<?php  echo $course->img ?>&size=227x170" />
                                                    <div class="entry-content">
                                                        <a href="<?php echo base_url();?>admin/course/<?php echo $course->id; ?>/episodes">عرض الحلقات</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-block text-xs-center">
                                                <h4 class="card-title"><?php  echo $course->name ?></h4>


                                            </div>
                                            <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))){?>
                                            <div class="text-xs-center btn_action">
                                                <a href="<?php echo base_url().'admin/updateCourse/'.$course->id?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-info"><span class="icon-edit"></span></a>
                                                <a id="<?php echo $course->id?>" class=" btndelete btn btn-social-icon mr-1 mb-1 btn-outline-danger"><span class="icon-trash"></span></a>
                                                <?php
                                                if ($course->activated == 1) {
                                                    echo "<span class=\" btn mr-1 mb-1 btn-success\">فعال</span>";
                                                } else {
                                                    echo "<span class=\" btn mr-1 mb-1 btn-disabled \">معطل</span>";
                                                }
                                                ?>
                                            </div>
                                            <?php } ?>
                                            <div class="insert_date text-xs-center">
                                                <?php echo ArabicDate($course->created_at); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                        <div class="text-xs-center">
                            <?php echo $pagination; ?>
                        </div>


                    </div>
                </div>

                <!--/ PhotoSwipe -->
            </section>

            <!--            <div class="wrap-pagination">-->

            <!--            </div>-->
        </div>

        <!-- Modal -->
        <div class="modal fade text-xs-left" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel1"> حذف البرنامج </h4>
                    </div>
                    <form  id="form-delete" >
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="fa  fa-warning danger " style="font-size: 30px; margin-right: 50px;"></i>
                                </div>
                                <input type="hidden" class="form-control" name="deptid" placeholder="" id="deptid2"  >
                                <div class="form-group" >
                                    <h5 class="col-md-8  control-label" >هل تريد حذف البرنامج؟! </h5>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" id="delete1" class="btn btn-primary">نعم</button>
                        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">لا</button>

                    </div>
                </div>
            </div>
        </div><!--End Modal -->
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<script>


    $('.btndelete').on('click',function (e) {
        // alert(1);
        e.preventDefault();
        var txt=$(this).attr('id');
        $('#deptid2').val(txt);
        $('#delete').modal('show');
    });


    $(document).on('click','#delete1',function () {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/deleteCourse');?>",
            data: {
                'courseID':$('#deptid2').val()},
            cache:false,
            success:
                function(data){
                    $('#delete').modal('hide');
                    window.location.reload();
                }
        });// you have missed this bracket
    });

</script>


