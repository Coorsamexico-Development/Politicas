let patt = /\.pdf/i;
function firstLastFive(){
    $.ajax({
        data: {"opcion" : "1"},
        type: "GET",
        dataType: "json",
        url: "/lastPolicts"
    }).done(function( data, textStatus, jqXHR ) {
            var html ='';
            $.each(data, function( index, datos ) {
                   if(index===0){
                    html +='<div class="carousel-item active"><div class="carousel-background">';

                   }else{
                    html +='<div class="carousel-item"><div class="carousel-background">';
                   }
               html +='<img src="'+datos.imagePolitic+'" alt="" width="100%">'+
               '</div><div class="carousel-container"><div class="carousel-content">'+
                '<h2>'+datos.namepolitica+'</h2>';
                if(datos.statu==1){
                    html += '<p class="badge bg-warning text-dark p-1">En revisiO&#769;n</p>';

                }
                if (patt.test(datos.pdf)) {
                    html+= '<a href="'+datos.pdf+'" data-fancybox="'+
                    index+'" class="btn-get-started scrollto">Ver pol&#237;tica</a>';
                } else {
                    pdf = '<a href="'+datos.pdf+'" download class="btn-get-started scrollto">Ver pol&#237;tica</a>';
                }
                html+='</div></div></div>';

            });
            $('#carousel').html(html);

    })
    .fail(function( jqXHR, textStatus, errorThrown ) {

    });
}


function tipoPoliticas(){
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/tipopoliticas/menu"
    }).done(function( data, textStatus, jqXHR ) {
            var html ='';
            $.each(data, function( index, datos ) {
                 
               html +='<li data-filter=".filter-'+datos.name+'">'+datos.name+'</li>';
            

            });
            $('#portfolio-flters').append(html);
            publicadas();
            firstLastFive();

    })
    .fail(function( jqXHR, textStatus, errorThrown ) {

    });
}


function publicadas(){
    $.ajax({
        data: {"opcion" : "2"},
        type: "GET",
        dataType: "json",
        url: "/politicCategories",
    })
     .done(function( data, textStatus, jqXHR ) {
        var html ='';

        $.each(data, function( index, datos ) {
            if(datos.statu==1){
                html+='<div class="col-lg-4 col-md-6 portfolio-item filter-Revision';
            }else{
                html+='<div class="col-lg-4 col-md-6 portfolio-item filter-'+
                datos.name;
            }

            html+=' wow fadeInUp" data-wow-delay="0.1s"><div class="portfolio-wrap"><figure>'+
                '<img src="'+datos.imagePolitic+'" class="img-fluid" alt="" width="100%">';
            console.log(datos);

            if(datos.pdf)

            if (patt.test(datos.pdf)) {
                html+=     '<a href="'+datos.pdf+'" data-fancybox="'+index+'" data-title="App '+ index+'" ';
            } else {
                html+= '<a href="'+datos.pdf+'" download ';
            }
            html+='class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>'+
                '</figure><div class="portfolio-info">'+
                '<h6><a href="#">'+datos.namepolitica+
                '</a></h6>';
            if(datos.statu==1){
             html+= '<p class="badge bg-warning text-dark p-1">En revisiO&#769;n</p>';
            }

                 html+='</div></div></div>';
        });
         $('#cont-politics').html(html);
         filterAnimation();

     })
     .fail(function( jqXHR, textStatus, errorThrown ) {

    });
}

function filterAnimation(){
    var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
      });

    $('#portfolio-flters li').on( 'click', function() {
        $("#portfolio-flters li").removeClass('filter-active');
        $(this).addClass('filter-active');

        portfolioIsotope.isotope({ filter: $(this).data('filter') });
    });
}

(function(){
    tipoPoliticas();
})();

