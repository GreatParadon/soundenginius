@extends('web_component.main')
@section('content')
    <style>
        .center-image {
            margin-bottom: 10px;
            object-fit: cover;
        }

        .fill-image {
            /*object-fit: cover;*/
            max-height: 100%;
            width: auto;
            /*min-width: 100%;*/
            /*height: auto;*/
        }

        .stretch-image {
            min-width: 100%;
            min-height: 100%;
        }

        .fit-image {
            /*background: #FFFFFF;*/
            /*object-fit: cover;*/
            max-height: 100%;
            max-width: 100%;
            /*height: inherit;*/
            /*min-height: 100%;*/
        }

    </style>

    <h2>{{ $name or '' }}</h2>
    <h4>
        {{ $desc or '' }}
    </h4>
    <hr>

    <div class="row text-center" style="vertical-align: middle">
        @foreach($products as $product)
            <div class="col-sm-3" onclick="product('{{ $product->id }}')"
                 style="cursor: pointer; height: 150px; margin-bottom: 100px">
                <img src="{{ url('content/subcategory').'/'.$product->image }}" class="fit-image">
                <br>
                <b>{{ $product->title }}</b>
            </div>
        @endforeach
    </div>
    <script type="application/javascript">
        function product(id) {
            window.location.href = "{{ url('product') }}/" + id;
        }
    </script>
@stop