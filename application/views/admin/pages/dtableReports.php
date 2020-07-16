

<div class="robust-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="breadcrumb-wrapper col-xs-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">قائمة التقارير المصورة
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
                                <h4 class="card-title"><i class="icon-tag"></i> قائمة التقارير المصورة</h4>
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
                                    <div class="buttons-group ">
                                        <a href="addVideo" class="btn btn-info float-md-right"><i class="icon-plus4"></i> إضافة فيديو</a>
                                    </div>

                                    <table class="table table-striped table-bordered dataex-fixh-responsive">
                                        <thead>
                                        <th>رقم التقرير</th>
                                        <th>اسم التقرير</th>
                                        <th>المشاهدات</th>
                                        <th>التاريخ والوقت</th>
                                        <th>العمليات</th>

                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($Reports as $reports)
                                        {?>
                                            <tr>
                                                <td><?php  echo $reports->id ?></td>
                                                <td><a target="_blank" href="<?php  echo $reports->link_youtube ?>"><?php  echo $reports->title ?></a></td>
                                                <td><?php echo $reports->view_count ?></td>
                                                <td><?php echo ArabicDate($reports->created_at); ?></td>

                                                <td>
                                                    <a  href="<?php echo base_url().'admin/updateVideo/'.$reports->id?>"><i class="fa fa-pencil info" title="Edit" style="font-size: 20px;"></i></a>
                                                    <a class="btndelete"><i class="fa fa-trash danger" title="Delete" style="font-size: 20px; margin-right: 10px;"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>رقم الفيديو</th>
                                            <th>اسم الفيديو</th>
                                            <th>المشاهدات</th>
                                            <th>التاريخ والوقت</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Responsive integration table -->
        </div>

        <div class="modal fade text-xs-left" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel1"> حذف تقرير مصور </h4>
                    </div>
                    <form  id="form-delete" >
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="fa  fa-warning danger " style="font-size: 30px; margin-right: 50px;"></i>
                                </div>
                                <input type="hidden" class="form-control" name="videoid" placeholder="" id="videoid2"  >
                                <div class="form-group" >
                                    <h5 class="col-md-8  control-label" >هل تريد حذف التقرير؟! </h5>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>


<script>


    $('.btndelete').on('click',function (e) {
        // alert(1);
        e.preventDefault();
        var txt=$(this).parent().prev().prev().prev();
        $('#videoid2').val(txt.prev().text());
        $('#delete').modal('show');
    });


    $(document).on('click','#delete1',function () {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('admin/deleteVideo/');?>",
            data: {
                'videoID':$('#videoid2').val()},
            cache:false,
            success:
                function(data){
                    $('#delete').modal('hide');
                    window.location.reload();
                }
        });// you have missed this bracket
    });

</script>

