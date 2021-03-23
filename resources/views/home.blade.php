@extends('layouts.site')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>



                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                </div>

      

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{!! asset('img/sistema_1.jpg')!!}" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="{!! asset('img/sistema_2.jpeg')!!}" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="{!! asset('img/sistema_3.jpg')!!}" class="d-block w-100">
    </div>
  </div>

</div>


            </div>
        </div>
    </div>
</div>


@endsection