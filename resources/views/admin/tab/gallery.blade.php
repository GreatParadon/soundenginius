{{--{{ dd($page['content']) }}--}}
<table class="table table-hover">
    <thead>
    <tr>
        <td>
            <form class="form-horizontal" role="form" method="POST"
                  enctype="multipart/form-data" id="gallery_form">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id" value="{{ $select->id or '' }}" readonly>
                <label for="gallery">Upload Picture</label>
                <input type="file" name="gallery[]" id="gallery" required multiple>
            </form>
        </td>
        <td>
            <button onclick="sendFile('{{ url('admin/'.$page['content'].'/gallery') }}')"
                    class="btn btn-success pull-right">
                Submit
            </button>
        </td>
    </tr>
    <tr>
        <th>Image</th>
        <th>Option</th>
    </tr>
    </thead>
    <tbody id="gallery_preview">
    @forelse($galleries['gallery'] as $g)
        <tr id="{{ $g->id }}">
            <td>
                <a href="{{ $g->image }}" data-lightbox="gallery">
                    <img src="{{ $g->image }}" width="100">
                </a>
            </td>
            <td>
                <a onclick="deletePopUp('{{ $page['content'] }}','{{ $g->id }}')" style="cursor: pointer"><span
                            class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="2">
                No any image file
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

<script type="application/javascript">

    function removeElement(id) {
        $('#' + id).remove();
    }

    function deletePopUp(content, id) {
        var confirm = window.confirm('Did you want to Delete this image ?');
        if (confirm == true) {
            $.ajax({
                url: '{{ url('admin') }}/' + content + '/gallery/' + id,
                data: {'_token': '{{ csrf_token() }}'},
                type: 'DELETE',
                success: function (result) {
                    alert(result.message);
                    removeElement(id);
                }, error: function () {
                    alert('Delete Failed');
                }
            });
        }
    }

    function sendFile(url) {
        $("body").css("cursor", "progress");
        var form = $('form')[1]; // You need to use standart javascript object here
        var data = new FormData(form);
        data.append('gallery', $('input[type=file]')[0].files[0]);
        $.ajax({
            data: data,
            type: "POST",
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("body").css("cursor", "default");
                alert(data.message);
            }, error: function () {
                alert('Your image file are invalid, Please change your image!');
            }
        });
    }

    $(document).on('change', '#gallery', function () {
        var image = $("#gallery");

        var ext = image.val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert('File extension are not allowed');
            image.val("");
            return false;
        }

        for (var i = 0; i < this.files.length; i++) {
            if (this.files && this.files[i]) {
                var reader = new FileReader();
                id = 'g' + i;
                reader.onload = function (e) {
                    $("#gallery_preview").prepend('<tr id="' + id + '"><td><img src="' + e.target.result + '" style="width: 100px"></td><td><a onclick="removeElement(' + id + ')" style="cursor: pointer"><span class="glyphicon glyphicon-trash"></span></a></td></tr>');
                };

                reader.readAsDataURL(this.files[i]);
            }
        }

    });
</script>