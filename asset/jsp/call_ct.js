function keyPressed(valKeyPressed){

    if (valKeyPressed === "akukesurupan" && valKeyPressed.length >= 12) {
        callInfo();
        $("#idSearchBar").val("");
    }
}

function callInfo(){
    Swal.fire({
    title: "Izaac Reinhard Latuwael",
    text: "Developer for this application",
    imageUrl: "../../asset/image/DSC_0074.jpg",
    imageWidth: 400,
    imageHeight: 200,
    imageAlt: "Custom image"
    });
}
