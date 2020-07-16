

    <div class="robust-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
              </li>
              <li class="breadcrumb-item active">قائمة الأخبار
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
					<h4 class="card-title"><i class="icon-tag"></i> قائمة الأخبار</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="buttons-group btn-add-letter">
                        <a href="<?php echo base_url();?>admin/addNews" class="btn btn-info float-md-right"><i class="icon-plus4"></i> إضافة خبر</a>
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
					<div class="card-block card-dashboard">
						<table class="table table-striped table-bordered" id="news_data">
							<thead>
							    
							     <th width="1%">رقم</th>
									<th width="27%">عنوان الخبر</th>
									<th width="3%">القسم</th>
                                    <th width="2%">الزوار</th>
									<th width="5%">المستخدم</th>
									 <?php if(in_array(1,$this->session->userdata('roles'))){?>
                                     <th width="5%">تعديل بواسطة</th>
                                 <?php } ?>
									<th width="25%">تاريخ الإضافة</th>
									<th width="12%"> مشاركة</th>
									<th width="10%">العمليات</th>

							</thead>
							<tbody style="font-size: 12px" id="t_body">
                           
							</tbody>

							<tfoot>
								<tr>
                                   <th>رقم</th>
                                    <th>عنوان الخبر</th>
                                    <th>القسم</th>
                                    <th>الزوار</th>
                                    <th>المستخدم</th>
                                    <?php if(in_array(1,$this->session->userdata('roles'))){?>
                                    <th>تعديل بواسطة</th>
                                    <?php } ?>
                                    <th>تاريخ الإضافة</th>
                                    <th>مشاركة</th>
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

      </div>
    </div>
    
     <style>
        .dataTables_processing{
            background: #967adc;
            color: #fff;
        }
    </style>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>-->


    <script>


        // $('.btndelete').on('click',function (e) {
        //     // alert(1);
        //     e.preventDefault();
        //     var txt=$(this).parent().prev().prev().prev().prev().prev().prev();
        //     $('#deptid2').val(txt.prev().text());
        //     $('#delete').modal('show');
        // });
        
         $('#t_body').on('click','.btndelete',function (e) {
            // alert(1);
            e.preventDefault();
             <?php if(in_array(1,$this->session->userdata('roles'))){?>
             var txt=$(this).parent().prev().prev().prev().prev().prev().prev().prev();
             <?php }else{ ?>
             var txt=$(this).parent().prev().prev().prev().prev().prev().prev();
             <?php }?>
             $('#deptid2').val(txt.prev().text());
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

    </script>
    
     <script type="text/javascript">
        $(document).ready(function() {
            $('#news_data').DataTable({
                "pageLength" :10 ,
                "processing": true,
                "language":
                {
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "الأول",
                        "sPrevious": "السابق",
                        "sNext": "التالي",
                        "sLast": "الأخير"
                    }
                },
//            "serverSide": true,
                "ajax": {
                    url : "<?php echo site_url("News/news_table_ajax") ?>",
                    type : 'GET'
                },
            });
        });
    </script>


