// Collapsable button handler

let isCollapsed = false;

const collapse = document.querySelector(".arrow-container");
collapse.classList.add('up');
collapse.addEventListener("click", e => {
    const profileContainer = document.getElementById("profile-container");
    if (isCollapsed == false) {
        isCollapsed = true;
        collapse.children.item(0).setAttribute("class", "fas fa-chevron-down");
        collapse.classList.remove('up');
        collapse.classList.add('down');
        profileContainer.classList.remove('show');
        profileContainer.classList.add('hide');

        // Execute hide after transition
        setTimeout(function(){ profileContainer.setAttribute("style", "display: none"); }, 500);
    } else {
        isCollapsed = false;
        collapse.children.item(0).setAttribute("class", "fas fa-chevron-up");
        collapse.classList.remove('down');
        collapse.classList.add('up');
        profileContainer.classList.remove('hide');
        profileContainer.classList.add('show');

        // Execute show after transition
        setTimeout(function(){ profileContainer.setAttribute("style", "display: block"); }, 500);
    }
});

const content = document.querySelector("textarea");
const counter = document.getElementById("content-count");
const postBtn = document.getElementById("post-button-act");

// Make post button initially disabled
postBtn.disabled = true;
postBtn.setAttribute("style", "background-color: rgb(220, 220, 220)");

// Check length of textarea while typing
content.addEventListener("keyup", e => {
    counter.textContent = `(${content.value.length}, 255)`;
    if (content.value.length > 255 || content.value.length < 5) {
        postBtn.disabled = true;
        postBtn.setAttribute("style", "background-color: rgb(220, 220, 220)");
    }
    else {
        postBtn.disabled = false;
        postBtn.setAttribute("style", "background-color: #F0BC5E");
    }
});