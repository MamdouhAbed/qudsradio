<style>
    .newsltr {
        background-image: url(<?php echo base_url();?>admin-assets/images/icons/compact-disc-p.svg);
        background-repeat: no-repeat;
        background-position: 50% 50%;
        height: 110px;
    }
     .embed-responsive {
         height: 110px;
     }

</style>
<div class="robust-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">قائمة النشرات
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
                    <h4 class="card-title"><i class="icon-tag"></i> إدارة النشرات</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="buttons-group btn-add-letter">
                        <a href="<?php echo base_url();?>admin/addLetter" class="btn btn-info float-md-right"><i class="icon-plus4"></i> إضافة نشرة</a>
                    </div>
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
                                foreach ($Letters as $letters)
                                {?>
                                    <div class="col-md-3">
                                        <div class="card border-grey border-lighten-2">
                                            <div class="card-img-top embed-responsive embed-responsive-item embed-responsive-16by9">
                                                <div class="newsltr"></div>
<!--                                                <img class="gallery-thumbnail" src="--><?php //echo base_url();?><!--thumb.php?src=assets/image/radio_img.png&size=158x204" />-->
                                            </div>
                                            <div class="card-block text-xs-center">
                                                <h4 class="card-title"><?php  echo $letters->name ?></h4>


                                            </div>
                                            <div class="text-xs-center btn_action">
                                                <a href="<?php echo base_url().'admin/updateLetter/'.$letters->id?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-info"><span class="icon-edit"></span></a>
                                                <a id="<?php echo $letters->id?>" class=" btndelete btn btn-social-icon mr-1 mb-1 btn-outline-danger"><span class="icon-trash"></span></a>
                                                <a target="_blank" href="<?php echo base_url();?><?php  echo $letters->link ?>" class="btn btn-social-icon mr-1 mb-1 btn-outline-success"><span class="icon-music"></span></a>
                                            </div>
                                            <div class="insert_date text-xs-center">
                                               <?php echo ArabicDate($letters->created_at); ?>
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
                        <h4 class="modal-title" id="myModalLabel1"> حذف النشرة </h4>
                    </div>
                    <form  id="form-delete" >
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="fa  fa-warning danger " style="font-size: 30px; margin-right: 50px;"></i>
                                </div>
                                <input type="hidden" class="form-control" name="deptid" placeholder="" id="deptid2"  >
                                <div class="form-group" >
                                    <h5 class="col-md-8  control-label" >هل تريد حذف النشرة؟! </h5>
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
            url: "<?php echo site_url('admin/deleteLetter');?>",
            data: {
                'LetterID':$('#deptid2').val()},
            cache:false,
            success:
                function(data){
                    $('#delete').modal('hide');
                    window.location.reload();
                }
        });// you have missed this bracket
    });

</script>


