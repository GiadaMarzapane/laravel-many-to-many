@extends('layouts.admin')

@section('content')
<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="mb-4">
                Aggiungi nuovo viaggio
            </h2>
            {{-- SEZIONE ERRORI --}}
            <section>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </section>
            {{-- FORM CREAZIONE NUOVO VIAGGIO -
                METODO POST -
                ENCTYPE PER CARICAMENTO FILE -
                ACTION CON ROUTE A STORE
            --}}
            <form
            action="{{ route('admin.projects.store') }}"
            method="POST"
            enctype="multipart/form-data">
                @csrf
                {{-- INPUT PER TITLE --}}
                <div class="mb-4">
                    <label for="title" class="form-label">Ttitolo viaggio:
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    maxlength="100"
                    placeholder="Inserisci titolo..."
                    aria-describedby="titleHelp"
                    required>
                    <div id="titleHelp" class="form-text">
                        <span class="text-danger">*</span> Campo obbligatorio
                    </div>
                </div>
                {{-- INPUT PER DATE --}}
                <div class="mb-4">
                    <label for="date" class="form-label">Anno viaggio:
                        <span class="text-danger">*</span>
                    </label>
                    <input type="number"
                    class="form-control"
                    id="date"
                    name="date"
                    placeholder="Inserisci anno..."
                    aria-describedby="dateHelp"
                    min="1901"
                    max="2155"
                    required>
                    <div id="dateHelp" class="form-text">
                        <span class="text-danger">*</span> Campo obbligatorio
                    </div>
                </div>
                {{-- INPUT PER CONTENT --}}
                <div class="mb-4">
                    <label for="content" class="form-label">Descrizione viaggio:
                        <span class="text-danger">*</span>
                    </label>
                    <textarea name="content"
                    class="form-control"
                    id="content"
                    rows="3"
                    aria-describedby="contentHelp"
                    placeholder="Inserisci descrizione..."
                    required></textarea>
                    <div id="contentHelp" class="form-text">
                        <span class="text-danger">*</span> Campo obbligatorio
                    </div>
                </div>
                {{-- INPUT PER SELECT TYPE --}}
                <div class="mb-4">
                    <label for="type_id" class="form-label">Tipo viaggio:</label>
                    <select name="type_id"
                    class="form-select"
                    id="type_id">
                        <option value="">Nessun tipo</option>
                        @foreach ($types as $element)
                            <option value="{{ $element->id }}" {{ old('type_id') == $element->id ? 'selected' : '' }}>
                                {{ $element->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- INPUT PER PHOTO_LINK --}}
                <div class="mb-4">
                    <label for="photo_link" class="form-label">
                        Inserisci una foto tramite Link:
                    </label>
                    <input type="text"
                    class="form-control"
                    id="photo_link"
                    name="photo_link"
                    placeholder="Inserisci link...">
                </div>

                <p>OPPURE</p>
                
                <div class="mb-4">
                    <label for="localimg" class="form-label">
                        Carica una foto:
                    </label>
                        <input
                        class="form-control"
                        type="file"
                        id="localimg"
                        name="localimg"
                        accept="image/*">
                    {{-- <input type="text"
                    class="form-control"
                    id="photo_link"
                    name="photo_link"
                    placeholder="Inserisci link..."> --}}
                </div>

                {{-- INPUT PER TECHNOLOGIES --}}
                <div class="mb-4">
                    <label for="localimg" class="form-label d-block">
                        Scegli :
                    </label>
                    @foreach ($technologies as $element)
                        <div class="form-check form-check-inline">
                            <input
                            class="form-check-input"
                            type="checkbox"
                            id="{{ $element->id }}"
                            value="{{ $element->id }}"
                            name="technologies[]">
                            <label class="form-check-label" for="{{ $element->id }}">
                                {{ $element->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                {{-- --------------------FINE INPUT-------------------- --}}

                <button type="submit" class="btn btn-success">Crea viaggio</button>
            </form>
        </div>
    </div>
</div>
@endsection