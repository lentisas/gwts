angular.module("pager_component",[]).directive("axPager", function (pagingService){
		var linkFn;
		
		linkFn =  function (scope, linkElement, iAttrs) {
			var params = iAttrs["params"];
			var textOff = true;
			if(!params)
				throw new Error("The pager needs a params attribute");


			if(params){
				var data = params.split(";");
				var defaults = {}

				for (var i = 0; i < data.length; i++) {				
					var param = data[i].split(":");
					defaults [param[0]] = param[1];
				};
				
				_pagerId = defaults["pagerId"];
				if(!_pagerId){
					throw new Error("The pager needs a pagerId attribute");
				}

				if($.parseJSON(defaults["textOn"]) === false){
					textOff = false;
				}else {
					textOff = true;
				}
					
				
			}else{
				throw new Error("");
			}

			var pager = pagingService.get(_pagerId);

			var nextBtn = $(linkElement).find("#next");
			var prevBtn = $(linkElement).find("#prev");

			nextBtn.bind("click", function (){
				var page = pager.page();
				if(page < pager.lastPage()){
					pager.setPage(++page);
				}
				
				scope.$emit('pageBroadCast');
			});

			prevBtn.bind("click", function (){
				var page = pager.page();
				if (page > 1){
					pager.setPage(--page);
				}
				scope.$emit('pageBroadCast');
			});
			

			scope.$on('pageBroadCast', function() {
			
  		 	});

  		 	scope.$on('dataReceived', function (event, args){
  		 		summarize(args["pagerId"]);
  		 	});

  		 	scope.showText = function (){
  		 		return textOff;	

  		 	} 

  		 	function summarize(pagerId){
  		 		//this line is need else all other pagers will be triggered 
  		 		//thus the last pager to be triggered will override all existing pagers
  		 		if(pagerId !== _pagerId)
  		 			return
				var pager = window.xx = pagingService.get(pagerId);
  		 		scope.total = pager.totalRecords();
				scope.start = 1 + ((pager.page() - 1 ) * pager.limit());
				var end = pager.page() * pager.limit();
				if( end > scope.total )
					scope.end = scope.total
				else 
					scope.end = end;

  		 	}
		}
		
		
		return { 
			restrict : "E",
			link : linkFn ,
			templateUrl: "js/app/components/partials/pager_widget.html",
			transclude: true,
			scope : {
				total : "@",
				start : "@",
				end : "@"
			}
		}

	})