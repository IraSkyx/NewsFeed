$(document).ready(function() {
  $("time.timeago").timeago();
});

$('#search').submit(function(){
  var keyWord=$('#myKeyWord').val();
  $.ajax({
  url: 'index.php?action=search&keyWord=' + keyWord,
  type: 'GET',
  data: { "keyWord": keyWord }
  });
  event.preventDefault();
});

$('#goToPage').submit(function(){
  window.location = "index.php?page=" + $('#goToPageNb').val();
  event.preventDefault();
});
