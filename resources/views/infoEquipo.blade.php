@section('contenido')
<style>
    body {
        background: #e8cbc0;
        background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
        background: linear-gradient(to top, #e8cbc0, #639fa4);
        min-height: 100vh;
    }
</style>

    <div class="container py-5">
        <div class="row text-center text-white">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 mb-3">Información de la Entrega</h1>
                <p class="lead mb-0 font-monospace">Curso: Aplicaciones Distribuidas I</p>
                <p class="lead mb-0 font-monospace">Docente: Manrique Ronceros Mirko</p>
                <p class="lead mb-0 font-monospace">Tema: Trabajo de Producción</p>
                </p>
            </div>
        </div>
        <div class="row text-center text-white">
            <div class="col-lg-8 mx-auto mt-3">
                <h1 class="display-4">Integrantes</h1>
                </p>
            </div>
        </div>
    </div>


    <div class="container mb-5">
        <div class="row text-center" >
            <!-- Team item -->
            <div class="col-xl-3 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="images/Diaz_Diaz_Melio_0201814005.jpg" width="150" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Diaz Diaz Melio Josue</h5><span class="small text-uppercase text-muted fw-bold">0201814005</span>
                </div>
            </div><!-- End -->

            <!-- Team item -->
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="images/Garcia_Romero_Antonio_0201814022.jpg" width="150" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Garcia R. Antonio</h5><span class="small text-uppercase text-muted">0201814022</span>
                </div>
            </div><!-- End -->

            <!-- Team item -->
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="images/Lujan_Rojas_Nelvin_0201814007.jpg" width="150" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Lujan Rojas Nelvin</h5><span class="small text-uppercase text-muted">0201814007</span>
                </div>
            </div><!-- End -->

            <!-- Team item -->
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="bg-white rounded shadow-sm py-5 px-4"><img src="images/Romero_Loli_Harby_0201814025.jpg"  width="150" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Romero Loli Harby</h5><span class="small text-uppercase text-muted">0201814025</span>
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@extends('footer')
