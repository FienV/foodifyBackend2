<html>
    <head>
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family:'Poppins', sans-serif
            }
            .themecolor {
                color: #A4C639;
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
                font-size:20px;
            }
           .card-footer, .card-header {
               background-color:#a4c639;
               color: #fff;
           }
            .right{
                text-align: right;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="page-heading">
                <h1 class="header-text">  Foodify </h1>
            </div>
            <h2 class="text"> Bestel<span class="themecolor">bevestiging </span></h2> <br>
            <h2 class=" mb-5 "> Hallo <span> {{$latest ['name'] }} </span> ,</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <h2 class="card-header">
                        Uw bestelling:
                        </h2>
                        <div class="card-body">
                            <p class="card-text">
                            <span><b>{{$latest->type->name}}</b></span> <br>
                            <span>{{$latest->date}}</span> <br>
                            </p>
                            <div>{{$latest->hour->name}}</div> <hr>
                        </div>
                        <div class="card-footer">
                        <span>Meer details omtrent uw bestelling: www.foodify.be/admin</span>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="mt-5">Bedankt voor uw bestelling bij<span class="themecolor"> Foodify </span></h3>
        </div>
    </body>
</html>