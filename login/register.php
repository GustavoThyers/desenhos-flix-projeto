<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylep.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">


    <title>Login</title>
</head>
<body>
    <div class="conteiner">
        <nav>
            <div class="navbar">
                <p class="titlte-navbar">TH FILMES</p>
                <a class="sign-up-navbar" href="">Sign Up</a>
            </div>
        </nav>
        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
            <form>
      

      

      <!-- Name input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerName" class="form-control" />
        <label class="form-label" for="registerName">Name</label>
      </div>

      <!-- Username input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerUsername" class="form-control" />
        <label class="form-label" for="registerUsername">Username</label>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="registerEmail" class="form-control" />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerPassword" class="form-control" />
        <label class="form-label" for="registerPassword">Password</label>
      </div>

      <!-- Repeat Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerRepeatPassword" class="form-control" />
        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
      </div>

      <!-- Checkbox -->
      <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
          aria-describedby="registerCheckHelpText" />
        <label class="form-check-label" for="registerCheck">
          I have read and agree to the terms
        </label>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
    </form>
</div>
        <section>
            <div class="conteiner-section">
                <div class="itens-conteiner">
                    <div class="itens">
                        <p class="title">Login In TH FILMES</p>
                        <form action="register_action.php" method="POST">
                            <input class="input" type="text" placeholder="Your Name" name="name" id="name"> <br>
                            <input class="input" type="text" placeholder="Your Email" name="email" id="email"> <br>
                            <input class="input" type="text" placeholder="password" name="password" id="password"> <br>
                            <input class="input" type="text" placeholder="password" name="verify_password" id="verify_password"> <br>
                            <div class="button-input">
                                <button class="button" type="submit">Enviar</button>
                            </div>
                        </form>
                           
                        <div class="line1"></div>
                        <p class="or">or</p>    
                        <div class="line2"></div>

                        <a class="create" href="">Create new Account</a>

                        <a class="forgot" href="">Forgot Accont</a>

                        <a class="forgot" href="">Not Now</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>