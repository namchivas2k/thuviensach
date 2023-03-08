<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/public/js/jquery.min.js"></script>

</head>

<body class="vh-100">

    <div class="wrapper d-flex h-100">
        <?php View::__partial('sidebar') ?>


        <div class="body w-100 p-3" style="max-height: 100vh; overflow: auto;">
            <?php View::__body() ?>
        </div>


    </div>




    <script src="/public/js/bootstrap.bundle.min.js"></script>
    <script src="/public/js/app.js"></script>
</body>

</html>