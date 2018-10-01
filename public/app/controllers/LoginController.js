

var app = angular.module('login', ['ngMessages'],['$httpProvider', function ($httpProvider) {
  
    $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');

}]);
app.controller("LoginController", function($scope,$http,$interval,$filter) {
  $scope.ph_numbr = /^\+?\d{10}$/;
  $scope.eml_add = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

	console.log('Loged..');
	$scope.change=function(){
		console.log('changing');
	}

});




app.directive("compareTo", function ()  

{  

    return {  

        require: "ngModel", 

        scope:  

        {  

            confirmPassword: "=compareTo"  

        },  

        link: function (scope, element, attributes, modelVal)  

        {  

            modelVal.$validators.compareTo = function (val) 

            {  

                return val == scope.confirmPassword;

            };  

            scope.$watch("confirmPassword", function ()  

            {  

                modelVal.$validate();  

            });  

        }  

    };  

}); 

app.directive('convertToNumber', function() {

  return {

    require: 'ngModel',

    link: function(scope, element, attrs, ngModel) {

      ngModel.$parsers.push(function(val) {

        return val != null ? parseInt(val, 10) : null;

      });
      ngModel.$formatters.push(function(val) {

        return val != null ? '' + val : null;

      });

    }

  };

});