@extends('layouts.dashboard.app')
@section('content')
    
    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.clients') </h1>
            <ol class="breadcrumb"> 
                <li> <a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li class="active">@lang('site.clients')</li>
            </ol>
        </section>
 
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" style="margin-bottom:20px">@lang('site.clients') <small>{{$clients->count()}}</small></h3>
                  
                  <form action="{{route('dashboard.clients.index')}}" method="get">
                         <div class="col-md-4">
                         <input type="text" name="search" class="form-control" placeholder="@lang('site.search') " value="{{request()->search}}">
                         </div>

                         <div class="col-md-4">
                               <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> @lang('site.search')</button>
                               @if(auth()->user()->hasPermission('create_clients'))
                               <a href="{{route('dashboard.clients.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> @lang('site.add')</a>
                                @else 
                                <a href="#" class="btn btn-primary btn-sm disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>

                               @endif
                            </div>
                  </form><!--end of form  -->
                </div> <!--end of box header -->
                <div class="box-body">
                    @if($clients->count()>0)
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.phone')</th>
                                        <th>@lang('site.address')</th>
                                        <th>@lang('site.action')</th>
                                        
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($clients as $index=>$client )
                                       <tr>
                                           <td>{{$index+1}}</td>
                                           <td>{{$client->name}}</td>
                                           <td>{{implode(array_filter($client->phone),' - ')}}</td>
                                           <td>{{$client->address}}</td>
                        
                                           <td>
                                               {{-- @if(auth()->client()->hasPermission('update_clients')) --}}
                                               <a href="{{route('dashboard.clients.edit',$client->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>
                                                 {{-- @else
                                                 <a href="#" class="btn btn-info btn-sm disabled">@lang('site.edit')</a>

                                               @endif --}}
                                           {{-- @if(auth()->client()->hasPermission('delete_clients')) --}}
                                               <form action="{{route('dashboard.clients.destroy',$client->id)}}" method="POST" style="display:inline-block">
                                               @csrf
                                               {{method_field('delete')}}
                                              
                                               <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>@lang('site.delete')</button>

                                           {{-- @else
                                              <button class="btn btn-primary disable">@lang('site.delete')</button>
                                           
                                           @endif --}}
                                        </form>
                                       
                                           </td>
                                       </tr>
                                         
                                      @endforeach
                                  </tbody>
        
                            </table>
                            <div style="text-align: center">
                                {{$clients->appends(request()->query())->links()}}
                                </div>
                    @else
                                <h1>@lang('site.no_data_found')</h1>

                    @endif
                </div>
            </div><!--end of box-->
            
        </section>
    </div>
@endsection