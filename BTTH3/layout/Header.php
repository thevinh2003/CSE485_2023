<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - TLU</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: #fafafa;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            position: sticky;
            top: 0;
            padding: 15px 10px;
            background: #88B77B;
            border: none;
            border-radius: 0;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.3);
            z-index: 100;
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
        }

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            margin-left: -250px;
            min-width: 250px;
            max-width: 250px;
            background: #88B77B;
            color: #fff;
            transition: all 0.3s;
            border-right: 1px solid #fff;
        }

        #sidebar.active {
            margin-left: 0;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #88B77B;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #88B77B;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6d7fcc;
        }

        ul.CTAs {
            padding: 20px;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.download {
            background: #fff;
            color: #7386D5;
        }

        a.article,
        a.article:hover {
            background: #6d7fcc !important;
            color: #fff !important;
        }

        #content {
            width: 100%;
            min-height: 100vh;
            transition: all 0.3s;
        }

        .login {
            list-style: none;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }

            #sidebar.active {
                margin-left: 0;
            }

            #sidebarCollapse span {
                display: none;
            }
        }

        .card {
            overflow: hidden;
            transition: all .3;
        }

        .card .card-body a:hover {
            color: #616A6B;
        }
        .card img:hover {
            scale: 1.03;
        }
    </style>
</head>

<body>
    <main>
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>LMS</h3>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="/BTTH_CSE485/BTTH3/views/article/index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">Source</a>
                    </li>
                </ul>
            </nav>
            <!-- Page Content  -->
            <div id="content">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="btn pe-5">
                            <i class="bi bi-list text-white"></i>
                        </button>

                        <div class="collapse navbar-collapse text-white d-flex justify-content-around" id="navbarSupportedContent">
                            <span class="d-flex ">
                                <i class="bi bi-telephone-fill me-2"></i>
                                Call us : 0243.5635915
                                <i class="bi bi-envelope ms-3 me-2"></i>
                                <a href="mailto:ttth@tlu.edu.vn">ttth@tlu.edu.vn</a>
                            </span>
                            <?php if (isset($_SESSION['isLogined']) && $_SESSION['isLogined']) : ?>
                                <li class="login">
                                    <a href="../LMS/views/login/processLogout.php">Logout</a>
                                </li>
                            <?php else : ?>
                                <li class="login">
                                    You are not logged in. (<a href="/BTTH_CSE485/BTTH3/views/login.php">Login</a>)
                                </li>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>