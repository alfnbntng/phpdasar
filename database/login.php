<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <style>
      .btn-color {
          background-color: #0e1c36;
          color: #fff;

      }

      .profile-image-pic {
          height: 200px;
          width: 200px;
          object-fit: cover;
      }



      .cardbody-color {
          background-color: #ebf2fa;
      }

      a {
          text-decoration: none;
      }
    </style>
  </head>
  <body>
    <div>
    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5">Login Form</h2>
            <div class="card my-3">
              <form class="p-lg-5" action="connect_login.php" method="POST">
                <div class="text-center">
                  <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                    width="200px" alt="profile">
                </div>

                <div class="mb-3">
                  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    placeholder="email">
                </div>

                <div class="mb-3">
                  <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>

                <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-2 w-100">Login</button></div>
                <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
                  Registered? <a href="register.php" class="text-dark fw-bold"> Create an
                    Account</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>