@extends('layouts.dashboard.app')
@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.categories')</h1>
            <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fadashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.categories.index')}}">@lang('site.categories')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">
         
          <div class="box box-primary">
              <div class="box-header">

                <h3 class="box-title">@lang('site.add')</h3>
                <div class="box-body">
                    @include('partials._errors')
                <form action="{{route('dashboard.categories.store')}}" method="POST">
                    @csrf

                              @foreach (config('translatable.locales') as $local)
                                    <div class="form-group">
                                          {{-- site.ar.name --}}

                                        <label for="name">@lang('site.'.$local.'.name')</label>

                                      <input type="text" name="{{$local}}[name]" value="{{old($local.'.name')}}" class="form-control {{$errors->has($local.'.name')? 'is-invalid' :''}}">
                                      
                                            @if($errors->has($local.'.name'))
                                                <div class="invalid-feedback">
                                                    <strong>{{$errors->first($local.'.name')}}</strong>
                                                </div>
                                            @endif
                                    </div>
                              @endforeach


                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</button>
                        </div>
                   </form><!-- end of form-->
                </div>
              </div> <!--end of box header -->
              
          </div><!--end of box-->

        </section>
    </div>
@endsection