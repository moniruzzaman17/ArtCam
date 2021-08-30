$(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
    .parent()
    .hasClass("active")
    ) {
    $(".sidebar-dropdown").removeClass("active");
  $(this)
  .parent()
  .removeClass("active");
} else {
  $(".sidebar-dropdown").removeClass("active");
  $(this)
  .next(".sidebar-submenu")
  .slideDown(200);
  $(this)
  .parent()
  .addClass("active");
}
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});


// function checkInternetConnection(){
//         var status = navigator.onLine;
//         if (status) {
//             console.log('Internet Available !!');
//         } else {
//             console.log('No internet Available !!');
//         }  
//         setTimeout(function() {
//             checkInternetConnection();
//         }, 1000);
//       }

// //calling above function
// checkInternetConnection();


window.addEventListener('online', function(e) {
  // document.getElementById('indicator').innerHTML = 'online';
  $('.internet-availablity').html('');
  console.log("online");
});

window.addEventListener('offline', function(e) {
  // document.getElementById('indicator').innerHTML = 'offline';
  $('.internet-availablity').html('<marquee class="border border-danger">No Internet Connection!! Please connect to internet for better performance</marquee>');

  console.log("off line");
});

// admin user grid filter
$('#adminUserGridSearchBox').keyup( function() {
  var keyword = $(this).val().toLowerCase();

  $(".adminUserGridTable tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1)
  });
});

// admin product grid filter
$('#adminProductFilter').keyup( function() {
  var keyword = $(this).val().toLowerCase();

  $(".adminProductGridTable tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1)
  });
});

// admin coupon grid filter
$('#adminCouponFilter').keyup( function() {
  var keyword = $(this).val().toLowerCase();

  $(".adminCouponTable tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1)
  });
});

// config page editable icon click event

$(window).click(function() {
  if ($('.inputText').hasClass('editable')) {
    $('.inputText').removeClass('editable'); 
    $('.inputText').prop('readonly', true);
  }
});

$(document).on('click', '.editIcon', function(e) {
  e.stopPropagation();
  $(this).parent().parent().siblings().removeAttr('readonly'); 
  $(this).parent().parent().siblings().addClass('editable');
});

$(document).on('click', '.inputText', function(e) {
  e.stopPropagation();
});


 $(document).ready(function() {
      $("ul.product_cat_list input[type=checkbox]").on("change", function() {

        var checkboxValue = $(this).prop("checked");

        //call the recursive function for the first time
        decideParentsValue($(this));

        //Compulsorily apply check value Down in DOM
        $(this).closest("li").find(".children input[type=checkbox]").prop("checked", checkboxValue);


      });

      //the recursive function 
      function decideParentsValue(me) {
        var shouldTraverseUp = false;
        var checkedCount = 0;
        var myValue = me.prop("checked");

        //inspect my siblings to decide parents value
        $.each($(me).closest(".children").children('li'), function() {
          var checkbox = $(this).children("input[type=checkbox]");
          if ($(checkbox).prop("checked")) {
            checkedCount = checkedCount + 1;
          }
        });

        //if I am checked and my siblings are also checked do nothing
        //OR
        //if I am unchecked and my any sibling is checked do nothing
        if ((myValue == true && checkedCount == 1) || (myValue == false && checkedCount == 0)) {
          shouldTraverseUp = true;
        }
        if (shouldTraverseUp == true) {
          var inputCheckBox = $(me).closest(".children").siblings("input[type=checkbox]");
          inputCheckBox.prop("checked", me.prop("checked"));
          decideParentsValue(inputCheckBox);
        }

      }
    });