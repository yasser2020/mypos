@extends('layouts.dashboard.app')
@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.products')</h1>
            <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fadashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{route('dashboard.products.index')}}">@lang('site.products')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>

        <section class="content">
         
          <div class="box box-primary">
              <div class="box-header">

                <h3 class="box-title">@lang('site.edit')</h3>
                <div class="box-body">
                    @include('partials._errors')
                <form action="{{route('dashboard.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                            <div class="form-group">
                                <label>@lang('site.categories')</label>
                                <select name="category_id" class="form-control" >
                                    <option value="">@lang('site.all_categories')</option>
                                    @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$product->category_id==$category->id?'selected':''}} >{{$category->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                             


                            
                              @foreach (config('translatable.locales') as $local)
                                    <div class="form-group">
                                          {{-- site.ar.name --}}

                                        <label for="name">@lang('site.'.$local.'.name')</label>

                                             <input type="text" name="{{$local}}[name]" value="{{$product->name}}" class="form-control {{$errors->has($local.'.name')? 'is-invalid' :''}}">
                                      
                                            @if($errors->has($local.'.name'))
                                                <div class="invalid-feedback">
                                                    <strong>{{$errors->first($local.'.name')}}</strong>
                                                </div>
                                            @endif
                                    </div>


                                    <div class="form-group">
                                          {{-- site.ar.name --}}

                                        <label for="name">@lang('site.'.$local.'.description')</label>

                                             <textarea name="{{$local}}[description]"  class="form-control ckeditor">{{$product->description}}</textarea>

                                    </div>
                              @endforeach
                                           
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
                            <img src={{$product->image_path}} style="width:100px" class="img-thumbnail image-preview" alt="">
                      </div>

                      <div class="form-group">
                        <label for="purchase_price">@lang('site.purchase_price')</label>
                    <input type="number" name="purchase_price"  value="{{$product->purchase_price}}" class="form-control  {{$errors->has('purchase_price')? 'is-invalid' :''}}">
                    @if($errors->has('purchase_price'))
                    <div class="invalid-feedback">
                        <strong>{{$errors->first('purchase_price')}}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="sale_price">@lang('site.sale_price')</label>
                    <input type="number" name="sale_price"  value="{{$product->sale_price}}"  class="form-control {{$errors->has('sale_price')? 'is-invalid' :''}}">
                    @if($errors->has('sale_price'))
                    <div class="invalid-feedback">
                        <strong>{{$errors->first('sale_price')}}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="stock">@lang('site.stock')</label>
                    <input type="number" name="stock" value="{{$product->stock}}" class="form-control {{$errors->has('stock')? 'is-invalid' :''}}">
                    @if($errors->has('stock'))
                    <div class="invalid-feedback">
                        <strong>{{$errors->first('stock')}}</strong>
                        @endif
                    </div>

                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.edit')</button>
                        </div>
                   </form><!-- end of form-->
                </div>
              </div> <!--end of box header -->
              
          </div><!--end of box-->

        </section>
    </div>
@endsection