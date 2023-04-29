<?php
getFlashMessage();
destroyFlashValidation(); ?>

<footer class="w-100 bg-light" id="adminFooter">
    <div class="container-fluid p-3 text-center d-md-flex justify-content-md-end">
        <p class="m-0">eleven &copy;<?php echo date('Y'); ?> created by <a href="https://billiyagi.space"> Febry Billiyagi</a></p>
    </div>
</footer>

<!-- Primary JS -->
<script src="<?php echo assets('js/eleven.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</body>

</html>