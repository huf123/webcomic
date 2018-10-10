$(document).ready(function(){  
    // AJAX star rating
    $("#rating").on("change", function(){
        $.ajax({
            type:"post",
            url:"<?php echo base_url('home/add_rating') ?>",
            data:{
                rating:$("#rating").val(),
                chap:$("#chap").val()
            }
        })
        .done(function(data){
            alert("rating berhasil");
        })
        .fail(function(){
            alert("gagal");
        })
    });

    // Toggle Sidebar
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

    // Back to Top button
    $(window).scroll(function(){
        if($(this).scrollTop()){
            $('#toTop').fadeIn();
        }else{
            $('#toTop').fadeOut();
        }
    });
    $("#toTop").click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
    });

    // Panorama image
    $('.panorama-view').panorama360();
    
    // Slider homepage
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    });
    
    // Carousel ongoing Season
    $('#Carousel').carousel({
        interval: 1000
    });

    //copy URL
    
});