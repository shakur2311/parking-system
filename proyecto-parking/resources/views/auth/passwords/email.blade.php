@extends('connect.master')
@section('content')
<h2 style="color:#42aafe; text-align:center; margin-top:30vh; font-family: 'Montserrat', sans-serif;">Recuperar contraseña</h2>
<div class="form-box shadow" style="padding:30px; width:65%;margin:auto;margin-top:50px; background:#fff; border-radius:5px;">
    <form action="/password/email" method="POST">
         @csrf <!-- {{ csrf_field() }} -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <div class="input-group flex-nowrap" >
                <span class="input-group-text" id="addon-wrapping"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg></span>
                <input type="text" class="form-control" id="email" name="email" required>
            </div>  
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" style="width:100%; background-color:#42aafe;">Enviar</button>
        </div>      
    </form>  
</div>
@stop
