<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In Required !</title>
    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(orange,white,green);
            
            z-index: 2;
            cursor: pointer;
            display: none;
        }
        body {
            background-color: black;
        }
        #login_request_container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            color: aliceblue;
            background-color: black;
            width: 500px;
         border-radius: 5%;
            box-shadow: 2px 2px blue,3px 3px blue;
         
        }
        .p_title {
            font-size: 30px;
            
            font-family: monospace;
            text-align: center;
            
            
        }
        .p_msg {
            animation:  an1 0.8s infinite ease-in-out;
            letter-spacing: 2px;
            font-family: sans-serif;
            text-align: center;
        }
        @keyframes an1 {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .common_btn_1_1 {
    background-color: #0088ff;
    font-family: verdana;
    font-size: 15px;
    color: white;
    height: 30px;
    border-radius: 5%;
    box-shadow: 1px 1px 1px red,2px 2px 1.5px green,3px 3px 2px blue;
            margin-bottom: 20px;
    
}
        .p_title_1 {
            font-size: 20px;
            
            font-family: monospace;
            text-align: center;
            
        }
        .td_1 {
            border-right: 2px solid;
            width: 50%;
            padding: 0 20px 0 20px;
        }
    </style>
    <script>
    function open()
        {
            document.getElementById("overlay").style.display = "block";
        }
        function close()
        {
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</head>
<body onload="open();">

 <div id="overlay">
     <div id="login_request_container">
         <p class="p_title">You Are Not Logged In...</p>
        <p class="p_msg">Please Log In To Continue !</p>
        <br>
       
        <table width="100%" align="center">
        <tr align="center"><td class="td_1">
    <span class="p_title_1">I'm An Entrepreneur</span>
       <br><br>
        <a href="entrepreneur_login.php"><button class="common_btn_1_1">Log In Now </button></a>
        </td>
        <td>
        <span class="p_title_1">I'm A Buyer</span>   
        <br> <br>
        <a href="buyer_login.php"><button class="common_btn_1_1">Log In Now </button></a> 
        </td>
        </tr>
         
       
         </table>
         <br>
     </div>
 </div>
</body>
</html>