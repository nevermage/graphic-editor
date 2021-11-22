
const previewImg = (event) => {
    if(event.target.files.length > 0){
        imgOutput.src = URL.createObjectURL(event.target.files[0]);
        // l = imgLoader.value;
        // l.split('\\').pop;
        // console.log(l);
    }
}

const hideOtherForms = (e) => {
    for (let i = 1; i < 10; ++i) {
        if (i != e) {
            let form = "figureForm" + i;
            document.getElementById(form).style.display = "none";
        }
    }
}
const figureForm = () => {
    let form = "figureForm" + selectFigure.value;
    document.getElementById(form).style.display = "block";
    hideOtherForms(selectFigure.value);
}

const uploadImage = () =>{
    let blobFile = imgLoader.files[0];
    let formData = new FormData();
    formData.append("fileToUpload", blobFile);

    $.ajax({
        url: "upload.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {},
        error: function(jqXHR, textStatus, errorMessage) {
            console.log(errorMessage);
        }
    });
}