<!-- Page Content -->
<div class="container" style='margin-top: 50px; margin-bottom: 50px'>
  <!-- Portfolio Section -->
  <h2 class="my-1">$title</h2><br/>
  <div class="row">
  <?php foreach ($se as $ch){ ?>
    <div class="content">
      <a href="<?php echo base_url('home/'.$ch->se_slug.'/'.$ch->ch_slug) ?>" target="_blank">
        <div class="content-overlay"></div>
        <img class="content-image" src="<?php echo base_url().'assets/images/cover/'.$ch->ch_featured_img ?>">
        <div class="content-details fadeIn-bottom">
          <h3 class="content-title"><?php echo $ch->ch_title ?></h3>
          <h4 class="content-title"><?php echo $ch->fullname ?></h4>
          <hr>
          <p class="content-text"><?php echo word_limiter($ch->ch_desc,30) ?></p>
        </div>
      </a>
    </div>
  <?php } ?>
  </div>
  <!-- /.row -->
</div>