<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div id="showimages"></div>

        </div>

        <div class="col-md-10">

            <div class="card">

                <div class="card-header bg-info">

                          
                    @if (auth()->user()->role =='recruiter')
                    <h6 class="text-white">Publicar posicion</h6>
                    @endif
                    @if (auth()->user()->role =='postulant')
                    <h6 class="text-white">Publicar proyecto</h6>
                    @endif
                   
                </div>

                <div class="card-body">

                    <form class="image-upload" method="post" action="{{ route('store') }}" enctype="multipart/form-data">

                        @csrf
                   
                        <div class="form-group">

                            <label>Title</label>

                            <input type="text" name="titulo" class="form-control"/>

                            <label>Descripcion</label>
                            <input type="text" name="descripcion" class="form-control"/>
                            


                            @switch(auth()->user()->role)
                            @case('recruiter')
                            <input type="hidden" name="type" value="position" />

                               
                                @break            
                            @case('postulant')
                            <input type="hidden" name="type" value="proyect" />

                                @break                    
                            @endswitch

                         
                          
                            <input type="hidden" name="estado" value="1" />
                            <input type="hidden" name="auth_id" value="{{ auth()->user()->id }}" />
                        </div>  

                        <div class="form-group">

                            <label>Body</label>
                            <textarea name="contenido" rows="5" cols="40" class="form-control tinymce-editor"></textarea>

                        </div>  
                        <div class="form-group">

                            <label for="archivo"><b>Archivo: </b></label><br>
                            <input type="file" name="archivo" >

                        </div> 

                        <div class="form-group">

                            <label>tags</label>

                            <input type="text" name="tags" class="form-control"/>

                        </div>

                        <div class="form-group text-center">

                            <button type="submit" class="btn btn-success btn-sm">Save</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  
<script type="text/javascript">
tinymce.init({
selector: 'textarea.tinymce-editor',
height: 500,
menubar: false,
plugins: [
'advlist autolink lists link image charmap print preview anchor',
'searchreplace visualblocks code fullscreen',
'insertdatetime media table paste code help wordcount'
],
toolbar: 'undo redo | formatselect | ' +
'bold italic backcolor | alignleft aligncenter ' +
'alignright alignjustify | bullist numlist outdent indent | ' +
'removeformat | help',
content_css: '//www.tiny.cloud/css/codepen.min.css'
});
</script>