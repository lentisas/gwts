function LMCCController ($scope, LMCC) {
	

	$scope.contractors= [
		{id: 0, name: "John Bitar", propertyMark:'JCM' },
		{id: 1, name: "AYUM Ltd", propertyMark:'AYUM' },
		{id: 2, name: "Kenbert Ltd", propertyMark:'KBT' }
	];

	$scope.forestDistricts = [
		{id: 0, name:'Bekwai', localityMark:'34'},
		{id: 0, name:'Juaso', localityMark:'14'},
		{id: 0, name:'Kumawu', localityMark:'87'}
	];


	$scope.lmccLogs = [];


	$scope.addNewLog = function () {
		
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
			length: log
		}
	}
}
