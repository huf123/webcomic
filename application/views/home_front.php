<header style='margin-top: 132px;'>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <?php $i = 0;foreach ($slide as $s) { ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i ?>"
            <?php if ($i==0) echo "class='active'" ?>>
            
          </li>
        <?php $i++; } ?>
      	</ol>
        <div class="carousel-inner" role="listbox">
        <?php $i = 0; foreach ($slide as $s){?>
          	<!-- Slide One - Set the background image for this slide in the line below -->
          	<div class="carousel-item <?php if($i==0) echo 'active'?>" style="background-image: url('<?php echo base_url()."assets/images/cover/".$s->ch_featured_img?>');height:28em;">
	            <div class="carousel-caption d-none d-md-block" style="opacity:0.8;background:#343a40;padding:20px;bottom:0;text-align:justify">
                <h3><?php echo $s->ch_title ?></h3>
	              <h5><?php echo $s->fullname ?></h5>
                <hr style="background-color:#e5e5e5;width:5em"/>
	              <p style="margin-bottom:2em"><?php echo $s->ch_desc ?></p>
	            </div>
          	</div>
        <?php $i++; } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
        	<span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        	<span class="carousel-control-next-icon" aria-hidden="true"></span>
          	<span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->
<div class="container" style='margin-top: 50px; margin-bottom: 50px'>
	<!-- Ongoing Season -->
    <h2 class="my-1">Episode Terbaru</h2>
    <p>Episode Terbaru dari Explore Banyuwangi</p><br/>
	<div id="thumbCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel items -->
        <div class="carousel-inner">
	            <?php $i = 1; foreach ($chap as $ch){
	            	if(fmod($i,4)==0) {?>
                	<div class="col-3"><a href="#"><img src="<?php echo base_url().'assets/images/cover/'.$ch->ch_featured_img ?>" alt="Image" style="max-width:100%;min-height: 100%"></a>
                	</div>
                </div><!--.row-->
            </div><!--.item-->  
	    		<?php } else if(fmod($i,4)==1){ ?>
            <div class="carousel-item <?php if ((fmod($i,4)==1)&&$i==1){echo "active";} ?>">
                <div class="row">
                	<div class="col-3"><a href="<?php echo base_url('home/'.$ch->se_slug.'/'.$ch->ch_slug) ?>"><img src="<?php echo base_url().'assets/images/cover/'.$ch->ch_featured_img ?>" alt="Image" style="max-width:100%;min-height: 100%"></a>
                	</div>
	    		<?php } else{ ?>
                	<div class="col-3"><a href="#"><img src="<?php echo base_url().'assets/images/cover/'.$ch->ch_featured_img ?>" alt="Image" style="max-width:100%;min-height: 100%"></a>
                	</div>
	    		<?php } $i++; } ?>
        </div><!--.carousel-inner-->
		<a class="carousel-control-prev-1" href="#thumbCarousel" role="button" data-slide="prev" style="left: -4em;height: 10em;">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		</a>
		<a class="carousel-control-next-1" href="#thumbCarousel" role="button" data-slide="next" style="right: -4em;height: 10em;">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		</a>
    </div><!--.Carousel-->

    <!-- Previous Season -->
    <h2 class="my-1">Episode Lengkap</h2>
    <p>Lebih banyak episode dari Explore Banyuwangi</p><br/>
    <div class="row">
    <?php foreach ($cha as $ch){ ?>
        <div class="col-3 content">
          	<a href="<?php echo base_url('home/'.$ch->se_slug.'/'.$ch->ch_slug) ?>" target="_blank">
            <div class="content-overlay"></div>
            <img class="content-image" src="<?php echo base_url().'assets/images/cover/'.$ch->ch_featured_img ?>">
            <div class="content-details fadeIn-bottom">
              <h6 class="content-title"><?php echo $ch->ch_title ?></h6>
              <p class="content-title"><?php echo $ch->fullname ?></p>
              <hr>
              <p class="content-text"><?php echo word_limiter($ch->ch_desc,30) ?></p>
            </div>
          	</a>
        </div>
    <?php } ?>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->