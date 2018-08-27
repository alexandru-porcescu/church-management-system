@extends('layouts.app')

@section('title') Collections Report @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Collections Report</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->

        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li>
                <a href="forms-general.html#">
                    <i class="demo-pli-home"></i>
                </a>
            </li>
            <li>
                <a href="{{route('attendance')}}">Reports</a>
            </li>
            <li class="active">Collections</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3"  >
                @if (session('status'))

                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)

                        <div class="alert alert-danger">{{ $error }}</div>

                    @endforeach

                @endif
            </div>
            <div class="col-md-6 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Collections <i>Report Counts</i> For</strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Total No Of All Collections
                      <span class="badge badge-primary badge-pill">{{$reports[0]->total_collections or 0}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Total No Of All Today's Collections
                      <span class="badge badge-primary badge-pill">{{$reports[0]->todays_collections or 0}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total <i>Collections</i> By Collections Type Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="bg-warning list-group-item d-flex justify-content-between align-items-center">
                      Collection Type
                      <span class="badge badge-primary badge-pill">Collection Type Total</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Special Offering
                      <span class="badge badge-primary badge-pill">{{($reports[0]->so)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Seed Offering
                      <span class="badge badge-primary badge-pill">{{($reports[0]->sdo)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Offering
                      <span class="badge badge-primary badge-pill">{{($reports[0]->o)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Donation
                      <span class="badge badge-primary badge-pill">{{($reports[0]->d)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Tithe
                      <span class="badge badge-primary badge-pill">{{($reports[0]->t)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      First Fruit
                      <span class="badge badge-primary badge-pill">{{($reports[0]->ff)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Covenant Seed
                      <span class="badge badge-primary badge-pill">{{($reports[0]->cs)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Love Seed
                      <span class="badge badge-primary badge-pill">{{($reports[0]->ls)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Sacrifice
                      <span class="badge badge-primary badge-pill">{{($reports[0]->s)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Thanksgiving
                      <span class="badge badge-primary badge-pill">{{($reports[0]->tg)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Thanksgiving Seed
                      <span class="badge badge-primary badge-pill">{{($reports[0]->tgs)}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Other
                      <span class="badge badge-primary badge-pill">{{($reports[0]->ot)}}</span>
                    </li>
                    <li class="bg-success list-group-item d-flex justify-content-between align-items-center">
                      Total
                      <span class="badge badge-primary badge-pill">{{($reports[0]->total)}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total Collections <i>By</i> Members Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="bg-warning list-group-item d-flex justify-content-between align-items-center">
                      Member Name
                      <span class="badge badge-primary badge-pill">Member Total</span>
                    </li>
                    <?php $total = 0; ?>
                    @foreach ($m_r as $mc)
                    <?php $total += $mc->total; ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      {{$mc->fname}} {{$mc->lname}}
                      <span class="badge badge-primary badge-pill">{{$mc->total or 0}}</span>
                    </li>
                    @endforeach
                    <li class="bg-success list-group-item d-flex justify-content-between align-items-center">
                      Total
                      <span class="badge badge-primary badge-pill">{{$total}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            @if(\Auth::user()->isAdmin())
            <div class="col-md-6 col-md-offset-2" style="margin-bottom:20px">
              <div class="panel">
                  <div class="panel-heading">
                      <h3 class="panel-title"><strong>Total Branches <i>By</i> Collections Till Date</strong></h3>
                  </div>
                <div class="panel-body">
                  <ul>
                    <li class="bg-warning list-group-item d-flex justify-content-between align-items-center">
                      Branch Name
                      <span class="badge badge-primary badge-pill">Branch Total</span>
                    </li>
                    <?php $total = 0; ?>
                    @foreach ($ad_rep as $ar)
                    <?php $total += ($ar->ctotal + $ar->mtotal); ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      {{$ar->name}}
                      <span class="badge badge-primary badge-pill">{{($ar->ctotal + $ar->mtotal)}}</span>
                    </li>
                    @endforeach
                    <li class="bg-success list-group-item d-flex justify-content-between align-items-center">
                      Total
                      <span class="badge badge-primary badge-pill">{{$total}}</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            @endif
        </div>
    </div>
    <!--===================================================-->
    <!--End page content-->
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection