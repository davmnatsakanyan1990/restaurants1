app.factory('RestaurantService', function($http) {
    return {
        getRestaurantData: function(data) {
            return $http({
                method : "GET",
                url : "show/" + data
            })
        },
        getRestaurantsList: function(data) {
           return $http({
                method : "GET",
                url : "restaurants?city=" + data.city+"&page="+ data.page
            })
        },
		getLogedUser: function(data) {
            return $http({
                method : "GET",
                url : "user/is_auth"
            })
        },
		getMenu: function(data) {
            return $http({
                method : "GET",
                url : "products/" + data
            })
        },
        userLogin: function(data) {
            return $http({
                method : "POST",
                url : "user/login",
                data: data
            })
        },
        userRegistration: function(data) {
            return $http({
                method : "POST",
                url : "user/register",
                data: data
            })
        },
        logout: function(data) {
            return $http({
                method : "GET",
                url : "user/logout"
            })
        },
        loginUsingFacebook: function(data) {
            return $http({
                method : "GET",
                url : "user/auth/facebook"
            })
        },
        writeComment: function(data) {
            return $http({
                method : "POST",
                url : "comment/add",
                data: data
            })
        },
        getMoreRestaurant: function(data) {
            return $http({
                method : "GET",
                url : "restaurants/more/" + JSON.stringify(data)
            })
        },
        filterRestaurant: function(data) {
            return $http({
                method : "GET",
                url : "restaurants/filter/" + JSON.stringify(data)
            })
        },

        getMoreComments: function(data){
            return $http ({
                method : "GET",
                url : 'comments?place_id='+data.place_id+'&page='+data.page
            })
        },

        sendRegistrationMail: function(email){
            return $http ({
                method: "GET",
                url: 'sendmail/'+email
            })
        }


    };
});



