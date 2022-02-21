@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub Category List</h3>
                            <a href="{{route('add.subcategory')}}" style="float: right"
                               class="btn btn-rounded btn-success mb-5">Add Sub Category</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Sub Category Name En</th>
                                        <th>Sub Category Name Hin</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sub_category as $item)
                                        <tr>
                                            <td>{{$item['category']['category_name_en']}}</td>
                                            <td>{{$item->subcategory_name_en}}</td>
                                            <td>{{$item->subcategory_name_hin}}</td>
                                            <td>
                                                <a href="{{route('subcategory.edit',$item->id)}}"
                                                   class="btn btn-success mb-5"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('subcategory.delete',$item->id)}}"
                                                   class="btn btn-danger mb-5" id="delete"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Category</th>
                                        <th>Sub Category Name En</th>
                                        <th>Sub Category Name Hin</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
