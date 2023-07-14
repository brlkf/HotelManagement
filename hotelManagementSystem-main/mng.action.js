function openSideBar() {

    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("sidebar").style.opacity = "1";
    document.getElementById("main_content").style.marginLeft = "250px";
    document.getElementById("myForm").style.marginLeft = "150px";
}

function closeSideBar() {

   document.getElementById("sidebar").style.width = "0";
   document.getElementById("sidebar").style.opacity = "0";
   document.getElementById("main_content").style.marginLeft = "0";
   document.getElementById("myForm").style.marginLeft = "0";
}

function cancelnew(){
    document.getElementById("newLine").style.display = "none";
}
