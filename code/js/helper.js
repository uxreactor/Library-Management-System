


dateFormat = function(pattern,dt){ //mm-dd-yyyy
	if(dt){
		if(typeof dt !== 'object')
			dt = Date.parse(dt);
		else
			dt = dt;
	} else {
		dt=new Date();
	}

	if(!pattern || pattern === null) {
		pattern = 'dd-MM-yyyy';
	}

	var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
    ];
	
	if(pattern === 'mm-dd-yyyy')
		new_date = dt.getMonth() + ' ' + dt.getDate() + ', ' + dt.getFullYear();
	else if(pattern === 'dd-MMMM-yyyy')
		new_date = dt.getDate() + '-' + monthNames[dt.getMonth()] + '-' + dt.getFullYear();
	else if(pattern === 'dd-MM-yyyy')
		new_date = dt.getDate() + '-' + monthNames[dt.getMonth()].substr(0,3) + '-' + dt.getFullYear();
	else if(pattern === 'yyyy-mm-dd')
		new_date = dt.getFullYear() + '-' + dt.getMonth() + '-' + dt.getDate();


	return new_date;
}