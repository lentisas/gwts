angular.module("chosen_component",[]).directive("axChosen", function (){
	
	var linkFn;
	linkFn = function (scope,element,attrs, ngModel){
		var sel = $(element).find("select");
		var toWatch = attrs["watch"];

		scope.$watch(toWatch, function (){
			sel.trigger("liszt:updated");	
		});
		
		sel.chosen().change( function (ev,value){
			ngModel.$setViewValue(value);
			scope.$digest();			
		});

	}
 
	return { 
		require: '?ngModel',
		restrict : "E",
		link : linkFn

	}	
});