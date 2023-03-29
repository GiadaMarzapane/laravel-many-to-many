@extends('layouts.admin')

@section('content')
<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col">
            <h2 class="mb-4">
                Modifica viaggio
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
            {{-- FORM MODIFICA VIAGGIO - METODO POST + PUT E ACTION CON ROUTE A UPDATE --}}
            <form
            action="{{ route('admin.projects.update', $project->id) }}"
            method="POST"
            enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                    value="{{ old('title', $project->title) }}"
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
                    value="{{ old('date', $project->date) }}"
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
                    required>{{ old('content', $project->content) }}</textarea>
                    <div id="contentHelp" class="form-text">
                        <span class="text-danger">*</span> Campo obbligatorio
                    </div>
                </div>
                {{-- INPUT PER SELECT --}}
                <div class="mb-4">
                    <label for="type_id" class="form-label">Tipo viaggio:</label>
                    <select name="type_id"
                    class="form-select"
                    id="type_id">
                        <option value="">Nessun tipo</option>
                        @foreach ($types as $element)
                            <option value="{{ $element->id }}" {{ old('type_id', $project->type_id) == $element->id ? 'selected' : '' }}>
                                {{ $element->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- INPUT PER PHOTO_LINK --}}
                @if (isset($project->photo_link))
                <div class="py-4">
                    <img src="{{ $project->photo_link }}" alt="{{ $project->title }}">
                </div>
                @endif

                <div class="mb-4">
                    <label for="photo_link" class="form-label">
                        Link foto:
                    </label>
                    <input type="text"
                    class="form-control"
                    id="photo_link"
                    name="photo_link"
                    value="{{ old('photo_link', $project->photo_link) }}"
                    placeholder="Inserisci link...">
                </div>

                <p>OPPURE</p>

                {{-- IF per img caricata --}}
                @if (isset($project->localimg))
                <div class="py-4">
                    <img src="{{ asset('storage/' . $project->localimg) }}" alt="{{ $project->title }}">
                </div>
                @endif

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
                </div>

                {{-- --------------------FINE INPUT-------------------- --}}

                <button type="submit" class="btn btn-success">Modifica viaggio</button>
                {{-- aggiunto link per tornare alla index --}}
                <a href="{{ route('admin.projects.index') }}" class="btn btn-light">Annulla</button>
            </form>
        </div>
    </div>
</div>
@endsection