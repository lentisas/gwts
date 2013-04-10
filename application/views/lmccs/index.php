<!-- <script type="text/javascript" src="../js/app/controllers/lmcccontroller.js"></script> -->
<div ng-controller="LMCCController">
	<div class="tabbable tabbable-custom">
		<ul class="nav nav-tabs" style="display:none">
			<li class="active"><a href="#tab_2_1" data-toggle="tab">List</a></li>
			<li class=""><a href="#tab_2_2" data-toggle="tab">Details</a></li>
			<li class=""><a href="#tab_2_3" data-toggle="tab">Form</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane" id="tab_2_1">
				<?php echo View::make("lmccs.list"); ?>
			</div>
			<div class="tab-pane" id="tab_2_2">
				<?php echo View::make("lmccs.details"); ?>
			</div>
			<div class="tab-pane" id="tab_2_3">
				<?php echo View::make("lmccs.form"); ?>
			</div>
		</div>
	</div>
</div>