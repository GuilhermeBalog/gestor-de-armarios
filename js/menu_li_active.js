function convert_title(str)
{
    str = str.replace("Gestor de Armários | ", "").toLowerCase();
    str = str.split(" ");
    str = str.join("_");
    return "li_"+str;
}

document.getElementById(convert_title(document.title)).setAttribute("class", "active");