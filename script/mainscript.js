
$(document).ready(function(){
  
  
    if (localStorage.getItem("user") == "" ) {
        location.href="./index.html"
    }else{ 
        $("a").click(function(){
    //var text = $(this).attr("class");
        $("a").removeAttr("class")
        $(this).attr("class","active")
        var page = $(this).attr("href");
        page = page.replace("#","")
      
        //localStorage.setItem("page",page)
        if(page == "home"){
            location.href="personal.html"
                      
        }else if(page == "accademics"){
            //add data page  
             
            $("#content").load("./"+page+".html");
          
          
        }else if(page == "programmes"){
            //add data page  
             
            $("#content").load("./"+page+".html");
          
          
        }else{
            //filterpage
            $("#content").load("./"+page+".html");
            
        }
        
    });

    }
   
});
	
	


    

