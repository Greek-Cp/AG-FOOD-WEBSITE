
$("#tableMenu li").click(function () {
    var selText = $(this).text();
    document.getElementById("btnKategoryMenu").innerHTML = selText; // $("#tableButton").text(selText); //Using Jquery 
    $("#id_tmp_name").val(selText); // $("#tableButton").text(selText); //Using Jquery 
  });

let uploadButon = document.getElementById("formFile");
let choosenImage = document.getElementById("chosen-image");
let fileName = document.getElementById("file-name");

uploadButon.onchange = () =>{
    let reader = new FileReader();
    reader.readAsDataURL(uploadButon.files[0]);
    reader.onload = () => {
        choosenImage.setAttribute("src",reader.result);
    }
}