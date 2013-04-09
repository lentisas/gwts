angular.module('modelResources', ['ngResource']).
factory("Company", function ($resource){
	return $resource('company/:id', {id : '@id'}, {	    
	    update : {method : 'PUT'}
	});
}).factory("Species", function ($resource){
	return $resource('species/:id', {id : '@id'}, {
		query : {
			method: "GET", params : {}
		},
	    update : {method : 'PUT'}
	});
}).factory("ForestDistrict", function ($resource){
	return $resource('forestdistricts/:id', {id : '@id'}, {
		query : {
			method: "GET", params : {}
		},
	    update : {method : 'PUT'}
	});
}).factory("Region", function ($resource){
	return $resource('regions/:id', {id : '@id'}, {
		query : {
			method: "GET", params : {}
		},
	    update : {method : 'PUT'}
	});
}).factory("TIF", function ($resource){
	return $resource('tifs/:id', {id : '@id'}, {
		query : {
			method: "GET", params : {}
		},
	    update : {method : 'PUT'}
	});
}).factory("LMCC", function ($resource){
	return $resource('lmccs/:id', {id : '@id'}, {
		query : {
			method: "GET", params : {}
		},
	    update : {method : 'PUT'}
	});
})