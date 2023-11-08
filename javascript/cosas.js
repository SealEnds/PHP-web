window.onload = () => {

    const base_url = 'http://localhost/Station/';

    var displayMenuController = 0;
    function displayMenu() {
        let drop_menu = document.getElementById('display-menu-style');
        if (displayMenuController == 0) {
            drop_menu.href = `${base_url}assets/css/showmenu.css`;
            displayMenuController = 1;
        } else if (displayMenuController == 1) {
            drop_menu.href = `${base_url}assets/css/hidemenu.css`;
            displayMenuController = 0;
        }
    }

    var x = 0;
    function moveLeft() {
        let menu_3 = document.getElementById('menu-3');
        if (x < 0) {
            x += 1131;
        }
        menu_3.style = "margin-left:" + x + "px;";
    }

    function moveRight() {
        console.log('move right');
        let menu_3 = document.getElementById('menu-3');
        if (x > -3000) {
            x -= 1131;
        }
        menu_3.style = "margin-left:" + x + "px;";
    }


    /* Slider de imágnes versión cutre ------------------------------------------------------------------------------------------- */
    var img_slider = document.getElementById('img-slider');
    var slider_button_1 = document.getElementById('slider1');
    var slider_button_2 = document.getElementById('slider2');
    var slider_button_3 = document.getElementById('slider3');
    var img_src = `${base_url}assets/resources/img/`;

    var animation_css = document.getElementById('animation-css');

    function slider1() {
        slider_button_1.style = "background-color: #13AFF0;";
        slider_button_2.style = "background-color: white;";
        slider_button_3.style = "background-color: white;";
        img_slider.src = img_src + "z.png";
        img_slider.style = "opacity: 0;";
        fadeIn();
        slider_count = 1;
    }
    function slider2() {
        slider_button_2.style = "background-color: #13AFF0;";
        slider_button_1.style = "background-color: white;";
        slider_button_3.style = "background-color: white;";
        img_slider.src = img_src + "ice.jpg";
        img_slider.style = "opacity: 0;";
        fadeIn();
        slider_count = 2;
    }
    function slider3() {
        slider_button_3.style = "background-color: #13AFF0;";
        slider_button_1.style = "background-color: white;";
        slider_button_2.style = "background-color: white;";
        img_slider.src = img_src + "space.jpg";
        img_slider.style = "opacity: 0;";
        fadeIn();
        slider_count = 3;
    }
    function fadeIn() {
        setTimeout(() => {
            img_slider.style = "opacity: 0.2;";
        }, 200)
        setTimeout(() => {
            img_slider.style = "opacity: 0.4;";
        }, 300)
        setTimeout(() => {
            img_slider.style = "opacity: 0.6;";
        }, 400)
        setTimeout(() => {
            img_slider.style = "opacity: 0.8;";
        }, 500)
        setTimeout(() => {
            img_slider.style = "opacity: 1;";
        }, 600)
    }

    /* Cambiar imagen cada 5 segundos ------------------------------------------- */
    function countTime() {
        let date = new Date();
        let s = date.getSeconds();
        let counter = document.getElementById('counter');
        counter.value = s;
        counter.addEventListener("change", timeChange());

        setTimeout("countTime()", 1000)
    }
    var count = 0;
    var slider_count = 1;

    /* Checkbox to lock slider */
    var lc = document.getElementById('lock-checkbox');
    var check = "false";
    lc.addEventListener("click", () => {
        console.log('click');
        check = lc.checked.toString();
        console.log(check);
    });
    var stop = false;

    function timeChange() {
        count += 1;
        if (count == 4) {
            animation_css.href = `${base_url}assets/css/fade_out.css`;
        }
        if (count == 5) {
            count = 0;
            console.log(typeof (check), check);
            if (check == 'true') {
                console.log('bloqueado');
            } else if (check == 'false') {
                console.log('moviendose');
                if (slider_count == 1) {
                    slider2();
                } else if (slider_count == 2) {
                    slider3();
                } else if (slider_count == 3) {
                    slider1();
                }
            }
        }

    }

    /* ---------------------------------------------------------------------------------------------------------- */

    /* Main Images Height = Width */
    /*
    var images = document.querySelectorAll(".image");
    for(let i = 0; i < images.length; i++ ){
        images[i].innerHTML = "Imagen";
        images[i].style = "color: white;";
    }
    */
}



