app = angular.module('ciberApp', ['ngMessages', 'fundoo.services']);
app.controller('ciberCtrl', ['$scope', 'createDialog', function($scope, $element, createDialog) {
	// Need to debug this part
    $scope.launchSimpleModal = function(alertData) {
        createDialog('', {
            title: alertData,
            backdrop: true,
            success: {
                label: 'Yay'
            }
        });
    };
    $scope.linkClick = function() {
        var alertData = this.text;
        $scope.launchSimpleModal(alertData);
        $event.preventDefault();
    };
    $scope.submitContact = function(valid) {
        if (valid) {}
    };
}]);