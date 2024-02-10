
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
            url: 'action.php',
            method: 'post',
            data: {pid:pid, pnome:pnome, ppreco:ppreco, pimagem:pimagem, pcodigo:pcodigo},
            success: function(response){

            }
        });

        alert('ID: '+pid +'\nNome: '+ pnome + '\nPreço: '+ppreco + '\nCódigo: '+pcodigo + '\nImagem: '+pimagem);
    });
});