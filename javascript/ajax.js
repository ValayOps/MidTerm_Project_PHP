//error handling (mandatory)


function handleError(error){
    
    alert("An error occured in the javascript code "+error);
    
}

function searchCustomer(){
    
    try{
        //we need a variable to perform an Ajax request
        var xhr = getXmlHttpRequest();
        xhr.onreadystatechange = function(){
            //AJAX ready states
            
            if(xhr.readyState == 4 && xhr.status == 200){
                document.getElementById('searchResult').innerHTML =xhr.responseText;
            }
            
            ////
        }

        xhr.open("POST","searchPurchases.php");
        //specify that the request doesnot contain binary data
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        var searchTextbox=document.getElementById('searchQuery');
        var searchQuery=searchTextbox.value;
        
        xhr.send("searchQuery="+searchQuery);
       
     }
    catch(error){}
        
    
}

function getXmlHttpRequest(){
    try{
            var xhr=null;
        if(window.XMLHttpRequest){
            xhr=new XMLHttpRequest();
        }
        else{
             xhr=new XMLHttpRequest();
        }
        return xhr;
    }
    catch(error){
         handleError(error);
    }
    
}