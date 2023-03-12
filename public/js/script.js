//const { Result } = require("postcss")

$('button.mobile-menu-button').on('click', function(){  
    $('.mobile-menu').toggle()
})

$('#mysearch').submit(function(e){
    e.preventDefault()
})

$('#search').keypress(function(e){

    let search = $(this).val()
    $('.show').css("display", "none")
    $.post('/busca/categoria', {buscar: search}, (result)=>{
        $('.saida').html(result)
       
    })
})

$(document).ready(function () {
    $('.openModal').on('click', function(e){
        e.preventDefault()
        $('#interestModal').removeClass('invisible')
        let id = $(this).attr("data-id")
        $.post('/ver/produto', {idproduto: id}, (result)=>{
            $('.show-conteudo').html(result)
            console.log(result)
        })
    });
    $('.closeModal').on('click', function(e){
        $('#interestModal').addClass('invisible');
    });
});


// mask cpf cep

$(document).ready(function(){
    $(".cpf").mask('000.000.000-00')
    $(".cep").mask('00000-000')
})
