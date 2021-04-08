<div id="sidepopup-login" class="sidepopup">
    <div class="d-flex closebtn position-relative pb-2">
        <button class="btn btn-nav" type="button" onclick="sidenav.open()"><i class="la la-navicon"></i></button>
        <button class="btn m-auto p-0" type="button" onclick="sidepopuplogin.close()"><img src="/assets/img/logo-color.png"></button>
    </div>
    <section class="container">
        <div class="row mb-3">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="title-action m-0">Iniciar sesión</h5><a href="{{ route('web.signup-client') }}">Regístrate</a>
                </div>
                {{--<button class="btn btn-tertiary form-control rounded-pill mb-3" type="button"><i class="la la-linkedin-square"></i>Continua con LinkedIn</button>
                <button class="btn btn-tertiary form-control rounded-pill mb-3" type="button"><i class="la la-google"></i>Continua con Google</button>
                <p class="text-center m-0">O accede con tu email:</p>--}}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                {!! Form::open(['method' => 'POST', 'route' => ['web.user.login'], 'id' => 'login-client'])!!}
                <div class="form-group input-text-icon">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" required><i class="la la-envelope"></i>
                </div>
                <div class="form-group input-text-icon">
                    <input id="password" type="password" class="form-control" style="font-size: 1rem" name="password" placeholder="Contraseña" required><i class="la la-eye-slash" style="pointer-events: all" onclick="myFunctions.showPassword(this)"></i>
                </div>
                <a class="d-block text-underline mb-3" href="#">¿Has olvidado tu contraseña?</a>
                <button class="btn btn-secondary form-control rounded-pill" type="submit">Acceder</button>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-12"><span>¿Eres un proveedor?&nbsp;<a class="text-underline text-action" href="{{ route('web.about-provider') }}">Haz click aquí</a></span></div>
        </div>
    </section>
</div>
