@extends('layouts.home')

@section('content')
<a href="/posts/create">Voir</a>
        <div class="card-deck">
        
        
            <div class="d-flex justify-content-around mx-auto" style="width:70%;margin-top:50px;margin-bottom:350px">
            @foreach ($posts as $post)
            <div class="card">
                <img src="https://media.lesechos.com/api/v1/images/view/5e85bdc5d286c271f555c2d5/1280x720/0603030558747-web-tete.jpg" class="card-img-top" alt="Accroche HTML">
                <div class="card-body">
                    <h3 class="card-title">{{ $post->nom }}</h5>
                    <p class="card-text">{{ $post->adresse }}</p>
                    <p class="card-text">{{ $post->ville }}</p>
                    <p class="card-text">{{ $post->code_postal }}</p>
                    <p class="card-text">{{ $post->pays }}</p>
                    <button type="button" class="btn btn-success" onclick="location.href='http://localhost:8000/fiche/{{ $post->id }}';">Voir</button>
                </div>
                <div class="card-footer">{{ $post->author }}</div>     
            </div>
            @endforeach
            
            </div>
            
            </div>
        </div>
                
    </body>
</html>
@endsection