<!-- <script type="text/javascript" src="../js/app/controllers/lmcccontroller.js"></script> -->
<div ng-controller="LMCCController">
	<div class="container-fluid">
		<h3 class="page-title">
		LMCC
		<small>[ List by date ]</small>
		<hr>
		</h3>
	</div>
	<div class="span10"  ng-init="getLMCCs()">
		<div class="fluid ax_top_buttons">
            <div class="pull-right" style="margin-bottom:8px;">
                <a class="btn blue pull-right" href="#newlmcc"><b class="icon icon-plus"></b> New LMCC</a>
          	</div>
        </div>
		<div class="portlet box light-grey">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i>LMCC</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
					<!-- <a class="config" data-toggle="modal" href="#"></a>
					<a class="reload" href="javascript:;"></a> -->
					<a class="remove" href="javascript:;"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div role="grid" class="dataTables_wrapper form-inline" id="sample_1_wrapper">
					<div class="row-fluid">
						<table id="sample_1" class="table table-striped table-bordered dataTable">
							<thead>
								<tr role="row">
									<th></th>
									<th class="sorting">Date</th>
									<th class="hidden-phone sorting">Ref. No.</th>
									<th class="hidden-phone sorting">Contactor</th>
									<th class="hidden-phone sorting">Destination</th>
									<th class="hidden-phone sorting">Units</th>
									<th class="hidden-phone sorting">Forest District</th>
									<th class="hidden-phone sorting"></th>
								</tr>
							</thead>
							<tbody role="alert" aria-live="polite" aria-relevant="all">
								<tr class="gradeX odd" ng-repeat="lmcc in lmccs">
									<td>{{index + 1}}</td>
									<td class=" ">{{lmcc.issueDate}}</td>
									<td class="hidden-phone ">{{lmcc.referenceNumber}}</td>
									<td class="hidden-phone ">{{lmcc.company}}</td>
									<td class="hidden-phone ">{{lmcc.destination}}</td>
									<td class="hidden-phone ">{{lmcc.units}}</td>
									<td class="center hidden-phone ">{{lmcc.forestDistrict}}</td>
									<td class="hidden-phone ">
										<a href="#viewlmcc/{{lmcc.id}}" class="btn mini green-stripe">View</a>
										<a href="#editlmcc/{{lmcc.id}}" class="btn mini purple"><i class="icon-edit"></i> Edit</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>