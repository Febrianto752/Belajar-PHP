const keyword = document.getElementsByClassName("keyword")[0];
const tableMhs = document.getElementsByClassName("tableMhs")[0];

keyword.addEventListener("keyup", function () {
  // let xhr = new XMLHttpRequest();
  // console.log(xhr);
  // xhr.onreadystatechange = function(){

  //   if(xhr.readyState == 4 && xhr.status == 200){
  //     tableMhs.innerHTML = xhr.responseText;
  //   }
  // }

  // xhr.open('GET','ajax/tableMhs.php?keyword=' + keyword.value, true);
  // xhr.send();

  // pakai fetch (ES6)
  fetch("ajax/tableMhs.php?keyword=" + keyword.value)
    .then((response) => response.text())
    .then((responseText) => console.log(responseText));
});
