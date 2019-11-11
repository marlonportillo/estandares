
$(document).ready(function(){
    $(document).on('change', '.edit4', function(){
        var anio=$(this).val();
        
        
        console.log(anio);
  
        $('#pp').val(anio);
        /*$('#idemp').val(idem);
        $('#ide').val(idmodulo);*/
         document.cookie = "var1="+anio;
         $("#rec").load(" #rec");
        // $.cookie('var1',anio);
        
    })});