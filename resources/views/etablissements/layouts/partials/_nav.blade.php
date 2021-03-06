

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      @auth('users_etablissement')
        {{-- MENU POUR LES ETABLISSEMENT --}}
        @inject('etablissement', 'App\Models\Etablissement')
        @php
        $slug = $etablissement::find(auth()->user()->idetablissement)->slug;
        @endphp
        
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('etablissement.index',$slug) }}">Accueil 

            {{-- <span class="sr-only"></span> --}}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('etablissement.create_declaration',$slug) }}">Créer</a>
        </li>
      {{--   <li class="nav-item">
          <a class="nav-link" href="#">Recherche</a>
        </li> --}}
         {{-- Si Admin commune --}}

        @if(auth()->user()->profil == 'admin')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('etablissement.get_users',$slug) }}">Utilisateurs</a>
        </li>
        @endif
      @endauth

      {{-- MENU POUR LA COMMUNE --}}
      @auth('agents_commune')
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('commune.accueil') }}">Accueil 

            {{-- <span class="sr-only"></span> --}}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ ''}}">Créer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Recherche</a>
        </li>
        {{-- Si Admin commune --}}

        @if(auth()->user()->profil == 'admin')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('commune.get_etablissements') }}">Etablissements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('commune.get_users') }}">Utilisateurs</a>
        </li>
        @endif
      @endauth
      </ul>
      
  </div>
</nav>