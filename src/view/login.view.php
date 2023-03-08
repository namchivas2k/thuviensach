<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/public/js/jquery.min.js"></script>
    <title>Login</title>

</head>

<body class="container">


    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 card p-5">
                <h1 class="mb-5"> Login</h1>
                <!--  -->
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input name="username" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <!--  -->
            </div>
        </div>
    </div>

    <script src="/public/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/app.js"></script>
</body>

</html>