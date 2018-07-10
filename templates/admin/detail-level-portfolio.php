<?php include "templates/include/header.php" ?>
  <section class="portfolio">
    <form class="" action="upload.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="jobId" value="<?php echo $jobId ?>">
      <div class="category-wrapper">
        <ul class="sample-image dropzone" >
          <li>
            <div id='dropzone' class="new-job" style=""><h2>Click or Drop Image(s)</h2></div>
          </li>
        </ul>
        <ul class="sample-image thumbnails" >
          <?php foreach ($jobImages as $job ) { ?>
            <li>
              <div id="<?php echo $job->id ?>" class="" style="background-image: url('<?php echo THUMBNAILS_PATH . $job->imagePath ?>')"></div>
            </li>
          <?php } ?>
        </ul>
      </div>
    </form>
  </section>
  <div class="photo-viewer-wrapper" style="display: none;">
   <div class="container">
     <div class="image-container"></div>

   </div>
 </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/adminScript.js"></script>
</body>
</html>
