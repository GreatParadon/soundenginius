@extends('web_component.main')
@section('content')

    <style>

        .image_container {
            height: 200px;
            margin-bottom: 100px;
            display: table-cell;
            vertical-align: middle;
            cursor: pointer;
        }

        .fit-image {
            max-height: 100%;
            width: 100%;
            margin: auto auto;
            display: block;
            padding: 20px;
        }

        .image_container:hover {
            background-color: #eee;
        }

    </style>

    <section class="bg-light-gray">
        <div class="row">
            <div class="col-lg-12 text-left">
                <h2 class="section-heading">Services</h2>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-user fa-stack-1x" aria-hidden="true" style="color: #2c3e50"></i>
                    </span>
                <h4 class="service-heading">Sound Audio Consultant</h4>
                <ul class="text-muted" style="text-align: left">
                    <li>
                        ที่ปรึกษาด้านระบบภาพและเสียง
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-volume-off fa-stack-1x" aria-hidden="true" style="color: #2c3e50"></i>
                    </span>
                <h4 class="service-heading">Sound Production</h4>
                <ul class="text-muted" style="text-align: left">
                    <li>
                        รับติดตั้งออกแบบระบบภาพและเสียงทั้งในและนอกอาคาร
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-shopping-cart fa-stack-1x" aria-hidden="true" style="color: #2c3e50"></i>
                    </span>
                <h4 class="service-heading">Sell</h4>
                <ul class="text-muted" style="text-align: left;">
                    <li>
                        ขายอุปกรณ์สินค้าระบบภาพและเสียง
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="row">
            <div class="col-lg-12 text-left">
                <h2 class="section-heading">หมวดสินค้า</h2>
            </div>
        </div>

        <div class="row text-center" style="vertical-align: middle">
            @foreach($categories as $category)
                <div class="col-md-3 image_container" onclick="category('{{ $category->id }}')">
                    <img src="{{ url('content/category').'/'.$category->image }}" class="fit-image">
                </div>
            @endforeach
        </div>
    </section>

    <script type="application/javascript">
        function category(id) {
            window.location.href = "{{ url('category') }}/" + id;
        }
    </script>
@stop