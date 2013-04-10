function LMCCController ($scope, LMCC, $http) {
	$scope.contractors= [];
	$scope.forestDistricts = [];
	$scope.lmccLogs = [];
	$scope.lmccs = [];

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

	function getLMCCs() {
		$http.get('lmccs').success(function (res) {
			$scope.lmccs = res.data;
		})
	}

	$scope.addNewLog = function () {
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
		lmcc.$save(function (res) {
			afterSave(res);
		})
	}

	function afterSave(res,callback){
        var msg = "";
        if(res.success){
            msg = res.message;
            MSG.show(msg,"success");
            $scope.newLMCC = {};
            $scope.lmccLogs = [];
            $scope.newLog = {};
            //any other business
            if(callback)
                callback();
        }else {
            msg = res.message || "Sorry, errors were ecountered";
            MSG.show(msg);
        }
    }

	getContractors();
	getForestDistricts();

}
