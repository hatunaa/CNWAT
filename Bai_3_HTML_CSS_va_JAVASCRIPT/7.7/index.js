sel_ = null;
function avoid(r) {
    if (sel_ != null) {
        sel_.className = "portalModTd";
    }
    sel_ = r;
    sel_.className = "portalModTdSelected";
    document.getElementById("content").innerHTML = sel_.innerHTML;
}

function tdMouseOver(r) {
    if (r != sel_) {
        r.className = "portalModTdHover";
    }
}

function tdMouseOut(r) {
    if (r != sel_) {
        r.className = "portalModTd";
    }
}