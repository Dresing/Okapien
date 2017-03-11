export default class Validator{

	constructor(errorHandler){
		
		if(errorHandler){
			this.errors = errorHandler
			this.errorReporing = true
		}
		else{
			this.errorReporing = false
		}

	}


	isValidEmail(email, name = "email", message = "E-mail not correctly formatted."){
		var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);

	    	let outcome = pattern.test(email);

	    	if(!outcome && this.errorReporing){
	    		this.errors.record({
	    			[name]: message
	    		})
	    	}

	    	return outcome
	}
}