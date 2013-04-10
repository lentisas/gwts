<script type="text/javascript" src="js/app/controllers/lmcccontroller.js"></script>
<div class="container-fluid">
  <h3 class="page-title">
    LMCC Entry Form<small></small>
    <hr>
  </h3>
  <div class="row-fluid" ng-controller="LMCCController">
    <div class="tabbable" id="lmcc_tabs">
      <ul class="nav nav-tabs tab_headers" style="display:none">
        <li class="active"><a href="#lmcc_form" data-toggle="tab"> Basic Information</a></li>
        <li class=""><a href="#log_info" data-toggle="tab"> Log Details</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane form-horizontal active" id="lmcc_form">
          <div class="control-group">
            <div class="control-label">Reference Number:</div>
            <div class="controls">
              <input class="input-large" id="referenceNumber" type="text"
                 ng-model="newLMCC.referenceNumber">
            </div>
          </div>
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
              <button class="btn" ng-click="addNewLog()">
                <i class='icon-white icon-plus-sign'></i> Add Log</button>
                <button class="btn btn-success" ng-click="saveLMCC()">
                <i class='icon-white icon-ok'></i> Save LMCC</button>
            </div>
          </div>

          <table class='table table-striped table-bordered ax_table'>
            <thead>
              <tr>
                <th class="ax_grid_action1">#</th>
                <th>Tree Number</th>
                <th>Log Number</th>
                <th class='ax_grid_action2'></th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="log in lmccLogs">
                <td> {{$index + 1}} </td>
                <td> {{log.treeNumber}} </td>
                <td> {{log.logNumber}} </td>
                <td>
                    <a href="#"  ng-click="removeLog(log)"> <i class='icon icon-remove'> </a></i>
                </td>
              </tr>
            </tbody>
        </table>
        </div>
        <div class="tab-pane form-horizontal" id="log_info">
          <div class="control-group">
            <div class="control-label">
              TIF Ref No.
            </div>
            <div class="controls">
              <input type="text" name="tifRef" class="input-large" ng-model="newlog.tifRef" required>
            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Reserve Code:
            </div>
            <div class="controls">
              <input type="number" name="reserveCode" class="input-large" ng-model="newlog.reserveCode" required>
            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Compartment No:
            </div>
            <div class="controls">
              <input type="number" name="compartmentNumber" class="input-large" ng-model="newlog.compartmentNumber" required>
            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Stock No:
            </div>
            <div class="controls">
              <input type="number" name="stockNumber" class="input-large" ng-model="newlog.stockNumber" required>
            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Tree Number:
            </div>
            <div class="controls">
              <input type="number" name="treeNumber" class="input-large" ng-model="newlog.treeNumber" required>
            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Log Number:
            </div>
            <div class="controls">
              <input type="number" name="logNumber" class="input-large" ng-model="newlog.logNumber" required>
            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Species:
            </div>
            <div class="controls">
              <select id="speciesId" class='input-large' name="speciesId" ng-model="newlog.speciesId"
                  ng-options='species.id as species.trade for species in speciesList'>
              </select>
            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Diameter (DB):
            </div>
            <div class="controls">
              <div class="">
                <input type="number" name="logNumber" class="input-small"
                 ng-model="newlog.db1" placeholder="DB1">
                 <input type="number" name="logNumber" class="input-small"
                 ng-model="newlog.db2" placeholder="DB2">
                <input type="number" name="logNumber" class="input-small"
                 ng-model="newlog.db" placeholder="DB">
              </div>

            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Diameter (DT):
            </div>
            <div class="controls">
              <div class="">
                <input type="number" name="logNumber" class="input-small"
                 ng-model="newlog.dt1" placeholder="DT1">
                 <input type="number" name="logNumber" class="input-small"
                 ng-model="newlog.dt2" placeholder="DT2">
                <input type="number" name="logNumber" class="input-small"
                 ng-model="newlog.dt" placeholder="DT">
              </div>
              
            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Length:
            </div>
            <div class="controls">
              <input type="number" name="lenght" class="input-large" ng-model="newlog.length" required>
            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Defect:
            </div>
            <div class="controls">
              <input type="text" name="defect" class="input-large" ng-model="newlog.defect">
            </div>
          </div>

          <div class="control-group">
            <div class="control-label">
              Grade:
            </div>
            <div class="controls">
              <input type="text" name="grade" class="input-large" ng-model="newlog.grade">
            </div>
          </div>

          <div class="control-group">
            <div class="controls">
              <button class="btn btn-success" ng-click="back(newlog)">
                <i class='icon-white  icon-plus'></i> Add </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

