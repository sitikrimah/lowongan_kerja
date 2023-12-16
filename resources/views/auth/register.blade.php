<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css">
    </head>
    <style>
       * {
            magin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'poppins', sans-serif;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #000000;
        }
        .wrapper{
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 400px;
            height: 500px;
            background: transparent;
            border: 5px solid #333333;
            border-radius: 10px;
            transition: .5s;
        }
        .wrapper:hover{
            border: 5px solid #8dbcee;
            box-shadow: 0 0 20px  #8dbcee, inset 0 0 20px  #8dbcee;
        }

        h2{
            font-size: 2em;
            text-align: center;
            color: #ffffff;
            transition: .5s;
        }
        .wrapper:hover h2{
            color: #8dbcee;
        }

        .input-box{
            position: relative;
            width: 320px;
            margin: 30px 0;
        }
        .input-box input{
            width: 100%;
            height: 45px;
            background: transparent;
            border: 2px solid #333333;
            outline: none;
            border-radius: 5px;
            font-size: 1em;
            color: #ffffff;
            padding: 0 10px 0 35px;
            transition: .5s;
        }
        .wrapper:hover .input-box input{
            border: 2px solid #8dbcee;
            box-shadow: 0 0 10px #8dbcee, inset 0 0 10px #8dbcee;
        }

        .input-box input::placeholder{
            color: rgba(255, 255, 255, .3);
        }

        .input-box .icon{
            position: absolute;
            left: 10px;
            color:#ffffff;
            font-size: 1.2em;
            line-height: 55px;
            transition: .5s;
        }
        .wrapper:hover .input-box .icon{
            color: #8dbcee
        }

        .forgot-pass{
            margin: -15px 0 15px;
        }
        .forgot-pass a{
            color: #ffffff;
            font-size: .9em;
            text-decoration: none;
        }
        .forgot-pass a:hover{
            text-decoration: underline;
        }

        button{
            position: relative;
            width: 100%;
            height: 45px;
            background: #333333;
            border: none;
            outline: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            color: #ffffff;
            font-weight: 500;
            transition: .5s;
        }
        .wrapper:hover button{
            background: #8dbcee;
            color: #000000;
            box-shadow: 0 0 20px #8dbcee;
        }

        .register-link{
            font-size: .9em;
            text-align: center;
            margin: 25px 0;
        }
        .register-link p{
            color: #ffffff;
        }
        .register-link p a{
            color: #333333;
            text-decoration: none;
            font-weight: 600;
            transition: .5s;
        }
        .wrapper:hover .register-link p a{
            color: #8dbcee;
        }
        .register-link p a:hover{
            text-decoration: underline;
        }

    </style>
    <body>
        <div class="wrapper">
            {{-- <form action=""> --}}
                <div class="card " style="background-color:rgba(0, 0, 0, 0.5);">
                    <div class="card-header">
                        <h2 style="margin-top:7%">regiter</h2>

                    </div>
            
                    <div class="card-body">
                            @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                              </div>
    
                            @endif
                       <form action="{{ route('register')}}" method="POST">
                        @csrf 
                       <div class="input-box">
                            <span class="icon"><ion-icon name="person"></ion-icon></span>
                            <input type="text" placeholder="john johnjohnjohn " name="name" id="" required>
                        </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                                <input type="text" placeholder="john@gmail.com" name="email" id="" required>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                                <input type="password" placeholder="password" name="password" id="" required>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                                <input type="text" placeholder="tahun lulus" name="tahun_lulus" id="" required>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                                <input type="text" placeholder="asal sekolah" name="asal_sekolah" id="" required>
                            </div>
                            <div class="input-box">
                                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                                <input type="file" placeholder="foto " name="images" id="" required>
                            </div>
                           
                            <button type="submit">register</button>
                            <div class="register-link">
                                <p>Have an account?<a href="login">login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>