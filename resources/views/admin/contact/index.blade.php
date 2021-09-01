@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <h4 style="margin-left:20px">Contact Page Data</h4>
                <a style="padding-left:20px; margin-bottom:10px" href="{{route('add.contact')}}"><button class="btn btn-info">Add Contact Detail</button></a>
                <br><br>
                <div class="col-md-12">
                    <div class="card">

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-header">All About Data</div>

            <table class="table">
                <thead>
                    <tr>
                    <th scope="col" width="5%">Sl No</th>
                    <th scope="col" width="15%">Contact Address</th>
                    <th scope="col"  width="15%">Contact Email</th>
                    <th scope="col"  width="25%"> Contact Phone No</th>
                    <th scope="col"  width="15%">Action</th>
                    
                    </tr>
                </thead>
                <tbody>
                    @php($i = 1)
                   @foreach($contacts as $con )
                    <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$con -> address}}</td>
                    <td>{{$con -> email}}</td>
                    <td>{{$con -> phone}}</td>
                    <td>
                    <a href="{{url('contact/edit/'.$con->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{url('contact/delete/'.$con->id)}}" onClick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                
                </div>
                </div>

        </div>
    </div>

    @endsection

