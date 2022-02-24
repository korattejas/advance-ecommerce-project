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
                            <h3 class="box-title">Edit Slider</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('slider.update',$slider->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$slider->id}}">
                                        <input type="hidden" name="old_image" value="{{$slider->image}}">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5>Title <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="title" value="{{$slider->title}}"
                                                                       class="form-control">
                                                                @error('title')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5>Description <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                   <textarea name="description" id="textarea"
                                                                             class="form-control"
                                                                             placeholder="Slider Description">{{$slider->description}}</textarea>
                                                                @error('description')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" id="image" name="image"
                                                               class="form-control">
                                                        @error('image')
                                                        <spa class="text-danger">{{$message}}</spa>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add">
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
