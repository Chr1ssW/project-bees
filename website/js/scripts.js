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

function openSignup()
{
    document.getElementById("signup-container").style.display = "flex";
}

function closeSignup()
{
    document.getElementById("signup-container").style.display = "none";
}

function openAddHive()
{
    document.getElementById("addHive-container").style.display = "flex";
}

function closeAddHive()
{
    document.getElementById("addHive-container").style.display = "none";
}

function openUsernameChange()
{
    document.getElementById("username-container").style.display = "flex";
}

function closeUsernameChange()
{
    document.getElementById("username-container").style.display = "none";
}

function openEmailChange()
{
    document.getElementById("email-container").style.display = "flex";
}

function closeEmailChange()
{
    document.getElementById("email-container").style.display = "none";
}

function openPasswordChange()
{
    document.getElementById("password-container").style.display = "flex";
}

function closePasswordChange()
{
    document.getElementById("password-container").style.display = "none";
}

function openEditHive(beehiveId)
{
    document.getElementById("edit-container").style.display = "flex";
    document.getElementById("beehive-id").innerHTML = beehiveId;
    document.getElementById("beehive-id").value = beehiveId;
    document.getElementById("beehive-id").style.display = "none";
}

function closeEditHive()
{
    document.getElementById("edit-container").style.display = "none";
}

function openSetup()
{
    document.getElementById("settings-container").style.display = "flex";
}

function closeSetup()
{
    document.getElementById("settings-container").style.display = "none";
}