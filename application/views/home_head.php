<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Explore Banyuwangi | Sebuah Tugas Akhir Muhammad Iqbal</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- custom font -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

    <!-- Bootstrap Core Css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/modern-business.css" rel="stylesheet">
    
    <!-- Star rating -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.3/css/star-rating.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.3/themes/krajee-fa/theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style3.css">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  </head>
  <body>
    <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fa fa-times"></i>
        </div>
        <ul class="list-unstyled components" style="padding: 10px">
        </ul>
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
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top" style="z-index: 998">
      <div class="mt-5 container">
        <a href="#" id="sidebarCollapse">
            <i class="fa fa-bars" style="color:#e5e5e5;font-size:2.5em;margin-left:-2em">
            </i>
        </a>
        <a class="navbar-brand" href="<?php echo base_url() ?>">
            <img src="<?php echo base_url() ?>assets/images/logo.png" height=100>
            <img src="<?php echo base_url() ?>assets/images/home.png" height=60 style='margin:12px 50px;'>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto"><br>
            <?php echo form_open(base_url('home/search')); ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-default" style="visibility:hidden">
                        <i class="fa fa-search"></i>
                    </button>
                    <input class="expand" type="text" class="form-control" placeholder="CARI">
                </div>
            <?php echo form_close(); ?>
            </ul>
        </div>
      </div>
    </nav>

    