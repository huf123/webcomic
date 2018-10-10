<!-- Bootstrap tags input -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"/>
<!-- Dropzone Css -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.js"></script> -->

<section class="content" style='margin-left:260px;'>
  <div class="container-fluid">
    <div class="block-header">
    <?php echo form_open_multipart('dashboard/save_chapter'); ?>
      <h2>Dashboard / Chapter / New Chapter&nbsp;
      <button type="submit" class="btn btn-danger">Submit</button>
      </h2>
    </div>
    <!-- Vertical Layout -->
    <div class="row clearfix">
      <div class="col-lg-7 col-md-7">
        <div class='card'>
          <div class="header">
            <h2>Judul</h2>
          </div>
          <div class="body" style='padding-bottom: 5px;'>
            <div class="form-group">
              <div class="form-line">
                <input type="text" name="ch_title" id="ch_title" class="form-control" placeholder="Masukkan judul yang diinginkan">
              </div>
            </div>
          </div>
        </div>
        <div class='card'>
          <div class="header">
            <h2>Deskripsi</h2>
          </div>
          <div class="body">
            <div class="form-group">
              <div class="form-line">
                <textarea rows="10" class="form-control no-resize" name="ch_desc" placeholder="Masukkan deskripsi yang diinginkan"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="card">
          <div class="header">
            <h2>Tags</h2>
          </div>
          <div class="body" style='padding-bottom:9px'>
            <div class="form-group">
              <div class="form-line">
                <input type="text" class="form-control" data-role="tagsinput" name="ch_tag" placeholder="Masukkan tags yang diinginkan" style="padding-left: 0px;">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-2">
        <div class="card">
          <div class="header">
            <h2>Kategori</h2>
          </div>
          <div class="body">
            <div class="row clearfix">
              <div class="demo-radio-button">
                <?php foreach ($cat as $ca){
                  $id = $ca->se_id;?>
                  <input name="ch_category" type="radio" id="<?php echo 'radio_'.$id ?>" class="with-gap radio-col-red" value="<?php echo $id ?>"/>
                  <label for="<?php echo 'radio_'.$id ?>"><?php echo $ca->se_title ?></label>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-5">
        <div class="card">
          <div class="header">
            <h2>Cover Image</h2>
          </div>
          <div class="body">
            <div class="row clearfix">
              <input type="file" name="ch_featured_img" onchange="preview_image(event)">
              <img style="max-height:200px;" id="output_image"/>
            </div>            
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
          <!-- #END# Vertical Layout -->
        </div>
    </section>
    
              <script type='text/javascript'>
                function preview_image(event){
                  var reader = new FileReader();
                  reader.onload = function(){
                    var output = document.getElementById('output_image');
                    output.src = reader.result;
                  }
                  reader.readAsDataURL(event.target.files[0]);
                }
              </script>