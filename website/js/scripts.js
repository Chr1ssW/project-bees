function openNav()
{
    document.getElementById("sidebar").style.transform = "translateX(0px)";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav()
{
    document.getElementById("sidebar").style.transform = "translateX(-40vh)";
    document.getElementById("main").style.marginLeft = "0px";

}