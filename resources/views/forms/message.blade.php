@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12">
                    <h1>Envio de datos</h1>
                    <form action="" method="post"  onsubmit="event.preventDefault()">
                        @csrf
                        <input type="hidden" name="dateEmail" id="dateEmail" value="{{date('Y-m-d')}}">

                        <div class="form-group">
                            <label for="fromName">Nombre</label>
                            <input type="text" name="fromName" id="fromName" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="fromEmail">Email</label>
                            <input type="text" name="fromEmail" id="fromEmail" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <select name="subject_id" id="subject_id" class="form-control">
                                @forelse ($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->desc}}</option>    
                                @empty     
                                    <option>No hay opciones para mostrar</option>                               
                                @endforelse                                
                            </select>                            
                        </div>

                        <div class="form-group">
                            <label for="body">Mensaje</label>
                            <textarea class="form-control" name="body" id="body" cols="30" rows="10">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" onClick="save_data()">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
