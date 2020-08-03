<!-- jQuery -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- script untuk mengubah choose file mnjadi apa yang di select -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<script>
    $('.custom-file-input-k').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label-k').addClass("selected").html(fileName);
    });
</script>
<script>
    $("#message").fadeTo(2000, 500).slideUp(500, function() {
        $("#message").slideUp(500);
    });
</script>