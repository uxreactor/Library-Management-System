  /**
   * @validateForm : This function validates the values in array If the value is empty it returns the error message it checks email type value to email reguler expression, 
   *          mobile number type to mobile number reguler expression and date type to date reguler expression.
   * @author : Prabhakar, Nagalakshmi
   *
   * @param : array - Input values
   *
   * @return/outcome : It will returns 1 if the data is valid else returns error message.
   */
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


 
/**
   * @writeError : This function writes error message for corresponding field .
   * @author : Prabhakar
   *
   * @param : string - Error message
   * @param : string - Parent id
   *
   * @return/outcome : It will write error message for corresponding field.
   */


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
        sp.className = 'error';
        sp.appendChild(document.createTextNode(message));
        parent.appendChild(sp);
    }
        
}

/**
   * @removeError : This function remove earlier error message for corresponding field .
   * @author : Prabhakar
   *
   * @param : string - Parent id
   *
   * @return/outcome : It will write error message for corresponding field.
   */

function removeError(parent) {
    parent.removeChild(parent.lastElementChild);  
}

/**
   * @submitToServer : This function checks all values in given array are true.
   * @author : Pradeep
   *
   * @param : array - Validation array
   *
   * @return/outcome : It will true if all values in array are true and it returns false if all values in array are false.
   */

function submitToServer(validation_message){
    for (var i = 0; i < validation_message.length; i++) {
        if(validation_message[i] !== 1){
            return false;
        }
    }
    return true;
}

/**
   * @pagination : This function creates table body by taking values in array, page size and page number. If tbody alreadu exists it
   *               it removes tbody content and creates new tbody with array values.
   * @author : Pradeep
   *
   * @param : array - Table values
   * @param : number - page size
   * @param : number - page number
   *
   * @return/outcome : It will removes earlier tbody content and creates new tbody with array values.
   */

function pagination(array,page_size,page_no){ 
  var start_page = page_size*(page_no-1);
  var end_page = (page_size*page_no)-1;
  if(document.getElementsByTagName('tbody').length == 0) {
    tbody = document.createElement('tbody');  
  } else {
    tbody = document.getElementsByTagName('tbody')[0];
    tbody.innerHTML = '';
  }
  
  for (var i=start_page; i<=end_page; i++) {
     tab_row = document.createElement('tr');
     object = array[i];
     for (var key in object) {
         if(key == 'Action'){
             s = object[key].split(",") ;
             for(var j=0; j< s.length;j++){
                tab_data = document.createElement('td');
                button = document.createElement('input');
                button.setAttribute("type","button");
                button.setAttribute("class","btn btn-info "+s[j]);
                button.setAttribute("data-toggle","modal");
                button.setAttribute("data-target","#help");
                button.setAttribute("value",s[j]);
                tab_data.appendChild(button);
                tab_row.appendChild(tab_data);
             }
         }else{
             tab_data = document.createElement('td');
             tab_data.textContent = object[key]; 
             tab_row.appendChild(tab_data);  
          }   
     }   
     tbody.appendChild(tab_row);
  }
  table.appendChild(tbody);
}

/**
   * @paginationView : This function creates pagination view for tables and attaches a click eent for every page and prev, next buttons.
   * @author : Pradeep
   *
   * @param : array - Table values
   * @param : number - page size
   *
   * @return/outcome : It will create pagination view for tables and attaches a click eent for every page and prev, next buttons.
   */

function paginationView(array,page_size){
  if(!page_size) {
    page_size = 10;
  }
  var pag_num_count = Math.ceil(array.length/page_size);
  var list_item = document.createElement('li');
  list_item.setAttribute('class','page-item');
  var anchor = document.createElement('a');
  anchor.setAttribute('class','page-link');
  anchor.setAttribute('id','previous')
  anchor.setAttribute('aria-label','Previous');
  anchor.setAttribute('href','#');
  list_item.appendChild(anchor);
  document.getElementById('pagination1').appendChild(list_item);
  //Event
  anchor.addEventListener('click',function() {
    var current_selection = $('.page-link.active').closest('li').prev('li').children('.page-link');
    $('.page-link').removeClass('active');
    var page_no = current_selection.text();
    current_selection.addClass('active');
    if(!page_no){
      // first element of pagination
    }else{
      pagination(array,page_size,page_no);
    }
    return false;
  });  
  for (var i = 1; i <= pag_num_count; i++) {
    list_item = document.createElement('li');
    list_item.setAttribute('class','page-item');
    anchor = document.createElement('a');
    anchor.textContent = i;
    anchor.setAttribute("href","#");
    anchor.setAttribute("id","page"+i);
    anchor.setAttribute('class','page-link');
    list_item.appendChild(anchor);
    document.getElementById('pagination1').appendChild(list_item);
    anchor.addEventListener('click',function() {
      $('.page-link').removeClass('active');
      pagination(books,page_size,$(this).text());
      this.className += ' active';
      return false;
    });
    
  }
  list_item = document.createElement('li');
  list_item.setAttribute('class','page-item');
  anchor = document.createElement('a');
  anchor.setAttribute('class','page-link');
  anchor.setAttribute('id','next1')
  anchor.setAttribute('aria-label','Next');
  anchor.setAttribute('href','#');
  list_item.appendChild(anchor);
  document.getElementById('pagination1').appendChild(list_item);
  //Event
  anchor.addEventListener('click',function() {
    var current_selection = $('.page-link.active').closest('li').next('li').children('.page-link');
    $('.page-link').removeClass('active');
    var page_no = current_selection.text();
    current_selection.addClass('active');
    if(!page_no){
      // last element of pagination
    }else{
      pagination(array,page_size,page_no);
    }
    return false;
  });
  pagination(array,page_size,1);
}


/**
   * @viewData : This function creates table headers by taking values in array keys.
   * @author : Pradeep
   *
   * @param : array - Table values
   * @param : string - parent id
   * @param : number - page size
   *
   * @return/outcome : It will create table headers by taking values in array keys.
   */

var viewData = function(records,parent,page_size) {
  table = document.createElement('table');
  table.setAttribute("class","table table-bordered table-striped table-condensed");
  thead = document.createElement('thead');
  tab_row = document.createElement('tr');
  var object = "";
  for (var key in records) {
     object = records[key];
     for (var key in object) {
         tab_head = document.createElement('th');
         tab_head.textContent = key; 
         if(key == 'Action'){
             s = object[key].split(",") ;
             tab_head.setAttribute("colspan",s.length);
         }
         tab_row.appendChild(tab_head);      
     }
     break;
   }
  thead.appendChild(tab_row);   
  table.appendChild(thead);
  parent.appendChild(table);
}



/**
   * @viewData : This function removes on screen errors in form when the form field is focussed.
   * @author : Nagalakshmi Yarra, Yaswanth Jilakara.
   *
   *
   * @return/outcome : It will remove inline errors.
   */
  var RemoveInlineError = function() {
    $('input').focus(function() {
      $(this).closest('.form-group').find('span').text('').removeAttr("class");
    });
  }