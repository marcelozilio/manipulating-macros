(function () {
    'use strict';
    
    angular.module('macros').factory('HttpResquestService', HttpResquestService);
    
    var wsUrl = "";

    var defaultHeaderVars = {
        'Content-Type':'application/x-www-form-urlencoded; charset=UTF-8'
    };
    
    var postRequest = function(urlPath, data) {
        return $http({
            method: 'POST',
            headers: defaultHeaderVars,
            url: wsUrl + urlPath,
            data: data || {}
        });
    };
    
    var getRequest = function(urlPath, data) {
        return $http({
            method: 'GET',
            headers: defaultHeaderVars,
            url: wsUrl + urlPath
        });
    };
    
    return {
        post: postRequest,
        get: getRequest
    }
});