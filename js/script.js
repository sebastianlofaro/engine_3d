$('.sample-image li').on('click', function() {
  console.log($(this).css('background-image').replace('url(','').replace(')','').replace('\/thumbnail',''));
  $('.photo-viewer-wrapper .image-container').css('background-image', $(this).css('background-image').replace('\/thumbnail',''));
  $('.photo-viewer-wrapper').show();
});

$('.photo-viewer-wrapper').on('click', function() {
  $('.photo-viewer-wrapper').hide();
});
