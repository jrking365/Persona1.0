<script type="text/javascript">
    $('document').ready(function () {
        $('#btn_generalList').click(function () {
            $('#show_element').load('<?= base_url() ?>OffreEmplois/listegenerale_internaute');
            event.preventDefault();
        });
        $('#typeList').click(function () {
            $('#show_element').load('<?= base_url() ?>OffreEmplois/listeByPosition_internaute');
            event.preventDefault();
        });
        
       
    });
</script>    
