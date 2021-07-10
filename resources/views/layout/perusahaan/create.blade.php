@extends('layout/admin')

@section( 'content')

<body>
    <h1 class="text-center mb-4" >Add Companies Data}</h1>

    <div class="container">
        @if(session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>

        @endif
        <div class="row justify-content-center">

        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('perusahaan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Name of Company </label>
                                <input type="text" class="form-control" name="name"  >
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Email of Company</label>
                                <input type="text" class="form-control" name="email" >
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Photo of Company</label>
                                <input type="file" class="form-control" name="picture" >
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Website of Company</label>
                                <input type="text" class="form-control" name="website" >
                            </div>



                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>

  @endsection
