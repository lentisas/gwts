angular.module("filter_component",[]).directive("axFilter", function (FilterService){


	var compileFn = function (element,attrs){
	var useDates = true;
	var errrorMsg = "";
	var params = attrs["params"];
	var filterId;
	var noFilterIdMsg = "axFilter needs a params attribute with a filter of format filterId:your_filter_id";
	if(params){
		var data = params.split(";");
		var defaults = {}

		for (var i = 0; i < data.length; i++) {				
			var param = data[i].split(":");
			defaults [param[0]] = param[1];
		};
		
		filterId = defaults["filterId"];
		if(!filterId)
			throw new Error(noFilterIdMsg);

		if($.parseJSON(defaults["useDates"]) === false)
			useDates = false;
	}else{
		throw new Error(errrorMsg);
	}
		

	
	var datesTemplate = "<div class='control-group'>" +
			     "<label class='control-label' for='start_date'>Start Date:</label>" +
			     "<div class='controls'>" +
			        "<input type='text' id='start_date' placeholder='' format='dd-mm-yyyy' class='long ax_date' ng-model='axfilter.startDate'>" +
			     "</div>" +
			    "</div>" +
			    "<div class='control-group'>" +
			     "<label class='control-label' for='end_date'>End Date:</label>" +
			     "<div class='controls'>" +
			        "<input type='text' id='end_date' format='dd-mm-yyyy' placeholder='' class='long ax_date' ng-model='axfilter.endDate'>" +
			     "</div>" +
			    "</div>" ;

	var template = "<div class='btn-group pull-left ax_filter_control'>" +
    "<button  class='btn btn-info'>Filter Records</button>" +
    "<button class='btn btn-info dropdown-toggle ax_dropdown_toggle' data-toggle='dropdown'> <span class='caret'></span></button>" +
    "<div class='dropdown-menu ax_filter_form'>" +
	    	"<form class='form-vertical'>" +
	    	"<div class='extra_controls'></div> " ;
	    		
	if(useDates)
		template +=  datesTemplate;
	
	var templateEnd = "<br>"+
	"<button class='btn pull-right' id='clear_button'>Clear</button> " +
	"<button class='btn btn-info pull-right' id='filter_button'>Filter</button>" +
	
	    	"</form>" +
	    "</div>" +
	"</div>" ;

	template += templateEnd;
	
	var children = element.children();
	element.html(template);
	//this is a little hack to stop the form from being hiding when clicked
	$(".ax_filter_form form").bind("click", function (){
		return false;
	});
	
	$(element).find(".ax_filter_form .extra_controls").append(children);

	
	return {
			pre : function (scope, element){
				var filterButton = $(element).find("#filter_button");
				var filter = FilterService.get(filterId);
				var params = {};
				filterButton.bind("click",function (){
					if(useDates){
						angular.extend(params, scope["axfilter"]);
					}
					
					angular.extend(params, scope[filterId]);

					for(var i in params){
						if (!params[i]){
							delete params[i];
						}
					}

					filter.addParams(params);
					filter.run();

				});

				var clearButton = $(element).find("#clear_button");
				clearButton.bind("click", function(){
					if(useDates){
						for (var i in scope["axfilter"]){
							scope["axfilter"][i] = undefined;
						}
					}
					
					for (var i in scope[filterId]){
						scope[filterId][i] = undefined;
					}
					
					filter.clear();
					scope.$digest()
				});
			},
			post : function (scope, element){
				//console.log(element.children()[0])
			}
		}
	}

	
	var out = {
		compile : compileFn,
		//link : linkFn,
		//templateUrl: 'js/app/components/partials/filter_widget.html',
		restrict : "E",
		replace: true
	}

	return  out;
});
