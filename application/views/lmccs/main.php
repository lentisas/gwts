<script type="text/javascript" src="js/app/controllers/lmcccontroller.js"></script>
<div class="container-fluid" ng-controller="LMCCController">
  <h3 class="page-title">
    LMCC Entry Form<small></small>
    <hr>
  </h3>
  <div class="span12">
    <div class="tabbable" id="lmcc_tabs">
  <ul class="nav nav-tabs tab_headers">
    <li class="active"><a href="#lmcc_form" data-toggle="tab"> Basic Information</a></li>
    <li class=""><a href="#log_info" data-toggle="tab"> Log Details</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane form-horizontal active" id="lmcc_form">
      <div class="control-group">
        <div class="control-label">Contractor:</div>
        <div class="controls">
          <select id="contractorId" class='input-large' name="contractorId" ng-model="newLMCC.contractor"
              ng-options='contractor as contractor.name for contractor in contractors'>
          </select>
        </div>
      </div>
      <div class="control-group">
        <div class="control-label">Property Mark:</div>
        <div class="controls">
          <input class="input-large" id="propertyMark" type="text"
             ng-model="newLMCC.contractor.propertyMark"  disabled>
        </div>
      </div>
      <div class="control-group">
        <div class="control-label">Forest District:</div>
        <div class="controls">
          <select id="forestDistrict" class='input-large' name="forestDistrict" ng-model="newLMCC.forestDistrict"
              ng-options='forestDistrict as forestDistrict.name for forestDistrict in forestDistricts'>
          </select>
        </div>
      </div>
      <div class="control-group">
        <div class="control-label">Locality Mark:</div>
        <div class="controls">
          <input class="input-large" id="localityMark" type="text"
             ng-model="newLMCC.forestDistrict.localityMark"  disabled>
        </div>
      </div>
      <div class="control-group">
        <div class="control-label">LIF Reference:</div>
        <div class="controls">
          <input type="text" class="input-large" name="lifReference" id="lifReference" ng-model="newLMCC.lifReference">
        </div>
      </div>
      <div class="control-group">
        <div class="control-label">Driver's Name:</div>
        <div class="controls">
          <input type="text" class="input-large" name="driverName" id="driverName" ng-model="newLMCC.driverName">
        </div>
      </div>
      <div class="control-group">
        <div class="control-label">Vehicle No.:</div>
        <div class="controls">
          <input type="text" class="input-large" name="vehicleNumber" id="vehicleNumber" ng-model="newLMCC.vehicleNumber">
        </div>
      </div>
      <div class="control-group">
        <div class="control-label">Destination:</div>
        <div class="controls">
          <input type="text" class="input-large" name="destination" id="destination" ng-model="newLMCC.destination">
        </div>
      </div>
      <div class="control-group">
        <div class="control-label">Check Point:</div>
        <div class="controls">
          <input type="text" class="input-large" name="checkPoint" id="checkPoint" ng-model="newLMCC.checkPoint">
        </div>
      </div>
      <div class="control-group">
        <div class="control-label">Sawmill:</div>
        <div class="controls">
          <input type="text" class="input-large" name="sawmill" id="sawmill" ng-model="newLMCC.sawmill">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button class="btn btn-success" ng-click="addNewLog()">
            <i class='icon-white icon-th'></i> Add Log</button>
        </div>
      </div>
    </div>
    <div class="tab-pane form-horizontal" id="log_info">
      <div class="control-group">
        <div class="control-label">
          TIF Ref No.
        </div>
        <div class="controls">
          <input type="text" name="tifRef" class="input-large" ng-model="newlog.tifRef">
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
        </div>
        <div class="controls">
          <input type="text" name="tifRef" class="input-large" ng-model="newlog.tifRef">
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
        </div>
        <div class="controls">
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
        </div>
        <div class="controls">
        </div>
      </div>


      <div class="control-group">
        <div class="controls">
          <button class="btn btn-success" ng-click="back()">
            <i class='icon-white  icon-plus'></i> Add </button>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>

