    <!-- Bootstrap Core js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.min.js"></script>

    <!-- Bootstrap Tags Input -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" type="text/javascript"></script>

    <!-- Select Plugin js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- jQuery slimScroll Plugin js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>

    <!-- Node Waves Effect Plugin js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.js"></script>

    <!-- jQuery DataTable core -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

    <!-- jQuery DataTable plugin : AutoFill -->
    <script src="https://cdn.datatables.net/autofill/2.2.2/js/dataTables.autoFill.min.js"></script>
    <script src="https://cdn.datatables.net/autofill/2.2.2/js/autoFill.bootstrap.min.js"></script>

    <!-- jQuery DataTable plugin : Button -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    
    <!-- jQuery DataTable plugin : Responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>

    <!-- Bootstrap star rating by Krajee -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.3/js/star-rating.min.js"></script>

    <!-- AdminBSB custom js -->
    <script src="<?php echo base_url() ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-datatable.js"></script>

    <!-- AdminBSB demo js -->
    <script src="<?php echo base_url() ?>assets/js/demo.js"></script>
    
    <script>
        $(document).ready(function(){

  // Initialize sortable
  $( "#sortable" ).sortable();

  // Save order
  $('#submit').click(function(){
    var imageids_arr = [];
    // get image ids order
    $('#sortable li').each(function(){
       var id = $(this).attr('id');
       var split_id = id.split("_");
       imageids_arr.push(split_id[1]);
    });

    // AJAX request
    $.ajax({
      url: '<?php echo base_url() ?>'+'dashboard/reorder',
      type: 'post',
      data: {imageids: imageids_arr},
      success: function(response){
        alert('Save successfully.');
      }
    });
  });
});
    </script>
</body>

</html>