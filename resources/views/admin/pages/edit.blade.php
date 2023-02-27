@extends('adminlte::page')

@section('title', 'Editar Página')

@section('content_header')
    <h1>Editar Página</h1>
@endsection

@section('content')

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

    <form action="{{ route('pages.update', ['page' => $page->id]) }}" method="POST" class="form-horizontal">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Título</label>
                <div class="col-sm-10">
                    <input type="text" name="title" value="{{ $page->title }}" class="form-control @error('title') is-invalid @enderror">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Corpo</label>
                <div class="col-sm-10">
                    <textarea name="body" class="form-control">{{ $page->body }}</textarea>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" value="Salvar" class="btn btn-success">Salvar</button>
        </div>

    </form>

@endsection
