function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

idCookie = getCookie('id');
console.log(idCookie);




if (idCookie == "admin"){
    document.getElementById('stylesheet').href="../css/styleAdmin.css";
} else {
    document.getElementById('stylesheet').href="../css/styleUser.css";
}
