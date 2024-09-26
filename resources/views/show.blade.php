
@extends('canevas')
@section('title', 'App')
@section('content')
    <h1>Détails de l'Étudiant</h1>
    
    <p>Matricule: {{ $student->matricule }}</p>
    <p>Nom: {{ $student->nom }}</p>
    <p>Prénom: {{ $student->prenom }}</p>
    <p>Cours 1: {{ $student->cours1 }}</p>
    <p>Cours 2: {{ $student->cours2 }}</p>
    <p>Cours 3: {{ $student->cours3 }}</p>
    <p>Cours 4: {{ $student->cours4 }}</p>

@endsection

