
<style>
    .slash:last-child{
        display: none;
    }
</style>
    <div class="robust-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
              </li>
              <li class="breadcrumb-item active">قائمة المستخدمين
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
					<h4 class="card-title"><i class="icon-tag"></i> قائمة المستخدمين</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="buttons-group btn-add-letter">
                        <a href="<?php echo base_url();?>admin/addUser" class="btn btn-info float-md-right"><i class="icon-plus4"></i> إضافة مستخدم</a>
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
						<table class="table table-striped table-bordered dataex-fixh-responsive">
							<thead>
                                    <th>رقم المستخدم</th>
									<th>اسم المستخدم</th>
									<th>الايميل</th>
<!--									<th>المسمى الوظيفي</th>-->
									<th>الصلاحية</th>
                                    <th>التاريخ والوقت</th>
									<th>العمليات</th>

							</thead>
                            <tbody>
                            <?php
                            foreach ($User as $users)
                            {?>
                                <tr>
                                    <td><?php  echo $users->id ?></td>
                                    <td><?php  echo $users->name ?></td>
                                    <td><?php  echo $users->email ?></td>
                                    <td> <?php
                                        foreach (get_Roles_users($users->id) as $roles) {?>
                                            <?php  echo $roles->role_name ?>
                                            <i class="slash">/</i>
                                        <?php }?></td>
                                    <td><?php echo ArabicDate($users->created_at); ?></td>

                                    <td>
                                        <?php if($users->id !=16 ) {
                                            ?>
                                            <a  href="<?php echo base_url().'admin/updateUser/'.$users->id?>"><i class="fa fa-pencil info" title="Edit" style="font-size: 20px;"></i></a>
                                            <?php
                                        }
                                        ?>
                                        <?php if($users->id !=$this->session->userdata('user_id') && $users->id !=16 ) {
                                            ?>
                                            <a class="btndelete"><i class="fa fa-trash danger" title="Delete" style="font-size: 20px; margin-right: 10px;"></i></a>
                                            <?php
                                        }
                                        ?>
<!--                                        <a><i class="fa fa-eye orange" title="View" style="font-size: 20px; margin-right: 10px;"></i></a>-->
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
							</tbody>
							<tfoot>
								<tr>
                                    <th>رقم المستخدم</th>
                                    <th>اسم المستخدم</th>
                                    <th>الايميل</th>
                                    <!--									<th>المسمى الوظيفي</th>-->
                                    <th>الصلاحية</th>
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
                          <h4 class="modal-title" id="myModalLabel1"> حذف مستخدم </h4>
                      </div>
                      <form  id="form-delete" >
                          <div class="modal-body">
                              <div class="row">
                                  <div class="col-md-2">
                                      <i class="fa  fa-warning danger " style="font-size: 30px; margin-right: 50px;"></i>
                                  </div>
                                  <input type="hidden" class="form-control" name="userid" placeholder="" id="userid2"  >
                                  <div class="form-group" >
                                      <h5 class="col-md-8  control-label" >هل تريد حذف هذا المستخدم؟! </h5>
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
            var txt=$(this).parent().prev().prev().prev().prev();
            $('#userid2').val(txt.prev().text());
            $('#delete').modal('show');
        });


        $(document).on('click','#delete1',function () {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/deleteUser/');?>",
                data: {
                    'userID':$('#userid2').val()},
                cache:false,
                success:
                    function(data){
                        $('#delete').modal('hide');
                        window.location.reload();
                    }
            });// you have missed this bracket
        });

    </script>

