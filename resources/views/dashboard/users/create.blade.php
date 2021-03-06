@extends('layouts.dashboard.app')
@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.users')</h1>
            <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fadashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.users.index')}}">@lang('site.users')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">
         
          <div class="box box-primary">
              <div class="box-header">

                <h3 class="box-title">@lang('site.add')</h3>
                <div class="box-body">
                    @include('partials._errors')
                <form action="{{route('dashboard.users.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="first_name">@lang('site.first_name')</label>
                        <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control  {{$errors->has('first_name')? 'is-invalid' :''}}">
                        @if($errors->has('first_name'))
                                       <div class="invalid-feedback">
                                           <strong>{{$errors->first('first_name')}}</strong>
                                       </div>
                                  @endif
                        </div>

                        <div class="form-group">
                            <label for="last_name">@lang('site.last_name')</label>
                        <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control {{$errors->has('last_name')? 'is-invalid' :''}}">
                            @if($errors->has('last_name'))
                            <div class="invalid-feedback">
                                <strong>{{$errors->first('last_name')}}</strong>
                        </div>
                   @endif
                        </div>

                        <div class="form-group">
                            <label for="email">@lang('site.email')</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control {{$errors->has('email')? 'is-invalid' :''}}">
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('email')}}</strong>
                                    </div>
                               @endif
                        </div>

                        <div class="form-group">
                            <label for="image">@lang('site.image')</label>
                        <input type="file" name="image"  class="form-control image {{$errors->has('image')? 'is-invalid' :''}}">
                        @if($errors->has('image'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('image')}}</strong>
                            @endif
                        </div>
                        </div>

                        <div class="form-group">
                            <img src={{asset("uploads/user_images/default.png")}} style="width:100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label for="password">@lang('site.password')</label>
                        <input type="password" name="password" class="form-control {{$errors->has('password')? 'is-invalid' :''}}">
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{$errors->first('password')}}</strong>
                                    </div>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">@lang('site.password_confirmation')</label>
                        <input type="password" name="password_confirmation" class="form-control {{$errors->has('password_confirmation')? 'is-invalid' :''}}">
                        @if($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            <strong>{{$errors->first('password_confirmation')}}</strong>
                        </div>
                   @endif
                        </div>
                         <div class="form-group">
                             <label>@lang('site.permissions')</label>
                             <div class="nav-tabs-custom">
                                 @php
                                     $models=['users','categories','products','clients','orders'];
                                     $maps=['create','read','update','delete'];

                                 @endphp
                                <ul class="nav nav-tabs">
                                     @foreach ($models as $index=>$model)
                                      <li class="{{$index==0?'active':''}}"><a href="{{$model}}" data-toggle="tab">@lang('site.'.$model)</a></li>

                                     @endforeach

                                </ul>
                                <div class="tab-content">
                                   @foreach ($models as $index=>$model)
                                <div class="tab-pane {{$index==0?'active':''}}" id="{{$model}}">
                                  @foreach ($maps as $map )

                                <label><input type="checkbox" name="permissions[]" value="{{$map.'_'.$model}}"/>@lang('site.'.$map)</label>
                          
                                  @endforeach

                    
                                <!-- /.tab-content -->
                              </div>
                                   @endforeach

                                 </div>
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