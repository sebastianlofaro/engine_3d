<?php include "include/header.php" ?>
  <section class="portfolio">
    <div class="category-wrapper">
      <ul class="sample-image thumbnails" >
        <?php foreach ($data['results'] as $job ) { ?>
          <li>
            <div class="" style="background-image: url('<?php echo THUMBNAILS_PATH . $job->imagePath ?>')"></div>
          </li>
        <?php } ?>
      </ul>
    </div>
  </section>
  <div class="photo-viewer-wrapper" style="display: none;">
   <div class="container">
     <div class="image-container"></div>

   </div>
 </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
