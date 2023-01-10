var arr = ["images/1.jpg","images/2.jpg","images/3.jpg","images/4.jpg"];
var i = 0;

function open_signup_popup()
{ 
    document.getElementById("signup_popup_box").style.display = "block";
}
function close_signup_popup()
{
  
    document.getElementById("signup_popup_box").style.display = "none";
}
function open_en_signup()
{
    
    window.location.href = "entrepreneur_signup.php";
}
function open_b_signup()
{
    
    window.location.href = "buyer_signup.php";
}

function change()
{
 
    if(i == arr.length)
       {
        i = 0;
           
       }
    
    document.getElementById("slide").src = arr[i];
    i++;
    
 
    
}
  var res =  setInterval(change, 2000);

function next()
{
    
}

function prev()
{
    
}


