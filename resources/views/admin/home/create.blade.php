@extends('admin.admin_master')

@section('admin')


<div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Create Home About </h2>
                </div>
                <div class="card-body">
                <form action="{{route('store.about') }}" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="exampleFormControlInput1">About title</label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">About Short Description</label>
                            <textarea class="form-control" name="short_dis" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">About Long Description</label>
                            <textarea class="form-control" name="long_dis" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Submit</button>
                            <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                        </div>
                    </form>
                </div>
                </div>
                </form>
                </div>
            </div>


		</div>


@endsection
