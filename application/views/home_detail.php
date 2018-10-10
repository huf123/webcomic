<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta property="twitter:card" content="summary_large_image"/>
        <meta property="twitter:description" content="<?php echo word_limiter($chap->ch_desc, 15) ?>"/>
        <meta property="twitter:image" content="<?php echo base_url().'assets/images/cover/'.$chap->ch_featured_img ?>"/>
        <meta property="og:url" content="<?php echo current_url() ?>"/>
        <meta property="og:title" content="<?php echo $chap->ch_title ?>" />
        <meta property="og:image" content="<?php echo base_url().'assets/images/cover/'.$chap->ch_featured_img ?>"/>
        <meta property="og:description" content="<?php echo word_limiter($chap->ch_desc, 15) ?>"/>
        <title><?php echo $chap->ch_title ?> | Explore Banyuwangi</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

        <!-- Waves Effect Css -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.css" rel="stylesheet" />

        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style2.css">

        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- Star rating -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.3/css/star-rating.min.css">
        <!-- Bootstrap select -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    </head>
    <body class="bg-dark">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=235447803604812';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/panorama360.css" media="all" />

    <script src="<?php echo base_url() ?>assets/js/jquery.mousewheel.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.panorama360.js"></script>
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div id="dismiss">
            <i class="glyphicon glyphicon-remove"></i>
        </div>
        <ul class="list-unstyled components" style="padding: 10px"></ul>
        <ul class="list-unstyled components" style='margin:10px 30px'>
            <img src="<?php echo base_url() ?>assets/images/logo.png" height="150" alt="Banyuwangi Tourism">
        </ul>
        <ul class="list-unstyled components nav-item p0">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
        <ul class="list-unstyled components" style='margin:0;background-color:#DCDCDC;'>
            <a href="https://twitter.com/Banyuwangi_tour">
                <i class="fa fa-twitter fa-3x p2" aria-hidden="true"></i>
            </a>&nbsp;
            <a href="https://www.instagram.com/banyuwangi_tourism/">
                <i class="fa fa-instagram fa-3x p2"></i>
            </a>&nbsp;
            <a href="https://www.youtube.com/channel/UCptA3CnhbD9smyVJRtCOvcQ/">
                <i class="fa fa-youtube-play fa-3x p2"></i>
            </a>&nbsp;
            <a href="facebook.com/Sudut-Mata-Comic-197154504441792/">
                <i class="fa fa-facebook fa-3x p2"></i>
            </a>
        </ul>
        <ul class="list-unstyled components" style='background:#999999;margin:0;'>
            <img class='col-offset-2' src="<?php echo base_url() ?>assets/images/wonderful-indonesia.png" height=100px style='margin:30px'>
            <img class='col-offset-2' src="<?php echo base_url() ?>assets/images/majestic-banyuwangi.png" height=60px style='margin:25px'>
        </ul>
    </nav>

    <nav class='navbar navbar-default navbar-fixed-top' style='background:#666666;padding-top: 7.3px;'>
        <div class='col-lg-12'>
            <div class='form-inline'>
                <a href="#" id="sidebarCollapse">
                	<i class="fa fa-bars" style="color:#e5e5e5;font-size:2.5em;margin-right:11.4em;float:left"></i>
                </a>
                <span style="vertical-align: super">
                    <button type="button" class="btn btn-custom"><i class="fa fa-caret-left" 
                    	<?php if ($chap->prev!=NULL){ ?>
                        	onclick="window.open('<?php echo base_url().'home/'.$chap->se_slug.'/'.$chap->prev?>','self')"
                        <?php } else echo "disabled" ?>></i></button>
                    <select class='form-control' id='title'>
                    <?php foreach ($title as $ti){ ?>
                        <option data-thumbnail="<?php echo base_url('assets/images/cover/thumb/'.$ti->ch_featured_img)?>" value="<?php echo $ti->ch_slug ?>" <?php if($ti->ch_id==$chap->ch_id) {echo 'selected';} ?>>
                            <?php echo "Eps. ".$ti->ch_order." : ".$ti->ch_title ?>
                        </option>
                    <?php }?>
                    </select>
                    <button type="button" class="btn btn-custom"><i class="fa fa-caret-right"<?php if ($chap->next!=NULL){ ?> onclick="window.open('<?php echo base_url().'home/'.$chap->se_slug.'/'.$chap->next?>','self')"
                    <?php } else echo "disabled" ?>></i></button>
                </span>
                <a href="<?php echo base_url('home/login') ?>" style="float: right;font-size: 1.5em;font-family: montserrat;color: #e5e5e5;">
                    <i class="fa fa-user"></i> <?php
                		$name=$this->session->userdata('fullname');
	                	if(!$name)echo "Login Now";else echo $name?>
                </a>
            </div>
        </div>
    </nav>

    <!-- Page Content Holder -->
    <div id="content" style='padding: 0px'>
        <div class='col-lg-12'></div>
        <div class='col-lg-5 col-lg-offset-3' style='margin-top: 50px;'>
            <img src="<?php echo base_url().'assets/images/cover/'.$chap->ch_featured_img ?>" class="img-responsive">
            <?php foreach($cont as $c){
                if($c->ct_type==1){ ?>
                    <img src="<?php echo base_url().'assets/images/'.$c->ct_name?>" class="img-responsive">
                    <?php } if($c->ct_type==2){
                    $file = base_url('assets/images/'.$c->ct_name);
                    $size = getimagesize($file); ?>
            <div class="panorama round" style="height:500px;">
                <div class="panorama-view">
                    <div class="panorama-container">
                        <img src="<?php echo $file ?>" data-width="<?php echo $size[0] ?>" data-height="<?php echo $size[1] ?>" alt="Panorama" />
                    </div>
                </div>
            </div>
            <?php }
            } ?>
            <div style="color:#e5e5e5;">
                <div class='col-lg-12' style='padding: 15px 0 !important;'>
                    <label for="tags">Tags</label><br>
                    <a href="#" class='tag btn btn-default'>#</a>
                        <?php foreach (explode(',', $chap->ch_tag) as $t){?>
                    <a href="<?php echo base_url("tag/".$t)?>" class='tag btn btn-default' style="margin: 0 5px"><?php echo $t?></a>
                        <?php } ?>
                </div>
                <div class='col-lg-12'>
                    <div class='col-lg-6 p0'>
                        <label for="rating">Rate This</label>
                        <input id="chap" type="hidden" name="chap" value="<?php echo $chap->ch_id ?>">
                        <input id="rating" name="rating" class="col-lg-6 rating rating-loading" value="<?php echo $chap->ch_rating?>" data-min="0" data-max="5" data-step="1" data-size="xs" data-show-clear="false" data-show-caption="false" <?php if(!$name) echo 'data-readonly="true"' ?>>                      
                    </div>
                    <div class='col-lg-6 p0'>
                        <label for="">Share This</label><br>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url() ?>" style="padding-right:10px" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                            <i class="fa fa-facebook fa-2x"></i>
                        </a>&nbsp;                        
                        <a href="https://twitter.com/share?url=<?php echo current_url() ?>&hashtags=<?php echo $chap->ch_tag ?>&text=<?php echo word_limiter($chap->ch_desc, 15) ?>" style="padding-right:10px" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                            <i class="fa fa-twitter fa-2x"></i>
                        </a>&nbsp;
                        <a href="https://pinterest.com/pin/create/button/?url=<?php echo current_url() ?>&media=<?php echo base_url().'assets/images/cover/'.$chap->ch_featured_img ?>&description=<?php echo word_limiter($chap->ch_desc,15) ?>" style="padding-right:10px" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                            <i class="fa fa-pinterest fa-2x"></i>
                        </a>&nbsp;
                        <a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo current_url() ?>&posttype=photo&content=<?php echo base_url().'assets/images/cover/'.$chap->ch_featured_img ?>&caption=<?php echo word_limiter($chap->ch_desc,15) ?>" style="padding-right:10px" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                            <i class="fa fa-tumblr fa-2x"></i>
                        </a>&nbsp;
                        <a href="#" style="padding-right:10px" class="btn-copy">
                            <i class="fa fa-clone fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div><br>
            <div class="fb-comments" data-href="http://iqbal.misterputer.com" data-numposts="5" style="margin-top:30px;padding-left:0;padding-right:20px"></div>
        </div>
    </div>

        <div class="overlay"></div>

        <!-- Bootstrap Js CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- bootstrap select -->
        <script src="<?php echo base_url() ?>assets/js/bootstrap-select.js"></script>

        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Star Rating
        ============================================= -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.3/js/star-rating.min.js"></script>
    	<button id="toTop" title="Go to top">
    		<i class="fa fa-chevron-up">
    	</button>
        <!-- custom Javascript -->
        <script src="<?php echo base_url() ?>assets/js/iqbal.js"></script>
    </body>
</html>