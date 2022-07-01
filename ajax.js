
<script type="text/javasript">

    $(document).ready(function () {
        $('#databtn').click(function (e) {
            e.preventDefault();
            $.ajax({
                method: "post",
                url: "display.php",
                data: $('#displaydata').serialize(),
                dataType: "html",
                success: function (response) {
                    $('#messagedisplay').text(response);
                }
            })
        })
    });

</script>