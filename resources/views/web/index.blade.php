@extends('web_component.main')
@section('content')

    <h3>
        เกี่ยวกับเรา
    </h3>
    <h4>
        ผู้นำเข้า ตัวแทนจำหน่าย จำหน่ายปลีก-ส่ง ขายอุปกรณ์ เครื่องเสียง PA เครื่องเสียงห้องประชุม เครื่องเสียงกลางแจ้ง ราคาเครื่องเสียง pa ร้านเครื่องเสียง Power amp speaker เครื่องเสียงบ้าน ราคาเครื่องเสียงงานคอนเสิร์ต ตู้ลำโพงแขวนผนัง หลายๆ ยี่ห้อ ร้านตู้ลำโพงกลางแจ้ง เครื่องเสียง PA กลางแจ้ง ตู้ลําโพงกลางแจ้ง ห้องประชุม Mixer มิกเซอร์ Power Mixer เพาเวอร์มิกเซอร์ Mixer มิกเซอร์ แบบอนาลอก มิกเซอร์แบบดิจิตอล ขายลำโพง ระบบเสียงตามสาย เครื่องเสียงกลางแจ้งจัดชุด ระบบเสียงประกาศ Portable เครื่องเสียงพกพา เครื่องขยายเสียง ตู้ลำโพงพร้อมเครื่องขยายเสียง โทรโข่ง ไมโครโฟน ไมโครโฟนไร้สาย ไมค์ลอย ลำโพงฮอร์น ศูนย์รวมอุปกรณ์ ระบบเสียงกลางแจ้ง ...
    </h4>
    <hr>

    <h3 style="margin-bottom: 50px">โปรโมชั่น</h3>

    <div class="row text-center">
        @foreach($promotions as $promotion)
            <div class="col-md-3" onclick="promotion('{{ $promotion->id }}')" style="cursor: pointer">
                <div class="thumbnail">
                    <img src="{{ url('content/promotion').'/'.$promotion->image }}" style="width: 200px; height: 200px">
                    <div class="caption">
                        <h5>{{ $promotion->title }}</h5>
                        <p>{{ $promotion->desc }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script type="application/javascript">
        function promotion(id) {
            window.location.href = "{{ url('promotion') }}/" + id;
        }
    </script>
@stop