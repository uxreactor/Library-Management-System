validateForm = function(array){
    var returnVal = [];
    var i = 0;
    while (i < array.length){
        if (!array[i].value) {
            returnVal[i] = array[i].errorMessage;
        }else if(array[i].type == 'email'){
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (filter.test(array[i].value)) {
                returnVal[i] = 1;
            }else {
                returnVal[i] = 'Please enter valid email id';
            }
        }else if (array[i].type == 'number'){
            var phoneno = /^\d{10}$/ ; 
            if(array[i].value.match(phoneno)){
                returnVal[i] = 1;
            }else {
                returnVal[i] = 'Please enter valid phone number ';
            }
        }else if (array[i].type == 'date'){
            var date = /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/ ;
            if(date.test(array[i].value)){
                returnVal[i] = 1;   
            }else{
                returnVal[i] = 'Please enter valid date';
            }
        }else {
            returnVal[i] = 1;
        }
        i++;
    }
    return returnVal;
}
function writeError(message,parent) {
    if(message == 1){
        removeError(parent);
        var sp = document.createElement('span');
        sp.className='error';
        parent.appendChild(sp);
        return;
    }else{
        removeError(parent);
        var sp = document.createElement('span');
        sp.className = ' error';
        sp.appendChild(document.createTextNode(message));
        parent.appendChild(sp);
    }
        
}
function removeError(parent) {
    parent.removeChild(parent.lastElementChild);  
}
function submitToServer(validation_message){
    for (var i = 0; i < validation_message.length; i++) {
        if(validation_message[i] !== 1){
            return false;
        }
    }
    return true;
}
