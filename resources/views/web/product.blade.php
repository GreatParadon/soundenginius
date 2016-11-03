@extends('web_component.main')
@section('content')
    <h2>{{ $product->title }}</h2>

    <div class="row" style="margin-bottom: 20px">
        <div class="col-md-6">
            <img id="main_image" src="{{ url('content/subcategory').'/'.$product->image }}" height="50%">
        </div>
        <div class="col-md-6">
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
        <div class="col-md-2">
            style="padding: 0; margin-bottom: 10px; border-radius: 0px; cursor: pointer"
            onclick="changeImage('{{ $product->image }}')">
            <img src="{{ url('content/subcategory').'/'.$product->image }}" width="100%">
        </div>
        @foreach($gallery as $r)
            <div class="col-md-2"
                 style="padding: 0; margin-bottom: 10px; border-radius: 0px; cursor: pointer"
                 onclick="changeImage('{{ $r->image }}')">
                <img src="{{ url('content/subcategory').'/'.$r->image }}" width="100%">
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-sm-12">
            {!! $product->content !!}
        </div>
    </div>
    <script type="application/javascript">
        function changeImage(image_name) {
            $("#main_image").prop('src', '{{ url('content/subcategory') }}/' + image_name);
        }

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
    </script>
@stop