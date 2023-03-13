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
    <div class="container">
        <div class="card-body ">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-4">
                        <div class="card-header">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mt-2">Reset Password</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" class="user">
                            @csrf
                            <div class="form-group">
                                <span>Email Address</span>
                                <input name="email" type="email" class="form-control form-control-user"
                                    id="exampleInputEmail" placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <span>Password</span>
                                    <input name="password" type="password" class="form-control form-control-user"
                                        id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <span> Confirm Password</span>
                                    <input name="password_confirmation" type="password"
                                        class="form-control form-control-user" id="exampleRepeatPassword"
                                        placeholder="Confirm Password">
                                </div>
                            </div>
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary bg-gradient-info btn-user btn-block">
                                Reset Password
                            </button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
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
