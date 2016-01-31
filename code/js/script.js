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

var viewData = function(records,parent) {
   table = document.createElement('table');
   table.setAttribute("class","table table-bordered table-striped");
   thead = document.createElement('thead');
   tab_row = document.createElement('tr');
   var object = "";
   for (var key in records) {
       object = records[key];
       console.log(object);
       for (var key in object) {
           tab_head = document.createElement('th');
           tab_head.textContent = key; 
           if(key == 'action'){
               s = object[key].split(",") ;
               tab_head.setAttribute("colspan",s.length);
           }
           tab_row.appendChild(tab_head);      
       }
       break;
   }
   thead.appendChild(tab_row);
   tbody = document.createElement('tbody');  
   for (var key in records) {
       tab_row = document.createElement('tr');
       object = records[key];
       for (var key in object) {
           if(key == 'action'){
               s = object[key].split(",") ;
               for(var i=0; i< s.length;i++){
                   tab_data = document.createElement('th');
                   button = document.createElement('input');
                   button.setAttribute("type","button");
                   button.setAttribute("class","btn btn-info");
                   button.setAttribute("value",s[i]);
                   tab_data.appendChild(button);
                   tab_row.appendChild(tab_data);
               }
           }else{
               tab_data = document.createElement('th');
               tab_data.textContent = object[key]; 
               tab_row.appendChild(tab_data);  
            }   
       }   
       tbody.appendChild(tab_row);
   }
  table.appendChild(thead);
  table.appendChild(tbody);
  parent.appendChild(table);
}
