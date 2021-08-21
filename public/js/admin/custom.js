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
