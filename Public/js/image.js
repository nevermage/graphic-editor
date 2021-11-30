
const previewImg = (event) => {
    if(event.target.files.length > 0){
        imgOutput.src = URL.createObjectURL(event.target.files[0]);
    }
}
const checkIfDecimalValue = (id, x) => {
    if (x.includes('.')) {
        let s = x.slice(x.indexOf('.') + 1, x.length)
        if (s.length > 2) {
            let num = parseFloat(x);
            let roundedString = num.toFixed(2);
            document.getElementById(id).value = roundedString;
        }
    } else {
        document.getElementById(id).value = x.replace("/^\\d+$/", "");
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
    const GetResponse = async (url) => {
        const response = await fetch(url, {
            method: "POST",
            body: formData,
        })
    }
    GetResponse('uploadImage');
}

const drawFigure = (type) => {
    let data;
    if (type == "Square") {
        data = {
            type : type,
            color: selectColor.value,
            x1 : kvad1x.value,
            y1 : kvad1y.value,
            squareLength : squareeLength.value,
        };
    }
    if (type == "Rectangle") {
        data = {
            type : type,
            color: selectColor.value,
            x1 : rect1x.value,
            y1 : rect1y.value,
            x2 : rect2x.value,
            y2 : rect2y.value,
            squareLength : squareeLength.value,
        };
    }
    if (type == "Parallelogram") {
        
        data = {
            type : type,
            color: selectColor.value,
            x1 : paral1x.value,
            y1 : paral1y.value,
            x2 : paral2x.value,
            y2 : paral2y.value,
            x3 : paral3x.value,
            y3 : paral3y.value,
            x4 : paral4x.value,
            y4 : paral4y.value,
        };
    }
    if (type == "Oval") {
        data = {
            type : type,
            color: selectColor.value,
            x1 : oval1x.value,
            y1 : oval1y.value,
            height : ovalH.value,
            width : ovalW.value,
        }
    }
    if (type == "Circle") {
        data = {
            type : type,
            color: selectColor.value,
            x1 : circle1x.value,
            y1 : circle1y.value,
            radius : circleRad.value,
        }
    }
    if (type == "Dot") {
        data = {
            type : type,
            color: selectColor.value,
            x1 : dotX.value,
            y1 : dotY.value,
        }
    }
    if (type == "Line") {
        data = {
            type : type,
            color: selectColor.value,
            x1 : line1x.value,
            y1 : line1y.value,
            x2 : line2x.value,
            y2 : line2y.value,
        }
    }
    if (type == "Triangle") {
        data = {
            type: type,
            color: selectColor.value,
            x1 : trian1x.value,
            y1 : trian1y.value,
            x2 : trian2x.value,
            y2 : trian2y.value,
            x3 : trian3x.value,
            y3 : trian3y.value,
        }
    }
    if (type == "Text") {
        data = {
            type: type,
            color: selectColor.value,
            x1 : text1x.value,
            y1 : text1y.value,
            text : figureText.value,
            font : fontSize.value,
        }
    }

    const GetResponse = async (url) => {
        const response = await fetch(url, {
            method: "POST",
            headers: {
                'Accept': 'application/json, text/plain, */*' ,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
        })
        const json =  await response.text();
        imgOutput.src = json + "?" + Math.random();
    }
    GetResponse('drawFigure');
}

const saveToDatabase = () => {
    let data = {
        author : authorName.value,
    };
    const GetResponse = async (url) => {
        const response = await fetch(url, {
            method: "POST",
            headers: {
                'Accept': 'application/json, text/plain, */*' ,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
        })
        // const json =  await response.json();
        // console.log(json);
    }
    GetResponse('saveToDatabase');
    window.location.href = "http://zxc.com/allFigures";
}