$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        dot:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1.2
            },
            1000:{
                items:1.4
            }
        }
    });

    $(".set > a").on("click", function() {
        if ($(this).hasClass("active")) {
          $(this).removeClass("active");
          $(this)
            .siblings(".content")
            .slideUp(200);
          $(".set > a i")
            .removeClass("fa-minus")
            .addClass("fa-plus");
        } else {
          $(".set > a i")
            .removeClass("fa-minus")
            .addClass("fa-plus");
          $(this)
            .find("i")
            .removeClass("fa-plus")
            .addClass("fa-minus");
          $(".set > a").removeClass("active");
          $(this).addClass("active");
          $(".content").slideUp(200);
          $(this)
            .siblings(".content")
            .slideDown(200);
        }
      });

      $(".user-icon").click(function(){
        $(".logout-btn").slideToggle();
        $(".overlay").toggle();
      });

      $('#datetimepicker1').datetimepicker();
});