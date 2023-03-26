<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('static/css/connect/connect.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Parking System</title>
</head>
<style>
    *{
        padding:0px;
        margin:0px;
        
    }
</style>

<body style="background:#fbf9fb; padding:0px; margin:0px; box-sizing:border-box; background:url({{ URL::asset('static/img/wave.svg') }}); background-repeat:no-repeat; background-position:center;background-size:cover; ">
        
  
        <div class="row" style="width:100vw; height:100vh; ">
            <div class="col-sm-6" style="padding:0px; display:Flex;">
                <div id="imagen" style="display:Flex; align-items:center;">
                    <img src="{{ URL::asset('static/img/car.svg') }}" style="width:50%; margin:auto; justify-content:center;">
                </div>
                
            </div>
            <div class="col-sm-6">
                @section('content')
                @show
            </div>


        
        
        
        </div>

    <script>
        @if(Session::has('message'))
            @if($errors->any())
                @foreach($errors->all() as $error)
                     toastr.error("{{ $error }}");
                @endforeach
            @endif

            

        @endif
        @if(Session::has('message2'))
            toastr.success("{{ Session::get('message2') }}");
              
                     
    
        @endif
        @if(Session::has('message3'))
            toastr.error("{{ Session::get('message3') }}");
              
                     
    
        @endif
        @if(Session::has('message4'))
            toastr.success("{{ Session::get('message4') }}");
              
                     
    
        @endif
        @if(Session::has('message5'))
            @if($errors->any())
                @foreach($errors->all() as $error)
                     toastr.error("{{ $error }}");
                @endforeach
            @endif
        @endif
        /*--Correo enviado--*/
        @if(Session::has('message6'))
            toastr.success("{{ Session::get('message6') }}");
        @endif
        /*--------*/
        /*--Contraseña restablecida--*/
        @if(Session::has('message7'))
            toastr.success("{{ Session::get('message7') }}");
        @endif
        /*-------*/
        /*--Error Correo enviado--*/
        @if(Session::has('message8'))
            toastr.error("{{ Session::get('message8') }}");
        @endif
        /*--------*/
        /*--Error contraseña restablecida--*/
        @if(Session::has('message9'))
            toastr.error("{{ Session::get('message9') }}");
        @endif
    </script>

</body>
</html>