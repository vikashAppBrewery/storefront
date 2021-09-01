@extends('admin.admin_master')

@section('admin')

    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-group">
                        @foreach($images as $multi)
                            <div class="col-md-4 mt-5 mr-2">
                                <div class="card">
                                    <img src="{{asset($multi->image)}}" alt="multi_image">
                                    <div class="card-body">
                                    <a href="{{url('multi/delete/'.$multi->id)}}"><button class="btn btn-danger">Delete</button></a>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Multi Image Brand</div>
                        <div class="card-body">
                        <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                        @csrf    
                        
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                <input multiple="" type="file" name="image[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>    
                           
                            <button type="submit" class="btn btn-primary">Add Image</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
        </div>

        
               
               

    </div>

    @endsection
