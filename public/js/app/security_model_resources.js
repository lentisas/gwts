angular.module('securityModelResources', ['ngResource']).
factory("User", function($resource){
	return $resource("users/:id", {id : '@id'},{
		query : {
			method: "GET", params : {}
		},
		update : {method : 'PUT'}
	});
}).factory("Role", function($resource){
	return $resource("roles/:id", {id : '@id'},{
		query : {
			method: "GET", params : {}
		},
		update : {method : 'PUT'}
	});
}).factory("Module", function($resource){
	return $resource("modules/:id", {id : '@id'},{
		query : {
			method: "GET", params : {}
		},
		update : {method : 'PUT'}
	});
}).factory("Securable", function($resource){
	return $resource("securables/:id", {id : '@id'},{
		query : {
			method: "GET", params : {}
		},
		update : {method : 'PUT'}
	});
}).factory("SecurablePermissions", function($resource){
	return $resource("securablepermissions/:id", {id : '@id'},{
		query : {
			method: "GET", params : {}
		},
		update : {method : 'PUT'}
	});
}).factory("ModulePermissions", function($resource){
	return $resource("modulepermissions/:id", {id : '@id'},{
		query : {
			method: "GET", params : {}
		},
		update : {method : 'PUT'}
	});
});