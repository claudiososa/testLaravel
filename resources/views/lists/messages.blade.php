@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <span><a class="btn btn-danger" href="{{route('export_pdf')}}">Descargar Pdf</a></span>
                    <span><a class="btn btn-success" href="{{route('export_excel')}}">Descargar Excel</a></span>
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>                        
                            <th>Asunto</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as $message)
                        <tr>
                            <td>
                                <td>{{$message->id}}</td>
                                <td>{{$message->fromName}}</td>
                                <td>{{$message->fromEmail}}</td>
                                <td>{{$message->subject->desc}}</td>
                            </td>
                        </tr>

                        @empty
                            <tr>                          
                                <td colspan="3">No hay datos para mostrar</td>                            
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection