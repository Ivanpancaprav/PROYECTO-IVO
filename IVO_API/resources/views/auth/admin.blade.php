@extends('layouts.app')


@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        <!-- Scripts -->
        <title>Document</title>
    </head>

    <body>



        <!--sirve para mostrar en caso de estar autentificado, estar logeado-->

        <style>
            * {
              padding: 0;
              border: 0;
                /* border: 1px solid black; */
            }

            body {
                height: 100vh;
                width: 100%;

            }
        </style>
        <div class="container-fluid  h-100 w-100">

            <div class="row d-flex justify-content-center">
              <h1 class="text-center">Bienvenido</h1>
                <div class="col-8 d-flex justify-content-center">
                    
                    <div class="card" style="border-radius: 15px; border:5px solid black;">
                      
                        <div class="card-body text-center">
                            <div class="mt-3 mb-4">
                                <img src="{{ url('/images/Admin.png') }}"
                                    class="rounded-circle img-fluid" style="width: 150px" />
                            </div>
                            <div style="background-color: white; text-align: center">
                                <strong>DATOS DEL ADMINISTRADOR</strong>
                            </div>
                            <br />
                            <table class="table caption-top">
                                <tbody>
                                    <tr>
                                        <th>DNI</th>
                                        <td>{{Auth::user()->dni}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nombre</th>
                                        <td>{{Auth::user()->nombre}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{Auth::user()->email}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>





    </body>

    </html>
@endsection
