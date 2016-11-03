@extends('web_component.main')
@section('content')
    <style>
        #product_img .item img {
            width: auto;
            height: 250px;
        }
    </style>
    <h2>{{ $product->title }}</h2>

    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-4">
            <div id="product_img" class="owl-carousel owl-theme">
                <div class="item">
                    <a href="{{ url('content/subcategory').'/'.$product->image }}" data-lightbox="product_img"><img
                                src="{{ url('content/subcategory').'/'.$product->image }}"></a>
                </div>
                @foreach($gallery as $r)
                    <div class="item">
                        <a href="{{ url('content/subcategory').'/'.$r->image }}" data-lightbox="product_img"><img
                                    src="{{ url('content/subcategory').'/'.$r->image }}"></a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-8">
            <p>รายละเอียด</p>
            <table class="table">
                <tr>
                    <td colspan="3">{{ $product->desc or '' }}</td>
                </tr>
                <tr>
                    <td>ราคา</td>
                    <td>{{ $product->cost or '' }}</td>
                    <td>บาท</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button class="btn btn-success pull-right"
                                onclick="storeProductToCart('{{ $product->id or '' }}')">เพิ่มสินค้า
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! $product->content !!}
        </div>
    </div>
    <script type="application/javascript">
        {{--function changeImage(image_name) {--}}
        {{--$("#main_image").prop('src', '{{ url('content/subcategory') }}/' + image_name);--}}
        {{--}--}}

        function storeProductToCart(id) {
            $.ajax({
                url: '{{ url('productcart') }}',
                type: 'POST',
                data: {
                    sub_category_id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (result) {
                    alert(result.message);
                },
                error: function () {
                    alert('เกิดข้อผิดพลาดไม่สามารถเพิ่มสินค้าได้');
                }
            })
        }

        $(document).ready(function () {

            $("#product_img").owlCarousel({

                navigation: true, // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,

            });

        });
    </script>
@stop