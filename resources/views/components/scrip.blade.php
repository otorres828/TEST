
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
            "lengthMenu": "Mostrar "+
                        `<select>
                        <option value ='10'>10</option>
                        <option value ='25'>25</option>
                        <option value ='50'>50</option>
                        <option value ='100'>100</option>
                        <option value ='-1'>ALL</option>
                        </select>`+
                        " registro por pagina",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate":{
                'next':'siguiente',
                'previous':'anterior'
            }
            }
        });           
    });
    
</script>  