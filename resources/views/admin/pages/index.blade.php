@extends('adminlte::page')

@section('title', 'Listar Páginas')

@section('content_header')
    <h1>
        Listar Páginas
        <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success">Nova Página</a>
    </h1>
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="50">ID</th>
                        <th>Título</th>
                        <th width="200">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ $page->title }}</td>
                            <td>
                                <a href="{{ url($page->slug) }}" target="_blank" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('pages.edit', ['page' => $page->id]) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form class="d-inline" method="POST" action="{{ route('pages.destroy', ['page' => $page->id]) }}" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $pages->links('pagination::bootstrap-4') }}

@endsection
