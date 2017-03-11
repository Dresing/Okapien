export default class API{
	
	constructor(){

		//Prefix that is added to tokens
		this.tokenPrefix = "JWT "

		//Base url for API-endpoints
		this.baseURL = "https://sidecourttesttt.herokuapp.com"

		//Key value in tupple where a token is stored.
		this.tokenStorageName = "token"

		//Unauthorized status-code
		this.UNAUTHORIZED = 401

		//Redirect address of a request is unauthroized
		this.loginUrl = '/login'
	}

	url(endpoint = "/"){
		return this.baseURL + endpoint
	}

	login(token, remember = false){

		//The user desires the authentication to be remembered beyond the session
		if(remember){
			localStorage.setItem(this.tokenStorageName, this.tokenPrefix + token);
		}
		else{
			sessionStorage.setItem(this.tokenStorageName, this.tokenPrefix + token);
		}
		
	}

	logout(){
		localStorage.removeItem(this.tokenStorageName);
		sessionStorage.removeItem(this.tokenStorageName);

	}

	isAuth(){
		return (sessionStorage.getItem(this.tokenStorageName) != null || localStorage.getItem(this.tokenStorageName) != null)
	}


    request(requestType, endpoint, data = []) {
        return new Promise((resolve, reject) => {
            axios[requestType](this.url(endpoint), data)
                .then(response => {
                    resolve(response.data);
                })
                .catch(error => {
                	//The request was unauthroized
                	if(error.response.status === this.UNAUTHORIZED){

                		//Log out user and send to login-page.
                		this.logout();
                		router.push('/login');

                	}
                    reject(error.response.data);
                });
        });
    }

    post(endpoint, data = []) {
        return this.request('post', endpoint, data);
    }

    put(endpoint, data = []) {
        return this.request('put', endpoint, data);
     }

    patch(endpoint, data = []) {
        return this.request('patch', endpoint, data);
    }

    delete(endpoint, data = []) {
        return this.submit('delete', endpoint, data);
    }    	
    get(endpoint, data = []) {
        return this.submit('get', endpoint, data);
    }   

}		