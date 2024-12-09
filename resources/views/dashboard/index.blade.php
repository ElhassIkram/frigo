@extends('layouts.app')

@section('content')
<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-items">
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">24</div>
                        <div class="card-stats-item-label">Clients</div>
                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Clients</h4>
                </div>
                <div class="card-body">
                    24
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-items">
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">3</div>
                        <div class="card-stats-item-label">Modes de Paiement</div>
                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-success">
                <i class="fas fa-money-check"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Modes de Paiement</h4>
                </div>
                <div class="card-body">
                    3
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
