@extends('layouts.admin')

@section('style')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection

@section('content')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Edit Kedai Kopi
                    </h1>
                </div>
                <div class="body">
                  <form action="{{ url('admin/profile/coffee-shops/'.$coffeeShop->id) }}" id="willSubmit" method="POST" enctype="multipart/form-data">
              			{{ csrf_field() }}
              			{{ method_field('put') }}
                    <div class="form-group form-float">
                        <div class="form-line">
                        	<p>Nama</p>
                            <input type="text" name="name" class="form-control" form="willSubmit" value="{{ $coffeeShop->name }}">
                        </div>
                    </div>
						
						        <p>Deskripsi</p>
                    <textarea name="description" class="form-control my-editor" form="willSubmit">{{ $coffeeShop->description }}</textarea>
                    <br>
                    <p>Alamat</p>
                    <textarea name="address" class="form-control my-editor" form="willSubmit">{{ $coffeeShop->address }}</textarea>
                    <br>
                    <p>Kontak</p>
                    <textarea name="contact" class="form-control my-editor" form="willSubmit">{{ $coffeeShop->contact }}</textarea>
						
        						<h3>Thumbnail</h3>
        						<div class="row">
        							<div class="col-md-4">
        								@if(isset($coffeeShop->thumbnail))
                            <br>
                            <img class="img-responsive" style="max-width: 30vw; max-height: 30vh;" src="{{ url('coffee-shop/'.$coffeeShop->thumbnail) }}">
                        @endif 
        								<div class="form-group form-float">
                            <input type="file" name="thumbnail" class="form-control" form="willSubmit">
                        </div>
        						  </div>
        						</div>
                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
              		</form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
  var editor_config = {
    path_absolute : "{{ url('/').'/' }}",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
@endsection
