
function rebuildImagesFromJSON(jobs) {
  var $jobs = $(jobs);
  var html = "";

  $jobs.each(function() {
    html = html + `<li><div id='${this.id}' class='' style="background-image: url('img/thumbnail/${this.imagePath}')" ></div></li>`
  });
  $(".thumbnails").html(html);
}

$('.thumbnails').on('click', 'li', function() {
  var $photoId = $(this).children().attr('id');
  $(this).hide();
  $.ajax({
    url: 'ajax.php',
    type: 'post',
    data: {'action': 'deleteImage', 'imageId': $photoId},
    success: function (data, status) {
      console.log(data);
    },
    error: function(xhr, desc, err) {
      console.log("ERROR: " . xhr);
      console.log("Details: " + desc + "\nError:" + err);
    }
  });
});

function activateDropzone() {
  var dropzone = document.getElementById('dropzone');

  var upload = function(files) {
    var formData = new FormData();
    var xhr = new XMLHttpRequest();
    var x;

    for (x = 0; x < files.length; x++) {
      formData.append('files[]', files[x], x);
    }

    formData.append('jobId', $("input[name~='jobId']").val());
    console.log($("input[name~='jobId']").val());

    xhr.onload = function() {
      var imagePaths = '';
      console.log(this.responseText);
      var data = JSON.parse(this.responseText);
      var html = ''
      rebuildImagesFromJSON(data);
    }
    xhr.open('post', 'upload.php');
    xhr.send(formData);
  }

  dropzone.ondragover = function() {
    this.className = 'new-job dropzone dragover';
    console.log('Drag in');
    return false;
  }
  dropzone.ondragleave = function() {
    this.className = 'new-job dropzone';
    console.log('Drag out');
    return false;
  }
  dropzone.ondrop = function(e) {
    e.preventDefault();
    this.className = 'new-job dropzone';
    // $('.dropzone-wrapper').hide();
    // $('.loading-circle').show();
    upload(e.dataTransfer.files);
    console.log(e.dataTransfer.files[0]);
  }
}

if (document.getElementById('dropzone')) {
  activateDropzone();
}
