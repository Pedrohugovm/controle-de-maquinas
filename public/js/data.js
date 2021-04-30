$('#tabela').DataTable({
    "pagingType": "full_numbers",
    "order": [[ 0, "desc" ]],
    "dom": 'ftp',
    pageLength: 10,
    language: {
        "processing": "Processando...",
        "lengthMenu": "Exibindo _MENU_ maquinas",
        "zeroRecords": "Dados não encontrados",
        "info": "Mostrando _START_ até _END_, de _TOTAL_ itens",
        "infoEmpty": "0 de 0 registros encontrados",
        "infoFiltered": "(filtrado de _MAX_ registros no total)",
        "search": "<b>Procurar:</b>",
        "paginate": {
            "first": "Primeiro",
            "previous": "Anterior",
            "next": "Seguinte",
            "last": "Último"
        }
    } 
});

