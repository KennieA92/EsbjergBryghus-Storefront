document.getElementsByClassName("hamburger")[0].addEventListener("click", function () {
    document.getElementById("menu-btn").classList.toggle("open");
    document.getElementById("menu").classList.toggle("d-none");
    let img = document.getElementById('logoimg').src;
    if (img.indexOf('logohvid.png') != -1) {
        document.getElementById('logoimg').src = wpa_data.image_path + '/logoroed.png';
    }
    else {
        document.getElementById('logoimg').src = wpa_data.image_path + '/logohvid.png';
    }
});
