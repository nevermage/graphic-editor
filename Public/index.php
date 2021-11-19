<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new image</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/image.js"></script>
</head>
<body>
<div class="container" action="upload.php" method="post" enctype="multipart/form-data">
    <div class="imgSelector">
        <div class="imgContainer">
            <img id="imgOutput" src="" alt="">
        </div>
        <input id="imgLoader" name="zxc" type="file" onchange="previewImg(event)">
    </div>
    <div class="addFigures">
        <select id="selectFigure" onchange="figureForm()">
            <option value="1">квадрат</option>
            <option value="2">прямоугольник</option>
            <option value="3">параллелограмм</option>
            <option value="4">овал</option>
            <option value="5">окружность</option>
            <option value="6">точка</option>
            <option value="7">отрезок</option>
            <option value="8">треугольник</option>
            <option value="9">текст</option>
        </select>
        <div class="figureForm" id="figureForm1" style="display: block;">
            <p>точка 1</p>
            <input name="zxc2" type="number">
            <input type="number">
            <p>точка 2</p>
            <input type="number">
            <input type="number">
            <p>точка 3</p>
            <input type="number">
            <input type="number">
            <p>точка 4</p>
            <input type="number">
            <input type="number">
            <br>
            <button onclick="uploadImage()">load</button>
<!--            <input type="submit" value="Загрузить">-->
        </div>
        <div class="figureForm" id="figureForm2">
            <p>точка 1</p>
            <input type="number">
            <input type="number">
            <p>точка 2</p>
            <input type="number">
            <input type="number">
            <p>точка 3</p>
            <input type="number">
            <input type="number">
            <br>
<!--            <input type="submit" value="Загрузить">-->
        </div>

    </div>
</div>
</body>
</html>