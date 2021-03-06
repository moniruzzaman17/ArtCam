particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 200,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#FF0000"
    },
    "shape": {
      "type": "triangle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 10
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#4E91E9",
      "opacity": 0.2,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": true,
      "straight": false,
      "out_mode": "out",
      "bounce": true,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "window",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 140,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 100,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 100,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});


// end of particlesJS

$(window).click(function() {
  $('.sub-menu').hide(); 
});


$(document).on('click', '.custom-toggler', function(e) {
  e.stopPropagation();
  $('.sub-menu').hide(); 
  $(this).parent().siblings().show(); 
});


$(document).on('click', '.download', function(e) {
  e.preventDefault();
  var pid = $(this).attr('data');
  $('.productID').val(pid);
  $('#downloadwithCouponModal').modal('show');
});

$(document).on('click', '.verifiedDownloadBtn', function(e) {
    e.preventDefault();  //stop the browser from following
    var url = '/download/raw/file';
    var pid = $(this).parent('.modal-footer').siblings('.modal-body').children('.form-group').children('.datarow').children('.productID').val();
    var code = $(this).parent('.modal-footer').siblings('.modal-body').children('.form-group').children('.datarow').children('#CouponCode').val();
    if (code === '' || code == null) {
      $("#warning").html("<i class='fas fa-exclamation-triangle'></i> Coupon code cannot be empty!").show().delay(3000).fadeOut();
    }
    else{
      $.ajax({
        url: url,
        type: 'GET',
        data: { 
          pid: pid, 
          code: code 
        },
        success: function(data,response)
        {
        // window.location.href = data;
        // console.log(data);
        // $('<a href="'+data+'" download></a>')[0].click();

        $('#CouponCode').val('');

        var counter = 4;

        $("#success").html("<i class='fas fa-check'></i> Your download will start within "+counter+ " second(s). Thank You !").show();
        var interval = setInterval(function() {
          counter--;
          $("#success").html("<i class='fas fa-check'></i> Your download will start within "+counter+ " second(s). Thank You !");
          if (counter == 0) {
            $('#downloadwithCouponModal').modal('hide');
            $("#success").html('').hide();
            clearInterval(interval);
          }
        }, 1000);

        setTimeout( function(){
          $('<a href="'+data.url+'" download></a>')[0].click();
        }, 4000 );
      },
      error: function (jqXHR, exception) {
        $('#CouponCode').val('');
        // $("#warning").show();
        $("#warning").html("<i class='fas fa-exclamation-triangle'></i> "+jqXHR.responseJSON.failed).show().delay(3000).fadeOut();
        console.log(jqXHR.responseJSON.failed);
      }
    });
    }

  });

