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

<!-- Dropzone Css -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.js"></script>
<script>
Dropzone.autoDiscover = false;

var foto_upload= new Dropzone(".dropzone",{
    url: "<?php echo base_url('dashboard/save_content') ?>",
    maxFiles: 50,
    method:"POST",
    acceptedFiles:"image/*",
    paramName:"file",
    dictInvalidFileType:"Jenis file ini tidak diizinkan",
    addRemoveLinks:true,
});


//Event ketika Memulai mengupload
foto_upload.on("sending",function(a,b,c){
    a.token=Math.random();
    c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
});


//Event ketika foto dihapus
foto_upload.on("removedfile",function(a){
    var ct_id = a.ct_id;
    $.ajax({
        type:"post",
        data:{ct_id:ct_id},
        url:"<?php echo base_url('dashboard/delete_img') ?>",
        cache:false,
        dataType: 'json',
        success: function(){
            console.log("Foto terhapus");
        },
        error: function(){
            console.log("Error");
        }
    });
});

$(function(){
    $(".dropzone").sortable({
        items:'.dz-preview',
        cursor: 'move',
        opacity: 0.5,
        containment: '.dropzone',
        distance: 20,
        tolerance: 'pointer',
        start: function(event, ui) {
            var start_pos = ui.item.index();
            ui.item.data('start_pos', start_pos);
        },
        update: function(event, ui) {
            var start_pos = ui.item.data('start_pos');
            var end_pos = ui.item.index();
            alert(start_pos + ' - ' + end_pos);
        }
    });
});
</script>

<section class="content" style='margin-left:260px;'>
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Dashboard / Content / New
                </h2>
            </div>
            <!-- File Upload | Drag & Drop OR With Click & Choose -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UPLOAD YOUR IMAGES FOR YOUR CHAPTER
                            </h2>
                        </div>
                        <div class="body">
                            <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>
                                </div>
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->

        </div>
</section>
</div>
<!-- #END# Vertical Layout -->
</div>