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

        //BEGIN JAVASCRIPTS
        // Load javascripts at bottom, this will reduce page load time

        //echo HTML::script("assets/js/jquery-1.8.3.min.js");
        echo HTML::script("assets/breakpoints/breakpoints.js");
        echo HTML::script("assets/bootstrap/js/bootstrap.min.js");
        echo HTML::script("assets/js/jquery.blockui.js");
        echo HTML::script("assets/chosen-bootstrap/chosen/chosen.jquery.min.js");
        echo HTML::script("assets/uniform/jquery.uniform.min.js");
     /*   echo HTML::script("assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js");
        echo HTML::script("assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js");*/
        echo HTML::script("assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js");
        echo HTML::script("assets/bootstrap-datepicker/js/bootstrap-datepicker.js");
        echo HTML::script("assets/bootstrap-daterangepicker/date.js");
        echo HTML::script("assets/bootstrap-daterangepicker/daterangepicker.js");
        echo HTML::script("assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js");
        echo HTML::script("assets/bootstrap-timepicker/js/bootstrap-timepicker.js");
        echo HTML::script("assets/js/app.js");
    ?>
    <script>
        jQuery(document).ready(function() {
         // initiate layout and plugins
         App.init();
        });
    </script>

</body>
<!-- END BODY -->
</html>
