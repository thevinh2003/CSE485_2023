<?php
require '../config/Database.php';
include '../components/Header.php';

if(isset($_SESSION['Login'])) {
    header('Location: dashboard.php');
}
?>
<link rel="stylesheet" href="css/style.css">
<div class="formLogin my-5">
    <h3 class="text-center">LOGIN</h3>
    <?php 
        if(isset($_GET['error'])) {
            echo "<div class='alert alert-danger'>".$_GET['error']."</div>";
        }
    ?>
    <form method='POST' action="handle/handleLogin.php">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email address</label>
            <input name="email" type="email" id="form2Example1" class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input name="password" type="password" id="form2Example2" class="form-control" />
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Sign in</button>
    </form>
</div>
<?php
include '../components/Footer.php';
?>