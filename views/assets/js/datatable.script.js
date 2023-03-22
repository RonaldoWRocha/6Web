$(document).ready(function () {
   var table = $('#auditoria').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	dom: 'Blfrtip',
    buttons: [
      {
		extend: 'colvis',
		text: 'Colunas'
      },
{
		extend: 'excel',
		text: 'Excel'
      },
	{
       extend: 'pdf'
     }],
	columnDefs: [
			{
                targets: -1,
                visible: false
            },
            {
                targets: -2,
                visible: false
            },
            {
                targets: -3,
                visible: false
            }
        ],
	 "lengthChange": false,
	 "ordering": false,
	 responsive: true
    });
});
$(document).ready(function () {
   var table = $('#auditoria1').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	dom: 'Blfrtip',
    buttons: [
      {
		extend: 'excel',
		text: 'Excel'
      },
	{
       extend: 'pdf'
     }],
	 "lengthChange": false,
	 responsive: true,
	 "order": [[ 2, "desc" ]]
    });
});
$(document).ready(function () {
   var table = $('#auditoria2').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	dom: 'Blfrtip',
    buttons: [
      {
		extend: 'excel',
		text: 'Excel'
      },
	{
       extend: 'pdf'
     }],
	 "lengthChange": false,
	 responsive: true,
	 "order": [[ 2, "desc" ]]
    });
});
$(document).ready(function () {
   var table = $('#example').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	dom: 'Blfrtip',
    buttons: [
      {
		extend: 'excel',
		text: 'Excel'
      },
	{
       extend: 'pdf'
     }],
	 "lengthChange": false,
	 "ordering": false,
	 responsive: true
    });
});
$(document).ready(function () {
   var table = $('#nfe').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	"order": [[3, "desc"]],
	 "lengthChange": false,
	 responsive: true
    });
});
$(document).ready(function () {
   var table = $('#escalas').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	 "lengthChange": true,
	 "ordering": false,
	 responsive: true,
	 stateSave: true
    });
});
$(document).ready(function () {
   var table = $('#escalaver').DataTable( {
"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	dom: 'Blfrtip',
    buttons: [
     {
		extend: 'colvis',
		text: 'Colunas'
      },
      {
		extend: 'excel',
		text: 'Excel'
      },
	{
       extend: 'pdf'
     }],
	 "lengthChange": false,
	 "paging": false,
	 responsive: true,
	 stateSave: true
    });
});
$(document).ready(function () {
   var table = $('#escalaverr').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	dom: 'Blfrtip',
    buttons: [
      {
		extend: 'excel',
		text: 'Excel1'
      },
	{
       extend: 'pdf'
     }],
	 "searching": true,
	 "ordering": true,
	 "paging": false,
	 responsive: true
    });
});
$(document).ready(function () {
            var table = $('#financeiro').DataTable({
                "language": {
                    "sEmptyTable": "Nenhum apontamento encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ apontamentos",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 apontamentos",
                    "sInfoFiltered": "(Filtrados de _MAX_ apontamentos)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ apontamentos por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum apontamento encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                },

                "footerCallback": function (row, data, start, end, display) {
                                var api = this.api(), data;

                                // Remove the formatting to get integer data for summation
                                var intVal = function (i) {
                                    return typeof i === 'string' ?
                                            i.replace(/[\$,]/g, '') * 1 :
                                            typeof i === 'number' ?
                                            i : 0;
                                };

                                // Total over all pages
                                total = api
                                        .column(5)
                                        .data()
                                        .reduce(function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0);

                                // Total over this page
                                pageTotal = api
                                        .column(5, {page: 'current'})
                                        .data()
                                        .reduce(function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0);

                                // Update footer
                                $(api.column(5).footer()).html(
                                        'R$ ' + total.toFixed(2) + ' '
                                        );
                            },
				  "info": false,
                lengthChange: false,
				responsive: true,
				"order": [[ 1, "asc" ]]
            });
        });

$(document).ready(function () {
            var table = $('#financeiro2').DataTable({
                "language": {
                    "sEmptyTable": "Nenhum apontamento encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ apontamentos",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 apontamentos",
                    "sInfoFiltered": "(Filtrados de _MAX_ apontamentos)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ apontamentos por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum apontamento encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                },

                "footerCallback": function (row, data, start, end, display) {
                                var api = this.api(), data;

                                // Remove the formatting to get integer data for summation
                                var intVal = function (i) {
                                    return typeof i === 'string' ?
                                            i.replace(/[\$,]/g, '') * 1 :
                                            typeof i === 'number' ?
                                            i : 0;
                                };

                                // Total over all pages
                                total = api
                                        .column(7)
                                        .data()
                                        .reduce(function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0);

                                // Total over this page
                                pageTotal = api
                                        .column(7, {page: 'current'})
                                        .data()
                                        .reduce(function (a, b) {
                                            return intVal(a) + intVal(b);
                                        }, 0);

                                // Update footer
                                $(api.column(7).footer()).html(
                                        'R$ ' + total.toFixed(2) + ' '
                                        );
                            },
				  "info": false,
                lengthChange: false,
				responsive: true,
				"order": [[ 1, "asc" ]]
            });
        });
$(document).ready(function () {
   var table = $('#example1').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	dom: 'Blfrtip',
    buttons: [
      {
		extend: 'excel',
		text: 'Excel'
      },
	{
       extend: 'pdf'
     }],
	 "lengthChange": false,
	 "ordering": false,
	 responsive: true
    });
});
$(document).ready(function () {
   var table = $('#example2').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	dom: 'Blfrtip',
    buttons: [
      {
		extend: 'excel',
		text: 'Excel'
      },
	{
       extend: 'pdf'
     }],
	 "lengthChange": false,
	 "ordering": false,
	 responsive: true
    });
});
$(document).ready(function () {
   var table = $('#errosSi1').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	dom: 'Blfrtip',
    buttons: [
     {
		extend: 'colvis',
		text: 'Colunas'
      },
      {
		extend: 'excel',
		text: 'Excel'
      },
	{
       extend: 'pdf'
     }],
     "columnDefs": [
            {
                "targets": [ 7 ],
                "visible": false
            },
            {
                "targets": [ 8 ],
                "visible": false
            }
        ],
	 "lengthChange": false,
	 "ordering": false,
	 responsive: true
    });
});
$(document).ready(function () {
   var table = $('#errosSi2').DataTable( {
	"language": {
		"sEmptyTable": "Nenhum registro encontrado",
		"sInfo": "Total de _TOTAL_ registros",
		"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
		"sInfoFiltered": "",
		"sInfoPostFix": "",
		"sInfoThousands": ".",
		"sLengthMenu": "_MENU_ registros",
		"sLoadingRecords": "Carregando...",
		"sProcessing": "Processando...",
		"sZeroRecords": "Nenhum registro encontrado",
		"sSearch": "Pesquisar",
		"oPaginate": {
			"sNext": "Próximo",
			"sPrevious": "Anterior",
			"sFirst": "Primeiro",
			"sLast": "Último"
		},
		"oAria": {
			"sSortAscending": ": Ordenar colunas de forma ascendente",
			"sSortDescending": ": Ordenar colunas de forma descendente"
		}
	},
	dom: 'Blfrtip',
    buttons: [
     {
		extend: 'colvis',
		text: 'Colunas'
      },
      {
		extend: 'excel',
		text: 'Excel'
      },
	{
       extend: 'pdf'
     }],
      "columnDefs": [
            {
                "targets": [ 6 ],
                "visible": false
            },
            {
                "targets": [ 7 ],
                "visible": false
            }
        ],
	 "lengthChange": false,
	 "ordering": false,
	 responsive: true
    });
});