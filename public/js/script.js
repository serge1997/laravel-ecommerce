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

//modal ajax sshow produto

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

//modal ajax list produto

$(document).ready(function(){
    $('.PedidoModal').on('click', function(e){
        e.preventDefault()
        $('#interestModal').removeClass('invisible')
        let pedido = $(this).attr('data-pedido')

        $.post('/historico/itens/pedido', {idpedido: pedido}, (result)=> {
            console.log(result)
            $('.show-itens').html(result)
        })
    })
})
// mask cpf cep

$(document).ready(function(){
    $(".cpf").mask('000.000.000-00')
    $(".cep").mask('00000-000')
})


/*$.post('/ver/produto', {idproduto: id}, (result)=>{
    $('.show-conteudo').html(result)
    console.log(result)
})*/

$(document).ready(function(){

    let valorProduto = $('.valor').val()
    let toggle = false

    $('.dropdown-item').click(function(){
        val = $(this).val()

        $('.dropdown-toggle').attr('value', val)

        $('.valor').attr('value', val * valorProduto)

        $('.dropdown-menu').css('display', 'none')

        toggle = !toggle;

        if(toggle){

            $('.dropdown-toggle').click(function(){
                $('.dropdown-menu').css({'display':'flex', 'flex-direction':'column', 'position':'fixed'})
            })
        }
    })
})

$(document).ready(function() {
    $('#close').click(() => {
        $('.sidebar').addClass('hidden')
    })

    $('.open').click(() => {
        $('.sidebar').removeClass('hidden')
    })
})


