<style>
    .modal-header {
        background: #607d8b;
        color: #fff;
    }
    #form-update{
        overflow-y: scroll;
        height: 300px;
    }
    #form-update::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    #form-update::-webkit-scrollbar
    {
        width: 6px;
        background-color: #F5F5F5;
    }

    #form-update::-webkit-scrollbar-thumb
    {
        background-color: #607d8b;
    }
    @media (min-width: 992px){
        .modal-lg {
            max-width: 1000px !important;
        }
    }
</style>
<div class="robust-content content container-fluid">
    <div class="content-wrapper">
        <?php if($this->session->has_userdata('success')){ ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
<section id="responsive">
<div class="row match-height">

    <div class="col-xl-9 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">آخـر الأخبار</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="card-block">
                    <p> <a href="<?php echo base_url();?>admin/addNews" class="btn btn-info float-md-right"><i class="icon-plus4"></i> إضافة خبر</a> <span class="float-xs-left"><a href="<?php echo base_url();?>admin/dtableNews" >المزيد <i class="icon-arrow-left2"></i></a></span></p>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>رقم الخبر</th>
                            <th>عنوان الخبر</th>
                            <th>المشاهدات</th>
                            <th>المستخدم</th>
                            <th>التاريخ والوقت</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach (array_slice($News,0,5) as $news)
                        {?>
                            <tr>
                                <td><?php  echo $news->id ?></td>
                                <td><?php  echo $news->title ?></td>
                                <td><?php  echo $news->view_count ?></td>
                                <td><?php  echo $news->name ?></td>
                                <td><?php echo ArabicDate($news->created_at); ?></td>
                                <td>
                                    <a href="<?php echo base_url().'admin/updateNews/'.$news->id?>"><i class="fa fa-pencil info" title="Edit" style="font-size: 20px;"></i></a>
                                    <a class="btndelete"><i class="fa fa-trash danger" title="Delete" style="font-size: 20px; margin-right: 10px;"></i></a>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-12">
        <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))){?>
            <a class="btnupdate card card-inverse bg-info text-xs-center height-80-per">
                <div class="card-body">
                    <div class="card-block">
                        <!--                    <img src="--><?php //echo base_url();?><!--admin-assets/images/elements/photo.png" alt="element 05" height="110" class="mb-1" />-->
                        <h4 class="c_t m-0">برامج الدورة الحالية</h4>

                    </div>
                </div>
            </a>
        <?php } ?>
        <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(8,$this->session->userdata('roles'))){?>
        <a href="<?php echo base_url();?>admin/addLetter" class="card card-inverse bg-success text-xs-center height-80-per">
            <div class="card-body">
                <div class="card-block">
<!--                    <img src="--><?php //echo base_url();?><!--admin-assets/images/elements/mony.png" alt="عملات" height="110" class="mb-1" />-->
                    <h4 class="c_t m-0">إضافـة نشرة أخبار</h4>

                </div>
            </div>
        </a>
        <?php } ?>
        <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(5,$this->session->userdata('roles'))){?>
            <a href="<?php echo base_url();?>admin/addCourse" class="card card-inverse bg-inverse text-xs-center height-80-per">
                <div class="card-body">
                    <div class="card-block">
                        <!--                    <img src="--><?php //echo base_url();?><!--admin-assets/images/elements/photo.png" alt="element 05" height="110" class="mb-1" />-->
                        <h4 class="c_t m-0">إضافـة برنامج</h4>

                    </div>
                </div>
            </a>
        <?php } ?>
        <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(6,$this->session->userdata('roles'))){?>
        <a href="<?php echo base_url();?>admin/addEpisode" class="card card-inverse bg-warning text-xs-center height-80-per">
            <div class="card-body">
                <div class="card-block">
<!--                    <img src="--><?php //echo base_url();?><!--admin-assets/images/elements/photo.png" alt="element 05" height="110" class="mb-1" />-->
                    <h4 class="c_t m-0">إضافـة حلقة</h4>

                </div>
            </div>
        </a>
        <?php } ?>
        <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(7,$this->session->userdata('roles'))){?>
            <a href="<?php echo base_url();?>admin/addVideo" class="card card-inverse bg-primary text-xs-center height-80-per">
                <div class="card-body">
                    <div class="card-block">
                        <!--                    <img src="--><?php //echo base_url();?><!--admin-assets/images/elements/photo.png" alt="element 05" height="110" class="mb-1" />-->
                        <h4 class="c_t m-0">إضافـة فيديو</h4>

                    </div>
                </div>
            </a>
        <?php } ?>
        <?php if (in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||in_array(3,$this->session->userdata('roles'))||in_array(9,$this->session->userdata('roles'))){?>
        <a href="<?php echo base_url();?>admin/addBreakNew" class="card card-inverse bg-danger text-xs-center height-80-per">
            <div class="card-body">
                <div class="card-block">

                    <h4 class="c_t m-0">إضافـة خبـر عاجـل</h4>

                </div>
            </div>
        </a>
        <?php } ?>

    </div>
</div>
    </section>
        </div>

    <!-- Modal -->
    <div class="modal fade text-xs-left" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1"> حذف خبر  </h4>
                </div>
                <form  id="form-delete" >
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2">
                                <i class="fa  fa-warning danger " style="font-size: 30px; margin-right: 50px;"></i>
                            </div>
                            <input type="hidden" class="form-control" name="deptid" placeholder="" id="deptid2"  >
                            <div class="form-group" >
                                <h5 class="col-md-8  control-label" >هل تريد حذف الخبر؟! </h5>
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

    <!-- Modal -->
    <div class="modal fade text-xs-left" id="update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-lg modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel1">برامج الدورة الحالية</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                            <div class="has-feedback has-feedback-left col-md-6 " style="margin: 15px 0 10px 0">
                                <input type="search" id="myInput" data-search onkeyup="myFunction()" style="height: 33px;" class="form-control" placeholder="أدخل كلمة البحث ...">
                            </div>
                    </div>
                </div>
                <form action="<?php echo base_url().'admin/updateCourse'?>" method="Post" id="form-update" >
                    <div class="modal-body">
                        <div class="row">
                            <?php foreach ($Prog as $prog)
                            { ?>
                            <div class="col-md-3 col-sm-2 " id="list">
                                <div class="controls">
                                    <div class="skin skin-square" id="list_item">
                                        <input type="checkbox" <?php  if($prog->activated==1) echo 'checked';?> name="hide_home" value="1" id="input-15"  />
                                        <label data-filter-item data-filter-name="<?php echo $prog->name; ?>" for="input-15"><?php echo $prog->name; ?></label>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </form>
                <script>
                $('[data-search]').on('keyup', function() {
                var searchVal = $(this).val();
                var filterItems = $('[data-filter-item]');
                var filterItems55 = $('#list');

                if ( searchVal != '' ) {
                filterItems.addClass('hidden');
                filterItems55.addClass('hidden');
                $('[data-filter-item][data-filter-name*="' + searchVal.toLowerCase() + '"]').removeClass('hidden');
                } else {
                filterItems.removeClass('hidden');
                filterItems55.removeClass('hidden');
                }
                });
                </script>
<!--                <script>-->
<!--                    $(document).ready(function(){-->
<!--                        $("#myInput").on("keyup", function() {-->
<!--                            var value = $(this).val().toLowerCase();-->
<!--                            $("#list_item label").filter(function() {-->
<!--                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);-->
<!--                            });-->
<!--                        });-->
<!--                    });-->
<!--                </script>-->

<!--                <script>-->
<!--                    function myFunction() {-->
<!--                        var input, filter,list, list_item ,label, i, txtValue;-->
<!--                        input = document.getElementById("myInput");-->
<!--                        filter = input.value.toUpperCase();-->
<!--                        list = document.getElementById("list");-->
<!--                        list_item = list.getElementById("list_item");-->
<!--                        for (i = 0; i < list_item.length; i++) {-->
<!--                            label = list_item[i].getElementsByTagName("label")[0];-->
<!--                            txtValue = label.textContent || label.innerText;-->
<!--                            if (txtValue.toUpperCase().indexOf(filter) > -1) {-->
<!--                                list_item[i].style.display = "";-->
<!--                            } else {-->
<!--                                list_item[i].style.display = "none";-->
<!--                            }-->
<!--                        }-->
<!--                    }-->
<!--                </script>-->

                <div class="modal-footer">
                    <button type="button" id="save" class="btn btn-primary">حفظ التغييرات</button>
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>

                </div>
            </div>
        </div>
    </div><!--End Modal -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>


<script>


    $('.btndelete').on('click',function (e) {
        // alert(1);
        e.preventDefault();
        var txt=$(this).parent().prev().prev().prev().prev().prev().text();
        $('#deptid2').val(txt);
        $('#delete').modal('show');
    });


    $(document).on('click','#delete1',function () {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/deleteNews/');?>",
            data: {
                'deptID':$('#deptid2').val()},
            cache:false,
            success:
                function(data){
                    $('#delete').modal('hide');
                    window.location.reload();
                }
        });// you have missed this bracket
    });

    $('.btnupdate').on('click',function (e) {
        e.preventDefault();
        $('#update').modal('show');
    });
    $(document).on('click','#save',function () {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('admin/updateCourse/');?>",
            data: {'textbox': $("#deptname").val(),
                'deptID':$('#deptid').val()},
            dataType: "text",
            cache:false,
            success:
                function(data){
                    $('#update').modal('hide');
                    window.location.reload();
                }


        });// you have missed this bracket
    });

</script>
