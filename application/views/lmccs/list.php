<div ng-controller="LMCCController">
	<div class="container-fluid">
		<h3 class="page-title">
		LMCC
		<small>[ List by date ]</small>
		<hr>
		</h3>
	</div>
	<div class="span8">
		<div class="portlet box light-grey">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i>LMCC</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
					<a class="config" data-toggle="modal" href="#portlet-config"></a>
					<a class="reload" href="javascript:;"></a>
					<a class="remove" href="javascript:;"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div role="grid" class="dataTables_wrapper form-inline" id="sample_1_wrapper">
					<div class="row-fluid">
						<table id="sample_1" class="table table-striped table-bordered dataTable" aria-describedby="sample_1_info">
							<thead>
								<tr role="row">
									<th></th>
									<th class="sorting">Date</th>
									<th class="hidden-phone sorting">Ref. No.</th>
									<th class="hidden-phone sorting">Units</th>
									<th class="hidden-phone sorting">Volume</th>
									<th class="hidden-phone sorting"></th>
								</tr>
							</thead>
							<tbody role="alert" aria-live="polite" aria-relevant="all">
								<tr class="gradeX odd" ng-repeat="lmcc in lmccs">
									<td>{{index + 1}}</td>
									<td class=" ">{{lmcc.date}}</td>
									<td class="hidden-phone "><a href="mailto:shuxer@gmail.com">{{lmcc.refNo}}</a></td>
									<td class="hidden-phone ">{{lmcc.units}}</td>
									<td class="center hidden-phone ">{{lmcc.volume}}</td>
									<td class="hidden-phone ">
										<a href="viewLMCC/{{lmcc.id}}" class="ax_grid_action_butttons"><i class="icon icon-eye-open"></i></a>
										<a href="editLMCC/{{lmcc.id}}" class="ax_grid_action_butttons"><i class="icon icon-pencil"></i></a>
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