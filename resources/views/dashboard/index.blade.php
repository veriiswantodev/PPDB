@extends('layout.app')


@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-header">
          <h1>Dashboard</h1>
      </div>

      <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fa fa-users text-white fa-2x"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>SISWA</h4>
                </div>
                <div class="card-body">
                  {{ $siswa->count() }}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                <i class="fa fa-graduation-cap text-white fa-2x"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>JURUSAN</h4>
                </div>
                <div class="card-body">
                  {{ $jurusan->count() }}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
                <i class="fa fa-tags text-white fa-2x"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>TAGS</h4>
                </div>
                <div class="card-body">
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-success">
                <i class="fa fa-users text-white fa-2x"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>USERS</h4>
                </div>
                <div class="card-body">
                  
                </div>
              </div>
            </div>
          </div>                  
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-laptop-code text-white fa-2x"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>RPL</h4>
              </div>
              <div class="card-body">
                {{ $rpl }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-wrench text-white fa-2x"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>TKR</h4>
              </div>
              <div class="card-body">
                {{ $tkr }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fa fa-cogs text-white fa-2x"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>TPM</h4>
              </div>
              <div class="card-body">
                {{ $tpm }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fa fa-bolt text-white fa-2x"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Listrik</h4>
              </div>
              <div class="card-body">
                {{ $listrik }}
              </div>
            </div>
          </div>
        </div>                  
    </div>
  </section>
</div>
@endsection
