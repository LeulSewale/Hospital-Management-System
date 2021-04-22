/**
 * @author Yushae Raza
 * Seng300 Project Iteration 2 Group 4
 * JavaScript use AJAX to reload the page with the data retrived from the database
 */
$(document).ready(function() {
        $.ajax({
        type:"POST",
        url: '../Scripts/lookup.php',
        data:{'patient':true},
        success:function(data) { 
        		var patient = document.getElementById("patient");
        		var content = JSON.parse(data)
        		for (i in content){
        			var cont=0;
        			var row= patient.insertRow(patient.length);
        			for(x in content[i]){
        				var cell=row.insertCell(cont);
        				cell.innerHTML= content[i][x];
        				cont++;

        			}
        		
        		}
              
     
              
            }
      
    });

/**
 * Prints the user's id number to the console
 * @param {*} uid user's id number 
 */
 function delete_user(uid){
 	console.log("uid " + uid);
 }
        
});