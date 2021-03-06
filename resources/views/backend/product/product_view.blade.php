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
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Product Discount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $item)
                                        <tr>
                                            <td><img src="{{asset($item->image)}}" style="height: 50px;width: 50px;"></td>
                                            <td>{{$item->pro_name_en}}</td>
                                            <td>{{$item->selling_price}} $</td>
                                            <td>{{$item->pro_qty}} pic</td>
                                            <td>
                                                @if($item->discount_price == NULL)
                                                    <span class="badge badge-pill badge-danger">No Discount</span>
                                                @else
                                                    @php
                                                    $amount = $item->selling_price - $item->discount_price;
                                                    $discount = ($amount/$item->selling_price) * 100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-danger">{{round($discount)}} %</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->status == 1)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td>
{{--                                                <a href="{{route('product.edit',$item->id)}}"--}}
{{--                                                class="btn btn-primary mb-5"><i class="fa fa-eye"></i></a>--}}
                                                <a href="{{route('product.edit',$item->id)}}"
                                                   class="btn btn-success mb-5"><i class="fa fa-pencil"></i></a>
                                                <a href="{{route('product.delete',$item->id)}}"
                                                   class="btn btn-danger mb-5" id="delete"><i
                                                        class="fa fa-trash"></i></a>
                                                @if($item->status == 1)
                                                    <a href="{{route('product.inActive',$item->id)}}"
                                                       class="btn btn-danger mb-5" title="InActive Now"><i class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{route('product.active',$item->id)}}"
                                                       class="btn btn-success mb-5" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name En</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Product Discount</th>
                                        <th>Status</th>
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
