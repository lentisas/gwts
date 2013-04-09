<?php echo View::make("layout.header"); ?>
  <?php echo View::make("layout.topmenu"); ?>
  <div class="page-container row-fluid ">
      <?php echo View::make("layout.navigation"); ?>
    <div class="page-content ">
        <?php echo View::make("lmccs.list"); ?>
        <?php echo View::make("lmccs.main"); ?>
    </div>
  </div>
<?php echo View::make("layout.footer"); ?>