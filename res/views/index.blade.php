@extends('layout.app')

@section('content')
    <form action="/uploads" method="POST" id="form" enctype="multipart/form-data">
    <div class="container p-y-1 mt-5">
        <div class="row m-b-1">
            <div class="col-sm-6 offset-sm-3">
                <button type="button" class="btn btn-primary btn-block" onclick="document.getElementById('inputFile').click()">Add XML File</button>
                <div class="form-group inputDnD">
                    <label class="sr-only" for="inputFile">File Upload</label>
                    <input type="file" name="xmlfile" class="form-control-file text-primary font-weight-bold" id="inputFile" onchange="read(this)" accept="text/xml" data-title="Drag and drop a file">
                </div>
                <button class="btn btn-primary btn-block">Submit <i class="fas fa-send"></i></button>
            </div>
        </div>
    </div>
    </form>

    <script>

        function read(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let xmlData = e.target.result;
                    let xmlName = input.files[0].name;
                    input.setAttribute("data-title", xmlName);
                    console.log(e.target.result);
                    console.log(xmlName);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection