@extends('layouts.app')
@section('content')
{{--@include('slider.slider')--}}
@include('search.searchBar')
<div class="clearfix"></div>

{{-- COMPTES ABONNÉS --}}
@if(Auth::check() && auth()->user()->status == 1)
<div class="col-md-10 col-md-offset-1">
    <div class="col-sm-12">
        <div class="col-sm-6 ">
            <div class="card-list">
                <h3>Organiser vos courses en quelque clics !</h3>
                <p>
                    Easyeat mets à votre disposition une fonctionalité personnalisé permettant d'organiser
                    vos repas en prenant en comptes vos envies et vos objectifs en quelques cliques !
                </p>
                <ul class="list-inline">
                    <a href="" class="btn btn-primary">
                        Comment ça marche ?
                    </a>
                    <a href="" class="btn btn-primary">
                        Mes listes
                    </a>
                </ul>
            </div>
        </div>
        <div class="col-sm-6">

        </div>
    </div>
<div class="col-sm-12">
    <div class="clearfix"></div>
    <h2 class="text-center home">Dèrnieres recettes ajoutés</h2>
    <hr class="home">
    @foreach($latests as $last)
        <div class="col-md-4">
            <a href="recettes/{{$last->id}}">
                <div class="card-list">
                    <h3 class="left" style="color: black">{{$last->title}}</h3>
                </div>
                <img src="https://img.youtube.com/vi/{{ $last->picture }}/hqdefault.jpg" class="img-responsive"  alt="{{$last->title}}">
            </a>
        </div>
    @endforeach
    <div class="clearfix"></div>
    <a class="text-center center-block btn btn-primary" href="">En voir plus   <i class="fa fa-plus"></i></a>
</div>

</div>

    {{-- UTILISATEURS INSCRITS  --}}
    @elseif(Auth::check() && auth()->user()->status == 0)
    <div class="col-md-10 col-md-offset-1 avantages-abonnes">
        <div class="clearfix"></div>
        <h2 class="text-center">Avantages abonnés</h2>
        <a class="btn btn-success center-block" href=""><span class="btn-display">Commencez votre</span>  essaie <strong>gratuit</strong> <span class="btn-display">dès maintenant</span> - 15 jours</a>
        <div class="clearfix"></div>
        <h2 class="text-center">Recettes & régimes pour atteindre vos objectifs.</h2>
        <div class="col-md-12">
            <figure class="col-sm-6">
                <hr>
                <h2>Régime <span>Minceur</span></h2>
                <img src="{!! asset('img/home/basse calories.jpeg')!!}" class="img-responsive" alt="img17"/>
                <figcaption>
                    <p></p>
                    <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                </figcaption>
            </figure>
            <figure class="col-sm-6">
                <hr>
                <h2>Régimes <span>Sportif</span></h2>
                <img src="{!! asset('img/home/recettes pas cher.jpeg')!!}" class="img-responsive" alt="img17"/>
                <figcaption>
                    <p>Romeo never knows what he wants. He seemed to be very cross about something.</p>
                    <a href="{{ e(url('speciale class="btn btn-primary"/all')) }}">Voir plus <i class="fa fa-plus"></i> </a>
                </figcaption>
            </figure>
        </div>
        <div class="clearfix"></div>
        <h2 class="text-center">Des filtres personnalisés pour organiser vos recettes</h2>
        <div class="col-md-12">
            <figure class="col-sm-4">
                                <hr>
                <h2>Recette <span>Facile & Rapide</span></h2>
                <img src="{!! asset('img/home/recettes pas cher.jpeg')!!}" class="img-responsive" alt="img17"/>
                <figcaption>
                    <p></p>
                    <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                </figcaption>
            </figure>
            <figure class="col-sm-4">
                                <hr>
                <h2>Régimes <span>Personnalisés</span></h2>
                <img src="{!! asset('img/home/recette sans glutene.jpeg')!!}" class="img-responsive"  alt="img17"/>
                <figcaption>
                    <p>Romeo never knows what he wants. He seemed to be very cross about something.</p>
                    <a href="{{ e(url('speciale class="btn btn-primary"/all')) }}">Voir plus <i class="fa fa-plus"></i> </a>
                </figcaption>
            </figure>
            <figure class="col-sm-4">
                                <hr>
                <h2>Recettes <span>pas cher</span></h2>
                <img src="{!! asset('img/home/recettes pas cher.jpeg')!!}" class="img-responsive"  alt="img17"/>
                <figcaption>
                    <p></p>
                    <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-12">
            <div class="clearfix"></div>
            <h2 class="text-center">Menus pour mieux manger.</h2>
            <div class="col-md-12">
                <figure class="col-sm-4">
                                    <hr>
                    <h2>Menu <span>Sans Gluten</span></h2>
                    <img src="{!! asset('img/home/recette sans glutene.jpeg')!!}" class="img-responsive" alt="img17"/>
                    <figcaption>
                        <p></p>
                        <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                    </figcaption>
                </figure>

                <figure class="col-sm-4">
                                    <hr>
                    <h2>Menu <span>Végétarien</span></h2>
                    <img src="{!! asset('img/home/menus vegetarien.jpeg')!!}" class="img-responsive" alt="img17"/>
                    <figcaption>
                        <p></p>
                        <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                    </figcaption>
                </figure>

                <figure class="col-sm-4">
                                    <hr>
                    <h2>Menus <span>équilibrés</span></h2>
                    <img src="{!! asset('img/home/basse calories.jpeg')!!}" class="img-responsive" alt="img17"/>
                    <figcaption>
                        <p>Lorem Ipsum Sir Dolores</p>
                        <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                    </figcaption>
                </figure>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    @else

    {{-- UTILISATEURS SANS COMPTES --}}
<div class="col-md-10 col-md-offset-1" >
    <div class="clearfix"></div>
    <h2 class="text-center" style="color: black">Pourquoi créer un compte ?</h2>
    <div class="col-md-12">
        <p class="text-center"><a href="/register">Créez un compte</a> ou connectez vous en un clic avec :</p>
        <div class="col-sm-12 list-inline text-center " style="padding: 15px">
            <a href="{{url('login/facebook')}}"  class="btn btn-primary btn-sm text-center round"><i class="fa fa-facebook"></i></a>
            <a href="{{url('login/google')}}"  class="btn btn-danger btn-sm text-center round"><i class="fa fa-google"></i></a>
        </div>
    </div>
    <div style="width: 100%">
        <div class="clearfix"></div>
        <div class="col-sm-12">
            <div class="col-sm-6 ">
                <div class="card-list">
                    <h3>Organiser vos courses en quelque clics !</h3>
                    <p>
                        Easyeat mets à votre disposition une fonctionalité personnalisé permettant d'organiser
                        vos repas en prenant en comptes vos envies et vos objectifs en quelques clics !
                    </p>
                    <ul class="list-inline">
                        <a href="{{url('/listes/commentcamarche')}}" class="btn btn-primary">
                            Comment ça marche ?
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                    <div class="card-list">
                        <h3>Ne perdez pas une miette !</h3>
                        <p>
                            Une recette vous plait ? <br>
                            Vous n'avez qu'à l'ajouter à vos favoris pour y accéder instantanément ! <br>
                            En quête d'idée ? Envie d'en discuter avec la communautée EasyEat ? <br>
                            Retrouvez les sur la section sociale du site !
                        </p>
                        <ul class="list-inline">
                            <a href="{{url('/login')}}" class="btn btn-primary">
                                Je m'inscris !
                            </a>
                        </ul>
                </div>
                    <div class="card-list">
                        <h3>Des suggestions juste pour vous !</h3>
                        <p>
                           EasyEat détermine vos préférences en fonction des recettes présentes dans vos favoris et vous propose les
                           recettes que vous aimez.
                        </p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-12 avantages-abonnes">
        <div class="clearfix"></div>
        <h2 class="text-center">Avantages abonnés</h2>
            <a class="btn btn-success center-block" href=""><span class="btn-display">Commencez votre</span>  essaie <strong>gratuit</strong> <span class="btn-display">dès maintenant</span> - 15 jours</a>
        <div class="clearfix"></div>
        <h2 class="text-center">Recettes & régimes pour atteindre vos objectifs.</h2>
        <div class="col-md-12">
            <figure class="col-sm-6">
                <img src="{!! asset('img/home/basse calories.jpeg')!!}" class="img-responsive" alt="img17"/>
                <figcaption>
                                    <hr>
                    <h2>Régime <span>Minceur</span></h2>
                    <p></p>
                    <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                </figcaption>
            </figure>
            <figure class="col-sm-6">
                <img src="{!! asset('img/home/recettes pas cher.jpeg')!!}" class="img-responsive" alt="img17"/>
                <figcaption>
                                    <hr>
                    <h2>Régimes <span>Sportif</span></h2>
                    <p>Romeo never knows what he wants. He seemed to be very cross about something.</p>
                    <a href="{{ e(url('speciale class="btn btn-primary"/all')) }}">Voir plus <i class="fa fa-plus"></i> </a>
                </figcaption>
            </figure>
        </div>
        <div class="clearfix"></div>
            <h2 class="text-center">Des filtres personnalisés pour organiser vos recettes</h2>
            <div class="col-md-12">
                <figure class="col-sm-4">
                    <img src="{!! asset('img/home/recettes pas cher.jpeg')!!}" class="img-responsive" alt="img17"/>
                    <figcaption>
                        <hr>
                        <h2>Recette <span>Facile & Rapide</span></h2>
                        <p></p>
                        <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                    </figcaption>
                </figure>
                <figure class="col-sm-4">
                    <img src="{!! asset('img/home/recette sans glutene.jpeg')!!}" class="img-responsive"  alt="img17"/>
                    <figcaption>
                        <hr>
                        <h2>Régimes <span>Personnalisés</span></h2>
                        <p>Romeo never knows what he wants. He seemed to be very cross about something.</p>
                        <a href="{{ e(url('speciale class="btn btn-primary"/all')) }}">Voir plus <i class="fa fa-plus"></i> </a>
                    </figcaption>
                </figure>
                <figure class="col-sm-4">
                    <img src="{!! asset('img/home/recettes pas cher.jpeg')!!}" class="img-responsive"  alt="img17"/>
                    <figcaption>
                        <hr>
                        <h2>Recettes <span>pas cher</span></h2>
                        <p></p>
                        <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-12">
                <div class="clearfix"></div>
                <h2 class="text-center">Menus pour mieux manger.</h2>
                <div class="col-md-12">
                    <figure class="col-sm-4">
                        <img src="{!! asset('img/home/recette sans glutene.jpeg')!!}" class="img-responsive" alt="img17"/>
                        <figcaption>
                            <hr>
                            <h2>Menu <span>Sans Gluten</span></h2>
                            <p></p>
                            <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                        </figcaption>
                    </figure>

                    <figure class="col-sm-4">
                        <img src="{!! asset('img/home/menus vegetarien.jpeg')!!}" class="img-responsive" alt="img17"/>
                        <figcaption>
                            <hr>
                            <h2>Menu <span>Végétarien</span></h2>
                            <p></p>
                            <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                        </figcaption>
                    </figure>

                    <figure class="col-sm-4">
                        <img src="{!! asset('img/home/basse calories.jpeg')!!}" class="img-responsive" alt="img17"/>
                        <figcaption>
                            <hr>
                            <h2>Menus <span>équilibrés</span></h2>
                            <p>Lorem Ipsum Sir Dolores</p>
                            <a class="btn btn-primary" href="#">Voir plus <i class="fa fa-plus"></i> </a>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
@endif

<div class="clearfix"></div>
@include('layouts.footer')

@include('jquery.fixedTop')
@include('jquery.AutoWrite')
@include('jquery.homeSearchAutocomplete')

@endsection
