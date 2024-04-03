<script src="./js/jquery.js"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/sweetalert.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    AOS.init({
        duration: 3000,
        once: true,
    });
</script>

<!-- Numbers Only -->
<script>
   var contactInput = document.querySelector('input[name="contact"]');
    contactInput.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '');

        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11);
        }
    });
</script>

<!-- Validation Messages -->
<?php 
    if (isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
?>
<script>
    $(document).ready(function(){
        Swal.fire({
            icon: '<?php echo $_SESSION['status_icon'] ?>',
            title: '<?php echo $_SESSION['status'] ?>',
            confirmButtonColor: 'rgb(0, 0, 0)',
            confirmButtonText: 'Okay'
        });
        <?php  unset($_SESSION['status']); ?>
    })
</script>

<?php
}else{
    unset($_SESSION['status']);
}
?>