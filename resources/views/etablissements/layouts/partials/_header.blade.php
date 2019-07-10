@php
if (!empty(auth()->user()->idagents_commune)) {
	$slug = $etablissement->slug;
}else{
$slug = App\Models\Etablissement::find(auth()->user()->idetablissement)->slug ;

}

@endphp
@auth('users_etablissement')
<div class="d-flex flex-column flex-md-row align-items-center p-0 px-md- mb-0 bg-white shadow-sm" style="border: none">
      <h5 class="my-0 mr-md-auto font-weight-normal">Notification électronique des naissances</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">aide</a>
        <a class="p-2 text-dark" href="#">mon profil</a>
        <a class="p-2 text-dark" href="{{ route('etablissement.logout',$slug) }}">déconnexion</a>
      </nav>
</div>
@endauth
@auth('agents_commune')
<div class="d-flex flex-column flex-md-row align-items-center p-0 px-md- mb-0 shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Maison Communale de Lingwala</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">aide</a>
        <a class="p-2 text-dark" href="#">mon profil</a>
        <a class="p-2 text-dark" href="{{ route('commune.logout') }}">déconnexion</a>
      </nav>
</div>
@endauth