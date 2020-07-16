

    <div class="robust-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="breadcrumb-wrapper col-xs-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/index">الرئيسية</a>
              </li>
                <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dtableVideos">الفيديو</a>
                </li>
              <li class="breadcrumb-item active">إضافة فيديو
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
<section id="dropzone-examples">
  <div class="row">
    <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><i class="icon-tag"></i> إضافة فيديو</h4>
          <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
              <li><a data-action="reload"><i class="icon-reload"></i></a></li>
              <li><a data-action="close"><i class="icon-cross2"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse in">
          <div class="card-block">
            <form class="form" method="post" novalidate="" action="<?php echo base_url().'admin/saveVideo'?>"  enctype="multipart/form-data" >

              <div class="form-body">

                <div class="row">
                  <label class="col-md-2 text-xs-right">اسم الفيديو:</label>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="controls">
                        <input type="text" id="issueinput1" class="form-control" placeholder="اسم الفيديو" required="" data-validation-required-message="أدخـل اسم الفيديو" name="videoname" data-toggle="tooltip" data-trigger="hover"  data-title="اسم الفيديو" />
                      </div></div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-md-2 text-xs-right">فيديو من اليوتيوب: </label>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="controls">
                        <input type="text" class="form-control" id="ytlink" onkeyup="youtube_parser(this.value)" name="url" placeholder=" أدخل رابط الفيديو من اليوتيوب"  />
                      </div>
                    </div></div>


                </div>
                <div class="row">
                  <label class="col-md-2 text-xs-right">رابط الصورة : </label>
                  <div class="col-md-4">
                    <div class="form-group">
                    <div class="input-group">
                      <input type="text" id="ytimagelink" readonly="readonly" style="height: 37px" class="form-control" placeholder="" value="" name="url-imghome" aria-describedby="button-addon6">
                    </div>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                    <div id="ytimage"></div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-2 text-xs-right">
                  <input type="checkbox" id="local-video" value="1" />
                  <label> أو رفع فيديو من الجهاز :</label>
                    </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="controls">
                        <input type="file"  accept="video/*" name="video_file" id="filesToUpload" disabled class="form-control video_file"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                      </div></div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-md-2 text-xs-right" >اضافة صورة للفيديو:</label>
                  <div class="col-md-4">
                    <div class="form-group">
                      <div class="controls">
                        <input type="file" accept="image/x-png,image/gif,image/jpeg"  name="video_img" id="video_img" disabled class="form-control"  placeholder="" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title=""/>
                      </div></div>
                  </div>

                </div>
                <div class="row">
                <div class="col-md-2 col-sm-2 text-xs-right">
                  <div class="controls">
                    <div class="skin skin-square">
                      <input type="checkbox" name="activated" value="1" id="input-150" checked />
                      <label for="input-150">تفعيل</label>
                    </div>
                  </div>
                </div>
                </div>

                <div class="form-actions">
                  <div class="text-xs-right">
                    <button type="submit" name="submit" class="btn btn-success"> تنفيذ <i class="icon-thumbs-up position-right"></i></button>
                    <!--            <button type="submit" class="btn btn-info"> معاينة <i class="fa fa-eye position-right"></i></button>-->
                    <button type="reset" class="btn btn-danger"> مسح الحقول <i class="icon-refresh position-right"></i></button>
                  </div>
                </div>
            </form>
          </div>
          </div>
        </div>
        </div>
      </div>
    <!--</div>-->

</section>

        </div>
      </div>
    </div>

    <style>
      #ytimage img{
        height: 100px;
      }
    </style>
    <script>
      function youtube_parser(url) {
        var regExp = /.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (match && match[1].length == 11) {
          urllink = match[1];
          imagelink = "<img src=\"http:\/\/img.youtube.com\/vi\/"+urllink+"\/mqdefault.jpg\">";
        } else {
        }
        document.getElementById("ytimagelink").value = "http://img.youtube.com/vi/"+urllink+"/mqdefault.jpg";
        document.getElementById("ytimage").innerHTML = imagelink;
      }
    </script>
    <script>
      $('#local-video').change(function(){
        if($(this).is(":checked")) {
          $('.video_file').prop('disabled', false);
          $('#video_img').prop('disabled', false);
          $('#ytlink').prop('disabled', true);
          $('#ytlink, #ytimagelink').val(null);
          document.getElementById("ytimage").innerHTML = null;
        } else {
          $('.video_file').prop('disabled', true);
          $('#video_img').prop('disabled', true);
          $('#ytlink').prop('disabled', false);
          $('.video_file, #video_img').val(null);
        }
      });
    </script>

    <!-- ////////////////////////////////////////////////////////////////////////////-->
