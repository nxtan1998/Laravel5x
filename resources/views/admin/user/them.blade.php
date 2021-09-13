@extends('admin.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('danhsachuser') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $err)
                                    {{ $err }}
                                    @endforeach
                                </div>
                            @endif 

                            @if(Session::has('thanhcong'))
                            <div >{{ Session::get('thanhcong') }}</div>
                            @endif                          
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Category Name" />
                            </div>
                          <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Re Password</label>
                                <input class="form-control" name="re_password" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>address</label>
                                <input class="form-control" name="address" placeholder="Please Enter Category Name" />
                            </div>
                            <button type="submit" class="btn btn-default">Category Add</button>
                           
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection