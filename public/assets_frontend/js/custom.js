
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


      $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      });

      $(function() {
        $('#datepicker').datepicker();
     });
     $(function() {
      $('#datetimepicker').datetimepicker();
    });

    $('.banner-lightbox img').on('click', function() {
      $("#showImg").empty();
      var image = $(this).attr("src");
      $("#showImg").append("<img class='img-responsive' src='" + image + "' />")
  });
     
});


var slider1 = document.getElementById("myRange1");
var output1 = document.getElementById("slider_range");
output1.innerHTML = slider1.value;

slider1.oninput = function() {
  output1.innerHTML = this.value;
}

var slider2 = document.getElementById("myRange2");
var output2 = document.getElementById("slider_range1");
output2.innerHTML = slider2.value;

slider2.oninput = function() {
  output2.innerHTML = this.value;
}

var slider3 = document.getElementById("myRange3");
var output3 = document.getElementById("slider_range2");
output3.innerHTML = slider3.value;

slider3.oninput = function() {
  output3.innerHTML = this.value;
}

var slider4 = document.getElementById("myRange4");
var output4 = document.getElementById("slider_range3");
output4.innerHTML = slider4.value;

slider4.oninput = function() {
  output4.innerHTML = this.value;
}

var slider5 = document.getElementById("myRange5");
var output5 = document.getElementById("slider_range4");
output5.innerHTML = slider5.value;

slider5.oninput = function() {
  output5.innerHTML = this.value;
}

var slider6 = document.getElementById("myRange6");
var output6 = document.getElementById("slider_range6");
output6.innerHTML = slider6.value;

slider6.oninput = function() {
  output6.innerHTML = this.value;
}

var slider7 = document.getElementById("myRange7");
var output7 = document.getElementById("slider_range7");
output7.innerHTML = slider7.value;

slider7.oninput = function() {
  output7.innerHTML = this.value;
}

var slider8 = document.getElementById("myRange8");
var output8 = document.getElementById("slider_range8");
output8.innerHTML = slider8.value;

slider8.oninput = function() {
  output8.innerHTML = this.value;
}

var slider9 = document.getElementById("myRange9");
var output9 = document.getElementById("slider_range9");
output9.innerHTML = slider9.value;

slider9.oninput = function() {
  output9.innerHTML = this.value;
}

var slider10 = document.getElementById("myRange10");
var output10 = document.getElementById("slider_range10");
output10.innerHTML = slider10.value;

slider10.oninput = function() {
  output10.innerHTML = this.value;
}

var slider11 = document.getElementById("myRange11");
var output11 = document.getElementById("slider_range11");
output11.innerHTML = slider11.value;

slider11.oninput = function() {
  output11.innerHTML = this.value;
}