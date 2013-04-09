<div class="container-fluid" ng-controller="LMCCController">
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
								<th class="sorting" role="columnheader" tabindex="0" rowspan="1" colspan="1" style="width: 276px;">Username</th>
								<th class="hidden-phone sorting" style="width: 487px;">Email</th>
								<th class="hidden-phone sorting" style="width: 187px;">Points</th>
								<th class="hidden-phone sorting" style="width: 268px;">Joined</th>
								<th class="hidden-phone sorting" style="width: 268px;"></th>
							</tr>
						</thead>
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							<tr class="gradeX odd">
								<td class=" ">shuxer</td>
								<td class="hidden-phone "><a href="mailto:shuxer@gmail.com">shuxer@gmail.com</a></td>
								<td class="hidden-phone ">120</td>
								<td class="center hidden-phone ">12 Jan 2012</td>
								<td class="hidden-phone "><span class="label label-success">Approved</span></td>
							</tr>
							<tr class="gradeX even">
								<td class=" ">looper</td>
								<td class="hidden-phone "><a href="mailto:looper90@gmail.com">looper90@gmail.com</a></td>
								<td class="hidden-phone ">120</td>
								<td class="center hidden-phone ">12.12.2011</td>
								<td class="hidden-phone "><span class="label label-warning">Suspended</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>