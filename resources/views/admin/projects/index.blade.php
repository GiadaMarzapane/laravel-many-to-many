@extends('layouts.admin')

@section('content')
<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col">
            <div>
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <h2 class="pb-4">I miei viaggi &#128747;</h2>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TITOLO</th>
                    <th scope="col">ANNO</th>
                    <th scope="col">TIPO VIAGGIO</th>
                    <th scope="col">AZIONI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $element)
                    <tr>
                        <th scope="row">{{ $element->id }}</th>
                        <td>{{ $element->title }}</td>
                        <td>{{ $element->date }}</td>
                        <td>{{ $element->type ? $element->type->name : 'Nessun tipo impostato' }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.projects.show', $element->id) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-warning" href="{{ route('admin.projects.edit', $element->id) }}">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form
                            class="d-inline-block"
                            action="{{ route('admin.projects.destroy', $element->id) }}"
                            method="post"
                            onsubmit="return confirm('Sei sicuro di voler eliminare {{ $element->title }}?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-dark" type="submit">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pt-4">
                <a class="btn btn-success"
                href="{{ route('admin.projects.create') }}">Aggiungi nuovo viaggio</a>
            </div>
        </div>
    </div>
</div>
@endsection