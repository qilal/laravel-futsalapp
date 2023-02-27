<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Custom fonts for this template-->
    <link href="./sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./sb_admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>  
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
        <form  action="{{ route('profileedit', Auth::user()->id) }}" method="POST" enctype="multipart/form-data" class="user">
            @csrf
            @method('PUT') 
    <table  class="table table-bordered"> 
            <thead>  
                <tr> 
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>NOMOR</th>
                    <th>FOTO PROFILE</th>
                </tr>
            </thead>
                <tfoot>
            <tr>
                <th><input name="name" type="text" value="{{ Auth::user()->name }}"></th>
                <th><input name="email" type="email" value="{{ Auth::user()->email }}"></th>
                <th><input name="nomor_tlp" type="text" value="{{ Auth::user()->nomor_tlp }}"></th>
                <th> @if (' {{ /img/Auth::user()->foto }} ')
                    <img src="/img/{{ Auth::user()->foto }}" width="300px">
                    @else   <p>No Image found</p>
                    @endif
                    <input name="foto" value="{{ Auth::user()->foto }}" type="file">
                </th>
            </tr>
        </tfoot>
    </table>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Edit
                        </button>
                    </form>
                </div>
            </div>
        </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./sb_admin/vendor/jquery/jquery.min.js"></script>
    <script src="./sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./sb_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./sb_admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./sb_admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./sb_admin/js/demo/chart-area-demo.js"></script>
    <script src="./sb_admin/js/demo/chart-pie-demo.js"></script>
</body>
</html>
