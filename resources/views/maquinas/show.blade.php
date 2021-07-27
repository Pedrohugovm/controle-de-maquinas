@extends('layouts.app')

@section('content')

    @if (Auth::check())
        <div class="container-fluid">
            <h1>Descrição do Equipamento</h1>
            <div class="card">

                <div class="card-body  row">
                    <div class='col'>
                        <h5 class="card-title"><strong>Patrimonio: </strong>{{ $maquina->patrimonio }}</h5>
                        <h5><strong>Lotação: </strong>{{ $maquina->lotacao }}</p>
                            <h5><strong>Sistema: </strong>{{ $maquina->sistema }}</p>
                                <div class="row">
                                    <div class="col-md-2"> <a href="{{ route('maquinas.edit', $maquina->id) }}"
                                            class="btn btn-primary">Editar</a></div>
                                    <div id='relatorio' class="col-md-2"><a href="#" class="btn btn-primary">Relatorio</a>
                                    </div>
                                    @can('isAdmin')
                                        <form action="{{ route('maquinas.destroy', $maquina->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar? Todos os atendimentos e dados da máquina serão apagados definitivamente.')" type="submit">Deletar</button>
                                        </form>
                                    @endcan
                                </div>
                    </div>
                    <div class="col">
                        <h5><strong>Descrição:</strong> {{ $maquina->descricao }}</p>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="container-fluid">
            <h1>Atendimentos <a href="{{ route('atendimentos.create', ['id' => $maquina->id]) }}"><i
                        class="fas fa-plus-square"></i></a></h1>
            <table id="atendimentos" class="table table-striped" style="width:100%">
                <thead>
                    <div class="col-sm-12">
                        <table id='tabela' class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <td hidden>ID</td>
                                    <td>Descrição do problema</td>
                                    <td>Fechamento do atendimento</td>
                                    <td>Data de abertura</td>
                                    <td>Data de fechamento</td>
                                    <td>Status</td>
                                    <td>Editar</td>
                                    @can('isAdmin')
                                    <td>Deletar</td>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atendimentos as $atendimento)
                                    <tr>

                                        <td hidden>{{ $atendimento->id }}</td>
                                        <td>{{ $atendimento->descricao_problema }}</td>
                                        <td>{{ $atendimento->descricao_fechamento }}</td>
                                        <td>{{ $atendimento->data_abertura->format('d/m/Y') }}</td>
                                        <td>{{ $atendimento->data_fechamento != null ? $atendimento->data_fechamento->format('d/m/Y') : '' }}
                                        </td>
                                        <td>{{ $atendimento->status }}</td>
                                        <td>
                                            <a href="{{ route('atendimentos.edit', $atendimento->id) }}"
                                                class="btn btn-primary">Editar</a>
                                        </td>
                                        @can('isAdmin')
                                        <td>
                                            <form action="{{ route('atendimentos.destroy', $atendimento->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja deletar?')" type="submit">Deletar</button>
                                            </form>
                                        </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
            </table>
        </div>




    @endif
@endsection

@section('js')
    <script>
        $('#relatorio').click(function() {
            var dd = {
                info: {
                    title: 'Relatório de máquina',
                },
                background: {
                    image: 'example',
                    opacity: 0.1,
                    margin: [0, 150, 0, 300],
                    width: 600,

                },

                footer: {
                    columns: [{
                            text: '_________________________________\n Assinatura do Solicitante',
                            alignment: 'center',

                        },
                        {
                            text: '_________________________________\n Assinatura do Gerente',

                            alignment: 'center',

                        }
                    ],

                },

                content: [

                    {
                        columns: [{
                            image: 'logo',
                            width: 100,
                            margin: [0, 0, 20, 0]
                        }, {

                            text: [{
                                    text: 'Patrimônio: ',
                                    bold: true
                                }, '{{ $maquina->patrimonio }}\n',
                                {
                                    text: 'Detalhes: ',
                                    bold: true
                                }, ' {{ $maquina->descricao }}\n',
                                {
                                    text: 'Lotação: ',
                                    bold: true
                                }, ' {{ $maquina->lotacao }}\n',
                                {
                                    text: 'Sistema Operacional: ',
                                    bold: true
                                }, '{{ $maquina->sistema }}',
                            ],
                            margin: [0, 20]
                        }]
                    },




                    {
                        text: 'ATENDIMENTOS',
                        alignment: 'center',
                        bold: true,
                        margin: [0, 0, 0, 10]
                    },
                    {
                        table: {
                            headerRows: 1,
                            widths: ['30%', '30%', '15%', '15%', '10%'],
                            body: [

                                [{
                                        text: 'Problema',
                                        fillColor: '#000',
                                        color:'#fff',
                                        bold: true,
                                    }, {
                                        text: 'Solução',
                                        fillColor: '#000',
                                        color:'#fff',
                                        bold: true
                                    },
                                    {
                                        text: 'Abertura',
                                        fillColor: '#000',
                                        color:'#fff',
                                        bold: true
                                    }, {
                                        text: 'Fechamento',
                                        fillColor: '#000',
                                        color:'#fff',
                                        bold: true
                                    }, {
                                        text: 'Status',
                                        fillColor: '#000',
                                        color:'#fff',
                                        bold: true
                                    }
                                ],

                                @foreach ($atendimentos as $atendimento)
                                
                                    ['{{ $atendimento->descricao_problema }}', '{{ $atendimento->descricao_fechamento }}',
                                    '{{ $atendimento->data_abertura->format('d/m/Y') }}',
                                    '{{ $atendimento->data_fechamento != null ? $atendimento->data_fechamento->format('d/m/Y') : '' }}',
                                    '{{ $atendimento->status }}'],
                                @endforeach

                            ]
                        },
                        layout: {
                            fillColor: function(rowIndex, node, columnIndex) {
                                return (rowIndex % 2 === 0) ? '#CCCCCC' : null;
                            }
                        }


                    },

                ],


                images: {
                    example: 'data:image/png;base64,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',
                    logo: '{{ asset('img/logo_pendente.png') }}'
                }

            }
            pdfMake.createPdf(dd).open();

        })

    </script>
@endsection
