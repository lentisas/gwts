<div ng-controller="LMCCController" ng-init="viewLmcc()">
	<div class="container-fluid">
		<h3 class="page-title">
		LMCC
		<small>Details</small>
		<!-- a href="#lmccs" class="btn blue pull-right">Edit <i class="m-icon-pencil m-icon-white"></i></a> -->
		<a href="#lmccs" class="btn green pull-right">Back to List  <i class="m-icon-swapleft m-icon-white"></i></a>
		<hr>
		</h3>
	</div>
	<div class="container-fluid">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4><i class="icon-reorder"></i>LMCC Reference No: {{curLMCC.referenceNumber}}</h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#portlet-config" data-toggle="modal" class="config"></a>
				</div>
			</div>
			<div class="portlet-body">
				<div class="row-fluid">
						<!--BEGIN TABS-->
						<div class="tabbable tabbable-custom tabs-left">
							<!-- Only required for left/right tabs -->
							<ul class="nav nav-tabs tabs-left">
								<li class="active"><a href="#tab_3_1" data-toggle="tab">Basic Information</a></li>
								<li><a href="#tab_3_2" data-toggle="tab">Log Details</a></li>
								<li><a href="#tab_3_3" data-toggle="tab">Authorisation</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_3_1">
									<div class="row-fluid">
										<h4>Basic Information</h4>
										<hr>
										<div class="span4">
											<p>Contractor : <b>{{curLMCC.company}}</b></p>
											<p>Property Mark : <b>{{curLMCC.propertyMarkAgentName}}</b></p>
											<p>Forest District : <b>{{curLMCC.forestDistrict}}</b></p>
											<p>Locality Mark : <b>{{curLMCC.localityMark}}</b></p>
											<p>L.I.F Ref. No. : <b>{{curLMCC.lifRef}}</b></p>
										</div>
										<div class="span4">
											<p>Driver's Name : <b>{{curLMCC.driversName}}</b></p>
											<p>Vehicle's Reg. No. : <b>{{curLMCC.vehicleNumber}}</b></p>
											<p>Destination : <b>{{curLMCC.destination}}</b></p>
											<p>Check Point : <b>{{curLMCC.checkPoint}}</b></p>
											<p>Sawmill : <b>{{curLMCC.sawmill}}</b></p>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="tab_3_2">
									<h4>Log Details</h4>
									<hr>
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th></th>
												<th  colspan='4'></th>
												<th colspan='2'>CONTRACTORS</th>
												<th colspan='2'>SPECIES</th>
												<th colspan='6'>DIAMETER (cm)</th>
												<th colspan='5'></th>
											</tr>
											<tr>
												<th>#</th>
												<th>TIF Ref. No</th>
												<th class="hidden-phone">Reserve Code</th>
												<th class="hidden-phone">Compartment No</th>
												<th class="hidden-phone">Stock No</th>
												<th>Tree No</th>
												<th>Log No</th>
												<th>Name</th>
												<th>Code</th>
												<th>DB1</th>
												<th>DB2</th>
												<th>DB</th>
												<th>DT1</th>
												<th>DT2</th>
												<th>DT</th>
												<th>length (M)</th>
												<th>Vol (M3)</th>
												<th>Defects</th>
												<th>Grade</th>
											</tr>
										</thead>
										<tbody>
											<tr ng-repeat="log in curLMCC.logs">
												<td>{{index + 1}}</td>
												<td class="hidden-phone">{{log.tifRef}}</td>
												<td class="hidden-phone">{{log.reserveCode}}</td>
												<td class="hidden-phone">{{log.compartmentNumber}}</td>
												<td class="hidden-phone">{{log.stockNumber}}</td>
												<td class="hidden-phone">{{log.treeNumber}}</td>
												<td class="hidden-phone">{{log.logNumber}}</td>
												<td class="hidden-phone">{{log.specieName}}</td>
												<td class="hidden-phone">{{log.specieCode}}</td>
												<td class="hidden-phone">{{log.db1}}</td>
												<td class="hidden-phone">{{log.db2}}</td>
												<td class="hidden-phone">{{log.db}}</td>
												<td class="hidden-phone">{{log.dt1}}</td>
												<td class="hidden-phone">{{log.dt2}}</td>
												<td class="hidden-phone">{{log.dt}}</td>
												<td class="hidden-phone">{{log.length}}</td>
												<td class="hidden-phone">{{log.volume}}</td>
												<td class="hidden-phone">{{log.defect}}</td>
												<td class="hidden-phone">{{log.grade}}</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="tab-pane" id="tab_3_3">
									<h4>Authorization</h4>
									<hr>
									<div class="span4">
										<p>This logs have been measured by the Property Mark Holder and approval to Transport them is hereby granted.
										<br><i>Authorised FSD Officer</i></p>
										<p>Name : <b>{{curLMCC.fsdOfficerName}}</b></p>
										<p>Signature : <b>{{curLMCC.fsdOfficerSignature}}</b></p>
										<p>Date Issued : <b>{{curLMCC.issueDate}}</b></p>
										<p>Expiry Date : <b>{{curLMCC.expiryDate}}</b></p>
									</div>
									<div class="span4">
										<p>I HEREBY CERTIFY that the measurement of the logs enumerated above have been duly taken and computed by me
										<br><i>Property Mark Holder/Agent</i></p>
										<p>Name : <b>{{curLMCC.propertyMarkAgentName}}</b></p>
										<p>Signature: <b>{{curLMCC.propertyMarkAgentSignature}}</b></p>
										<p>Date : <b>{{curLMCC.issueDate}}</b></p>
									</div>
								</div>
							</div>
						</div>
					<div class="space10 visible-phone"></div>
				</div>
			</div>
		</div>
	</div>
</div>