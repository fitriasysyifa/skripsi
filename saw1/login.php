<?php  

	require_once'header.php';

	$alert = "<div class='alert alert-danger center' role='alert'>Maaf username atau password anda salah! </div>";
	if (!isset($_SESSION['username'])) {
		$alert= "";
	}
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
                        <?php echo $alert; ?>
                        <div class="login-form">
                            <form action="proses_login.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" >
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="login">Login</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Belum mempunyai Akun?
                                    <a href="register.php">Daftar disini</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php require_once'footer.html'; ?>