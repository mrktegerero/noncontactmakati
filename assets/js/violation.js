const currentLocation = location.href;
const menuItem = document.querySelectorAll('#link');
const menuLength = menuItem.length
    for (let i = 0; i<menuLength; i++){
        if(menuItem[i].href === currentLocation){
            menuItem[i].className = "menuActive"
        }
    }
    function getFile() {
        document.getElementById("upfile").click();
      }
      
      function sub(obj) {
        var file = obj.value;
        var fileName = file.split("\\");
        document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
        document.myForm.submit();
        event.preventDefault();
      }