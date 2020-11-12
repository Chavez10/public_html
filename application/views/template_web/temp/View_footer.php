	<script type="text/javascript" src="<?php echo base_url() ?>assets_front/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets_front/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets_front/js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets_front/js/mdb.min.js"></script>
    <script>
        $(document).ready(function() {
        $(".button-collapse").sideNav2();
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        var ps = new PerfectScrollbar(sideNavScrollbar);
        });
    </script>
</body>
</html>