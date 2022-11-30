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
    <div>
        <table  class="container">
        <form  action="{{ route('profileedit', Auth::user()->id) }}" method="POST" class="user">
                            @csrf
                            @method('PUT')
            <tr>
            <td>nama :</td>
            <th background="blue"><input name="name" type="text" value="{{ Auth::user()->name }}"></th>
            <td>email :</td>
            <th background="blue"><input name="email" type="email" value="{{ Auth::user()->email }}"></th>
            <button type="submit" class="btn btn-primary btn-user btn-block">
             Login
            </button>
        </form>
        </table>
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