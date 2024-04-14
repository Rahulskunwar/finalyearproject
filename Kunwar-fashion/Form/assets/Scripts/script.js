const byId = (id) => {
    return document.getElementById(id);
};
const $signUpButton = byId('signUp');
const $signInButton = byId('signIn');
const $container = byId('container');
const preloader = document.querySelector("[data-preaload]");

$signUpButton.addEventListener(
    'click',
    () => {
        $container.classList.add('right-panel-active');
    },
);

$signInButton.addEventListener(
    'click',
    () => {
        $container.classList.remove('right-panel-active');
    },
);

/**
 * PRELOAD
 * 
 * loading will be end after document is loaded
 */

window.addEventListener("load", function () {
    preloader.classList.add("loaded");
    document.body.classList.add("loaded");
});

/**
 * password hide
 * 
 * The password can be hide &unhide by clicking hide icon
 */

const pwShowHide = document.querySelectorAll(".pw_hide");

pwShowHide.forEach(icon => {
    icon.addEventListener("click", () => {
        let getPwInput = icon.parentElement.querySelector("input");
        if (getPwInput.type === "password") {
            getPwInput.type = "text";
            icon.classList.replace("uil-eye-slash", "uil-eye");
        } else {
            getPwInput.type = "password";
            icon.classList.replace("uil-eye", "uil-eye-slash");
        }
    });
});
