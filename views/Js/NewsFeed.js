$(document).ready(function() {
  $("time.timeago").timeago();
});

$('#goToPage').submit(function(event){
  window.location = "index.php?" + $('#request').val() + "page=" + $('#goToPageNb').val();
  event.preventDefault();
});
