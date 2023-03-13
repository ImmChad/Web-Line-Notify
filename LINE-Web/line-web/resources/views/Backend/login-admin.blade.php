<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css'>


    <style>

        :root
        {
            --green:#00c34d;
            --blue:#007bff;
            --dark:#42425c;
            --gray_low:#cecece;
        }

        .navigation-view-admin:hover {
            background: var(--blue);
        } 
        .navigation-view-admin:hover .direct-navigation {
            color: white !important;
        } 
        /* .direct-navigation:hover {
            color: blue;
        } */
    
    
        /* CSS TOAASST */
        .toast {
            position: fixed;
            top: 55px;
            right: 15px;
            /* border-radius: 20px; */
            background: #fff;
            padding: 20px 35px 20px 25px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            border: 4px solid var(--green);
            overflow: hidden;
            transform: translateX(calc(100% + 30px));
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);
            z-index: 1035;
            display: none;
        }
    
        .toast.active {
            transform: translateX(0%);
            opacity: 1 !important;
            display: block;
        }
    
        .toast .toast-content {
            display: flex;
            align-items: center;
        }
    
        .toast-content .check {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 35px;
            width: 35px;
            background-color: #4dff00;
            color: #fff;
            font-size: 20px;
            border-radius: 50%;
        }
    
        .toast-content .message {
            display: flex;
            flex-direction: column;
            margin: 0 20px;
        }
    
        .message .text {
            font-size: 20px;
            font-weight: 400;
            ;
            color: #666666;
        }
    
        .message .text.text-1 {
            font-weight: 600;
            color: #333;
        }
    
        .toast .close {
            position: absolute;
            top: 10px;
            right: 15px;
            padding: 5px;
            cursor: pointer;
            opacity: 0.7;
        }
    
        .toast .close:hover {
            opacity: 1;
        }
    
        .toast .progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background: #ddd;
        }
    
        .toast .progress:before {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            height: 100%;
            width: 100%;
            background-color: #4dff00;
        }
    
        .progress.active:before {
            animation: progress 5s linear forwards;
        }
    
        @keyframes progress {
            100% {
                right: 100%;
            }
        }
        .container-login-admin
        {   
            /* paddings:40px; */
            width: 100vw;
            height:100vh;
            display:flex;
        }
        .side-form-login,.side-brand
        {
            width: 50%;
        }
        .side-form-login
        {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: cursive;
            position: relative;
        }

        .img-brand
        {
            width: 100%;
            height:100%;
        }
        .title-form
        {
            margin-bottom:50px;
        }
        .ipt-txt-login-admin
        {
            outline:none;
            border:none;
            border-bottom:2px solid var(--gray_low);
            border-radius: 1px;
            margin-bottom:10px;
            width: 100%;
        }
        .btn-form-admin
        {
            margin-top:10px;
            color:white;
            padding: 4px 40px;
            background:var(--dark);
            border:none;
            border-radius: 4px;
            width: max-content;
        }
        .form-admin
        {
            width: 350px;
            display:flex;
            flex-direction:column;
            align-items:center;
        }
        .section-options-other-form
        {
            width: 100%;
            display:flex;
            justify-content: flex-end;
            
        }
        .option-other-form
        {
            width: max-content;
        }
        .link-option-other-form,.link-option-other-form:hover
        {
            color:black;
            /* font-weight: bold; */

        }
        .link-option-other-form
        {

        }
        .name-brand-app
        {
            font-size: 30px;
            letter-spacing: 5px;
            position: absolute;
            top: 23%;
            left: 22%;
            font-weight: bold;
        }
    </style>
    


    <!-- Set Icon Logo -->
    <link rel="icon" href="{{ asset('Image/logo.png') }}">
    <title>Login Admin</title>
</head>
<body>
    <div class="container-login-admin">
        <div class="side-brand">
            <img class="img-brand" src="{{ asset('Image/brand-login.jpg') }}" alt="" srcset="">
        </div>
        <div class="side-form-login">
            <div class="name-brand-app">Meeee</div>
            <div class="title-form">Login</div>
            <form action="/admin/login" method="POST" class="form-admin" id="form-login-admin">
                <input type="text" name="username" class="ipt-txt-login-admin" id="ipt-username-admin">
                <input type="password" name="password"placeholder="Password" class="ipt-txt-login-admin" id="ipt-password-admin">
                <div class="section-options-other-form">
                <div class="option-other-form"><a href="" class="link-option-other-form">Forget Password</a></div>

                </div>
                <button class="btn-form-admin" id="btn-submit-form-login-admin" type="submit">Login</button>
            </form>
            
        </div>
    </div>
</body>
</html>