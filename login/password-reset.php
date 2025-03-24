
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class = "py-5">
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-md-6">
                <?php
                    if (isset($_SESSION['status'])) {
                        ?>  
                        <div class="aler-alert-success">
                            <h5><?= $_SESSION['status']; ?></h5>
                        </div>
                        <?php 
                        unset($_SESSION['status']);
                    }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Reset Password</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="" method="POST">

                            <div class="form-group mb-3">
                                <label>Email Address</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" name="password_reset_link" class="btn btn-primary">Send Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
             </div>
        </div>
    </div>
    