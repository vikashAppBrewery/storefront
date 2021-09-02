@extends('admin.admin_master')

@section('admin')


<div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Home About </h2>
                </div> 
                <div class="card-body">
                <form action="{{url('update/contacts/'.$contacts->id) }}" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contact Email</label>
                            <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value="{{$contacts -> email}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Contact phone no</label>
                            <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" value="{{$contacts -> phone}}">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Contact Address</label>
                            <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3">{{$contacts -> address}}</textarea>
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
