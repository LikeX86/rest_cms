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

function trocar(){
    var banner = document.querySelector('.banner');
    if (banner.classList.contains('preto')){
     banner.classList.remove("preto");
     banner.classList.add("branco");
     
    }else{
    banner.classList.remove("branco");
    banner.classList.add('preto');


    }
    let time;
    function comecar(){
    time = setInterval(showTime,1000);

    }
    function parar(){
        clearInterval(time);
    }
    function showTime(){
        let d = new Date();
        let h = d.getHours();
        let m = d.getMinutes();
        let s = d.getSeconds();
        let txt = h+" "+m+" "+s;
        document.querySelector('.demo').innerHTML = txt;

    }
}


  /* Fazer o painel e fazer um rolltobar limpar o float dos cards   */