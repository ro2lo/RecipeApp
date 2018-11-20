@section('postJquery')
    @parent
    {{--<script>--}}
        var listEntre = <?php echo json_encode($listEntrée); ?>;
        $('#searchEntre').autocomplete({
            source : listEntre, // on inscrit la liste de suggestions
            minLength : 1, // on indique qu'il faut taper au moins 1 caractères pour afficher l'autocomplétion
          });


    var listPlats = <?php echo json_encode($listPlats); ?>;
    $('#searchPlats').autocomplete({
    source : listPlats, // on inscrit la liste de suggestions
    minLength : 1, // on indique qu'il faut taper au moins 1 caractères pour afficher l'autocomplétion
    });


    var listDesserts = <?php echo json_encode($listDesserts); ?>;
    $('#searchDesserts').autocomplete({
    source : listDesserts, // on inscrit la liste de suggestions
    minLength : 1, // on indique qu'il faut taper au moins 1 caractères pour afficher l'autocomplétion
    });



    var listBoissons = <?php echo json_encode($listBoissons); ?>;
    $('#searchBoissons').autocomplete({
    source : listBoissons, // on inscrit la liste de suggestions
    minLength : 1, // on indique qu'il faut taper au moins 1 caractères pour afficher l'autocomplétion
    });


    var listPatisseries = <?php echo json_encode($listPatisseries); ?>;
    $('#searchPatisseries').autocomplete({
    source : listPatisseries, // on inscrit la liste de suggestions
    minLength : 1, // on indique qu'il faut taper au moins 1 caractères pour afficher l'autocomplétion
    });


    {{--$.ajaxSetup({ cache: false });--}}
    {{--</script>--}}
@endsection