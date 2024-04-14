const chart = document.querySelector("#chart").getContext('2d');

// create a new chart instace
new Chart(chart, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], 

        datasets: [
            {
                label: 'Sales',
                data: [2937, 3353, 4963, 5909, 5782, 3668, 3357, 3997, 4884, 4811, 6100, 6000],
                borderColor: 'red',
                borderWidth: 2
            },

            {
                label: 'Customer',
                data: [2137, 2483, 2283, 2694, 3028, 2849, 3518, 3749, 3947, 3591, 4102, 3829],
                borderColor: 'blue',
                borderWidth: 2

            }
        ]
    },
    options: {
        responsive: true
    }
})


//show or hide sidebar

const menuBtn = document.querySelector('#menu-btn');
const closeBtn = document.querySelector('#close-btn');
const sidebar = document.querySelector('aside');

menuBtn.addEventListener('click', () => {
    sidebar.style.display = 'block';
})

closeBtn.addEventListener('click', () => {
    sidebar.style.display = 'none';
})


// change theme

document.addEventListener("DOMContentLoaded", function() {
    const themeBtn = document.querySelector('.theme-btn');
    
    // Add dark-theme class to body by default
    document.body.classList.add('dark-theme');
    
    themeBtn.addEventListener('click', () =>{
        document.body.classList.toggle('dark-theme');
        themeBtn.querySelector('span.first-child').classList.toggle('active');
        themeBtn.querySelector('span.last-child').classList.toggle('active');
    });
});

//  sidebar drop down

document.addEventListener("DOMContentLoaded", function() {
    const catalogDropdownBtn = document.querySelector('.dropdown-btn');
    const productDropdown = document.querySelector('.dropdown-content');
    const arrowIcon = document.querySelector('.arrow');

    catalogDropdownBtn.addEventListener('click', function() {
        productDropdown.classList.toggle('active');
        arrowIcon.classList.toggle('rotate');
    });
});

