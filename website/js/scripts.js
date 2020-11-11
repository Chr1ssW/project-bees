function openNav()
{
    document.getElementById("sidebar").style.transform = "translateX(0px)";
}

function closeNav()
{
    document.getElementById("sidebar").style.transform = "translateX(-45vh)";

}

function openLogin()
{
    document.getElementById("login-container").style.display = "flex";
}

function closeLogin()
{
    document.getElementById("login-container").style.display = "none";
}