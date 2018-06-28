<?php include "include/header.php" ?>
  <section class="portfolio">
    <div class="category-wrapper">
      <ul class="sample-image thumbnails" >
        <?php foreach ($data['results'] as $job ) { ?>
          <li>
            <a href="?action=selectJob&amp;job=<?php echo $job->id ?>">
              <div class="" style="background-image: url('<?php echo THUMBNAILS_PATH . $job->imagePath ?>')"></div>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </section>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>
