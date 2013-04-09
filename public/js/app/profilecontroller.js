function ProfileController ($scope,$http, MSG, OBJ, User){

	var _passDefault = {
		oldPassword : "",
		newPassword : "",
		confirmPassword : ""
	};

	$user = {}
	$scope.updatingProfile = 0;
	$scope.changingPassword = 0;
	$scope.updateProfile = function (user){
		var theUser = angular.copy(user);
		$scope.updatingProfile = 1;
		$http.post("users/updateprofile",theUser).success(function (res){
			var msg = "";
			if(res.success){
				msg = res.message || "Profile Updated Successfully";
				MSG.show(msg, "success");
				$scope.updatingProfile = 0;
			}else {
				msg = res.message || "Sorry errors were ecountered"; 
				MSG.show(msg);
				$scope.updatingProfile = 0;
			}
		});
	}

	$scope.changePassword = function (){
		var thePass = OBJ.rectify(angular.copy($scope.password),_passDefault);

		$scope.changingPassword = 1;
		$http.post("users/changepassword",thePass).success(function (res){
			var msg = "";
			if(res.success){
				msg = res.message || "Password changed Successfully";
				MSG.show(msg, "success");
				$scope.changingPassword = 0;

			}else {
				msg = res.message || "Sorry errors were ecountered"; 
				MSG.show(msg);
				$scope.changingPassword = 0;
			}
		})
	}
}