<html>
    <head>
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family:'Poppins', sans-serif

            }
            .themecolor {
                color: #a4c639;
            }
            .page-heading {
                background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80");
                height: 200px;
                color: white;
                text-align: center;

            }
            .header-text {
                padding-top: 70px;
            }

            .text {
                margin-top:15px;
                text-align: center;
            }
            h3{ 
                font-size:15px;
            }

            .send-btn {
                text-decoration: none;
                color: white;
                background-color: #a4c639;
                padding:15px 10px;
                border-radius:10px;
            }
            .send-btn:hover{
                text-decoration: none;
                color: #a4c639;
                background-color: white;
            }
            .btn{
                margin-top: 30px;
                display:block;
                margin-left: auto;
                margin-right:auto;
            }


        </style>
    </head>
    <body>
        <div class="container">
            <div class="page-heading">
                <h1 class="header-text">  Foodify </h1>
            </div>
            
            <h2 class="text"> Contact<span class="themecolor">aanvraag </span></h2> <br>

            <h3>Gelieve contact op te nemen met:  <span> {{$validate['name']}} </span></h3>
            <div>  
                <h3> Email: {{$validate['email']}}</h3>
                
                <div>
                    <h3> Subject: {{$validate['subject']}} </h3>
                </div>
                <div> 
                    <h3> Message: {{$validate['message']}}</h3>
                </div> 

            </div>
            <div class="btn">
             <a class="send-btn" href="mailto:{{$validate['email']}}?SUBJECT={{$validate['subject']}}">beantwoord deze email</a>
            </div>
        </div>
    </body>
</html>