    <div class="robust-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
              </li>
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dtableAuthor">قائمة الكُتاب</a>
              </li>
              <li class="breadcrumb-item active">تعديل بيانات الكاتب
              </li>
            </ol>
          </div>

          <div class="content-header-lead col-xs-12 mt-1">

          </div>
        </div>
        <div class="content-body">
<!-- Responsive integration table -->
<section id="responsive" class="input-validation checkbox-validation">
	<div class="row">
		<div class="col-xs-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><i class="icon-tag"></i> تعديل بيانات الكاتب </h4>
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
                                <form class="form" novalidate="" action="<?php echo base_url().'admin/saveUpdateAuthor/'.$author->id?>" method="post" enctype="multipart/form-data"/>
                                <div class="form-body">



                                    <div class="row">
                                        <label class="col-md-2 text-xs-right"> الاسم:</label>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="text" id="issueinput1" class="form-control" required="" data-validation-required-message="أدخـل الاسم " placeholder="الاسم" name="person_name" data-toggle="tooltip" data-trigger="hover"  data-title="الاسم" value="<?php  echo $author->name ?>" />
                                                </div></div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-md-2 text-xs-right" >اضافة صورة:</label>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="file" accept="image/x-png,image/gif,image/jpeg"  name="userfile" id="filesToUpload"  class="form-control"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                                                </div></div>
                                        </div>

                                    </div>







                                </div>


                                <!---->


                            </div>

                            <div class="form-actions">
                                <div class="text-xs-right">
                                    <button type="submit" value = "upload" name="fileSubmit" class="btn btn-success"> تنفيذ <i class="icon-thumbs-up position-right"></i></button>
                                    <!--                          <button type="submit" class="btn btn-info"> معاينة <i class="fa fa-eye position-right"></i></button>-->
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


    <script>
        $('.imgRemove').on('click',function () {
            var im=$(this);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('news/delImagesNews/');?>",
                data: {'id': im.attr('id')},
                dataType: "text",
                cache:false,
                success:
                    function(data){
                        im.parent().parent().remove();

                    }


            });
        });
    </script>