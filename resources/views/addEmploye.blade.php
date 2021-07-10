@extends('layout/admin')

@section( 'content')

<body>
    <h1 class="text-center mb-4" >Add Companies Data</h1>

    <div class="container">

        <div class="row justify-content-center">

        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('employe') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ old('last_name') }}">
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1">Company</label>
                                <select  class="form-control" name="company_id" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <option value="">Company</option>
                                        @foreach ($company as $item)
                                            <option value="{{ $item->id }}">
                                                 {{ $item->name }}
                                            </option>
                                        @endforeach
                                </select>
                                @error('company_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">email</label>
                                <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">phone</label>
                                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp">
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
