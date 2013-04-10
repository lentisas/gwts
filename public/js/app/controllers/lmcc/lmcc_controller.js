function LMCCController ($scope, LMCC, $http, MSG, $routeParams) {
	$scope.contractors= [];
	$scope.forestDistricts = [];
	$scope.lmccLogs = [];
	$scope.lmccs = [];
	$scope.curLMCC = '';

	$scope.lmccId = $routeParams.lmccId;

	function getContractors () {
		$http.get('companies?type=contractors').success(function (res) {
			$scope.contractors = res.data;
		})
	}

	function getForestDistricts () {
		$http.get('forestdistricts').success(function (res) {
			$scope.forestDistricts = res.data;
		})
	}

	$scope.getLMCCs = function(){
		$http.get('lmccs').success(function (res) {
			$scope.lmccs = res.data;
		})
	}

	function getSpecies () {
		$http.get('species').success(function (res) {
			$scope.speciesList = res.data;
		})
	}

	$scope.viewLmcc = function(){
		/*console.log($scope.lmccs);
		angular.forEach($scope.lmccs,function(lmcc){
			if(lmcc.id == $scope.lmccId){
				$scope.curLMCC = lmcc;
				window.cc = lmcc;
			}
		})*/
		$http({method:'GET',url:'lmccs/',params:{'id':$scope.lmccId}})
		.success(function(res, status, headers, config){
			$scope.curLMCC = res.data[0];
		})
		.error(function(res, status, headers, config){
			alert('an error occurred');
		});
	}

	$scope.addNewLog = function () {
		$scope.newlog = {};
		$('#lmcc_tabs li:eq(1) a').tab('show');
		//console.log("gets here");
	}

	$scope.back = function (log) {
		//console.log(log);
		var theLog = angular.copy(log);
		theLog.id = $scope.lmccLogs.length;
		$scope.lmccLogs.push(theLog);
		$('#lmcc_tabs a:first').tab('show');
	}

	$scope.addLog = function (log) {
		var log = {
			id : $scope.lmccLogs.length + 1,
			tifRef : log.tifRef,
			reserveCode: log.reserveCode,
			compartmentNumber: log.compartmentNumber,
			stockNumber: log.stockNumber,
			treeNumber : log.treeNumber,
			logNumber : log.logNumber,
			species: log.species,
			db1: log.db1,
			db2: log.db2,
			db3: log.db3,
			dt1: log.dt1,
			dt2: log.dt2,
			dt3: log.dt3,
			length: log.length,
			vol: log.vol,
			defects: log.defects,
			grade:log.grade
		}
		$scope.lmccLogs.push(log);
	}

	$scope.saveLMCC = function () {
		var lmcc = new LMCC($scope.newLMCC);
		lmcc.logs = $scope.lmccLogs;
		lmcc.companyId = lmcc.contractor.id;
		lmcc.forestDistrictId = lmcc.forestDistrict.id;
		lmcc.$save(function (res) {
			afterSave(res);
			console.log("sdfsdfsd");
		})
	}

	function afterSave(res,callback){
        var msg = "";
        if(res.success){
            msg = res.message;
            $scope.newLMCC = {};
            $scope.lmccLogs = [];
            $scope.newlog = {};
            MSG.show(msg,"success");
            //any other business
            if(callback)
                callback();
        }else {
            msg = res.message || "Sorry, errors were ecountered";
            MSG.show(msg);
        }
    }

    $scope.LoadForm = function(){
    	getContractors();
		getForestDistricts();
		getSpecies();
    }
}