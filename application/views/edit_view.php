<style type="text/css">
    #sortable { 
      list-style-type: none;
      width: 100%;
      padding: 0;
    }
    #sortable li {
      border: 0;
      background: none;
      float:left;
      margin: 10px;
    }
    #sortable li img{
      width: 185px;
    }
</style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"/>
<section class="content" style='margin-left:260px;'>
        <div class="container-fluid">
            <div class="block-header">
            <?php echo form_open('dashboard/update_chapter'); ?>
                <h2>
                  Dashboard / Chapter / Edit &nbsp
                  <button class="btn btn-danger">SIMPAN</button>
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
                              <input type="hidden" name="ch_id" value="<?php echo $chap->ch_id ?>">
                              <input type="text" name="ch_title" id="ch_title" class="form-control" value="<?php echo $chap->ch_title ?>">
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
                              <textarea rows="10" class="form-control no-resize" name="ch_desc"><?php echo $chap->ch_desc ?></textarea>
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
                      <div class="body" style='padding-top: 1px;padding-bottom: 5px;'>
                        <div class="form-group">
                          <div class="form-line">
                            <input type="text" class="form-control" data-role="tagsinput" value="<?php echo $chap->ch_tag?>" name="ch_tag">
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
                        <!-- <select class="form-control show-tick" name="ch_category" id="ch_category"> -->
                        <?php foreach ($cat as $ca){?>
                        <input name="ch_category" type="radio" id="radio_<?php echo $ca->se_id ?>" <?php if($ca->se_id == $chap->ch_category) echo 'checked'?> class="with-gap radio-col-red" value="<?php echo $ca->se_id ?>"/>
                        <label for="radio_<?php echo $ca->se_id ?>"><?php echo $ca->se_title ?></label>
                          <!-- <option value="<?php echo $ca->se_id ?>" <?php if($ca->se_id == $chap->ch_category) echo 'selected'?>><?php echo $ca->se_title ?></option> -->
                        <?php } ?>
                        <!-- </select> -->
                      </div>
                    </div>
                  </div>
                  </div>
                <div class='col-lg-5 col-md-5'>
                  <div class='card'>
                    <div class="header">
                      <h2>Cover Image</h2>
                    </div>
                    <div class='body'>
                    <?php if($chap->ch_featured_img) {?>
                      <img class="img-responsive" src="<?php echo base_url().'assets/images/cover/'.$chap->ch_featured_img ?>">
                      <a href="" id="cov">Remove Image</a>
                    <?php } else{?>
                      <a href="" id="cov">Upload Image</a>
                    <?php } ?>
                    </div>
                  </div>
                </div><?php echo form_close(); ?>
              </div>
            </div>
            <!-- #END# Vertical Layout -->

        </div>
    </section>