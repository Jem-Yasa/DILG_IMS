function toggleSidebar() {
    let sidebar = document.getElementById("sidebar");
    let content = document.querySelector(".content");
    
    sidebar.classList.toggle("hidden");
    content.classList.toggle("shifted");
}
