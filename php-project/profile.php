<?php include 'inc/header.php';?>
<?php 

    if(!isset($_SESSION['auth'])){
        header("location:login.php");
        die;
    }

?>


<?php include 'inc/navbar.php';?>

<body class="bg-secondary"style="--bs-bg-opacity: .2;">
    <div class="container">
        <div class="row"style="width: 100%;" style="height: 100%;">
            <div class="position-absolute top-50 start-0 translate-middle-y" >
                <h4 class=" my-2 bg-gray p-1  ">Name: <?php echo $_SESSION['auth'][0]; ?> </h4>
                <h4 class=" my-2 bg-gray p-1  ">Email: <?php echo $_SESSION['auth'][1]; ?></h4>
            </div>
        </div>
    </div>
</body>

<?php include 'inc/footer.php';?>