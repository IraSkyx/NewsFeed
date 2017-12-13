$(document).ready(function() {
  $("time.timeago").timeago();
});

$('#goToPage').submit(function(){
  window.location = "index.php?" + $('#request').val() + "page=" + $('#goToPageNb').val();
  event.preventDefault();
});
