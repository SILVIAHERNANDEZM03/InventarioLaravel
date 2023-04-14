<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Super DES</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="#page-top">SUPER DES</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-white hover:text-white dark:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar Sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-white hover:text-white dark:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Sistema de Inventario</h1>
                    <h2 class="masthead-subheading mb-0">Super DES</h2>
                    <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">Más Información</a>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>
            <div class="bg-circle-4 bg-circle"></div>
        </header>
        <!-- Content section 1-->
        <section id="scroll">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="https://images.pexels.com/photos/6169659/pexels-photo-6169659.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Entrada de Productos al Inventario</h2>
                            <p> La entrada de productos al inventario Super DES se refiere al proceso de agregar nuevos productos o mercancías al inventario existente de la empresa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 2-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="https://images.pexels.com/photos/4481327/pexels-photo-4481327.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Salida de Productos del Inventario</h2>
                            <p>La salida de productos del inventario se refiere al proceso de retirar productos o mercancías del inventario existente de la empresa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 3-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="https://images.pexels.com/photos/4277794/pexels-photo-4277794.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Productos en el Inventario</h2>
                            <p>Un sistema de inventario que permita ver, editar, eliminar y buscar productos específicos es una herramienta valiosa para la gestión de inventario de cualquier empresa. Esta funcionalidad permite mantener un registro preciso de los productos disponibles, hacer ajustes rápidos y tomar decisiones informadas en relación a la gestión del inventario.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content section 4-->
        <section>
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="https://images.pexels.com/photos/4481533/pexels-photo-4481533.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Registro de Empleados nuevos en el sistema</h2>
                            <p>Solo se otorgara acceso al sistema de inventario a los empleados que necesitan realizar tareas relacionadas con la gestión del inventario.
</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!-- Content section 5-->
         <section id="scroll">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="https://images.pexels.com/photos/7843990/pexels-photo-7843990.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Registro de Proveedores del Inventario</h2>
                            <p>Permite llevar un registro detallado de los proveedores con los que trabaja la empresa, así como de los productos que suministran.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Editora a Cargo: Silvia Hernández Márquez</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
