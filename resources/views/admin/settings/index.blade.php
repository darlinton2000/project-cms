@extends('adminlte::page')

@section('title', 'Configurações do Site')

@section('content_header')
    <h1>Configurações do Site</h1>
@endsection

@section('content')

    <!-- Mensagens da validacao -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h5><i class="icon fas fa-ban"></i>Ocorreu um errro.</h5>
                
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- Mensagens de informacoes -->
    @if (session('warning'))
        <div class="alert alert-success">
            {{session('warning') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.save') }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{$settings['title']}}" class="form-control"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sub-titulo</label>
                    <div class="col-sm-10">
                        <input type="text" name="subtitle" value="{{$settings['subtitle']}}" class="form-control"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail para contato</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="{{$settings['email']}}" class="form-control"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                        <input type="url" name="facebook" value="{{$settings['facebook']}}" class="form-control"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Instagram</label>
                    <div class="col-sm-10">
                        <input type="url" name="instagram" value="{{$settings['instagram']}}" class="form-control"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-10">
                        <input type="url" name="twitter" value="{{$settings['twitter']}}" class="form-control"/>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" value="Salvar" class="btn btn-success">Salvar</button>
                </div>

            </form>
        </div>
    </div>

@endsection
