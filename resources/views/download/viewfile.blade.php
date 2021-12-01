@extends('layouts.backend')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script scr="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min,js"></script>

    <style type="text/css">
        .wrapper{
            margin: 0 auto;
            width: 75%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<!--
        <html>
        <head>
                <title> User Registration </title>
                <link rel="stylesheet" type="text/css" href="match.css">
                <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
                <body style="background-color:grey;">

            <div class="container">
                <div class="login-box">
                <div class="row">
                
                
                <div class="col-md-6 login-right">
                    <h2> File This Form</h2>
                    <form action="kabarak.php" method="post">
                    <div class="form-group">
                    <label>File</label>
                    <input type="text" name="user" class="form-contral" required>
                    </div>
                    <div class="form-group">
                    <label>ID Number</label>
                    <input type="text" name="idnumber" class="form-contral" required>
                    </div>
                    <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="text" name="date" class="form-contral" required>
                    </div>
                    <div class="form-group">
                    <label> Password</label>
                    <input type="password" name="password" class="form-contral" required>
                    </div>
                    <button type="submit" class="btn btn-primary"> Register </button>
                </form>
                </div>
                
                
                
                
                </div>
                <br>
                    <B><p> If Already A Member,<a  href="mkubwa.php">Login Here </a> </p></B>
                </div>
                
            </div>
            <a class="float-right" href="mkubwa.php"> Login Here </a>
            </body>
            </html>

-->
   
   
    <div class="wrapper">
        <section class="panel panel-primary">
            <div class="panel-heading">
                Download Files Laravel
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Title</th>
                        <th>Upload Date</th>
                        <th>Action</th>
                    </thead>

                    <tbody>

                    @foreach($downloads as $down)
                        <tr>
                            <td>{{ $down->file_title}}</td>
                            <td>{{ $down->created_at}}</td>
                            <td>
                                <a href="download/{{ $down->file_name}}" download="{{ $down->file_name}}">
                                <button type="button" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-download"></i>Download
                                </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    
</body>
</html>

@endsection