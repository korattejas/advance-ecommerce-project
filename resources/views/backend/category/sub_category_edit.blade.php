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
                            <h3 class="box-title">Edit Sub Category</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('subcategory.update',$sub_category->id)}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$sub_category->id}}">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5>Select Category <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="category_id" id="select"
                                                                        class="form-control" aria-invalid="false">
                                                                    <option value="">Select Your Category</option>
                                                                    @foreach($categories as $category)
                                                                        <option
                                                                            value="{{$category->id}}" {{$category->id == $sub_category->category_id ? 'selected': ''}}>{{$category->category_name_en}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('category_id')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Name En <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="subcategory_name_en"
                                                                       value="{{$sub_category->subcategory_name_en}}"
                                                                       class="form-control">
                                                                @error('subcategory_name_en')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Name Hin <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="subcategory_name_hin"
                                                                       value="{{$sub_category->subcategory_name_hin}}"
                                                                       class="form-control">
                                                                @error('subcategory_name_hin')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5"
                                                   value="Update">
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
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
