'use strict';

// modal variables
// const modal = document.querySelector('[data-modal]');
// const modalCloseBtn = document.querySelector('[data-modal-close]');
// const modalCloseOverlay = document.querySelector('[data-modal-overlay]');

// // modal function
// const modalCloseFunc = function () { modal.classList.add('closed') }

// // modal eventListener
// modalCloseOverlay.addEventListener('click', modalCloseFunc);
// modalCloseBtn.addEventListener('click', modalCloseFunc);





// notification toast variables
// const notificationToast = document.querySelector('[data-toast]');
// const toastCloseBtn = document.querySelector('[data-toast-close]');

// // notification toast eventListener
// toastCloseBtn.addEventListener('click', function () {
//   notificationToast.classList.add('closed');
// });





// mobile menu variables
const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
const mobileMenu = document.querySelectorAll('[data-mobile-menu]');
const mobileMenuCloseBtn = document.querySelectorAll('[data-mobile-menu-close-btn]');
const overlay = document.querySelector('[data-overlay]');

for (let i = 0; i < mobileMenuOpenBtn.length; i++) {

  // mobile menu function
  const mobileMenuCloseFunc = function () {
    mobileMenu[i].classList.remove('active');
    overlay.classList.remove('active');
  }

  mobileMenuOpenBtn[i].addEventListener('click', function () {
    mobileMenu[i].classList.add('active');
    overlay.classList.add('active');
  });

  mobileMenuCloseBtn[i].addEventListener('click', mobileMenuCloseFunc);
  overlay.addEventListener('click', mobileMenuCloseFunc);

}





// accordion variables
const accordionBtn = document.querySelectorAll('[data-accordion-btn]');
const accordion = document.querySelectorAll('[data-accordion]');

for (let i = 0; i < accordionBtn.length; i++) {

  accordionBtn[i].addEventListener('click', function () {

    const clickedBtn = this.nextElementSibling.classList.contains('active');

    for (let i = 0; i < accordion.length; i++) {

      if (clickedBtn) break;

      if (accordion[i].classList.contains('active')) {

        accordion[i].classList.remove('active');
        accordionBtn[i].classList.remove('active');

      }

    }

    this.nextElementSibling.classList.toggle('active');
    this.classList.toggle('active');

  });

}

// let shoppingCart = document.querySelector('.shopping-cart');

// document.querySelector('#cart-btn').onclick = () =>
// {
//   shoppingCart.classList.toggle('active');
// }

let shoppingCart = document.querySelector('.shopping-cart');
let wishlistCart = document.querySelector('.wishlist-cart');
let cartBtn = document.querySelector('#cart-btn');
let wishlistbtn = document.querySelector('#wishlist-cart-btn');

// Function to activate shopping cart
function activateShoppingCart() {
  shoppingCart.classList.add('active');
}

// Function to activate wishlist cart
function activateWishlistCart() {
  wishlistCart.classList.add('active');
}

// Function to deactivate shopping cart
function deactivateShoppingCart() {
  shoppingCart.classList.remove('active');
}

// Function to deactivate wishlist cart
function deactivateWishlistCart() {
  wishlistCart.classList.remove('active');
}

// Event listener for mouse enter on cart button
cartBtn.addEventListener('mouseenter', activateShoppingCart);
wishlistbtn.addEventListener('mouseenter', activateWishlistCart);

// Event listener for mouse enter on shopping cart
shoppingCart.addEventListener('mouseenter', activateShoppingCart);

// Event listener for mouse enter on wishlist cart
wishlistCart.addEventListener('mouseenter', activateWishlistCart);

// Event listener for mouse leave on cart button and shopping cart
cartBtn.addEventListener('mouseleave', deactivateShoppingCart);
shoppingCart.addEventListener('mouseleave', deactivateShoppingCart);

// Event listener for mouse leave on cart button and wishlist cart
wishlistbtn.addEventListener('mouseleave', deactivateWishlistCart);
wishlistCart.addEventListener('mouseleave', deactivateWishlistCart);



