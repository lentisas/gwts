function LMCCController ($scope, LMCC, $http, MSG) {
	
	$scope.contractors= [];
	$scope.forestDistricts = [];
	$scope.lmccLogs = [];

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

	function getSpecies () {
		$http.get('species').success(function (res) {
			$scope.speciesList = res.data;
		})
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

	getContractors();
	getForestDistricts();
	getSpecies();
}
