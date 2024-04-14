
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
const sizeCheckboxes = document.querySelectorAll('.size-options input[type="checkbox"]');

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
