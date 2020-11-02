<?php  

	require_once'header.php';

?>

<div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="proses_register.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" >
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="register">DAFTAR SEKARANG</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Sudah mempunyai akun ?
                                    <a href="login.php">Login disini</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php require_once'footer.html'; ?>