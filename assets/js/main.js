(function($) {

    'use strict';

    $('.site-menu-toggle').click(function() {
        var $this = $(this);
        if ($('body').hasClass('menu-open')) {
            $this.removeClass('open');
            $('.js-site-navbar').fadeOut(400);
            $('body').removeClass('menu-open');
        } else {
            $this.addClass('open');
            $('.js-site-navbar').fadeIn(400);
            $('body').addClass('menu-open');
        }
    });


    $('nav .dropdown').hover(function() {
        var $this = $(this);
        $this.addClass('show');
        $this.find('> a').attr('aria-expanded', true);
        $this.find('.dropdown-menu').addClass('show');
    }, function() {
        var $this = $(this);
        $this.removeClass('show');
        $this.find('> a').attr('aria-expanded', false);
        $this.find('.dropdown-menu').removeClass('show');
    });



    $('#dropdown04').on('show.bs.dropdown', function() {
        console.log('show');
    });

    // aos
    AOS.init({
        duration: 1000
    });

    // home slider
    $('.home-slider').owlCarousel({
        loop: true,
        autoplay: true,
        margin: 10,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        nav: true,
        autoplayHoverPause: true,
        items: 1,
        autoheight: true,
        navText: ["<span class='ion-chevron-left'></span>", "<span class='ion-chevron-right'></span>"],
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: true
            }
        }
    });

    // owl carousel
    var majorCarousel = $('.js-carousel-1');
    majorCarousel.owlCarousel({
        loop: true,
        autoplay: true,
        stagePadding: 7,
        margin: 20,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        nav: true,
        autoplayHoverPause: true,
        items: 3,
        navText: ["<span class='ion-chevron-left'></span>", "<span class='ion-chevron-right'></span>"],
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: false
            }
        }
    });

    // owl carousel
    var major2Carousel = $('.js-carousel-2');
    major2Carousel.owlCarousel({
        loop: true,
        autoplay: true,
        stagePadding: 7,
        margin: 20,
        // animateOut: 'fadeOut',
        // animateIn: 'fadeIn',
        nav: true,
        autoplayHoverPause: true,
        autoHeight: true,
        items: 3,
        navText: ["<span class='ion-chevron-left'></span>", "<span class='ion-chevron-right'></span>"],
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                dots: true,
                nav: true,
                loop: false
            }
        }
    });

    var siteStellar = function() {
        $(window).stellar({
            responsive: false,
            parallaxBackgrounds: true,
            parallaxElements: true,
            horizontalScrolling: false,
            hideDistantElements: false,
            scrollProperty: 'scroll'
        });
    }
    siteStellar();

    var smoothScroll = function() {
        var $root = $('html, body');

        $('a.smoothscroll[href^="#"]').click(function() {
            $root.animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 500);
            return false;
        });
    }
    smoothScroll();

    var dateAndTime = function() {
        $('#m_date').datepicker({
            'format': 'm/d/yyyy',
            'autoclose': true
        });
        $('#checkin_date, #checkout_date').datepicker({
            'format': 'd MM, yyyy',
            'autoclose': true
        });
        $('#m_time').timepicker();
    };
    dateAndTime();

    var siteMagnificPopup = function() {
        $('.image-popup').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            },
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300 // don't foget to change the duration also in CSS
            }
        });

        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,

            fixedContentPos: false
        });
    };
    siteMagnificPopup();




})(jQuery);


//Function de projet 

$(function() {


    chambre_reservation = new Object();
    data_grille = [];
    chambre_reservation = {

        nbr_chambre: null,
        type_chambre: [],
        arrangement: [],
        cas: [true],
        entree: null,
        sortie: null,
        nbr_bb: [],
        ad1: [],
        ad2: [],
        ad3: [],
        ad4: [],
        ad5: [],
        enf1: [],
        enf2: [],
        enf3: [],
        enf4: [],
        enf5: [],
        enf1_age: [],
        enf2_age: [],
        enf3_age: [],
        enf4_age: [],
        enf5_age: [],
        bebe1: [],
        bebe2: []

    }

    nbrChambre = 1;
    checkIn = moment().format('YYYY-MM-DD');
    checkOut = moment().add(1, 'days').format('YYYY-MM-DD');
    startDate = moment(checkIn).format('MM/DD/YYYY');
    endDate = moment(checkOut).format('MM/DD/YYYY');

    localStorage.setItem('checkIn', checkIn);
    localStorage.setItem('checkOut', checkOut);
    $("#daterangepicker-reservation").daterangepicker({
        opens: 'left',
        minDate: new Date(),
        format: 'DD/MM/YYYY',
        startDate: startDate,
        endDate: endDate,
        isInvalidDate: function(date) {
            if (date.format('YYYY-MM-DD') == '+1d') {
                return true;
            }
        }

    }, function(start, end, label) {
        checkIn = start.format('YYYY-MM-DD');
        checkOut = end.format('YYYY-MM-DD');


        $("#arrg0").empty();
        $("#price0").empty();
        $("#total-price").empty();
        // Dtae range picker change
        $.ajax({
            cache: false,
            type: "GET",
            url: "http://localhost/ramsam/class/grilleTarifaire.php",
            data: { check_in: checkIn, check_out: checkOut },
            success: function(grille) {
                grille = JSON.parse(grille);
                console.log(grille);

                if (grille != null) {
                    $.each(grille.arrangement, function(index_arg, arg) {
                        if (index_arg == 0) {
                            arrg_selected = arg;

                            type = 1;
                            nbrChild = 0;
                            nbrEnf = 0;
                            arrg = arrg_selected;

                        }
                        console.log(arg);

                        $("#arrg0").append('<option value="' + arg + '">' + arg + '</option>');
                        option_arrangement += '<option value="' + arg + '">' + arg + '</option>';

                    })

                    if (grille.stop_sale != null) {

                        $.each(grille.stop_sale, function(index_sale, stop_sales) {

                            Date_Debut = stop_sales.DateDebut;
                            Date_Reprise = stop_sales.DateReprise;

                            if (new Date(Date_Debut).getTime() <= new Date(checkIn).getTime() < new Date(Date_Reprise).getTime()) {
                                $("#msgDisponiblite").html("Cet hotel n'est pas disponible pour le moment. S'il vous plaît changer la date de réservation.");
                                $("#msgDisponiblite").show();
                                $("#ReservHotel").prop("disabled", true);
                                $("#ReservHotel").hide();
                                $("#load-reserv").show();

                            } else {
                                $("#msgDisponiblite").hide();
                                $("#ReservHotel").prop("disabled", false);
                                $("#ReservHotel").show();
                                $("#load-reserv").hide();
                            }

                        });
                    } else {
                        $("#msgDisponiblite").hide();
                        $("#ReservHotel").prop("disabled", false);
                        $("#ReservHotel").show();
                        $("#load-reserv").hide();
                    }


                    data_grille = grille.chambre;
                    result = getPrice(grille.chambre, 1, 0, arrg_selected, 0);
                    //console.log(arrg_selected);
                    totalPrice = prix;
                    $("#total-price").html("Total " + totalPrice.toFixed(3) + " DT");


                }
            },
            error: function() {
                console.log("ERROR");
            }
        })

    });


    //lancement de page
    option_arrangement = '';
    checkIn = moment().format('YYYY-MM-DD');
    checkOut = moment().add(1, 'days').format('YYYY-MM-DD');
    id_hotel = 1;
    $.ajax({
        cache: false,
        type: "GET",
        url: "http://localhost/ramsam/class/grilleTarifaire.php",
        data: { check_in: checkIn, check_out: checkOut },
        success: function(grille) {
            grille = JSON.parse(grille);
            console.log(grille);

            if (grille != null) {
                $.each(grille.arrangement, function(index_arg, arg) {
                    if (index_arg == 0) {
                        arrg_selected = arg;

                        type = 1;
                        nbrChild = 0;
                        nbrEnf = 0;
                        arrg = arrg_selected;

                    }
                    console.log(arg);

                    $("#arrg0").append('<option value="' + arg + '">' + arg + '</option>');
                    option_arrangement += '<option value="' + arg + '">' + arg + '</option>';

                })

                if (grille.stop_sale != null) {

                    $.each(grille.stop_sale, function(index_sale, stop_sales) {

                        Date_Debut = stop_sales.DateDebut;
                        Date_Reprise = stop_sales.DateReprise;

                        if (new Date(Date_Debut).getTime() <= new Date(checkIn).getTime() < new Date(Date_Reprise).getTime()) {
                            $("#msgDisponiblite").html("Cet hotel n'est pas disponible pour le moment. S'il vous plaît changer la date de réservation.");
                            $("#msgDisponiblite").show();
                            $("#ReservHotel").prop("disabled", true);
                            $("#ReservHotel").hide();
                            $("#load-reserv").show();

                        } else {
                            $("#msgDisponiblite").hide();
                            $("#ReservHotel").prop("disabled", false);
                            $("#ReservHotel").show();
                            $("#load-reserv").hide();
                        }

                    });
                } else {
                    $("#msgDisponiblite").hide();
                    $("#ReservHotel").prop("disabled", false);
                    $("#ReservHotel").show();
                    $("#load-reserv").hide();
                }


                data_grille = grille.chambre;
                result = getPrice(grille.chambre, 1, 0, arrg_selected, 0);
                //console.log(arrg_selected);
                totalPrice = prix;
                $("#total-price").html("Total " + totalPrice.toFixed(3) + " DT");


            }
        },
        error: function() {
            console.log("ERROR");
        }
    })

    // get Price au lancement de page
    prix = 0;
    page_load = true;
    litBB = 0;









    //Function Add Chzambre
    var rooms = $("#rooms"); //Fields wrapper
    var add_button = $("#addRoom");
    max_fields = 4; //maximum input boxes allowed
    var x = 0; //initlal text box count
    nbrAd = "";
    nbrchild = "";
    nbr_rooms = 1;
    prix = 0;
    for (var i = 0; i < 5; i++) {
        if (i == 1) {
            nbrAd += '<option value="' + i + '" selected>' + i + '</option>';
        } else {
            nbrAd += '<option value="' + i + '">' + i + '</option>';
        }
    }

    for (var i = 0; i < 4; i++) {
        nbrchild += '<option value="' + i + '">' + i + '</option>';
    }
    var x = 0; //initlal text box count


    $(add_button).click(function(e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(rooms).append('<div class="row col-md-12 mt-5" id="room' + x + '">' +
                '<div class="col-md-2 form-group">' +
                '<label for="adults" class="font-weight-bold text-black">Adultes</label>' +
                '<div class="field-icon-wrap">' +
                '<div class="icon"><span class="ion-ios-arrow-down"></span></div>' +
                '<select name="" class="form-control" required id="nbrAdultes' + x + '" onchange="changePriceWithAdultes(this.id, 10)">' +
                nbrAd +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-2 form-group">' +
                '<label for="children" class="font-weight-bold text-black">Enfants</label>' +
                '<div class="field-icon-wrap">' +
                '<div class="icon"><span class="ion-ios-arrow-down"></span></div>' +
                '<select name="" class="form-control" required id="nbrEnfants' + x + '" onchange="changePriceWithEnfants(this.id, 10)">' +
                nbrchild +
                '</select>' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2 form-group" required>' +
                '<label for="children" class="font-weight-bold text-black">Bébé(s)</label>' +
                '<div class="field-icon-wrap">' +
                '<div class="icon"><span class="ion-ios-arrow-down"></span></div>' +
                '<select name="" class="form-control" id="nbrBebes' + x + '">' +
                '<option value="0" selected>0</option>' +
                '<option value="1" >1</option>' +
                '<option value="2" >2</option>' +
                '</select>' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2 form-group" required>' +
                '<label for="children" class="font-weight-bold text-black">Arrangements</label>' +
                '<div class="field-icon-wrap">' +
                '<div class="icon"><span class="ion-ios-arrow-down"></span></div>' +
                '<select class="form-control form-online arrangement" id="arrg' + x + '" onchange="changePrice(this.id, 4)" searchable="Arrangement"></select>' +
                '</div>' +
                '</div>' +

                '<div class="col-md-2 form-group">' +
                '<label for="children" class="font-weight-bold text-black">Prix</label>' +
                '<div class="field-icon-wrap">' +
                '<input type="text" name="prix" class="form-control" disabled="disabled" value="' + prix.toFixed(3) + '" id="price' + x + '">' +
                '</div>' +
                '</div>' +
                '<div class="col-md-1">' +
                '<label for="" class="font-weight-bold text-black"></label>' +
                '<div class="input-group mt-2">' +
                '<button type="button" class="form-control btn-danger" id="btnDeleteReservHotel' + x + '" onclick="OpenModelDeleteRoom(this.id)" data-toggle="modal" data-target="#confirm-delete">' +
                '<i class="fa fa-trash orange-text"></i>' +
                '</button>' +
                '</div>' +
                '</div>' +
                '</div>');


            id_arrangement_field = "#arrg" + x;
            $(id_arrangement_field).html(option_arrangement);
            tabRoom_cas[x] = false;
            nbr_rooms = x + 1;
            chambre_reservation.cas[x] = true;
            tabRoom_cas[x] = false;
            nbrChambre += 1;
            nbrChambre += 1;
            chambre_reservation.arrangement[x] = $(id_arrangement_field).val();
            chambre_reservation.type_chambre[x] = 1;
            chambre_reservation.nbr_bb[x] = litBB;
            //console.log(chambre_reservation);
            getTotalPrice();

        }

    });

    tabRoom_cas = [false];

    $("#form-detail-reserv").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.
        client = new Object();
        vente_hotel = new Object();

        /** Object Client */
        client.nom = document.forms["form-detail-reserv"].nom.value;
        client.tel = document.forms["form-detail-reserv"].phone.value;
        client.mail = document.forms["form-detail-reserv"].email.value;

        /** Object vente hotel */
        vente_hotel.hotel = id_hotel;
        vente_hotel.entree = localStorage.getItem('checkIn');
        vente_hotel.sortie = localStorage.getItem('checkOut');
        //console.log(new Date(localStorage.getItem('checkIn')).format("Y-m-d"));
        chambre_reservation.entree = localStorage.getItem('checkIn');
        chambre_reservation.sortie = localStorage.getItem('checkOut');
        chambre_reservation.nbr_chambre = nbrChambre;

        cas_room = true;
        var index_false = 0;
        var index = 0;

        tabRoom = tabRoom_cas;

        /*for (index = 0; index <= tabRoom.length; index++) {

            if (tabRoom[index] == false) {
                console.log("tab room " + tabRoom[index]);
                cas_room = false;
                index_false = index;
            }
        }*/


        if (cas_room == true) {

            var idexRoom = 0;

            //console.log(chambre_reservation.cas);
            //console.log(chambre_reservation.cas.length);

            for (var indexTabRoom = 0; indexTabRoom < chambre_reservation.cas.length; indexTabRoom++) {

                if (chambre_reservation.cas[indexTabRoom] == true) {
                    console.log("indexTabRoom " + indexTabRoom);
                    console.log("chambre_reservation" + chambre_reservation.type_chambre);
                    chambre_reservation.type_chambre[idexRoom] = chambre_reservation.type_chambre[indexTabRoom];
                    chambre_reservation.arrangement[idexRoom] = chambre_reservation.arrangement[indexTabRoom];
                    chambre_reservation.nbr_bb[idexRoom] = 0;

                    chambre_reservation.ad1[idexRoom] = null;
                    chambre_reservation.ad2[idexRoom] = null;
                    chambre_reservation.ad3[idexRoom] = null;
                    chambre_reservation.ad4[idexRoom] = null;
                    chambre_reservation.ad5[idexRoom] = null;
                    chambre_reservation.enf1[idexRoom] = null;
                    chambre_reservation.enf1_age[idexRoom] = null;
                    chambre_reservation.enf2[idexRoom] = null;
                    chambre_reservation.enf2_age[idexRoom] = null;
                    chambre_reservation.enf3[idexRoom] = null;
                    chambre_reservation.enf3_age[idexRoom] = null;
                    chambre_reservation.enf4[idexRoom] = null;
                    chambre_reservation.enf4_age[idexRoom] = null;
                    chambre_reservation.enf5[idexRoom] = null;
                    chambre_reservation.enf5_age[idexRoom] = null;

                    console.log(chambre_reservation.type_chambre[indexTabRoom]);


                    idexRoom += 1;

                }
            }

            console.log(client);
            console.log(vente_hotel);
            console.log(chambre_reservation);

            $.ajax({
                cache: false,
                type: "POST",
                url: "http://localhost/ramsam/class/ReservationApi.php",
                data: { client: client, vente_hotel: vente_hotel, chambre_reservation: chambre_reservation },
                //data : {client : client},
                success: function(data) {
                    console.log(data);
                    
                    alert('Félicitations!', ',Votre message a été envoyé!', 'success');
                    window.location.replace("rooms.php");


                },
                error: function() {
                    $("#ReservHotel").attr("disabled", false);
                    $("#ReservHotel").show();
                    $("#load-reserv").hide();
                    console.log('error');
                }
            });

        } else {
            //console.log(cas_room);
            $("#modalReservRoom").modal('show');
            $("#msgErrorValidation").show();
            openModelReservRoom("btnOkReservHotel" + index_false);
            $("#ReservHotel").attr("disabled", false);
            $("#ReservHotel").show();
            $("#load-reserv").hide();
        }

    });
});

indexRoom = 0;


function getPrice(data_grille, nbr_adlt, nbr_child, arrg, index_row) {

    type = getType(nbr_adlt, nbr_child);
    //console.log(type);

    chambre_reservation.type_chambre[index_row] = type;
    chambre_reservation.arrangement[index_row] = arrg;

    $.each(data_grille, function(index_ch, chbre) {
        price = 0;

        litBB = chbre.Lit_BB;

        if (chbre.Type == type) {
            if (arrg == "All In") {
                price = chbre.All_In;
            } else if (arrg == "All In Soft") {
                price = chbre.All_In_Soft;
            } else if (arrg == "DP") {
                price = chbre.DP;
            } else if (arrg === "LPD") {
                price = chbre.LPD;
            } else if (arrg == "PC") {
                price = chbre.PC;
            } else if (arrg === "Ultra All In") {
                price = chbre.Ultra_All_In;
            }

            if (page_load == true) {
                prix = price;
                page_load = false;
            }

            id_price = "#price" + index_row;
            $(id_price).val(price.toFixed(3));

        }
    })

}

function getType(nbr_adlt, nbr_child) {

    if (nbr_adlt == 0) {
        if (nbr_child == 1) {
            return 2;
        }
        if (nbr_child == 2) {
            return 5;
        }
        if (nbr_child == 3) {
            return 9;
        }
        if (nbr_child == 4) {
            return 14;
        }
    }
    if (nbr_adlt == 1) {
        if (nbr_child == 0) {
            return 1;
        }
        if (nbr_child == 1) {
            return 4;
        }
        if (nbr_child == 2) {
            return 8;
        }
        if (nbr_child == 3) {
            return 13;
        }
    }
    if (nbr_adlt == 2) {
        if (nbr_child == 0) {
            return 3;
        }
        if (nbr_child == 1) {
            return 7;
        }
        if (nbr_child == 2) {
            return 12;
        }
    }
    if (nbr_adlt == 3) {
        if (nbr_child == 0) {
            return 6;
        }
        if (nbr_child == 1) {
            return 11;
        }
    }
    if (nbr_adlt == 4) {
        if (nbr_child == 0) {
            return 10;
        }
    }
}

function OpenModelDeleteRoom(id_field) {

    indexRoom = id_field.substring(20);

}

function deleteRoom() {

    id_room = "#room" + indexRoom;
    console.log(id_room);
    $(id_room).remove();
    max_fields += 1;
    console.log("avant " + nbrChambre);
    chambre_reservation.cas[indexRoom] = false;
    tabRoom_cas[indexRoom] = true;
    nbrChambre = nbrChambre - 1;
    $("#confirm-delete").modal('hide');
    //getTotalPrice();
    console.log(nbrChambre);

}

function changePriceWithAdultes(id_field, nbr_carc) {

    var index_row = id_field.substring(nbr_carc);
    id_adlt = "#nbrAdultes" + index_row;
    id_child = "#nbrEnfants" + index_row;

    nbr_adlt = $(id_adlt).val();

    console.log(nbr_adlt);
    console.log(id_child);
    if (nbr_adlt == 0) {
        nbrChild = '<option value="1" selected>1</option>' +
            '<option value="2" >2</option>' +
            '<option value="3" >3</option>' +
            '<option value="4" >4</option>';

    } else if (nbr_adlt == 1) {
        nbrChild = '<option value="0" selected>0</option>' +
            '<option value="1" >1</option>' +
            '<option value="2" >2</option>' +
            '<option value="3" >3</option>';

    } else if (nbr_adlt == 2) {
        nbrChild = '<option value="0" selected>0</option>' +
            '<option value="1" >1</option>' +
            '<option value="2" >2</option>';
    } else if (nbr_adlt == 3) {
        nbrChild = '<option value="0" selected>0</option>' +
            '<option value="1" >1</option>';
    } else if (nbr_adlt == 4) {
        nbrChild = '<option value="0" selected>0</option>';
    }


    $(id_child).html(nbrChild);
    id_arrg = "#arrg" + index_row;
    nbr_child = $(id_child).val();
    value_arrg = $(id_arrg).val();
    tabRoom_cas[index_row] = false;
    getPrice(data_grille, nbr_adlt, nbr_child, value_arrg, index_row);
    getTotalPrice();

}

function changePriceWithEnfants(id_field, nbr_carc) {

    var index_row = id_field.substring(nbr_carc);


    id_adlt = "#nbrAdultes" + index_row;
    id_child = "#nbrEnfants" + index_row;
    id_arrg = "#arrg" + index_row;
    nbr_adlt = $(id_adlt).val();
    nbr_child = $(id_child).val();
    value_arrg = $(id_arrg).val();

    chambre_reservation.arrangement[index_row] = value_arrg;
    tabRoom_cas[index_row] = false;
    getPrice(data_grille, nbr_adlt, nbr_child, value_arrg, index_row);
    getTotalPrice();

}


function changePrice(id_field, nbr_carc) {

    var index_row = id_field.substring(nbr_carc);

    id_adlt = "#nbrAdultes" + index_row;
    id_child = "#nbrEnfants" + index_row;
    id_arrg = "#arrg" + index_row;
    nbr_adlt = $(id_adlt).val();
    nbr_child = $(id_child).val();
    value_arrg = $(id_arrg).val();

    chambre_reservation.arrangement[index_row] = value_arrg;

    getPrice(data_grille, nbr_adlt, nbr_child, value_arrg, index_row);
    getTotalPrice();
}

function getTotalPrice() {

    totalPrice = 0;
    for (i = 0; i < chambre_reservation.cas.length; i++) {

        if (chambre_reservation.cas[i] == true) {
            id_price_input = "#price" + i;
            totalPrice += parseFloat($(id_price_input).val());

        }
    }

    $("#total-price").html("Total " + totalPrice.toFixed(3) + " DT");
    $("#total-price2").html(totalPrice.toFixed(3));

}


function openModelReservRoom(id) {

    $("#formReservHotel").find("input[type=text]").val("");
    $("#msgErrorAdlt").hide();
    $("#msgErrorEnf").hide();

    var nbrAdlt = 0;
    var nbrEnf = 0;
    var nbrBebe = 0;
    var index_row = 0;
    var btnReservHotel = "";

    if (id.substring(0, 16) == "btnOkReservHotel") {

        index_row = id.substring(16);

    } else if (id.substring(0, 17) == "btnAddReservHotel") {

        index_row = id.substring(17);

    }

    id_adlt = "#nbrAdultes" + index_row;
    id_child = "#nbrEnfants" + index_row;
    id_bebe = "#nbrBebes" + index_row;
    id_arrg = "#arrg" + index_row;

    nbrAdlt = $(id_adlt).val();
    nbrEnf = $(id_child).val();
    nbrBebe = $(id_bebe).val();
    index_tab_room = index_row;

    if (nbrAdlt == 0) {
        $("#Ad1").hide();
        $("#Ad2").hide();
        $("#Ad3").hide();
        $("#Ad4").hide();
        $("#Ad5").hide();
    }

    if (nbrAdlt == 1) {
        $("#Ad1").show();
        $("#Ad2").hide();
        $("#Ad3").hide();
        $("#Ad4").hide();
        $("#Ad5").hide();
    }

    if (nbrAdlt == 2) {
        $("#Ad1").show();
        $("#Ad2").show();
        $("#Ad3").hide();
        $("#Ad4").hide();
        $("#Ad5").hide();
    }

    if (nbrAdlt == 3) {
        $("#Ad1").show();
        $("#Ad2").show();
        $("#Ad3").show();
        $("#Ad4").hide();
        $("#Ad5").hide();
    }

    if (nbrAdlt == 4) {
        $("#Ad1").show();
        $("#Ad2").show();
        $("#Ad3").show();
        $("#Ad4").show();
        $("#Ad5").hide();
    }

    if (nbrAdlt == 5) {
        $("#Ad1").show();
        $("#Ad2").show();
        $("#Ad3").show();
        $("#Ad4").show();
        $("#Ad5").show();
    }

    if (nbrEnf == 0) {
        $("#enf1").hide();
        $("#enf2").hide();
        $("#enf3").hide();
        $("#enf4").hide();
        $("#enf5").hide();
    }

    if (nbrEnf == 1) {
        $("#enf1").show();
        $("#enf2").hide();
        $("#enf3").hide();
        $("#enf4").hide();
        $("#enf5").hide();
    }

    if (nbrEnf == 2) {
        $("#enf1").show();
        $("#enf2").show();
        $("#enf3").hide();
        $("#enf4").hide();
        $("#enf5").hide();
    }
    if (nbrEnf == 3) {
        $("#enf1").show();
        $("#enf2").show();
        $("#enf3").show();
        $("#enf4").hide();
        $("#enf5").hide();
    }
    if (nbrEnf == 4) {
        $("#enf1").show();
        $("#enf2").show();
        $("#enf3").show();
        $("#enf4").show();
        $("#enf5").hide();
    }
    if (nbrEnf == 5) {
        $("#enf1").show();
        $("#enf2").show();
        $("#enf3").show();
        $("#enf4").show();
        $("#enf5").show();
    }
    if (nbrBebe == 0) {
        $("#baby1").hide();
        $("#baby2").hide();
    }
    if (nbrBebe == 1) {
        $("#baby1").show();
        $("#baby2").hide();
    }
    if (nbrBebe == 2) {
        $("#baby1").show();
        $("#baby2").show();
    }

    //$('#modalReservRoom').modal({backdrop: 'static', keyboard: false})  
    /*var modal = document.getElementById('modalReservRoom');

    window.onclick = function(event) {
        if (event.target == modal) {
            console.log('window');
            modal.style.display = "none";
        }
    }*/

}


function editModelReservRoom(id) {

    openModelReservRoom(id);
    $("#msgErrorValidation").hide();
    $("#msgErrorAdlt").hide();
    $("#msgErrorEnf").hide();

    index_row = id.substring(16);
    id_adlt = "#nbrAdultes" + index_row;
    id_child = "#nbrEnfants" + index_row;
    id_bebe = "#nbrBebes" + index_row;

    nbrAdlt = $(id_adlt).val();
    nbrEnf = $(id_child).val();
    nbrBebe = $(id_bebe).val();
    index_tab_room = index_row;

    if (nbrAdlt == 1) {
        $("#ad1").val(chambre_reservation.ad1[index_tab_room]);
    }

    if (nbrAdlt == 2) {
        $("#ad1").val(chambre_reservation.ad1[index_tab_room]);
        $("#ad2").val(chambre_reservation.ad2[index_tab_room]);
    }

    if (nbrAdlt == 3) {
        $("#ad1").val(chambre_reservation.ad1[index_tab_room]);
        $("#ad2").val(chambre_reservation.ad2[index_tab_room]);
        $("#ad03").val(chambre_reservation.ad3[index_tab_room]);

    }

    if (nbrAdlt == 4) {
        $("#ad1").val(chambre_reservation.ad1[index_tab_room]);
        $("#ad2").val(chambre_reservation.ad2[index_tab_room]);
        $("#ad03").val(chambre_reservation.ad3[index_tab_room]);
        $("#ad04").val(chambre_reservation.ad4[index_tab_room]);
    }

    if (nbrAdlt == 5) {
        $("#ad1").val(chambre_reservation.ad1[index_tab_room]);
        $("#ad1").val(chambre_reservation.ad2[index_tab_room]);
        $("#ad03").val(chambre_reservation.ad3[index_tab_room]);
        $("#ad04").val(chambre_reservation.ad4[index_tab_room]);
        $("#ad05").val(chambre_reservation.ad5[index_tab_room]);
    }

    if (nbrEnf == 1) {
        $("#enfant1").val(chambre_reservation.enf1[index_tab_room]);
        $("#ageEnf1").val(chambre_reservation.enf1_age[index_tab_room]);

    }

    if (nbrEnf == 2) {
        $("#enfant1").val(chambre_reservation.enf1[index_tab_room]);
        $("#ageEnf1").val(chambre_reservation.enf1_age[index_tab_room]);
        $("#enfant2").val(chambre_reservation.enf2[index_tab_room]);
        $("#ageEnf2").val(chambre_reservation.enf2_age[index_tab_room]);

    }
    if (nbrEnf == 3) {
        $("#enfant1").val(chambre_reservation.enf1[index_tab_room]);
        $("#ageEnf1").val(chambre_reservation.enf1_age[index_tab_room]);
        $("#enfant2").val(chambre_reservation.enf2[index_tab_room]);
        $("#ageEnf2").val(chambre_reservation.enf2_age[index_tab_room]);
        $("#enfant3").val(chambre_reservation.enf3[index_tab_room]);
        $("#ageEnf3").val(chambre_reservation.enf3_age[index_tab_room]);

    }
    if (nbrEnf == 4) {
        $("#enfant1").val(chambre_reservation.enf1[index_tab_room]);
        $("#ageEnf1").val(chambre_reservation.enf1_age[index_tab_room]);
        $("#enfant2").val(chambre_reservation.enf2[index_tab_room]);
        $("#ageEnf2").val(chambre_reservation.enf2_age[index_tab_room]);
        $("#enfant3").val(chambre_reservation.enf3[index_tab_room]);
        $("#ageEnf3").val(chambre_reservation.enf3_age[index_tab_room]);
        $("#enfant4").val(chambre_reservation.enf4[index_tab_room]);
        $("#ageEnf4").val(chambre_reservation.enf4_age[index_tab_room]);

    }
    if (nbrEnf == 5) {
        $("#enfant1").val(chambre_reservation.enf1[index_tab_room]);
        $("#ageEnf1").val(chambre_reservation.enf1_age[index_tab_room]);
        $("#enfant2").val(chambre_reservation.enf2[index_tab_room]);
        $("#ageEnf2").val(chambre_reservation.enf2_age[index_tab_room]);
        $("#enfant3").val(chambre_reservation.enf3[index_tab_room]);
        $("#ageEnf3").val(chambre_reservation.enf3_age[index_tab_room]);
        $("#enfant4").val(chambre_reservation.enf4[index_tab_room]);
        $("#ageEnf4").val(chambre_reservation.enf4_age[index_tab_room]);
        $("#enfant5").val(chambre_reservation.enf5[index_tab_room]);
        $("#ageEnf5").val(chambre_reservation.enf5_age[index_tab_room]);

    }

    if (nbrBebe == 1) {
        $("#bebe1").val(chambre_reservation.bebe1[index_tab_room]);
    }
    if (nbrBebe == 2) {
        $("#bebe1").val(chambre_reservation.bebe1[index_tab_room]);
        $("#bebe2").val(chambre_reservation.bebe2[index_tab_room]);
    }
}