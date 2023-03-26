@extends('connect.master')

@section('content')
<h2 style="color:#42aafe; text-align:center; margin-top:150px; font-family: 'Montserrat', sans-serif;">Ingresa</h2>
<div class="form-box shadow" style="padding:30px; width:50%;margin:auto;margin-top:50px; background:#fff; border-radius:5px;">
    <form action="login" method="POST">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="mb-4">
            <label for="email" class="form-label">Correo electrónico</label>
            <div class="input-group flex-nowrap" >
                <span class="input-group-text" id="addon-wrapping"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                </svg></span>
                <input type="email" class="form-control" id="email" name="email"  aria-describedby="emailHelp">
            </div>  
            <div id="emailHelp" class="form-text">No compartas tus datos con nadie más.</div>
        </div>

        <div class="mb-5">
        <label for="password" class="form-label">Contraseña</label>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                </svg></span>
                <input type="password" class="form-control" id="password" name="password">
            </div>  
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" style="width:100%; background-color:#42aafe;">Ingresar</button>
        </div>
        <div class="mb-3">
             <button type="button" class="btn btn-primary" style="width:100%; color:#42aafe; background-color:white;" onclick="location.href='register'">Registrarse</button>
        </div>
        

        
    </form>
    <div class="form-box-footer" style="display:Flex; justify-content:space-around;">
        <a href="/password/reset">Olvidaste tu contraseña?</a>
    </div>
    
</div>
@stop 