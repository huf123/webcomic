<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Pano demo</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php echo $chap->ch_title ?> | Explore Banyuwangi</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>

        <!-- Waves Effect Css -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/node-waves/0.7.6/waves.min.css" rel="stylesheet" />

        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style2.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">

        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- Star rating -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.3/css/star-rating.min.css">

        <style>
        html,body {
            height: 100%;
        }
        .pano {
            /*width: 50%;*/
            height: 100%;
            margin: 0 auto;
            cursor: move;
        }
        </style>
    </head>
    <body>
        <!-- facebook comment plugins -->
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=235447803604812';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!-- jQuery Pano -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-pano@1.2.0/jquery.pano.min.js"></script>
        <!-- <div class="wrapper">          -->
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <ul class="list-unstyled components" style='margin-bottom:0px'>
                    <img src="<?php echo base_url() ?>assets/images/logo.jpg" height="200px" alt="Banyuwangi Tourism">
                </ul>
                <ul class="list-unstyled components" style='background: #e5e5e5;margin:0;'>
                    <h4>Follow Us</h4>
                        <a class="btn btn-fb waves-effect" href="https://www.facebook.com/profile.php?id=100009071269674"><i class="fa fa-facebook"></i>
                        </a>&nbsp;
                        <a class="btn btn-insta waves-effect" href="https://www.instagram.com/banyuwangi_tourism/">
                        <i class="fa fa-instagram"></i>
                        </a>&nbsp;
                        <a class="btn btn-twit waves-effect" href="https://twitter.com/Banyuwangi_tour">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>&nbsp;
                        <a class="btn btn-yt waves-effect" href="https://www.youtube.com/channel/UCptA3CnhbD9smyVJRtCOvcQ/">
                        <i class="fa fa-youtube-play"></i>
                        </a>
                </ul>
                <ul class="list-unstyled components" style='padding:0'>
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
                <ul class="list-unstyled components" style='background:#999999;margin:0;'>
                <img class='col-offset-2' src="<?php echo base_url() ?>assets/images/wonder.png" height=60px style='margin:0 0 30px 30px'>
                <img class='col-offset-2' src="<?php echo base_url() ?>assets/images/majes.png" height=60px style='margin-left:21px'>
                </ul>
            </nav>
            <!-- Page Content Holder -->
            <!-- <div id="content" style='padding: 0px'> -->
                <button type="button" id="sidebarCollapse" class="btn btn-danger"><i class="fa fa-times"></i></button>
                <div class='col-lg-8 col-lg-offset-2'>
                    <?php foreach($cont as $c){
                        if($c->ct_type==1){ ?>
                    <img src="<?php echo base_url().'assets/images/'.$c->ct_name?>" class='img-responsive'><br/>
                    <?php }
                        if($c->ct_type==2){ ?>
                    <div id="pano" class="pano img-responsive"></div>
                    <script>
                    jQuery(document).ready(function($){
                        $("#pano").pano({img: "<?php echo base_url().'assets/images/'.$c->ct_name?>"});
                    });
                    </script>
                    <?php }
                        if($c->ct_type==3){ ?>
                    <video width="400" controls>
                        <source src="<?php echo base_url().'assets/videos/'.$c->ct_name?>" type="video/mp4"> Your browser does not support HTML5 video.
                    </video>
                    <?php }
                    } ?>
                </div>
            <!-- </div> -->
        <!-- </div> -->
                    

        <!-- Go To Top
        ============================================= -->
        <div id="gotoTop" class="icon-angle-up"></div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <!-- Bootstrap Js CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <!-- Star Rating
        ============================================= -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.3/js/star-rating.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded','false');
                });
            });
        </script>
    </body>
</html>