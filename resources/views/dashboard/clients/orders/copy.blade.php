@extends('layouts.dashboard.app')
@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.orders')</h1>
            <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fadashboard"></i>@lang('site.dashboard')</a></li>
                {{-- <li><a href="{{route('dashboard.orders.index')}}">@lang('site.orders')</a></li> --}}
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">
         
          <div class="box box-primary">
              <div class="box-header">

                <h3 class="box-title">@lang('site.add')</h3>
                <div class="box-body">
                    @include('partials._errors')
                    <h2>Body</h2>
                </div>
              </div> <!--end of box header -->
              
          </div><!--end of box-->

        </section>
    </div>
@endsection