app.controller("rootController", function($scope, $rootScope, $http, $document, $window, $timeout, RestaurantService) {
    
    $scope.search = true;
    $scope.custom = false;
    $scope.animateTopMenuVar = false;
    $scope.openLogOut = false;
    var userNameFull = localStorage.getItem("userName");
    var userName = JSON.parse(userNameFull);
    if(userName){
        $scope.userFirstLetter = userName.substring(0,1);
    }
    $scope.toggleMenu = function(menu) {
        if(menu == 'home'){
            //$scope.first = true;
            if($scope.custom && $scope.first){
                $scope.first = true;
                $scope.custom = false;
            }else if($scope.custom && $scope.first == false){
                $scope.custom = true;
                $scope.first = true;
            }else if($scope.custom == false){
                $scope.custom = true;
                $scope.first = true;
            }
            //$scope.custom = $scope.custom === false ? true: false;
        }else if(menu == 'place'){
            //$scope.first = false;
            if($scope.custom && $scope.first){
                $scope.first = false;
                $scope.custom = true;
            }else if($scope.custom && $scope.first == false){
                $scope.custom = false;
                $scope.first = false;
            }else if($scope.custom == false){
                $scope.custom = true;
                $scope.first = false;
            }
            //$scope.custom = $scope.custom === false ? true: false;
        }

        console.log($scope.first)
    };

    $scope.showSearch = function(){
        $scope.search = false
    };

    if(window.innerWidth <=767)
    {
        $scope.search = false
    };

    $scope.toggleTopMenu = function() {
        $scope.animateTopMenuVar = $scope.animateTopMenuVar === false ? true: false;
    };


    $scope.categories = {
        f1: {
            title: 'The place where be the restaurant',
            text: 'text text text text text text text text text text text text'
        },
        f2: {
            title: 'The place where be the restaurant',
            text: 'text text text text text text text text text text text text'
        },
        f3: {
            title: 'The place where be the restaurant',
            text: 'text text text text text text text text text text text text'
        },
        f4: {
            title: 'The place where be the restaurant',
            text: 'text text text text text text text text text text text text'
        },
        f5: {
            title: 'The place where be the restaurant',
            text: 'text text text text text text text text text text text text'
        },
        f6: {
            title: 'The place where be the restaurant',
            text: 'text text text text text text text text text text text text'
        },
        f7: {
            title: 'The place where be the restaurant',
            text: 'text text text text text text text text text text text text'
        }
    };

    $scope.places = [
        ['Abanda',  'Abbeville', 'Abbotsford', 'Abbott', 'Abbottstown', 'Abbyville', 'Abercrombie', 'Aberdeen', 'Aberdeen', 'Gardens'],
        ['Abanda',  'Abbeville', 'Abbotsford', 'Abbott', 'Abbottstown', 'Abbyville', 'Abercrombie', 'Aberdeen', 'Aberdeen', 'Gardens'],
        ['Abanda',  'Abbeville', 'Abbotsford', 'Abbott', 'Abbottstown', 'Abbyville', 'Abercrombie', 'Aberdeen', 'Aberdeen', 'Gardens'],
        ['Abanda',  'Abbeville', 'Abbotsford', 'Abbott', 'Abbottstown', 'Abbyville', 'Abercrombie', 'Aberdeen', 'Aberdeen', 'Gardens'],
        ['Abanda',  'Abbeville', 'Abbotsford', 'Abbott', 'Abbottstown', 'Abbyville', 'Abercrombie', 'Aberdeen', 'Aberdeen', 'Gardens'],
        ['Abanda',  'Abbeville', 'Abbotsford', 'Abbott', 'Abbottstown', 'Abbyville', 'Abercrombie', 'Aberdeen', 'Aberdeen', 'Gardens'],
    ];

    $scope.toggleLogOut = function () {
        $scope.openLogOut = $scope.openLogOut === false ? true: false;
    };

    $scope.currentRest = function(id){
        $rootScope.currentId = id;
        var restId = localStorage.getItem("restId");
        //var restaurantId = JSON.parse(restId);
        if(restId){
            localStorage.removeItem("restId");
        }
        var currentRest = JSON.stringify(id);
        localStorage.setItem('restId',currentRest);
    };

    RestaurantService.getLogedUser()
        .then(function (response) {
            if(response.data.status == 1){
                $rootScope.logedUser = true;

                //set user name to local storage for social login
                if(!localStorage.getItem('userName')) {
                    var user = response.data.user;
                    var un = user.name;
                    $scope.userFirstLetter = un.substring(0, 1);
                    var userName = JSON.stringify(un);
                    localStorage.setItem('userName', userName);
                }

            }
        });
	
	//login and register part
    var animate = function (element) {
        element.animate({ opacity: '0.4', height: '100px'}, "slow");
        element.animate({ opacity: '1'}, "slow");
        element.animate({ opacity: '0.4'}, "slow");
        element.animate({ opacity: '0', height: '0'}, "slow");
    };
    var confirm = document.getElementsByClassName('confirm');
	$scope.loginUser = function(data){
	    if(data && data.password && data.email){
            RestaurantService.userLogin(data)
                .then(function (response) {
                    if(response.data.status == "ok") {
                        var user = response.data.user;
                        $scope.successLogin = true;
                        var un = user.email;
                        $scope.userFirstLetter = un.substring(0,1);
                        $scope.user = {};
                        var userName = JSON.stringify(un);
                        localStorage.setItem('userName',userName);
                        $scope.reset();
                    }
                    RestaurantService.getLogedUser()
                        .then(function (response) {
                            if(response.data.status == 1){
                                $rootScope.logedUser = true;
                            }
                        });
                }, function(error){
                    console.log(error.data)
                });
        }else{
            $scope.reset();
        }
	};
	$scope.register = function(user){
	    if(user && user.name && user.email && user.password && user.confirmPassword){
            RestaurantService.userRegistration(user)
                .then(function (response) {
                    if(response.data.status == "ok") {
                        $scope.successRegister = true;
                        var un = user.email;
                        $scope.userFirstLetter = un.substring(0,1);
                        var userName = JSON.stringify(un);
                        localStorage.setItem('userName',userName);
                        $scope.currentUser = {};
                        $scope.reset();
                        animate($(".confirm"));
                        
                        RestaurantService.sendRegistrationMail(user.email)
                            .then(function(response){

                            });
                    }
                    RestaurantService.getLogedUser()
                        .then(function (response) {
                            if(response.data.status == 1){
                                $rootScope.logedUser = true;
                            }
                        });
                }, function(error){
                    console.log(error.data);
                    animate($(".error"));
                });
        }else{
            $scope.reset();
        }
	};
	$scope.logout = function () {
        RestaurantService.logout()
            .then(function (response) {
                if(response.data.status == "ok"){
                    $rootScope.logedUser = false;
                    localStorage.removeItem("userName");
                }else{
                    $scope.successLogin = false;
                }
            });
    };
    $scope.reset = function() {
        $scope.loginForm.$setPristine();
        $scope.loginForm.$setUntouched();

        $scope.registerForm.$setPristine();
        $scope.registerForm.$setUntouched();

        //$scope.user = angular.copy($scope.master);
    };

    //$scope.reset();

    $scope.loginFacebook = function () {
       // RestaurantService.loginUsingFacebook();
        window.location = BASE_URL+'/user/auth/facebook';
    }

    $scope.loginGoogle = function () {
        // RestaurantService.loginUsingFacebook();
        window.location = BASE_URL+'/user/auth/google';
    }

});