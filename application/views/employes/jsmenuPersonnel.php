<script type="text/javascript">
    $('document').ready(function () {
        $('#btn_generalList').click(function () {
            $('#show_element').load('<?= base_url() ?>Employes/listegenerale');
            event.preventDefault();
        });
        $('#typeList').click(function () {
            $('#show_element').load('<?= base_url() ?>Employes/listeByDepartement');
            event.preventDefault();
        });
        
       
       
   
    });
</script>

