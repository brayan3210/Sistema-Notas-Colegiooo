<!doctype html>
<html lang="es">
<head>
  <title>Inicar Sesión</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}"/>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
                  <div class="text-center">
                    <img src="{{ asset('assets/Logocolegio.png') }}" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">Ingresar al Sistema</h4>
                  </div>
                  <form action="{{route('login')}}" method="post">
                  @csrf
                    <p>Rellene los Siguientes Campos</p>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="name" id="form2Example11" class="form-control" name="name" placeholder="Nombre De Usuario" />
                      <label class="form-label" for="form2Example11">Usuario</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="password" id="form2Example22" class="form-control" name="password" placeholder="Contraseña" />
                      <label class="form-label" for="form2Example22">Contraseña</label>
                    </div>
                    @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                            @endif
                            <a href="{{ route('forgot.password.form') }}" _msttexthash="654719" _msthash="339" _mstvisible="8">¿Has perdido tu contraseña?</a>
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Iniciar Sesion </button>
                    </div>
                    <div class="d-flex align-items-center justify-content-center pb-4">
                    
                      
                      <a href="{{route('Sobrenosotros')}}" class="btn btn-outline-danger" role="button">menu</a>

                    </div>

                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
        <h4 class="mb-4">Somos más que una institución educativa</h4>
        <p class="small mb-0">En el Colegio Santo Ángel de Flandes, Tolima, nos dedicamos a formar líderes del futuro con valores y excelencia académica. Nuestro compromiso es proporcionar una educación integral que fomente el desarrollo personal, social y académico de nuestros estudiantes, preparándolos para enfrentar los retos del mundo moderno con ética y responsabilidad.</p>
    </div>
</div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
