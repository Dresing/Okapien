import Errors from './Errors'
import Validator from './Validator'
export default class Form{

	constructor(data){

		this.originalData = data

		for(let field in data){
			this[field] = data[field]
		}
		this.errors = new Errors()
		this.validator = new Validator(this.errors)
	}

    reset() {
        for (let field in this.originalData) {
            this[field] = ''
        }

        this.errors.clear();
    }


	data(){
		let data = {}

		for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
	}

    submit(requestType, endpoint) {
        
        return new Promise((resolve, reject) => {
            api.request(requestType, endpoint, this.data()).then(response =>{

                this.onSuccess(response);
                resolve(response);
            }).catch(error =>{
                this.onFailure(error);
                reject(error);
            });
        });

    }

    onSuccess(){
    	this.reset()
    }	

    onFailure(errors){

    	this.errors.record(errors)

    }

    post(endpoint) {
        return this.submit('post', endpoint);
    }

    put(endpoint) {
        return this.submit('put', endpoint);
     }

    patch(endpoint) {
        return this.submit('patch', endpoint);
    }

    delete(endpoint) {
        return this.submit('delete', endpoint);
    }
    
}