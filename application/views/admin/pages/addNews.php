<div class="robust-content content container-fluid" xmlns="">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
              </li>
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dtableNews">الأخبار</a>
              </li>
              <li class="breadcrumb-item active">إضافة خبر
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
					<h4 class="card-title"><i class="icon-tag"></i> إضافة خبر </h4>
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
                        <div class="col-md-8">
                          <ul class="nav nav-tabs nav-top-border no-hover-bg nav-justified">
                            <li class="nav-item">
                              <a class="nav-link active" id="baseOnlyIcon-tab11" data-toggle="tab" href="#tabOnlyIcon11" aria-controls="tabOnlyIcon11" aria-expanded="true"><i class="icon-text-color"></i> الخبر </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="baseOnlyIcon-tab12" data-toggle="tab" aria-controls="tabOnlyIcon12" href="#tabOnlyIcon12" aria-expanded="false"><i class="icon-picture-o"></i> الصور</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="baseOnlyIcon-tab13" data-toggle="tab" aria-controls="tabOnlyIcon13" href="#tabOnlyIcon13" aria-expanded="false"><i class="icon-video"></i> الفيديو</a>
                            </li>

                          </ul></div></div>
                      <form class="form" novalidate="" action="<?php echo base_url().'admin/saveNews'?>" method="post" onsubmit="return validateForm()" enctype="multipart/form-data"/>
                      <div class="tab-content px-1 pt-1">
                        <div role="tabpanel" class="tab-pane fade in active" id="tabOnlyIcon11" aria-expanded="false" aria-labelledby="baseOnlyIcon-tab11">
                          <br>

                      <div class="form-body">
                           <div class="row">
                              <label class="col-md-2 text-xs-right"> العنوان الاشاري:</label>
                              <div class="col-md-7">
                                  <div class="form-group">
                                      <div class="controls">
                                          <input type="text" id="issueinput2" class="form-control"   placeholder="العنوان الاشاري" name="caption" data-toggle="tooltip" data-trigger="hover"  data-title="العنوان الاشاري" />
                                      </div></div>
                              </div>
                          </div>
                        <div class="row">
                          <label class="col-md-2 text-xs-right"> العنوان الرئيسي:</label>
                          <div class="col-md-7">
                            <div class="form-group">
                              <div class="controls">
                              <input type="text" id="issueinput1" class="form-control" required="" data-validation-required-message=" العنــوان الرئيسي" placeholder="عنوان رئيسي" name="title" data-toggle="tooltip" data-trigger="hover"  data-title="العنوان الرئيسي" />
                            </div></div>
                          </div>
                          </div>

                         

                        <div class="row">
                          <label class="col-md-2 text-xs-right" >مقتطف :</label>
                          <div class="col-md-7">
                            <div class="form-group">
                          <input type="text" id="issueinput3" class="form-control" name="comments" placeholder="مقتطف" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="مقتطف"/>
                        </div></div>
                          </div>

                        <div class="row">
                          <label class="col-md-2 text-xs-right" >نص الخبر:</label>
                          <div class="col-md-7">
                            <div class="form-group">
                              <div class="controls">
                              <textarea id="issueinput4" rows="10" class="form-control" name="txt" placeholder="نص الموضوع" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="نص الموضوع" ></textarea>
                            </div></div></div>
                        </div>




                        <div class="row">
                          <label class="col-md-2 text-xs-right">القسم:</label>
                          <div class="col-md-3">
                            <div class="form-group">
                          <select id="issueinput5" name="category" required="" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="الأقسام">
                              <?php
                              foreach ($SubDept as $subdept) {
                                  {
                                      ?>
                                      <?php  if(in_array(1,$this->session->userdata('roles'))||in_array(2,$this->session->userdata('roles'))||
                                      in_array(4,$this->session->userdata('roles'))||in_array($subdept->id,$this->session->userdata('roles'))) { ?>
                                      <option
                                          value="<?php echo $subdept->id ?>"><?php echo $subdept->cat_name ?>
                                      </option>
                                      <?php } ?>
                                      <?php
                                  }
                              }
                              ?>
                          </select>




                        </div></div>
                          <!--</div>-->

                            <div class="col-md-2 col-sm-2 ">
                                <div class="controls">
                                    <div class="skin skin-square">
                                        <input type="checkbox" value="1" name="more_news" id="input-17" />
                                        <label for="input-17">المزيد من الأخبار</label>
                                    </div>
                                </div></div>
                        <div class="col-md-2 col-sm-2 ">
                          <div class="controls">
                            <div class="skin skin-square">
                              <input type="checkbox" name="newshome" value="1" id="input-15"  />
                              <label for="input-15">خبر رئيسي</label>
                            </div>
                          </div>
                          </div>
                            <div class="col-md-2 col-sm-2 ">
                                <div class="controls">
                                    <div class="skin skin-square">
                                        <input type="checkbox" name="pinhome" value="1" id="input-18"  />
                                        <label for="input-18">تثبيت الخبر</label>
                                    </div>
                                </div>
                            </div>
                          <div class="col-md-2 col-sm-2 ">
                          <div class="controls">
                            <div class="skin skin-square">
                              <input type="checkbox" value="1" name="ticker" id="input-16"  />
                              <label for="input-16">شريط الأخبار</label>
                            </div>
                          </div></div>

                          </div>

                          <div class="row" id="upload-img">
                              <label class="col-md-2 text-xs-right" >اضافة صورة:</label>
                              <div class="col-md-3">
                                  <div class="form-group" style="margin-bottom: 10px">
                                      <div class="controls">
                                          <input type="file" onchange="openFile(event)" accept="image/x-png,image/gif,image/jpeg" name="userfile" id="filesToUpload" class="img_found form-control"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                                      </div></div>
                                      <div class="form-group">
                                          <div class="controls" id="desc_img" style="display: none">
                                              <input style="border-radius: 5px; width: 80%" type="text" id="issueinput111" class="form-control" placeholder="أضف وصف للصورة" name="desc_img" data-toggle="tooltip" data-trigger="hover"  data-title="وصف للصورة" />
                                              </div>
                                      </div>
                              </div>
                              <script>
                                  $(function() {
                                      $('.img_found').change(function(){
                                          if ($(this).val() != '') {
                                              $('#desc_img').show();
                                          } else {
                                              $('#desc_img').hide();

                                          }
                                      });
                                  });
                              </script>
                              
                                <script>

                                  var openFile = function(file) {
                                      var input = file.target;

                                      var reader = new FileReader();
                                      reader.onload = function(){
                                          var dataURL = reader.result;
                                          var output = document.getElementById('image-select');
                                          output.src = dataURL;
                                      };
                                      reader.readAsDataURL(input.files[0]);
                                  };
                              </script>
                              <div class="col-md-4">
                                  <div class="input-group">
                                      <input type="text" id="im_ar" readonly="readonly" style="height: 37px" class="form-control" placeholder="إختيار من الأرشيف" value="" name="img-archive" aria-describedby="button-addon6">
                                      <span class="input-group-btn" id="button-addon6">
                                          <button onclick="openModal()" class="btn bg-blue-grey white "  style="height: 37px" type="button"><i class="icon-plus"></i></button>
                                          </span>
                                      </div>
                              </div>
                               <div class="col-md-3">

                                  <div style=" height: 100px; width: 130px; overflow: hidden; left: 110px; ">
                                      <img src="<?php echo base_url();?>admin-assets/images/elements/img-holder.png" height="100px"  id="image-select" alt=" ">
                                  </div>
                                  <div class="controls" style="position: absolute;margin-top: 15px">
                                      <div class="skin skin-square">
                                      <input type="checkbox" value="1" name="water_img" id="input-25"  />
                                      <label style="font-size: 12px" for="input-25">استخدام علامة مائية</label>
                                  </div>
                                      </div>
                              </div>

                          </div>
                          <div class="row">
                              <label class="col-md-2 text-xs-right" >اضافة ملف صوت:</label>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <div class="controls">
                                          <input type="file" accept="audio/*"  name="sound_news" id="filesToUpload"  class="form-control"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                                      </div></div>
                              </div>

                          </div>
                         

                          <script>
                             $(function() {
                                  $('#issueinput5').change(function(){
                                      if ($(this).val() == "15") {
                                          $('#warning').show();
                                          $('#upload-img').hide();
                                          $('#filesToUpload').removeAttr('required');
                                          $('#filesToUpload').parent().parent().removeClass('error');
                                          $('#filesToUpload').next().remove();

                                      } else {
                                          $('#warning').hide();
                                          $('#upload-img').show();
                                      }
                                  });
                              });
                          </script>




                                                <div class="row" id="warning" style="display:none">
                              <label class="col-md-2 text-xs-right">الكاتب :</label>
                              <div class="col-md-7">
                                  <div class=" form-group ">
                                      <div class="controls">
                                      <select  name="author" required="" class=" select2 select2-rtl  form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="الكتاب">
                                          <option value="-1">اختر كاتب</option>

                                          <?php
                                          foreach ($Authors as $authors)
                                          {?>
                                              <option value="<?php  echo $authors->id ?>"><?php  echo $authors->name ?></option>
                                              <?php
                                          }
                                          ?>
                                      </select>

                                      </div>


                                  </div>
                              </div>
                          </div>



                          <div class="row">
                              <label class="col-md-2 text-xs-right" >اضافة هاشتاق:</label>
                              <div class="col-md-7">
                                  <select name="tags[]" class="select2-tags form-control" dir="rtl" multiple="" id="select2-tags">
                                      <?php
                                      foreach ($TAGS as $tags)
                                      {?>


                                          <option value="<?php  echo $tags->id ?>"><?php  echo $tags->name ?></option>

                                          <?php
                                      }
                                      ?>

                                  </select>
                              </div>

                          </div>


                      </div>


                          <!---->


                          </div>

                        <div class="tab-pane fade" id="tabOnlyIcon12" aria-labelledby="baseOnlyIcon-tab12" aria-expanded="false">
                          <br>

                            <div class="row">
                                <label class="col-md-2 text-xs-right" >اضافة صور أسفل الخبر:</label>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg"  name="userFiles[]"  multiple   class="form-control"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                                        </div></div>
                                </div>

                            </div>



                        </div>

                        <div class="tab-pane fade " id="tabOnlyIcon13" aria-labelledby="baseOnlyIcon-tab23" aria-expanded="true">
                          <br>

                            <div class="row form-body" id="link">
                            <div class="row">
                                <label class="col-md-2 text-xs-right">فيديو من اليوتيوب : </label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="link" class="form-control" placeholder=" أدخل رابط الفيديو من اليوتيوب"  />
                                        </div>
                                    </div></div>
<!--                                <span class="plus input-group-btn"><button class="btn btn-primary bootstrap-touchspin-up" type="button"><i class="icon-plus4"></i></button></span>-->
                            </div>
                             <div class="row">
                                <label class="col-md-2 text-xs-right">فيديو من الفيس بوك:</label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="fb_link" class="form-control" placeholder=" أدخل رابط الفيديو من الفيس بوك"  />
                                        </div>
                                    </div></div>
<!--                                <span class="plus input-group-btn"><button class="btn btn-primary bootstrap-touchspin-up" type="button"><i class="icon-plus4"></i></button></span>-->
                            </div>
                                <div class="row">
                                    <div class="col-md-2 text-xs-right">
                                        <label> أو رفع فيديو من الجهاز :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="file"  accept="video/*" name="video_file" id="filesToUpload" class="form-control video_file"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                                            </div></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="" style="color: red" class="col-md-4 text-xs-right">الحــد الأقصــى المسمــوح به 150 ميجـا بايت</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                        <div class="text-xs-right">
                          <button type="submit" value = "upload" name="fileSubmit" class="btn btn-success"> تنفيذ <i class="icon-thumbs-up position-right"></i></button>
<!--                          <button type="submit" class="btn btn-info"> معاينة <i class="fa fa-eye position-right"></i></button>-->
                          <button type="reset" class="btn btn-danger"> مسح الحقول <i class="icon-refresh position-right"></i></button>
                        </div>
                        </div>


                      </div>
                      </form>
                      <!--</form>-->
                      
                                                 <div class="modal  fade text-xs-left" id="custom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel13" aria-hidden="true">
                          <div class="modal-dialog modal-lg" style="max-width: 1050px" role="document">
                              <div class="modal-content">
                                  <div class="modal-header bg-blue-grey white">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                      <h4 class="modal-title" id="myModalLabel13">أرشيف الصور</h4>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                      <form action="#" >
                                          <div class="has-feedback has-feedback-left col-md-6 " style="margin: 15px 0 10px 0">
                                              <input type="search" id="search-contacts" style="height: 33px;" class="form-control" placeholder="أدخل كلمة البحث ...">
                                              <div class="form-control-position">
                                                  <button class="btn bg-blue-grey white" id="search-btn">
                                                      بحث


                                                  </button>
                                              </div>
                                          </div>
                                      </form>
                                      </div>
                                  </div>
                                  <div class="modal-body">



                                      <div class="row" id="img_location">

                                      </div>
                                      <div id="image">
                                          <div class="loader"></div>
                                      </div>
                                        <div id="error_msg" style="display: none;text-align: center;line-height: 400px;">
                                                                                    <img class="img-responsive" src="<?php echo base_url();?>admin-assets/images/elements/nofound1.png" alt="لا تتوفر نتائج">
                                      </div>
                                      <div style="text-align: center" id="load_more_btn">
                                          <button class="btn btn-primary" onclick="load_more()" >تحميل المزيد</button>

                                      </div>
                                          <style>
                                              .modal-body{
                                                  height: 450px;
                                                  overflow-x: auto;
                                                  background: #eee;
                                              }
                                              .modal-body::-webkit-scrollbar-track
                                              {
                                                  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                                                  background-color: #F5F5F5;
                                              }

                                              .modal-body::-webkit-scrollbar
                                              {
                                                  width: 6px;
                                                  background-color: #F5F5F5;
                                              }

                                              .modal-body::-webkit-scrollbar-thumb
                                              {
                                                  background-color: #607d8b;
                                              }

                                              .img-path{
                                                  display: none;
                                              }



                                              .modal-body .row{
                                                  margin-left: 0px;
                                                  margin-right: -10px;
                                              }

                                              .modal-body .col-md-2{
                                                  padding-left: 2px;
                                                  padding-right: 10px;
                                              }

                                              .modal-body .use-img{
                                                  font-size: 12px;
                                                  color: #607d8b;

                                              }
                                              .embed-responsive-16by9{
                                                  padding-bottom: 70% !important;
                                              }
                                              .border-grey.border-lighten-2{
                                                  padding: 8px;
                                                  background: #fff;
                                                  border: 1px solid #E0E0E0!important;
                                              }
                                              .img_use {
                                                  position: absolute;
                                                  font-size: 10px;
                                                  top: 7px;
                                                  right: 7px;
                                                  padding: 3px 5px;
                                                  background: rgba(96, 125, 139, 0.8);
                                                  color: #fff;
                                                  cursor: pointer;
                                                  border: 0;
                                              }
                                               .loader {
                                                  margin:0 auto;
                                                  border: 5px solid #fff;
                                                  border-radius: 50%;
                                                  border-top: 5px solid #967adc;
                                                  width: 50px;
                                                  height: 50px;
                                                      margin-bottom: 20px;
                                                  -webkit-animation: spin 2s linear infinite; /* Safari */
                                                  animation: spin 2s linear infinite;
                                              }

                                              /* Safari */
                                              @-webkit-keyframes spin {
                                                  0% { -webkit-transform: rotate(0deg); }
                                                  100% { -webkit-transform: rotate(360deg); }
                                              }

                                              @keyframes spin {
                                                  0% { transform: rotate(0deg); }
                                                  100% { transform: rotate(360deg); }
                                              }
                                          </style>


                                  </div>
                                  <div class="modal-footer">

                                  </div>
                              </div>
                          </div>
                              </div>

					</div>
				</div>
			</div>
		</div>
	<!--</div>-->
</section>

            <script src='<?php echo base_url()?>admin-assets/js/tinymce/tinymce.min.js'></script>
            <script src="<?php echo base_url()?>admin-assets/js/index.js" type="text/javascript"></script>
        </div>
      </div>
    </div>
    
    
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    
    <script>


   
    var index=18;
    var baseURL= "<?php echo base_url();?>";
    var baseURL2= "<?php echo base_url();?>thumb.php?src=";
    var size= "&size=140x95";
    var count=0;
    var count2=0;

    function openModal() {
        $('#custom').modal("show");
        if(count==0) {
            $('#img_location').empty();
            $.ajax({
                url: baseURL + '/getImages',
                method: 'get',
                data :{
                    offset : 0,
                    txt: $('#search-contacts').val()
                },
                dataType: 'json',
                beforeSend: function(){
                    $('#image').show();
                    $('#load_more_btn').hide();
                },
                complete: function(){
                    $('#image').hide();
                },

                success: function (response) {

                    var len = response.length;
                    var i = 0;
                    if(len==0){
                        $('#load_more_btn').hide();
                        $('#error_msg').show();

                    }else {
                        if(len<18){
                        $('#load_more_btn').hide();
                        $('#error_msg').hide();
                        }else{
                            $('#load_more_btn').show();
                            $('#error_msg').hide();
                        }
                        while (len > i) {
                            $('#img_location').append(
                                '<div class="col-md-2">' +
                                '<div class="card border-grey border-lighten-2">' +
                                '<div class="card-img-top embed-responsive embed-responsive-item embed-responsive-16by9">' +
                                '<button class="img_use"  link="'+response[i].img+'">إستخدام</button>'+
                                '<img class="gallery-thumbnail" style="width:140px;height:95px; " src="' + baseURL2 + response[i].img + size +  '" />' +
                                '</div>' +
                                '<p class="img-path">' + response[i].img + '</p>' +
                                '<div class="text-xs-center" style="height: 22px; padding-top: 3px; overflow: hidden">' +
                                '<span href="" class="use-img" style="font-size: 10px;">' + response[i].title + '</span>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );

                            i++;
                        }
                        count++;
                    }


                }
            });

        }
    }

    $("#img_location").on('click','.img_use',function (e) {
        e.preventDefault();
        $('#filesToUpload').parent().parent().removeClass('error');
        $('#filesToUpload').next().remove();
        $('#im_ar').val($(this).attr('link'));
        $('#image-select').attr('src',"<?php echo base_url()?>"+$(this).attr('link'));
        $('#custom').modal('hide');
    });


    function load_more() {



            $.ajax({
                url: baseURL + '/getImages',
                method: 'get',
                data :{
                    offset : index,
                    txt: $('#search-contacts').val()
                },
                dataType: 'json',
                beforeSend: function(){
                    $('#image').show();
                    $('#load_more_btn').hide();
                },
                complete: function(){
                    $('#image').hide();
                },
                success: function (response) {

                    var len = response.length;
                    var i = 0;
                    if(len==0){
                        $('#load_more_btn').hide();
                        $('#error_msg').show();
                    }
                    else {
                        if(len<18){
                            $('#load_more_btn').hide();
                            $('#error_msg').hide();
                        }else{
                            $('#load_more_btn').show();
                            $('#error_msg').hide();
                        }
                        while (len > i) {
                            $('#img_location').append(
                                '<div class="col-md-2">' +
                                '<div class="card border-grey border-lighten-2">' +
                                '<div class="card-img-top embed-responsive embed-responsive-item embed-responsive-16by9">' +
                                '<button class="img_use"  link="' + response[i].img + '">إستخدام</button>' +
                                '<img class="gallery-thumbnail" style="width:140px;height:95px; " src="' + baseURL2 + response[i].img + size +  '" />' +
                                '</div>' +
                                '<p class="img-path">' + response[i].img + '</p>' +
                                '<div class="text-xs-center" style="height: 22px; padding-top: 3px; overflow: hidden">' +
                                '<span href="" class="use-img" style="font-size: 10px;">' + response[i].title + '</span>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );

                            i++;
                        }
                        index = index + 18;
                    }
                }
            });


    }

    function load_more2() {

        $('#img_location').empty();

        $.ajax({
            url: baseURL + '/getImages',
            method: 'get',
            data :{
                offset : 0,
                txt: $('#search-contacts').val()
            },
            dataType: 'json',

            beforeSend: function(){
                $('#image').show();
                $('#load_more_btn').hide();
            },
            complete: function(){
                $('#image').hide();
            },
            success: function (response) {

                var len = response.length;
                var i = 0;
                if (len == 0) {
                    $('#load_more_btn').hide();
                    $('#error_msg').show();
                } else {
                    if(len<18){
                        $('#load_more_btn').hide();
                        $('#error_msg').hide();
                    }else{
                        $('#load_more_btn').show();
                        $('#error_msg').hide();
                    }
                    while (len > i) {
                        $('#img_location').append(
                            '<div class="col-md-2">' +
                            '<div class="card border-grey border-lighten-2">' +
                            '<div class="card-img-top embed-responsive embed-responsive-item embed-responsive-16by9">' +
                            '<button class="img_use"  link="' + response[i].img + '">إستخدام</button>' +
                            '<img class="gallery-thumbnail" style="width:140px;height:95px; " src="' + baseURL2 + response[i].img + size + '" />' +
                            '</div>' +
                            '<p class="img-path">' + response[i].img + '</p>' +
                            '<div class="text-xs-center" style="height: 22px; padding-top: 3px; overflow: hidden">' +
                            '<span href="" class="use-img" style="font-size: 10px;">' + response[i].title + '</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        );

                        i++;
                    }


                }
            }

        });
        index=18;
        count=0;

    }
    
     $('#search-btn').on( "click", function( event ) {
      event.preventDefault();
      load_more2();

    });
    
    $('#search-contacts').on( "keydown", function( event ) {
        if ( event.which==13) {
            event.preventDefault();
        }
    });

    $('#search-contacts').on( "keyup",function(e) {

        if ( e.which==13){
            e.preventDefault();
            load_more2();

        }

        return false;
    });
    
        function validateForm() {
        var x = $('#im_ar').val();
        var y = $('#filesToUpload').val();
        var w = $('#issueinput5').val();


        if (x == '' && y=='' && w != 15) {
            $('#filesToUpload').parent().parent().addClass('error');
            $('#filesToUpload').next().remove();
            $('#filesToUpload').parent().append('<span style="color: #DA4453;"> الرجاء اختيار صورة الخبر<span>');

            return false;
        }

            if ($('.img_found').val() != '' && $('#issueinput111').val()=='') {
                $('#issueinput111').parent().parent().addClass('error');
                $('#issueinput111').next().remove();
                $('#issueinput111').parent().append('<span style="color: #DA4453;"> الرجاء إضافة وصف للصورة<span>');

                return false;
            }

            return true;
    }

</script>



