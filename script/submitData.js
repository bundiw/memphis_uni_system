$(document).ready(function(){
    $("#final-submit").click(function(event){
         event.preventDefault()
          const user =localStorage.getItem("user")
           const personal =localStorage.getItem("personal")
           const kin = localStorage.getItem("kin")
            const residence = localStorage.getItem("residence")
            const highschool =localStorage.getItem("highschool")
            const tertiary =localStorage.getItem("tertiary")
            const programme =localStorage.getItem("programme")
            const attatchments =localStorage.getItem("attatchments")

            // $.ajax({
			// 	type: 'POST',
			// 	url: "../API/submitData.php",
			// 	data: ,
			// 	dataType: 'json',
            //     contentType: false,
			// 	cache: false,
			// 	processData: false,
				
			// 	success: function (response) {
			// 	   alert(response)
					
					
			// 	}
			// });
            if(user=="" || personal=="" || kin=="" || residence=="" || highschool=="" || programme=="" || attatchments==""){
                alert("Please ensure you have Filled all compulsory sections!!")

            }
            $.post("../API/submitData.php",{
             "user":user,
             "personal":personal,
             "kin":kin,
             "residence":residence,
             "highschool":highschool,
             "tertiary":tertiary,
             "programme":programme,
             "attatchments":attatchments
            },function(res,status){
                alert("Wow")
            })
    })
})