<?php include 'top-header.php'; ?>
  <div class="jumbotron"></div>
  <div class="section-title">
    <div class="">
      <h2>
        <?php
        switch ($subCatID) {
          case 0:
            echo "Homes Exterior";
            break;

          case 1:
            echo "Homes Interior";
            break;

          case 2:
            echo "Media Rooms";
            break;

          case 3:
            echo "Commercial";
            break;

          default:
            echo "Homes Exterior";
            break;
        }
        ?>
     </h2>
    </div>
  </div>
  <div class="subcategories">
    <ul class="subcategory-list">
      <li name="0"><a href="?action=selectSubcategory&amp;id=0"><p class="<?php if ($subCatID == 0) {echo "selected";} ?>">Homes Exterior</p></a></li>
      <li name="1"><a href="?action=selectSubcategory&amp;id=1"><p class="<?php if ($subCatID == 1) {echo "selected";} ?>">Homes Interior</p></a></li>
      <li name="2"><a href="?action=selectSubcategory&amp;id=2"><p class="<?php if ($subCatID == 2) {echo "selected";} ?>">Media Rooms</p></a></li>
      <li name="3"><a href="?action=selectSubcategory&amp;id=3"><p class="<?php if ($subCatID == 3) {echo "selected";} ?>">Commercial</p></a></li>
      <!-- <li name="1"><p>Homes Interior</p></li>
      <li name="2"><p>Media Rooms</p></li>
      <li name="3"><p>Commercial</p></li> -->
    </ul>
  </div>
