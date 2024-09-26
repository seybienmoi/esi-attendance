
@extends('canevas')
@section('title', 'App')
@section('content')

    <h1>Liste des étudiants</h1>

    <ul>
        @foreach ($students as $student)
            <li>{{ $student->matricule }} {{ $student->nom }} {{ $student->prenom }}
                - Cours : {{ $student->cours1 }}, {{ $student->cours2 }}, {{ $student->cours3 }}, {{ $student->cours4 }}
            </li>
        @endforeach
    </ul>

@endsection
