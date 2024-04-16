
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

// const themeBtn = document.querySelector('.theme-btn');

// themeBtn.addEventListener('click', () =>{
//     document.body.classList.toggle('dark-theme');

//     themeBtn.querySelector('span.first-child').classList.toggle('active');
//     themeBtn.querySelector('span.last-child').classList.toggle('active');
    
// })


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


// Pagination Code

document.addEventListener("DOMContentLoaded", function() {
    const table = document.getElementById('productTable');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const pageButtonsContainer = document.getElementById('pageButtons');
    const currentPageSpan = document.getElementById('currentPage');
    const displayInfoSpan = document.getElementById('displayInfo');
    const rowsPerPageSelect = document.getElementById('rowsPerPageSelect');

    let currentPage = 0;
    let rowsPerPage = 10;

    // Function to show rows for the current page
    function showPage(page) {
        const rows = table.getElementsByTagName('tr');
        const startIndex = page * rowsPerPage;
        const endIndex = Math.min(startIndex + rowsPerPage, rows.length);

        for (let i = 0; i < rows.length; i++) {
            if (i >= startIndex && i < endIndex) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }

        // Update current page display
        currentPageSpan.textContent = ` ${page + 1}`;

        // Update display info
        const totalRows = rows.length; // Subtract 1 for the table header
        const startEntry = startIndex + 1;
        const endEntry = endIndex;
        displayInfoSpan.textContent = `Displaying ${startEntry} to ${endEntry} of ${totalRows} entries`;
    }

    // Function to generate page buttons
    function generatePageButtons(totalPages) {
        pageButtonsContainer.innerHTML = ''; // Clear existing buttons

        for (let i = 0; i < totalPages; i++) {
            const pageBtn = document.createElement('button');
            pageBtn.classList.add('btn1');
            pageBtn.textContent = i + 1;
            pageBtn.addEventListener('click', function() {
                currentPage = i;
                showPage(currentPage);
            });
            pageButtonsContainer.appendChild(pageBtn);
        }
    }

    // Event listeners for prev/next buttons
    prevBtn.addEventListener('click', function() {
        if (currentPage > 0) {
            currentPage--;
            showPage(currentPage);
        }
    });

    nextBtn.addEventListener('click', function() {
        const totalPages = Math.ceil((table.rows.length - 1) / rowsPerPage); // Subtract 1 for the table header
        if (currentPage < totalPages - 1) {
            currentPage++;
            showPage(currentPage);
        }
    });

    // Event listener for rows per page select
    rowsPerPageSelect.addEventListener('change', function() {
        if (this.value === 'all') {
            rowsPerPage = table.rows.length; // Subtract 1 for the table header
        } else {
            rowsPerPage = parseInt(this.value);
        }
        showPage(currentPage);
    });

    // Initially show the first page
    showPage(currentPage);
});

// search engine


document.addEventListener("DOMContentLoaded", function() {
    const table = document.getElementById('productTable');
    const searchInput = document.getElementById('searchInput');

    // Function to perform search
    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase();
        const rows = table.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName('td');
            let found = false;

            for (let j = 0; j < cells.length; j++) {
                const cellText = cells[j].textContent.toLowerCase();
                if (cellText.indexOf(searchTerm) > -1) {
                    found = true;
                    break;
                }
            }

            if (found) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }

    // Event listener for search input
    searchInput.addEventListener('input', performSearch);
});