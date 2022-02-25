<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.css')}}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
          rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu -->

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= -->

<!-- For demo purposes – can be removed on production -->

<!-- For demo purposes – can be removed on production : End -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"

    switch (type) {
        case 'info':
            toastr.info("{{Session::get('message')}}")
            break
        case 'success':
            toastr.success("{{Session::get('message')}}")
            break
        case 'danger':
            toastr.danger("{{Session::get('message')}}")
            break
        case 'warning':
            toaster.warning("{{Session::get('message')}}")
            break
        case 'error':
            toastr.error("{{Session::get('message')}}")
            break

    }
    @endif
</script>

<!-- Add To Cart Product Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span></strong></h5>
                <button type="button" id="closModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-md-4">

                        <div class="card" style="width: 18rem;">
                            <img src="" class="card-img-top" alt="..." style="height: 200px; width: 180px;" id="image">
                        </div>

                    </div><!-- // end col md -->


                    <div class="col-md-4">

                        <ul class="list-group">
                            <li class="list-group-item">Product Price: <strong class="text-danger">$<span
                                        id="price"></span></strong>
                                <del id="oldPrice">$</del>
                            </li>
                            <li class="list-group-item">Product Code: <strong id="code"></strong></li>
                            <li class="list-group-item">Category: <strong id="category"></strong></li>
                            <li class="list-group-item">Brand: <strong id="brand"></strong></li>
                            <li class="list-group-item">Stock: <span class="badge badge-pill badge-success"
                                                                     id="available"
                                                                     style="background: green; color: white;"></span>
                                <span class="badge badge-pill badge-danger" id="noAvailable"
                                      style="background: red; color: white;"></span>
                            </li>
                        </ul>

                    </div><!-- // end col md -->


                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Example select</label>
                            <label for="exampleFormControlSelect1">Choose Color</label>
                            <select class="form-control" id="color" name="color">

                            </select>
                        </div>


                        <div class="form-group" id="sizeArea">
                            <label for="exampleFormControlSelect1">Choose Size</label>
                            <select class="form-control" id="size" name="size">

                            </select>
                        </div>  <!-- // end form group -->

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Quantity</label>
                            <input type="number" class="form-control" id="qty" value="1" min="1">
                        </div> <!-- // end form group -->
                        <input type="hidden" id="product_id">
                        <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to Cart</button>
                    </div><!-- // end col md -->
                </div> <!-- // end row -->


            </div> <!-- // end modal Body -->

        </div>
    </div>
</div>
<!-- End Add To Cart Product Modal -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    //product view model
    function productView (id) {
        // alert(id)

        $.ajax({
            type: 'GET',
            url: '/product/view/modal/' + id,
            datatype: 'json',
            success: function (data) {
                // console.log(data);
                $('#pname').text(data.product.pro_name_en)
                $('#price').text(data.product.selling_price)
                $('#code').text(data.product.pro_code)
                $('#category').text(data.product.category.category_name_en)
                $('#brand').text(data.product.brand.brand_name_en)
                $('#image').attr('src', '/' + data.product.image)

                $('#product_id').val(id)
                $('#qty').val(1)

                //product price
                if (data.product.discount_price == null) {
                    $('#price').text('')
                    $('#oldPrice').text('')
                    $('#price').text(data.product.selling_price)
                } else {
                    $('#price').text(data.product.discount_price)
                    $('#oldPrice').text(data.product.selling_price)

                }
                //product stock

                if (data.product.pro_qty > 0) {
                    $('#available').text('')
                    $('#noAvailable').text('')
                    $('#available').text('available')
                } else {
                    $('#available').text('')
                    $('#noAvailable').text('')
                    $('#noAvailable').text('noAvailable')
                }

                //color
                $('select[name="color"]').empty()
                $.each(data.color, function (key, value) {
                    $('select[name="color"]').append(' <option value=" ' + value + ' ">' + value + '</option>')
                })

                //size
                $('select[name="size"]').empty()
                $.each(data.size, function (key, value) {
                    $('select[name="size"]').append(' <option v alue=" ' + value + ' ">' + value + '</option>')
                    if (data.size == '') {
                        $('#sizeArea').hide()

                    } else {
                        $('#sizeArea').show()

                    }
                })

            }

        })
    }

    //Start Add To Cart

    function addToCart () {
        var product_name = $('#pname').text()
        var id = $('#product_id').val()
        var color = $('#color option:selected').text()
        var size = $('#size option:selected').text()
        var qty = $('#qty').val()

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                product_name: product_name, color: color, size: size, qty: qty
            },
            url: '/cart/data/store/' + id,
            success: function (data) {
                $('#closModal').click()
                // console.log(data)
            }
        })

        //message alert
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            showConfirmButton: false,
            timer: 3000
        })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                type: 'success',
                title: data.success
            })

        } else {
            Toast.fire({
                type: 'error',
                title: data.error
            })

        }//end message alert

    }

    //End Add To Cart


</script>

</body>
</html>
