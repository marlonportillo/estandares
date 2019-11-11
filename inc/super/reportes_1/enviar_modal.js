
$(document).ready(function(){
    $(document).on('click', '.edit', function(){
        var id=$(this).val();
        
    
        $('#logoutModal').modal('show');
        $('#idemp').val(id);
        
    });
