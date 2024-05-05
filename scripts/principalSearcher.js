
function principalSearcher() {
  let community = document.formData.community.value;
  console.log(community);
  let consultaBuscador = "community=" + community;

  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    
    if (this.readyState == 4 && this.status == 200) {
      let provinceSelect = document.getElementById("provinces");
      // limpiar opciones para agregar nuevas:
      provinceSelect.innerHTML = "";
      provinceSelect.innerHTML = this.responseText;
    }
  };
  xmlhttp.open("POST", "/proyecto_scrapeo/db/db_select_places_per_province.php", true);
  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send(consultaBuscador);
}
