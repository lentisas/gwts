<?php echo View::make("layout.header"); ?>
  <?php echo View::make("layout.topmenu"); ?>
  <div class="page-container row-fluid ">
      <?php echo View::make("layout.navigation"); ?>
    <div class="page-content ">
    	<script type="text/javascript" src="../js/app/controllers/lmcc/lmcc_controller.js"></script>
    	<div ng-view>

    	</div>
        <?php //echo View::make("lmccs.list"); ?>
        <?php // echo View::make("lmccs.main"); ?>
    </div>
  </div>
<?php echo View::make("layout.footer"); ?>