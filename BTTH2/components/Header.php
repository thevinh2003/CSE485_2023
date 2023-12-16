<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <title>PHP - CMS</title>
</head>

<body>
  <nav style="position: sticky; top: 0; z-index: 100;" class="navbar navbar-expand-lg navbar-light bg-light shadow-sm ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/BTTH_CSE485/BTTH2/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/BTTH_CSE485/BTTH2/admin/dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/BTTH_CSE485/BTTH2/admin/users.php">Users</a></li>
              <li><a class="dropdown-item" href="/BTTH_CSE485/BTTH2/admin/posts.php">Posts</a></li>
              <li><a class="dropdown-item" href="/BTTH_CSE485/BTTH2/admin/category.php">Categories</a></li>
            </ul>
          </li>
          <?php if (session_status() !== PHP_SESSION_ACTIVE || session_id() === "") {
            session_start();
          }
          if (isset($_SESSION['Login'])) : ?>
            <li class="nav-item">
              <a class="nav-link" href="/BTTH_CSE485/BTTH2/admin/handle/handleLogout.php">Logout</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="/BTTH_CSE485/BTTH2/admin/login.php">Login</a>
            </li>
          <?php endif ?>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
  </nav>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>