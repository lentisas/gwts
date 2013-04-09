<?php echo HTML::script("js/app/controllers/lmcccontroller.js"); ?>
<div class="container-fluid" ng-controller="LMCCController">
  <h3 class="page-title">
    LMCC Entry Form<small></small>
    <hr>
  </h3>
  <div class="span12">
    <div class="form-horizontal">
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
          <button href="#" class="btn btn-success" ng-click="addNewLog()">
            <i class='icon-white icon-th'></i> Add Log </button>
        </div>
      </div>
    </div>

  </div>
</div>