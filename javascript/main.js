
window.onload = () => {

    const base_url = 'http://localhost/Station/';

    function get(id) {
        return document.getElementById(id);
    }

    function getAll(classname) {
        return document.querySelectorAll('.' + classname);
    }

    /* Gestionar ventana de registro y login */
    let register_button = get('register-button');
    if (register_button != null) {
        register_button.addEventListener('click', (e) => {
            e.preventDefault();
            window.location.href = `${base_url}user/register`;
        });
    }
    if (window.location.href == `${base_url}user/register`) {
        let register_main = get('register-main');
        register_main.onclick = (click) => {
            if (click['target']['id'] == 'register-main' || click['target']['id'] == 'close-register-window') {
                window.location.href = `${base_url}user/index`;
            }
        }
    }
    let login_button = get('login-button');
    if (register_button != null) {
        login_button.addEventListener('click', (e) => {
            e.preventDefault();
            window.location.href = `${base_url}user/login`;
        });
    }
    if (window.location.href == `${base_url}user/login`) {
        let register_main = get('login-main');
        register_main.onclick = (click) => {
            if (click['target']['id'] == 'login-main' || click['target']['id'] == 'close-login-window') {
                window.location.href = `${base_url}user/index`;
            }
        }
    }

    /* Password hidden or visible in form */
    let passwords_visibility = getAll('password-visibility');
    passwords_visibility.forEach(element => {
        element.addEventListener('click', () => {
            let password = get('password');
            if (password.type == 'password') {
                password.type = 'text';
                element.innerHTML = 'Visible';
            } else if (password.type == 'text') {
                password.type = 'password';
                element.innerHTML = 'Hidden';
            }
            console.log(element.type);
        });
    });


    //}

    /* SLIDERS */


    var displayMenuController = 0;
    function displayMenu() {
        let drop_menu = get('display-menu-style');
        if (displayMenuController == 0) {
            drop_menu.href = `${base_url}assets/css/showmenu.css`;
            displayMenuController = 1;
        } else if (displayMenuController == 1) {
            drop_menu.href = `${base_url}assets/css/hidemenu.css`;
            displayMenuController = 0;
        }
    }

    var x = 0;
    let move_left = get('move-left');
    if (move_left != null) {
        move_left.addEventListener('click', () => {
            let menu_3 = get('menu-3');
            if (x < 0) {
                x += 1131;
            }
            menu_3.style = "margin-left:" + x + "px;";
        });
    }
    let move_right = get('move-right');
    if (move_right != null) {
        move_right.addEventListener('click', () => {
            let menu_3 = get('menu-3');
            x -= 1131;

            menu_3.style = "margin-left:" + x + "px;";
        });
    }

    /* Slider de imágnes ------------------------------------------------------------------------------------------------ */
    var img_slider = get('img-slider');
    if(img_slider != null){
        var img_button = getAll('slider-button');
        var img_src = `${base_url}assets/resources/img/`;
        var img_array = ['z.png', 'ice.jpg', 'space.jpg'];
        var animation_css = get('animation-css');
        let slider_opacity = 0;
        let speed = 50;
        let actual_slider_position = 0;
        let lock_slider = false;
        let count_time;
        let count_time_after_click;

        // console.log(img_button);
        img_button.forEach(element => {
            element.addEventListener('click', () => {
                // console.log(element);
                clearTimeout(count_time);
                clearTimeout(count_time_after_click);
                count_time_after_click = setTimeout(countTime, 3000);

                slider_opacity = 0;
                slider(element);
            });
        });

        function slider(slide) {
            img_button.forEach((element, index) => {
                if (element == slide) {
                    console.log(actual_slider_position);
                    actual_slider_position = index;
                    element.style = "background-color: #13AFF0;";
                    img_slider.src = img_src + img_array[index];
                } else {
                    element.style = "background-color: white;";
                }
            });

            img_slider.style = "opacity: 0;";
            fadeIn();
        }

        function fadeIn() {

            setTimeout(() => {
                slider_opacity += 0.05;
                speed -= 2;
                img_slider.style = `opacity: ${slider_opacity};`;
                if (slider_opacity <= 1) {
                    fadeIn();
                } else {
                    slider_opacity = 0;
                }
            }, speed)
        }

        /* Cambiar imagen cada 5 segundos --------------------- */
        function countTime() {
            console.log(lock_slider, typeof(lock_slider));
            if (lock_slider == false) {
                if (actual_slider_position < img_button.length - 1) {
                    actual_slider_position++;
                } else {
                    actual_slider_position = 0;
                }
                slider(img_button[actual_slider_position]);
                img_slider.style.opacity = 0;
            }
            count_time = setTimeout(countTime, 3000);

        }
        setTimeout(countTime, 3000);


        /* Checkbox to lock slider */
        var lc = get('lock-checkbox');
        if (lc != null) {
            lc.addEventListener("input", () => {
                lock_slider = lc.checked;
            });
        }
    }

    /* -- Edit account info, MY ACCOUNT UPDATE, account.php --------------------------------------------------------------------- */
    let edit_displayed = false;
    function displayHidden(display_span, display_main_div, display_open_div, diplayed_boolean) {
        let display_span_controller = get(display_span);
        let open_display_div = get(display_open_div);
        let display_div = get(display_main_div);
        if (diplayed_boolean == false) {
            display_div.setAttribute('class', 'display-flex');
            open_display_div.setAttribute('class', 'display-controller radius-open');
            display_span_controller.innerHTML = '-';
            edit_displayed = true;
        } else if (diplayed_boolean == true) {
            display_div.setAttribute('class', 'display-none');
            open_display_div.setAttribute('class', 'display-controller radius-close');
            display_span_controller.innerHTML = '+';
            edit_displayed = false;
        }
    }
    let displays = getAll('display-controller');
    if (displays != null) {
        displays.forEach(element => {
            element.addEventListener('click', (e) => {
                e.preventDefault();
                let title = element.id;
                displayHidden(title + '-span', title + '-displayed', title, edit_displayed);
            });
        });
    }


    /* Display title when hover over image in main page ---------------------------------------------------*/
    var images_main_page = getAll("image");
    var display_titles = getAll("display-title");
    display_titles.forEach(element => {
        element.setAttribute('class', 'display-title display-none');
    });
    images_main_page.forEach((element, index) => {
        if (display_titles[index]) {
            element.addEventListener('mouseover', () => {
                display_titles[index].setAttribute('class', 'display-title display-block');
                // display_titles[index].setAttribute('class', 'display-block');
            });
            element.addEventListener('mouseleave', () => {
                display_titles[index].setAttribute('class', 'display-title display-none');
                // display_titles[index].setAttribute('class', 'display-hidden');
            });
        }

    });


    /* Ampliar imagen al hacer clic en pantalla de detalle ------------------------------------------------------------------------------------- */
    let image_expand = getAll('image-expand');
    if (image_expand != null) {
        let expand = true;
        image_expand.forEach(element => {
            element.addEventListener('click', () => {
                
                if(expand == true) { 
                    element.setAttribute('class', 'image-expand image-expanded');
                    expand = false;
                    console.log("click");
                } else if(expand == false) {
                    element.setAttribute('class', 'image-expand');
                    expand = true;
                }
            });
        });
        
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

