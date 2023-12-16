<?php require '../layout/Header.php'; ?>
<div class="container mt-5 w-50">
    <h3 class="text-center">Login</h3>
    <form method='POST' action="">
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email address</label>
            <input name="email" type="email" id="form2Example1" class="form-control" />
        </div>
    
        <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
            <input name="password" type="password" id="form2Example2" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Login</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>