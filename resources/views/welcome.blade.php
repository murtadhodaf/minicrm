@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

            {{-- Dashboard CRM --}}
            <h1 class="m-0"> {{ __('welcome.Dashboard_CRM') }}</h1>

        </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><a href="/perusahaan"><i class="fas fa-building"></i></a>  </span>

              <div class="info-box-content">

                {{-- All Company --}}
                <span class="info-box-text">{{ __('welcome.All_Company') }}</span>
                <span class="info-box-number">

                    @if ($allDataCompany < 2)
                        {{ $allDataCompany }}
                        <small>{{ __('welcome.Company') }}</small>
                    @else
                        {{ $allDataCompany }}
                    <small>{{ __('welcome.Companies') }}</small>
                    @endif
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"> <a href="/employe"><i class="fas fa-users"></i></a></span>
              <div class="info-box-content">
                <span class="info-box-text">{{ __('welcome.All_Employee') }}</span>
                <span class="info-box-number">
                    @if ($allDataEmploye < 2)
                        {{ $allDataEmploye }}
                        <small>{{ __('welcome.Employee') }}</small>
                    @else
                        {{ $allDataEmploye }}
                    <small>{{ __('welcome.Employees') }}</small>
                    @endif

                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


    <!-- /.content -->
  </div>

  @endsection
