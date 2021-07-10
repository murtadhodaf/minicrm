@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ __('admin.companiesData') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"> {{ __('admin.companiesData') }} </li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <div class="container mb-5">
            <a href="{{ url('perusahaan/create') }}" type="button" class="btn btn-success mb-2 ">{{ __('admin.Add_data') }}</a>
            {{ Session::get('pageUrl') }}
            <div class="row">
                @if($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">no  </th>
                        <th scope="col">{{ __('admin.name') }}  </th>
                        <th scope="col">{{ __('admin.email') }}</th>
                        <th scope="col">{{ __('admin.website') }} </th>
                        <th scope="col">{{ __('admin.photo') }} </th>
                        <th scope="col">{{ __('admin.action') }} </th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $no =1
                        @endphp
                        @foreach($perusahaan as $index => $row)
                        <tr>

                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $row->name}}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->website }}</td>
                            <td>
                                <img src="{{ asset('foto/'.$row->picture) }}" alt="" style="width: 60px">
                            </td>
                            <td>
                                <form action="{{ url('perusahaan/'.$row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you Sure to Deleting Data?')">
                                    @method('delete')
                                    @csrf

                                    <button class="btn btn-danger" >{{ __('admin.delete') }}</button>
                                </form>
                                <a href="{{ url('perusahaan/'.$row->id.'/edit') }}" type="button" class=" btn btn-info">{{ __('admin.edit') }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{ $perusahaan->links() }}
            </div>
            <div class="pull-right" >

            </div>
        </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous">
</script>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer">
</script>

<script
    src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
</script>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
</script>

<script>
    $('.delete').click(function(){
        var companyId = $(this).attr('data-id');
        var companyName = $(this).attr('data-name');

        swal({
            title: "Are You Sure ?",
            text: "Are you sure to delete with Name : "+companyName+" ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/deletecompany/"+companyId+"" "/perusahaan/"+perusahaanId+""
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
            });
    })
</script>



@endsection
