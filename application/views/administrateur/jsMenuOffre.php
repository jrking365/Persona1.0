<script type="text/javascript">
    $('document').ready(function () {
        $('#btn_generalList').click(function () {
            $('#show_element').load('<?= base_url() ?>OffreEmplois/listegenerale_admin');
            event.preventDefault();
        });
        $('#typeList').click(function () {
            $('#show_element').load('<?= base_url() ?>OffreEmplois/listeByPosition_admin');
            event.preventDefault();
        });
        
       
       
   
    });
</script>   
<script>
    $(document).ready(function () {

        $('.footable').footable();
    });
</script>
