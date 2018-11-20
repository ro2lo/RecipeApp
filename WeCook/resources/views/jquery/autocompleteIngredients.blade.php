@section('postJquery')
    @parent







var listIngredients = <?php echo json_encode($listIngredients); ?>;
$('#searchIngredients').autocomplete({
source : listIngredients, // on inscrit la liste de suggestions
minLength : 1, // on indique qu'il faut taper au moins 1 caractères pour afficher l'autocomplétion
select: function(event, ui) {
    //assign value back to the form element
    if(ui.item){
    $(event.target).val(ui.item.value);
    }
    //submit the form
    $(event.target.form).submit();
    }





});
console.log(listIngredients);

    @endsection