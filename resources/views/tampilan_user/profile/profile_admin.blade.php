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

    
    <section class="vh-100 bg-gradient-info">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                  <div class="col-md-4 gradient-custom text-center bg-gradient-light text-dark"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="/img/{{ Auth::user()->foto }}"
                      alt="Avatar" class="img-profile  bulat-sedang my-5" style="width: 100px;" />
                      <h5>{{ Auth::user()->name }}</h5>
                    <p></p>
                    <i class="far fa-address-card mb-5"></i>  
                </div>
                  <div class="col-md-8 ">
                    <div class="card-body p-4 ">
                      <h6>Profile</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-6 mb-3">
                          <h6>Email</h6>
                          <p class="text-muted">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="col-6 mb-3">
                          <h6>Phone</h6>
                          <p class="text-muted">{{ Auth::user()->nomor_tlp }}</p>
                        </div>
                      </div>
                      
                      <hr class="mt-0 mb-4">
                      
                      
                      <div class="row pt-1">
                        
                        <div class="col-6 mb-3">
                            <div class="d-flex justify-content-start">
                              <a class="btn text-gray-600" href="edituser"><i class="fas fa-sm fa-fw fa-edit fa-lg mr-2"></i>Change</a>
                            </div>
                          </div>
                          <div class="col-6 mb-3">
                          <a href="userLogin" class="btn text-gray-600"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i> Back</a>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    

    
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