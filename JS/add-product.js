
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


//  UPLOAD IMAGE

$(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            
            $('#largePreview').html(''); // Clear large preview
            
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<br/><span class=\"remove\">remove</span>" +
                        "</span>").insertAfter("#files");
                    $(".remove").click(function() {
                        $(this).parent(".pip").remove();
                        updateLargePreview(); // Update large preview after image is removed
                    });
                });
                fileReader.readAsDataURL(f);
            }
            
            // Show the first image in the larger preview
            if (filesLength > 0) {
                var firstImageSrc = URL.createObjectURL(files[0]);
                $('#largePreview').html('<img class="largeImage" src="' + firstImageSrc + '">');
            }
        });
        
        // Show large preview inside the section
        function updateLargePreview() {
            var activeImage = $('.imageThumb.active');
            if (activeImage.length > 0) {
                var largeImgSrc = activeImage.attr('src');
                $('#largePreview').html('<img class="largeImage" src="' + largeImgSrc + '">');
            } else {
                $('#largePreview').html(''); // Clear the large preview if no images are left
            }
        }
        
        $(document).on('click', '.imageThumb', function(){
            $('.imageThumb').removeClass('active');
            $(this).addClass('active');
            updateLargePreview();
        });
    } else {
        alert("Your browser doesn't support to File API")
    }
});


// Get all checkboxes for sizes
const sizeCheckboxes = document.querySelectorAll('.gender-options input[type="checkbox"]');

// Add event listener to each checkbox
sizeCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        // Toggle class to change background color when checkbox is checked
        if (this.checked) {
            this.nextElementSibling.classList.add('checked');
        } else {
            this.nextElementSibling.classList.remove('checked');
        }
    });
});


// document.addEventListener('DOMContentLoaded', function () {
//     const addOptionBtn = document.getElementById('addOptionBtn');
//     const optionsContainer = document.getElementById('optionsContainer');

//     addOptionBtn.addEventListener('click', function () {
//         const optionContainer = document.createElement('div');
//         optionContainer.classList.add('option-container');

//         const optionInput = document.createElement('input');
//         optionInput.type = 'text';
//         optionInput.placeholder = 'Option';
//         optionInput.name = 'option[]';

//         const valueInput = document.createElement('input');
//         valueInput.type = 'text';
//         valueInput.placeholder = 'Value';
//         valueInput.name = 'value[]';

//         const deleteBtn = document.createElement('button');
//         deleteBtn.type = 'button';
//         deleteBtn.textContent = 'Delete';
//         deleteBtn.classList.add('delete-option-btn');
//         deleteBtn.addEventListener('click', function () {
//             optionContainer.remove();
//         });

//         valueInput.addEventListener('keydown', function (event) {
//             if (event.key === ' ' && valueInput.value.trim() !== '') {
//                 createTag(valueInput.value.trim());
//                 valueInput.value = '';
//                 event.preventDefault(); // Prevent default space behavior
//             }
//         });

//         function createTag(value) {
//             const tag = document.createElement('span');
//             tag.classList.add('tag');
//             tag.textContent = value;
//             optionContainer.insertBefore(tag, valueInput);
//         }

//         optionContainer.appendChild(optionInput);
//         optionContainer.appendChild(valueInput);
//         optionContainer.appendChild(deleteBtn);

//         optionsContainer.appendChild(optionContainer);
//     });
// });













const ul = document.querySelector(".protag .content ul"),
    input = document.querySelector(".protag .content input"),
    tagNumb = document.querySelector(".protag .details span");

let maxTags = 10,
    tags = [];

countTags();

function countTags(){
    tagNumb.innerText = maxTags - tags.length;
}

function createTag(tag){
    const liTag = `<li>${tag} <i class="uit uit-multiply" onclick="removeTag(this)"></i></li>`;
    ul.insertAdjacentHTML("beforeend", liTag);
}

function removeTag(element){
    const tag = element.parentElement.textContent.trim();
    tags = tags.filter(t => t !== tag);
    element.parentElement.remove();
    countTags();
}

function addTag(e){
    if(e.key === "Enter" || e.key === ","){
        const tag = e.target.value.trim();
        if(tag && !tags.includes(tag) && tags.length < maxTags){
            tags.push(tag);
            createTag(tag);
            countTags();
        }
        e.target.value = "";
    }
}

input.addEventListener("keyup", addTag);


// ===========================================================================================

var counter = 1;

function add_more() {
    counter++;
    var newDiv = `<div id="product_row${counter}" class="row">
                    <div class="col-md-7">
                        <label for="options${counter}">Option</label>
                        <select id="options${counter}" class="options-dropdown" onchange="toggleCustomInput(${counter})">
                            <option value="" disabled selected hidden>Options</option>
                            <option value="shoes">Shoes</option>
                            <option value="bag">Bags</option>
                            <option value="watch">Watch</option>
                            <option value="custom">New</option>
                        </select>
                        <input id="customOption${counter}" type="text" placeholder="Enter new option" class="custom-option-input">
                    </div>
                    <div class="col-md-4">
                        <label for="values${counter}">Values</label>
                        <input id="values${counter}" type="text" onkeypress="addValue(event, this)" class="highlightable" placeholder="Enter Values">
                        <div id="tagContainer${counter}"></div>
                    </div>
                    <div class="col-md-1">
                        <button onclick="delete_row('${counter}')" type="button" class="delete-button">Delete</button>
                    </div>
                </div>`;
    var form = document.getElementById('input-form');
    form.insertAdjacentHTML('beforeend', newDiv);
}

function delete_row(id) {
    document.getElementById('product_row' + id).remove();
}

function toggleCustomInput(counter) {
    var selectedOption = document.getElementById(`options${counter}`).value;
    var customOptionInput = document.getElementById(`customOption${counter}`);
    if (selectedOption === 'custom') {
        customOptionInput.style.display = 'inline-block';
    } else {
        customOptionInput.style.display = 'none';
    }
}

function addValue(event, input) {
if (event.key === ' ' && input.value.trim() !== '') {
var tagContainer = input.nextElementSibling;
var tag = document.createElement('span');
tag.className = 'tag';
tag.textContent = input.value.trim();

// Add remove icon
var removeIcon = document.createElement('i');
removeIcon.className = 'material-icons remove-icon';
removeIcon.textContent = 'clear';
removeIcon.onclick = function() {
    tag.remove();
};
tag.appendChild(removeIcon);

tagContainer.appendChild(tag);
input.value = '';
event.preventDefault(); // Prevent default space behavior
}
}