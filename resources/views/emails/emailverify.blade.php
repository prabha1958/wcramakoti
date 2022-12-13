


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>Verify Your Email</title>

    </head>
    <body>

        <div class="app ">

            <div style="max-width:400;margin:auto">

              <div style="margin:2px; padding:15px;">

                <div style="padding:10px; border-bottom: solid thin gray">
                  <div class="text-red text-sm font-bold">
                     <img src="https://csimarital.in/images/logo6.png"  width="120" height="80"  alt="csim" />
                  </div>
                  <h1 class="heading ">E-mail Confirmation</h1>
                </div>

                <div style="padding:10px border-bottom: solid thin gray;">
                  <p>
                    Hellow, {{ $user->first_name }}&nbsp;{{ $user->last_name}}<br><br>It looks like you just signed up for CSICWCR, In order to activate your account just click the button bellow. Unless you verify your email, you will not be able to login
                  </p>
                  <a style="" href="http://localhost:8000/verimail/{{$user->id}}/{{$token}}"><button style="background-color:indigo;padding:8px;cursor:pointer; text-decoration:none;font-fmaily:sans;color:white">CONFIRM EMAIL ADRESS</button></a>
                  <p class="text-sm">
                    Or you may copy and paste the following link in the browser<br><p style="font-family:'Times New Roman', Times, serif; font-weight:500;color:aqua;">
                        http://localhost:8000/verimail/{{$user->id}}/{{$token}}
                    </p> <br>Your CSICWCR team
                  </p>
                </div>

                <div class="content__footer ">
                  <h3 class="text-base ">Thanks for registering at CSICWCR!</h3>
                  <p>CSI CENTENARY WESLEY CHURCH RAMKOTE</p>
                  <small>Tilak Road Abids Hyderabad </small>
                </div>

              </div>



          </div>
    </body>
    </html>
