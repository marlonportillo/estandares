
$(document).ready(function(){
    $(document).on('click', '.edit', function(){
        var id=$(this).val();
        var first=$('#titu').val();
    	console.log(first);
    	console.log(id);

    	var separardo = ","
    	var limite = 2;
    	 var arreglo = id.split(separardo, limite);
    	 var idem,idmodulo;
    	 idem = arreglo[1];
    	 idmodulo = arreglo[0];

    	 console.log(arreglo);
    	 console.log(idem);
    	 console.log(idmodulo);
    	

    	 


    	 document.cookie= "var2=r"
        $('#logoutModal').modal('show');
        $('#idemp').val(idem);
        $('#ide').val(idmodulo);
        
    })});
