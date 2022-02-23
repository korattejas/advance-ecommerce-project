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
                            <h3 class="box-title">Add Product</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('product.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            {{--Product Name--}}
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Name En <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="pro_name_en"
                                                                       class="form-control">
                                                                @error('pro_name_en')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Name Hin <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="pro_name_hin"
                                                                       class="form-control">
                                                                @error('pro_name_hin')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            {{--Product Brand,Category--}}
                                            <div class="col-md-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5>Brand <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="brand_id" id="select"
                                                                        class="form-control" aria-invalid="false">
                                                                    <option value="">Select Your Brand</option>
                                                                    @foreach($brands as $brand)
                                                                        <option
                                                                            value="{{$brand->id}}">{{$brand->brand_name_en}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('brand_id')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5>Category <span class="text-danger">*</span></h5>
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
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5>Sub Category <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="sub_category_id" id="select"
                                                                        class="form-control" aria-invalid="false">
                                                                    <option value="">Select Your Sub Category</option>
                                                                    <option></option>
                                                                </select>
                                                                @error('sub_category_id')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h5>Sub SubCategory <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="sub_sub_category_id" id="select"
                                                                        class="form-control" aria-invalid="false">
                                                                    <option value="">Select Your Sub SubCategory
                                                                    </option>
                                                                    <option></option>
                                                                </select>
                                                                @error('sub_sub_category_id')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Product Code--}}
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Code <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="pro_code"
                                                                       class="form-control">
                                                                @error('pro_code')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product quantity <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="pro_qty"
                                                                       class="form-control">
                                                                @error('pro_qty')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Product Tag--}}
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Tag En <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="pro_tag_en"
                                                                       class="form-control">
                                                                @error('pro_tag_en')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Tag Hin <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="pro_tag_hin"
                                                                       class="form-control">
                                                                @error('pro_tag_hin')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Product Size--}}
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Size En <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="pro_size_en"
                                                                       value=""
                                                                       class="form-control">
                                                                @error('pro_size_en')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Size Hin <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="pro_size_hin"
                                                                       value=""
                                                                       class="form-control">
                                                                @error('pro_size_hin')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Product Color--}}
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Color En <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="pro_color_en"
                                                                       value=""
                                                                       class="form-control">
                                                                @error('pro_color_en')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Color Hin <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="text" name="pro_color_hin"
                                                                       value=""
                                                                       class="form-control">
                                                                @error('pro_color_hin')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Product Price--}}
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Selling Price <span class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="number" name="selling_price"
                                                                       class="form-control">
                                                                @error('selling_price')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Discount Price <span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="number" name="discount_price"
                                                                       value="Red,Black"
                                                                       class="form-control">
                                                                @error('discount_price')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Product Short Description--}}
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Short Description En <span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                 <textarea name="short_des_en" id="textarea"
                                                                           class="form-control"
                                                                           placeholder="Textarea text"></textarea>
                                                                <div class="help-block"></div>
                                                            </div>
                                                            @error('short_des_en')
                                                            <spa class="text-danger">{{$message}}</spa>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Short Description Hin <span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                 <textarea name="short_des_hin" id="textarea"
                                                                           class="form-control"
                                                                           placeholder="Textarea text"></textarea>
                                                                <div class="help-block"></div>
                                                            </div>
                                                            @error('short_des_hin')
                                                            <spa class="text-danger">{{$message}}</spa>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Product Image--}}
                                            <div class="col-md-12 mt-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <h5>Main Image <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="file" id="image" name="image"
                                                                       class="form-control" onchange="mainThamUrl(this)">
                                                                @error('image')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                                <img src="" id="mainThmb">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <h5>Multi Image <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" >
                                                                @error('multi_img')
                                                                <spa class="text-danger">{{$message}}</spa>
                                                                @enderror
                                                                <div class="row" id="preview_img"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{--Product Long Description--}}
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Long Description En <span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                 <textarea id="editor1" name="long_des_en" rows="10"
                                                                           cols="80">
												                          Product Long Description En.
						                                         </textarea>
                                                                <div class="help-block"></div>
                                                            </div>
                                                            @error('short_des_en')
                                                            <spa class="text-danger">{{$message}}</spa>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Product Long Description Hin <span
                                                                    class="text-danger">*</span>
                                                            </h5>
                                                            <div class="controls">
                                                                  <textarea id="editor2" name="long_des_hin" rows="10"
                                                                            cols="80">
												                           Product Long Description Hin.
						                                         </textarea>
                                                                <div class="help-block"></div>
                                                            </div>
                                                            @error('short_des_hin')
                                                            <spa class="text-danger">{{$message}}</spa>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            {{--Product other--}}
                                            <div class="col-12 mt-3">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <hr>
                                                            <div class="controls">
                                                                <fieldset>
                                                                    <input type="checkbox" name="hot_deals"
                                                                           id="checkbox_1"
                                                                           value="1">
                                                                    <label for="checkbox_1">Hot Deals</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" name="featured"
                                                                           id="checkbox_2" value="1">
                                                                    <label for="checkbox_2">Featured</label>
                                                                </fieldset>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <hr>
                                                            <div class="controls">
                                                                <fieldset>
                                                                    <input type="checkbox" name="special_offer"
                                                                           id="checkbox_3"
                                                                           value="1">
                                                                    <label for="checkbox_3">Special Offer</label>
                                                                </fieldset>
                                                                <fieldset>
                                                                    <input type="checkbox" name="special_deals"
                                                                           id="checkbox_4" value="1">
                                                                    <label for="checkbox_4">Special Deals</label>
                                                                </fieldset>
                                                                <div class="help-block"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
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
                            $('select[name="sub_sub_category_id"]').html('')
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

            $('select[name="sub_category_id"]').on('change', function () {
                var sub_category_id = $(this).val()
                if (sub_category_id) {
                    $.ajax({
                        url: "{{ url('admin/product/sub-subcategory/ajax') }}/" + sub_category_id,
                        type: 'GET',
                        datatype: 'json',
                        success: function (data) {
                            var d = $('select[name="sub_sub_category_id"]').empty()

                            $.each(JSON.parse(data), function (key, value) {

                                $('select[name="sub_sub_category_id"]').append('<option value="' + value.id + '">' + value.sub_sub_category_name_en + '</option>')
                            })

                        },
                    })
                } else {
                    alert('danger')
                }

            })
        })
    </script>
    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>

        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>


@endsection
