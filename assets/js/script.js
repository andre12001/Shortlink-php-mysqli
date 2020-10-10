

  
  /*Informasi MyModal*/
  if (sessionStorage.getItem("story") !== 'true') {
      sessionStorage.setItem("story", "true");
      $("#myModal").modal();
  }
  /*End Informasi MyModal*/


  /*Tombol Copy*/
function copy_text() {
document.getElementById("pilih").select();
document.execCommand("copy");
alert("Url Berhasil disalin");
}

/*End Tombol Copy*/
