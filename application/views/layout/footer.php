  <!-- BEGIN FOOTER -->
  <div class="footer">
    <span>2013 &copy; Axon Information Systems.</span>
    <!-- <div class="span pull-right">
      <span class="go-top"><i class="icon-angle-up"></i></span>
    </div> -->
  </div>
  <!-- END FOOTER -->

  <?php
        //Le javascript
        // ================================================== -->
        //Placed at the end of the document so the pages load faster
        //boostrap related libraries
        echo HTML::script("js/jquery.js");
        echo HTML::script("js/bootstrap-transition.js");
        echo HTML::script("js/bootstrap-alert.js");
        echo HTML::script("js/bootstrap-modal.js");
        echo HTML::script("js/bootstrap-dropdown.js");
        echo HTML::script("js/bootstrap-scrollspy.js");
        echo HTML::script("js/bootstrap-tab.js");
        echo HTML::script("js/bootstrap-tooltip.js");
        echo HTML::script("js/bootstrap-popover.js");
        echo HTML::script("js/bootstrap-button.js");
        echo HTML::script("js/bootstrap-collapse.js");
        echo HTML::script("js/bootstrap-carousel.js");
        echo HTML::script("js/bootstrap-typeahead.js");

        //Extra Libraries
        echo HTML::script("js/libs/bootstrap-datepicker.js");
        echo HTML::script("js/libs/noty/jquery.noty.js");
        echo HTML::script("js/libs/noty/layouts/top.js");
        echo HTML::script("js/libs/noty/themes/default.js");
        echo HTML::script("js/libs/moment.min.js");
        echo HTML::script("js/libs/chosen/chosen.jquery.js");
        echo HTML::script("js/libs/select2/select2.js");
        
        //Graph Libraries
        echo HTML::script("js/libs/highcharts.src.js");
        echo HTML::script("js/libs/exporting.js");
    ?>
  
</body>
<!-- END BODY -->
</html>
