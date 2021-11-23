
window.addEventListener('scroll',monitorarScroll);


function monitorarScroll(){
    if(window.scrollY > 0){
        document.querySelector('.scrollButton').style.display = 'block';
    }else{
        document.querySelector('.scrollButton').style.display = 'none';
    }
}


/* FUNCÕES */
function scrollTopo(){
    window.scrollTo({
        top:0,
        behavior:"smooth"
    });
}

function cardapio(){
    let largura = window.innerWidth;

    if(largura == 360){
        window.scroll({
            top:1585,
            behavior:'smooth'
        });
    }else{
        window.scroll({
            top:1509,
            behavior:'smooth'
        });
    }

    document.querySelector('.menu__mobile').style.display = 'none';
   
}

function sobre(){
    let largura = window.innerWidth;

    if(largura == 360){
        window.scroll({
            top:857,
            behavior:'smooth'
        });
    }else{
        window.scroll({
            top:800,
            behavior:'smooth'
        });
    }
    document.querySelector('.menu__mobile').style.display = 'none';
}

function contato(){
    let largura = window.innerWidth;
    
    if(largura == 360){
        window.scroll({
            top:4862,
            behavior:'smooth'
        });
    }else{
        window.scroll({
            top:2880,
            behavior:'smooth'
        });
    }
    document.querySelector('.menu__mobile').style.display = 'none';
}



  /* Fazer o painel e fazer um rolltobar limpar o float dos cards   */