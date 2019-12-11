var app = angular.module('appme', ["ngTable","angularjs-dropdown-multiselect",'ngMaterial'] ,function($interpolateProvider) {
	$interpolateProvider.startSymbol('{%');
	$interpolateProvider.endSymbol('%}');
});

app.controller('projectController', ['$scope', '$http', 'NgTableParams', '$mdToast', function productController($scope, $http, NgTableParams, $mdToast){
	var formData = new FormData();
	this.$onInit = function() {
		$http.get('admin/get-data-project')
		.then((res) => {
			console.log(res.data);
			$scope.datas= res.data;
			$scope.project = new NgTableParams({}, { dataset: $scope.datas});
		});
	}

	$scope.delete = (data) => {
		var index = $scope.datas.indexOf(data);
		if(index >= 0 ){
			$scope.datas.splice(index, 1);

			$scope.project = new NgTableParams({}, { dataset: $scope.datas});

			$http.post('admin/delete/project',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
	$scope.setTheFiles = function ($files) {
        angular.forEach($files, function (value, key) {
            formData.append('imagefile[]', value);
        });
    };
}]);

app.controller('categoryController', ['$scope', '$http', 'NgTableParams', '$mdToast', function productController($scope, $http, NgTableParams, $mdToast){
	var formData = new FormData();
	this.$onInit = function() {
		$http.get('admin/get-data-category')
		.then((res) => {
			console.log(res.data);
			$scope.datas= res.data;
			$scope.category = new NgTableParams({}, { dataset: $scope.datas});
		});
	}
	$scope.change = function(data) {
		if(!data.show) {
			$http.post('admin/edit-data-category', {
				_token : $scope.csrf,
				id: data.id,
				name: data.name,
				content: data.content
			})
			.then((res) => {
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Sửa thành công')
			        .position('top right')
		        	.hideDelay(3000)
		        )
			});
		}
		data.show = !data.show;

	}
	$scope.delete = (data) => {
		var index = $scope.datas.indexOf(data);

		if(index >= 0 ){
			$scope.datas.splice(index, 1);

			$scope.category = new NgTableParams({}, { dataset: $scope.datas});
			
			$http.post('admin/delete/category',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
	$scope.new = function() {
		$http.post('admin/create/category', {
			_token : $scope.csrf,
			name: $scope.name,
			content: $scope.content
		})
		.then((res) => {
			$scope.name = null;
			$scope.content = null;
			$scope.datas.unshift(res.data);
			$scope.category = new NgTableParams({}, { dataset: $scope.datas});
			$mdToast.show(
				$mdToast.simple()
				.textContent('Thêm thành công')
				.position('top right')
				.hideDelay(3000)
			)
		})
		.catch((e) => {
			$mdToast.show(
				$mdToast.simple()
				.textContent('Có lỗiiiiiii')
				.position('top right')
				.hideDelay(3000)
			)
		})
	}
	$scope.setTheFiles = function ($files) {
        angular.forEach($files, function (value, key) {
            formData.append('imagefile[]', value);
        });
    };
}]);

app.controller('userController', ['$scope', '$http', 'NgTableParams', '$mdToast', function productController($scope, $http, NgTableParams, $mdToast){
	var formData = new FormData();
	this.$onInit = function() {
		$scope.taskUser = [{
			text: "Chưa xác nhận",
			value: 0
		}, {
			text: "Người dùng",
			value: 1
		}, {
			text: "Admin",
			value: 2
		}];
		$http.get('admin/get-data-user')
		.then((res) => {
			console.log(res.data);
			res.data.forEach(e => {
				if(e.level == 0) {
					e.level = {
						text: "Chưa xác nhận",
						value: 0
					}
				}else if(e.level == 1) {
					e.level = {
						text: "Người dùng",
						value: 1
					}
				}else {
					e.level = {
						text: "Admin",
						value: 2
					}
				}
			})
			$scope.datas= res.data;
			$scope.user = new NgTableParams({}, { dataset: $scope.datas});
		});
	}
	$scope.change = function(data) {
		console.log(data)
		if(!data.show) {
			$http.post('admin/edit-data-user', {
				_token : $scope.csrf,
				id: data.id,
				name: data.name,
				level: data.level.value
			})
			.then((res) => {
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Sửa thành công')
			        .position('top right')
		        	.hideDelay(3000)
		        )
			});
		}
		data.show = !data.show;

	}
	$scope.delete = (data) => {
		var index = $scope.datas.indexOf(data);

		if(index >= 0 ){
			$scope.datas.splice(index, 1);

			$scope.user = new NgTableParams({}, { dataset: $scope.datas});
			
			$http.post('admin/delete/user',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
	$scope.setTheFiles = function ($files) {
        angular.forEach($files, function (value, key) {
            formData.append('imagefile[]', value);
        });
    };
}]);

app.controller('commentController', ['$scope', '$http', 'NgTableParams', '$mdToast', function productController($scope, $http, NgTableParams, $mdToast){
	var formData = new FormData();
	this.$onInit = function() {
		$http.get('admin/get-data-comment')
		.then((res) => {
			console.log(res.data);
			$scope.datas= res.data;
			$scope.comment = new NgTableParams({}, { dataset: $scope.datas});
		});
	}
	$scope.delete = (data) => {
		var index = $scope.datas.indexOf(data);

		if(index >= 0 ){
			$scope.datas.splice(index, 1);

			$scope.comment = new NgTableParams({}, { dataset: $scope.datas});
			
			$http.post('admin/delete/comment',{
				_token : $scope.csrf,
				id: data.id
			}).then((req)=>{
				$mdToast.show(
			        $mdToast.simple()
			        .textContent('Đã xóa')
			        .position('top right')
		        	.hideDelay(3000)
		        )
				console.log(req);
			})
		}
	}
	$scope.setTheFiles = function ($files) {
        angular.forEach($files, function (value, key) {
            formData.append('imagefile[]', value);
        });
    };
}]);

app.directive('ngFiles', ['$parse', function ($parse) {
    function file_links(scope, element, attrs) {
        var onChange = $parse(attrs.ngFiles);
        element.on('change', function (event) {
            onChange(scope, {$files: event.target.files});
        });
    }
    return {
        link: file_links
    }
}]);