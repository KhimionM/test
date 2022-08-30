<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title>Import Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 100px;
        }

        .inputDnD .form-control-file {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 6em;
            outline: none;
            visibility: hidden;
            cursor: pointer;
            background-color: #c61c23;
            box-shadow: 0 0 5px solid currentColor;
        }

        .form-control-file:before {
            content: attr(data-title);
            position: absolute;
            top: 0.5em;
            left: 0;
            width: 100%;
            min-height: 6em;
            line-height: 2em;
            padding-top: 1.5em;
            opacity: 1;
            visibility: visible;
            text-align: center;
            border: 0.25em dashed currentColor;
            transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
            overflow: hidden;
        }

        .form-control-file:hover {
            border-style: solid;
            box-shadow: inset 0px 0px 0px 0.25em currentColor;
        }

        body {
            background-color: #f7f7f9;
        }
    </style>
</head>

<body>
    <section>
        <div class="container p-y-1">
            <div class="row m-b-1">
                <div class="col-sm-6 offset-sm-3">
                    <button type="button" class="btn btn-success btn-block" onclick="document.getElementById('inputFile').click()">Choose File</button>
                    <div class="form-group inputDnD">
                        <form action="<?php echo $routes->get('upload')->getPath(); ?>" method="post" enctype="multipart/form-data">
                            <label class="sr-only" for="inputFile">File Upload</label>
                            <input name="inputFile" type="file" class="form-control-file text-success font-weight-bold" id="inputFile" accept="text/csv" onchange="readUrl(this)" data-title="Drag and drop a file">
                        </form>
                    </div>
                </div>
            </div>
            <div class="row m-b-1">
                <button type="button" class="btn lg-2 btn-success btn-block" onclick="$('form').submit()" disabled id="import">Import</button>
                <button type="button" class="btn btn-warning btn-block" onclick="location.href='<?php echo $routes->get('deleteAll')->getPath(); ?>'">Clear all records</button>
                <button type="button" class="btn btn-lg btn-block btn-primary" onclick="location.href='<?php echo $routes->get('users')->getPath(); ?>'">View results</button>
                
            </div>
        </div>
    <section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function readUrl(input) {
            if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = (e) => {
            let imgData = e.target.result;
            let imgName = input.files[0].name;
            input.setAttribute("data-title", imgName);
            $('button#import').removeAttr('disabled');
            console.log(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>
