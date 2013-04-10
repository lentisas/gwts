'use strict';
angular.module('gwts',
	[
		"modelResources",
		"securityModelResources",
		"helpers",
		"date_component",
		"chosen_component",
		"select2_component",
		/*"pager_component",*/
		"widgetbox_component",
		"print_component",
		"time_component",
		"filter_component",
		/*"pagingServices",*/
		"filterServices"
	]).config(['$routeProvider', function($routeProvider) {
  	$routeProvider.
      when('/editlmcc/:lmccId', {templateUrl: 'lmcc_form', controller: LMCCController}).
      when('/viewlmcc/:lmccId', {templateUrl: 'lmcc_details', controller: LMCCController}).
      when('/newlmcc', {templateUrl: 'lmcc_form', controller: LMCCController}).
      when('/lmccs', {templateUrl: 'lmcc_list', controller: LMCCController}).
      otherwise({redirectTo: '/'});
}])