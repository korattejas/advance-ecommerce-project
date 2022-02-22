@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub SubCategory</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('sub_subcategory.store')}}" method="post">
                                        @csrf
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
                                                                            value="{{$category->id}}">{{$category->category_name_en}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('category_id')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5>Select SubCategory <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <select name="sub_category_id" id="select"
                                                                        class="form-control" aria-invalid="false">
                                                                    <option value="">Select Your SubCategory</option>

                                                                </select>
                                                                @error('sub_category_id')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Sub SubCategory Name En <span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="sub_sub_category_name_en"
                                                                       class="form-control">
                                                                @error('sub_sub_category_name_en')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Sub SubCategory Name Hin <span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="sub_sub_category_name_hin"
                                                                       class="form-control">
                                                                @error('sub_sub_category_name_hin')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val()
                if (category_id) {
                    $.ajax({
                        url: "{{ url('admin/category/subcategory/ajax') }}/" + category_id,
                        type: 'GET',
                        datatype: 'json',
                        success: function (data) {
                            var d = $('select[name="sub_category_id"]').empty()

                            $.each(JSON.parse(data), function (key, value) {

                                $('select[name="sub_category_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>')
                            })

                        },
                    })
                } else {
                    alert('danger')
                }

            })
        })
    </script>
@endsection
