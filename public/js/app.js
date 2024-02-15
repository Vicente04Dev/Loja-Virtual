
$(document).ready(function() {
    
    $('.addItemBtn').click(function(e){
        e.preventDefault();
        
        let $form = $(this).closest('.form-submit');
        
        let pid = $form.find('.pid').val();
        let pnome = $form.find('.pnome').val();
        let ppreco = $form.find('.ppreco').val();
        let pimagem = $form.find('.pimagem').val();
        let pcodigo = $form.find('.pcodigo').val();
        
        $.ajax({
            url: 'php/action.php',
            method: 'post',
            data: {pid:pid, pnome:pnome, ppreco:ppreco, pimagem:pimagem, pcodigo:pcodigo},
            success: function(response){
                $('#mensagem').html(response);
                window.scrollTo(0,0);
                load_cart_item_number();
            }
        });
        
        load_cart_item_number();
        
        function load_cart_item_number(){
            $.ajax({
                url: 'php/action.php',
                method: 'get',
                data: {cartItem:"cart_item"},
                success: function(response){
                    $("#cart-item").html(response);
                }
            })
        }
    });
});