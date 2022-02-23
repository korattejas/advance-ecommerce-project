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
                            <h3 class="box-title">Product List</h3>
                            <a href="{{route('add.product')}}" style="float: right"
                               class="btn btn-rounded btn-success mb-5">Add Product</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name En</th>
                                        <th>Product Name Hin</th>
                                        <th>Product Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $item)
                                        <tr>
                                            <td><img src="{{asset($item->image)}}" style="height: 50px;width: 50px;"></td>
                                            <td>{{$item->pro_name_en}}</td>
                                            <td>{{$item->pro_name_hin}}</td>
                                            <td>{{$item->pro_qty}}</td>
                                            <td>
                                                <a href="{{route('product.edit',$item->id)}}"
                                                   class="btn btn-success mb-5"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('product.delete',$item->id)}}"
                                                   class="btn btn-danger mb-5" id="delete"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name En</th>
                                        <th>Product Name Hin</th>
                                        <th>Product Quantity</th>
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
