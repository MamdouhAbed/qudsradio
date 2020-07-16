<div class="robust-content content container-fluid" xmlns="">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
              </li>
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dtableAuthor">قائمة الكُتاب</a>
              </li>
              <li class="breadcrumb-item active">إضافة كاتب
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
					<h4 class="card-title"><i class="icon-tag"></i> إضافة كاتب </h4>
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
                        <div class="col-md-12">
                      <form class="form" novalidate="" action="<?php echo base_url().'admin/saveAuthor'?>" method="post" enctype="multipart/form-data"/>
                      <div class="form-body">

                         <div class="row">
                          <label class="col-md-2 text-xs-right"> الاسم:</label>
                          <div class="col-md-7">
                            <div class="form-group">
                              <div class="controls">
                              <input type="text" id="issueinput1" class="form-control" required="" data-validation-required-message="أدخـل الاسم " placeholder="الاسم" name="person_name" data-toggle="tooltip" data-trigger="hover"  data-title="الاسم" />
                            </div></div>
                          </div>
                          </div>


                          <div class="row">
                              <label class="col-md-2 text-xs-right" >اضافة صورة:</label>
                              <div class="col-md-7">
                                  <div class="form-group">
                                      <div class="controls">
                                          <input type="file" accept="image/x-png,image/gif,image/jpeg"  name="userfile" id="filesToUpload" required class="form-control"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                                      </div></div>
                              </div>

                          </div>

                        </div>
                     </div>

                        <div class="form-actions">
                        <div class="text-xs-right">
                          <button type="submit" value = "upload" name="fileSubmit" class="btn btn-success"> تنفيذ <i class="icon-thumbs-up position-right"></i></button>
                          <button type="reset" class="btn btn-danger"> مسح الحقول <i class="icon-refresh position-right"></i></button>
                        </div>
                      </form>
                      <!--</form>-->
					</div>
				</div>
			</div>
		</div>
	<!--</div>-->
</section>

            <script src='http://cdn.tinymce.com/4/tinymce.min.js'></script>
            <script src="<?php echo base_url()?>admin-assets/js/index.js" type="text/javascript"></script>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


