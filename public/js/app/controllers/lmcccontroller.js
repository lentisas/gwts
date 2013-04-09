function LMCCController ($scope) {
	

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
}