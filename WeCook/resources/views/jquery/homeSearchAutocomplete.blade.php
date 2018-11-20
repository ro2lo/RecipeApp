@section('homeSearchAutocomplete')
    @parent


    var listRecettes = <?php echo json_encode($listRecettes); ?>;
    $('#searchRecettes').autocomplete({
    source : listRecettes, // on inscrit la liste de suggestions
    minLength : 1, // on indique qu'il faut taper au moins 1 caractères pour afficher l'autocomplétion
    })

@endsection