
@extends('layouts.admin')

@section('title','Admin Panel')

@section('content')
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Blog ID</th>
                            <th>Yorum</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                        <tbody>@foreach($datalist_comment as $rs)

                        <tr>
                            <form action="{{route('admin_comment_update',['id'=>$rs->id])}}" method="post" class="forms-sample">
                            @csrf
                                <td>{{$rs->id}}</td>
                            <td>{{$rs->blog_id}}</td>
                            <td>{{$rs->comment}}</td>


                            <td> <select name="status">
                                    <option selected>{{$rs->status}}</option>
                                    <option>True</option>
                                    <option>False</option>
                                </select>
                            </td>
                            <td><input type="submit" value="Güncelle"> </input></td>
                            </form>
                        </tr> @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
