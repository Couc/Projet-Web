function Change()
			{	
			
        	var login = document.getElementById('login').value;
        	var body = document.getElementById('body').value;
        	var id_art = document.getElementById('id_art').value;
        	
            xmlhttp=new XMLHttpRequest();

            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                        document.getElementById("comment_general").innerHTML+=xmlhttp.responseText;
                        
                    }
            }
            xmlhttp.open("GET","submit.php?login="+login+"&body="+body+"&id_art="+id_art,true);
            xmlhttp.send();
		}
		
		
		//**************************************  like and dislike ***********************************//
		 
		 function like(){
		 	
      		$("#like").fadeIn("slow",like1);
    
		 }
		 function like1(){
		 	$("#like").delay(10000).fadeOut("slow");
		 }
		  
	 

		function like_base(valeur){
			
			var login = document.getElementById('login').value;
        	var id_art = document.getElementById('id_art').value;
        	var nb_likes = valeur;
        	
            xmlhttp=new XMLHttpRequest();

            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                    	if(xmlhttp.responseText == "dejalike")
                    	{
                    		
                    		nb_likes = nb_likes - 1;
                    		document.getElementById("nombre_likes").innerHTML ="<i style=\"margin-bottom:10px;\" class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>" + nb_likes + " likes"   ;   
                         	document.getElementById("like_div").innerHTML ="<img onclick =\"like_base("+nb_likes+");\" id=\"like_button\" src=\"../img/smile.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;-moz-border-radius-topleft: 10px;border-top-left-radius: 10px;\"/><img onclick =\"dislike_base("+nb_likes+");\" id=\"dislike_button\" src=\"../img/no_smile.png\" style=\"-webkit-border-top-right-radius: 10px;-moz-border-radius-topright: 10px;border-top-right-radius: 10px;\"/>";               
                    	
                    	}
                    	else if(xmlhttp.responseText== "dejadislike1"){
                    		
                    		nb_likes = nb_likes + 2;
                    		document.getElementById("nombre_likes").innerHTML ="<i style=\"margin-bottom:10px;\" class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>" + nb_likes + " likes"   ;   
                         	document.getElementById("like_div").innerHTML ="<img onclick =\"like_base("+nb_likes+");\" id=\"like_button\" src=\"../img/smile_yellow.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;-moz-border-radius-topleft: 10px;border-top-left-radius: 10px;\"/><img onclick =\"dislike_base("+nb_likes+");\" id=\"dislike_button\" src=\"../img/no_smile.png\" style=\"-webkit-border-top-right-radius: 10px;-moz-border-radius-topright: 10px;border-top-right-radius: 10px;\"/>";               
                    	
                    	}
                    	else{
                    		
                    	 like();
                    	 nb_likes = nb_likes +  1;
                         document.getElementById("nombre_likes").innerHTML ="<i style=\"margin-bottom:10px;\" class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>" + nb_likes + " likes"   ;   
                         document.getElementById("like_div").innerHTML ="<img onclick =\"like_base("+nb_likes+");\" id=\"like_button\" src=\"../img/smile_yellow.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;-moz-border-radius-topleft: 10px;border-top-left-radius: 10px;\"/><img onclick =\"dislike_base("+nb_likes+");\" id=\"dislike_button\" src=\"../img/no_smile.png\" style=\"-webkit-border-top-right-radius: 10px;-moz-border-radius-topright: 10px;border-top-right-radius: 10px;\"/>";               
                    	
                    	}
                    }
            }
            xmlhttp.open("GET","like.php?login="+login+"&id_art="+id_art+"&type=like",true);
            xmlhttp.send();
		}
		
		function dislike_base(valeur){
		
			var login = document.getElementById('login').value;
        	var id_art = document.getElementById('id_art').value;
        	var nb_likes = valeur;
        	
            xmlhttp=new XMLHttpRequest();

            xmlhttp.onreadystatechange=function()
            {
                if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {
                    	
                    	if(xmlhttp.responseText == "dejadislike")
                    	{
                    		
                    		
                    		nb_likes = nb_likes + 1;
                    		document.getElementById("nombre_likes").innerHTML ="<i style=\"margin-bottom:10px;\" class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>" + nb_likes + " likes"   ;                                     
	                    	 document.getElementById("like_div").innerHTML ="<img onclick =\"like_base("+nb_likes+");\" id=\"like_button\" src=\"../img/smile.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;-moz-border-radius-topleft: 10px;border-top-left-radius: 10px;\"/><img onclick =\"dislike_base("+nb_likes+");\" id=\"dislike_button\" src=\"../img/no_smile.png\" style=\"-webkit-border-top-right-radius: 10px;-moz-border-radius-topright: 10px;border-top-right-radius: 10px;\"/>"   ;
                    	
                    	}
                    	else if(xmlhttp.responseText== "dejalike1"){
                    		
                    		nb_likes = nb_likes - 2;
                    		document.getElementById("nombre_likes").innerHTML ="<i style=\"margin-bottom:10px;\" class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>" + nb_likes + " likes"   ;   
                         	document.getElementById("like_div").innerHTML ="<img onclick =\"like_base("+nb_likes+");\" id=\"like_button\" src=\"../img/smile.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;-moz-border-radius-topleft: 10px;border-top-left-radius: 10px;\"/><img onclick =\"dislike_base("+nb_likes+");\" id=\"dislike_button\" src=\"../img/no_smile_yellow.png\" style=\"-webkit-border-top-right-radius: 10px;-moz-border-radius-topright: 10px;border-top-right-radius: 10px;\"/>";               
                    	
                    	}
                    	else{
	                    	
	                         nb_likes = nb_likes - 1;
	                         document.getElementById("nombre_likes").innerHTML ="<i style=\"margin-bottom:10px;\" class=\"icon-thumbs-up\" id=\"icone-accueil-last\" ></i>" + nb_likes + " likes"   ;                                     
	                    	 document.getElementById("like_div").innerHTML ="<img onclick =\"like_base("+nb_likes+");\" id=\"like_button\" src=\"../img/smile.png\" style=\"float:left;border-right:1px solid #828282;-webkit-border-top-left-radius: 10px;-moz-border-radius-topleft: 10px;border-top-left-radius: 10px;\"/><img onclick =\"dislike_base("+nb_likes+");\" id=\"dislike_button\" src=\"../img/no_smile_yellow.png\" style=\"-webkit-border-top-right-radius: 10px;-moz-border-radius-topright: 10px;border-top-right-radius: 10px;\"/>"   ;
                    	}
                    }
            }
            xmlhttp.open("GET","like.php?login="+login+"&id_art="+id_art+"&type=dislike",true);
            xmlhttp.send();
		}
