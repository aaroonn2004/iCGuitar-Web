let open = false;

function openMenu() {
  const header = document.getElementsByTagName("header")[0];
  const headerNav = document.getElementsByClassName("header_nav")[0];
  if (!open) {
    header.style.height = "15em";
    setTimeout(() => {
      headerNav.style.display = "flex";
      headerNav.style.opacity = 1;
    }, 300);
    open = true;
  } else {
    header.style.height = "2.8em";
    headerNav.style.opacity = "0";
    setTimeout(() => {
      headerNav.style.display = "none";
    }, 300);
    open = false;
  }
}