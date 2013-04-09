function LMCCController ($scope, LMCC, $http) {

	$scope.contractors= [];
	$scope.forestDistricts = [];
	$scope.lmccLogs = [];

	function getContractors () {
		$http.get('lmccs?type=contractors').success(function (res) {
			$scope.contractors = res.data;
		})
	}

	function getForestDistricts () {
		$http.get('forestdistricts').success(function (res) {
			$scope.forestDistricts = res.data;
		})
	}

	$scope.addNewLog = function () {
		$('#lmcc_tabs li:eq(1) a').tab('show');
		//console.log("gets here");
	}

	$scope.back = function () {
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

	getContractors();
	getForestDistricts();
}
