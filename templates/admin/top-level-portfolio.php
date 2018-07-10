<?php include "templates/include/header.php" ?>
  <section class="portfolio">
    <div class="category-wrapper">
      <ul class="sample-image thumbnails" >
        <li>
          <a href="?action=newJob&amp;jobCategory=<?php echo $data['results'][0]->jobCategory ?>">
            <div class="new-job"><h2>New Job</h2></div>
          </a>
        </li>
        <?php foreach ($data['results'] as $job ) { ?>
          <li>
            <a href="?action=editJob&amp;jobId=<?php echo $job->id ?>">
              <div class="" style="background-image: url('<?php echo THUMBNAILS_PATH . $job->imagePath ?>')"></div>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </section>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
