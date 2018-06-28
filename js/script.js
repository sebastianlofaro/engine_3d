$('.sample-image li').on('click', function() {
  console.log($(this).children().css('background-image').replace('url(','').replace(')','').replace('\/thumbnail',''));
  $('.photo-viewer-wrapper .image-container').css('background-image', $(this).children().css('background-image').replace('\/thumbnail',''));
  $('.photo-viewer-wrapper').show();
});

$('.photo-viewer-wrapper').on('click', function() {
  $('.photo-viewer-wrapper').hide();
});

// ON click of subcategory make AJAX call and build page from json
$('.subcategory-list li').on('click', function() {
  var $jobId = $(this).attr('name');
  console.log($jobId + " clicked")

  function buildPageFromJSON(data) {
    var html = "";
    for (var i = 0; i < data.length; i++) {
      html = html + `<li><a href="homes-exterior/home1.php"><div class="" style="background-image: url('img/thumbnail/${data[i].imagePath}')"></div></a></li>`;
    }
    $(".thumbnails").html(html);
    //var html = `<li><a href="homes-exterior/home1.php"><div class="" style="background-image: url('img/thumbnail/exterior/residential/house1/1.jpg')"></div></a></li>`;
    console.log(html);
  }

  $.ajax({

    url: 'ajax.php',
    type: 'GET',
    data: {'action': 'selectSubcategory', 'jobId': $jobId},
    success: function(data, status) {
      var dataObject = $.parseJSON(data);
      buildPageFromJSON(dataObject['results']);
    },
    error: function(xhr, desc, err) {
      console.log('ERROR'. xhr);
      console.log('Details: ' + desc + '\nError: ' + err);
    }
  });
});
