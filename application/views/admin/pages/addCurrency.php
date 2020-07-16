

    <div class="robust-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
              </li>
              <li class="breadcrumb-item active">إضافة أسعار صرف العملة
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
					<h4 class="card-title"><i class="icon-tag"></i> إضافة أسعار الصرف مقابل الشيكل</h4>
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
                      <form class="form" novalidate="" action="<?php echo base_url().'admin/saveCurrency'?>" method="post" />
                      <div class="form-body">
                        <div class="row">
                          <label class="col-md-2 text-xs-right">الدولار الأمريكي :</label>
                          <div class="col-md-7">
                            <div class="form-group">
                              <div class="controls">
                              <input type="text" id="issueinput1"  class="form-control" placeholder="الدولار الأمريكي"  required="" data-validation-required-message="أدخل سعر الصرف" name="dollar" data-toggle="tooltip" data-trigger="hover"  data-title="الدولار الأمريكي" />
                            </div></div>
                          </div>
                          </div>
                        <div class="row">
                          <label class="col-md-2 text-xs-right">الدينار الأردني :</label>
                          <div class="col-md-7">
                            <div class="form-group">
                              <div class="controls">
                              <input type="text" id="issueinput1"  class="form-control" placeholder="الدينار الأردني"  required="" data-validation-required-message="أدخل سعر الصرف" name="dinar" data-toggle="tooltip" data-trigger="hover"  data-title="الدينار الأردني" />
                            </div></div>
                          </div>
                          </div>
                        <div class="row">
                          <label class="col-md-2 text-xs-right">اليورو الأوروبي :</label>
                          <div class="col-md-7">
                            <div class="form-group">
                              <div class="controls">
                              <input type="text" id="issueinput1"  class="form-control" placeholder="اليورو الأوروبي"  required="" data-validation-required-message="أدخل سعر الصرف" name="euro" data-toggle="tooltip" data-trigger="hover"  data-title="اليورو الأوروبي" />
                            </div></div>
                          </div>
                          </div>
                        <div class="row">
                          <label class="col-md-2 text-xs-right">الجنيه المصري :</label>
                          <div class="col-md-7">
                            <div class="form-group">
                              <div class="controls">
                              <input type="text" id="issueinput1"  class="form-control" placeholder="الجنيه المصري"  required="" data-validation-required-message="أدخل سعر الصرف" name="pound" data-toggle="tooltip" data-trigger="hover"  data-title="الجنيه المصري" />
                            </div></div>
                          </div>
                          </div>

                      </div>

                      <div class="form-actions">
                        <div class="text-xs-right">
                          <button type="submit" class="btn btn-success"> تنفيذ <i class="icon-thumbs-up position-right"></i></button>
<!--                          <button type="submit" class="btn btn-info"> معاينة <i class="fa fa-eye position-right"></i></button>-->
                          <button type="reset" class="btn btn-danger"> مسح الحقول <i class="icon-refresh position-right"></i></button>
                        </div>
                      </div>
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


