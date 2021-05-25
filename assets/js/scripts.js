var sideBarIsOpen = true;

toggleBtn.addEventListener( 'click', (event) => {
    event.preventDefault();

    if(sideBarIsOpen){
        dashboard_sidebar.style.width = '10%';
        dashboard_sidebar.style.transition = "0.5s all"
        dashboard_content_container.style.width = '90%';
        dashboard_content_container.style.marginLeft = '17.5rem';
        dashboard_content_container.style.transition = "0.5s all";
        dashboard_logo.style.fontSize = '40px';
        userImage.style.width = '50px';
    
        menuIcons = document.getElementsByClassName('menuText');
        for(var i=0; i < menuIcons.length;i++){
            menuIcons[i].style.display = 'none';
        }
    
        document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'center';
        sideBarIsOpen = false;
    } else {
        dashboard_sidebar.style.width = '20%';
        dashboard_sidebar.style.transition = "0.5s all"
        dashboard_content_container.style.width = '80%';
        dashboard_logo.style.fontSize = '80px';
        dashboard_content_container.style.marginLeft = '35rem';
        userImage.style.width = '80px';
    
        menuIcons = document.getElementsByClassName('menuText');
        for(var i=0; i < menuIcons.length;i++){
            menuIcons[i].style.display = 'inline-block';
        }
    
        document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'left';
        sideBarIsOpen = true;
    }
  
   
});

const currentLocation = location.href;
const menuItem = document.querySelectorAll('#link');
const menuLength = menuItem.length
    for (let i = 0; i<menuLength; i++){
        if(menuItem[i].href === currentLocation){
            menuItem[i].className = "menuActive"
        }
    }

