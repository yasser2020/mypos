@extends('layouts.dashboard.app')
@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.clients')</h1>
            <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fadashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.clients.index')}}">@lang('site.clients')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">
         
          <div class="box box-primary">
              <div class="box-header">

                <h3 class="box-title">@lang('site.edit')</h3>
                <div class="box-body">
                    {{-- @include('partials._errors') --}}
                <form action="{{route('dashboard.clients.update',$client->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                        
                    <div class="form-group">
                        <label for="name">@lang('site.name')</label>
                        <input type="text" name="name" value="{{$client->name}}" class="form-control {{$errors->has('name')?'is-invalid':''}}">
                       </div>
                       @for ($i = 0; $i <2; $i++) 

                       <div class="form-group">
                           <label for="phone">@lang('site.phone')</label>
                       <input type="text" name="phone[]" value="{{$client->phone[$i]??''}}" class="form-control {{$errors->has('phone.0')?'is-invalid':''}}">
                          </div>  
                       @endfor
                   
                          <div class="form-group">
                           <label for="address">@lang('site.address')</label>
                          <textarea name="address"  class="form-control {{$errors->has('address')?'is-invalid':''}}">{{$client->address}}</textarea>
                          </div>
                         
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>@lang('site.edit')</button>
                        </div>
                   </form><!-- end of form-->
                </div>
              </div> <!--end of box header -->
              
          </div><!--end of box-->

        </section>
    </div>
@endsection