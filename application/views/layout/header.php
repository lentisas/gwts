<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" ng-app="gwts"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8"  />
  <title>Ghana Wood Tracking System</title>
  <!--<meta content="width=device-width, initial-scale=1.0" name="viewport" />-->
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
  <meta content="" name="gwts" />
  <meta content="" name="axon informatio  systems" />
  <?php

        //Le styles
        echo HTML::style("css/bootstrap.css");

        echo HTML::style("css/bootstrap-responsive.css");
        echo HTML::style("css/app.css");
        echo HTML::style("css/font-awesome/css/font-awesome.css");
        echo HTML::style("css/metro.css");
        echo HTML::style("css/style.css");
        echo HTML::style("css/style_default.css");
        echo HTML::style("css/style_responsive.css");

        echo HTML::style("css/ax_filter.css");
        echo HTML::style("css/jquery.pnotify.default.css");
        echo HTML::style("css/chosen/chosen.css");
        echo HTML::style("css/datepicker.css");
        echo HTML::style("css/select2/select2.css");

        echo HTML::style("assets/css/style.css");
        echo HTML::style("assets/css/style_responsive.css");
        echo HTML::style("assets/css/style_default.css");
        echo HTML::style("assets/uniform/css/uniform.default.css");
     ?>
    <style type="text/css">
        /*This is need to hide {{}} when the app loads*/
        [ng-cloak] {
            display: none;
        }
    </style>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"");
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">

<?php
    //Libraries
    echo HTML::script("js/libs/angular.min.js");
    echo HTML::script("js/libs/angular-resource.min.js");
    //end of libraries

    //Compnents && Widget Services
    echo HTML::script("js/app/components/services/paging_service.js");
    echo HTML::script("js/app/components/services/filtering_service.js");

    //Compnents && Widgets
    echo HTML::script("js/app/components/date_picker_component.js");
    echo HTML::script("js/app/components/widget_container_component.js");
    echo HTML::script("js/app/components/pager_component.js");
    echo HTML::script("js/app/components/chosen_component.js");
    echo HTML::script("js/app/components/print_component.js");
    echo HTML::script("js/app/components/filter_component.js");
    echo HTML::script("js/app/components/time_component.js");
    echo HTML::script("js/app/components/select_component.js");

    //App Scripts
    echo HTML::script("js/app/app.js");
    echo HTML::script("js/app/helpers.js");
    echo HTML::script("js/app/model_resources.js");
    echo HTML::script("js/app/security_model_resources.js");
    echo HTML::script("js/app/profilecontroller.js");
    //end of app scripts
  ?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body ng-cloak class="fixed-top">