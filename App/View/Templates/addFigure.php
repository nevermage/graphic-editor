<div class="container">
    <div class="imgSelector">
        <div class="imgContainer">
            <img id="imgOutput" src="" alt="">
        </div>
        <input id="imgLoader" name="inputImg"
               type="file" onchange="previewImg(event); uploadImage()"
               accept="image/png, image/jpeg">
    </div>
    <div class="rightBox">
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
            <select id="selectColor">
                <option value="red">красный</option>
                <option value="white">белый</option>
                <option value="black">черный</option>
                <option value="blue">синий</option>
                <option value="green">зеленый</option>
                <option value="yellow">желтый</option>
            </select>
            <div class="figureForm" id="figureForm1" style="display: block;">
                <p>начальная точка</p>
                <input id="kvad1x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="kvad1y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>длина стороны</p>
                <input id="squareeLength" type="number" min="1"
                       oninput="this.value=this.value.replace('/^\d+$/','');">
                <br>
                <button onclick="drawFigure('Square')">нарисовать фигуру</button>
                <button onclick="fetchTest()">тест</button>
            </div>
            <div class="figureForm" id="figureForm2">
                <p>точка 1</p>
                <input id="rect1x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="rect1y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>точка 2</p>
                <input id="rect2x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="rect2y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <br>
                <button onclick="drawFigure('Rectangle')">нарисовать фигуру</button>
            </div>
            <div class="figureForm" id="figureForm3">
                <p>точка 1</p>
                <input id="paral1x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="paral1y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>точка 2</p>
                <input id="paral2x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="paral2y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>точка 3</p>
                <input id="paral3x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="paral3y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>точка 4</p>
                <input id="paral4x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="paral4y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <br>
                <button onclick="drawFigure('Parallelogram')">нарисовать фигуру</button>
            </div>
            <div class="figureForm" id="figureForm4">
                <p>центр фигуры</p>
                <input id="oval1x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="oval1y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>высота</p>
                <input id="ovalH" type="number" min="1"
                       oninput="this.value=this.value.replace('/^\d+$/','');">
                <p>ширина</p>
                <input id="ovalW" type="number" min="1"
                       oninput="this.value=this.value.replace('/^\d+$/','');">
                <br>
                <button onclick="drawFigure('Oval')">нарисовать фигуру</button>
            </div>
            <div class="figureForm" id="figureForm5">
                <p>центр фигуры</p>
                <input id="circle1x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="circle1y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>радиус</p>
                <input id="circleRad" type="number" min="1"
                       oninput="this.value=this.value.replace('/^\d+$/','');">
                <br>
                <button onclick="drawFigure('Circle')">нарисовать фигуру</button>
            </div>
            <div class="figureForm" id="figureForm6">
                <p>координаты</p>
                <input id="dotX" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="dotY" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <br>
                <button onclick="drawFigure('Dot')">нарисовать фигуру</button>
            </div>
            <div class="figureForm" id="figureForm7">
                <p>точка 1</p>
                <input id="line1x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="line1y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>точка 2</p>
                <input id="line2x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="line2y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <br>
                <button onclick="drawFigure('Line')">нарисовать фигуру</button>
            </div>
            <div class="figureForm" id="figureForm8">
                <p>точка 1</p>
                <input id="trian1x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="trian1y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>точка 2</p>
                <input id="trian2x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="trian2y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>точка 2</p>
                <input id="trian3x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="trian3y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <br>
                <button onclick="drawFigure('Triangle')">нарисовать фигуру</button>
            </div>
            <div class="figureForm" id="figureForm9">
                <p>начальная точка</p>
                <input id="text1x" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <input id="text1y" type="number" min="1" oninput="checkIfDecimalValue(this.id, this.value)">
                <p>размер шрифта</p>
                <input id="fontSize" type="number" min="1"
                       oninput="this.value=this.value.replace('/^\d+$/','');">
                <p>текст</p>
                <input type="text" id="figureText">
                <br>
                <button onclick="drawFigure('Text')">нарисовать фигуру</button>
            </div>
        </div>
        <div class="authorForm">
            <p>Ваше имя:</p>
            <input type="text" id="authorName" class="authorInput"
                   oninput="this.value=this.value.replace(/[^A-Za-z\s]/g,'');">
            <br>
            <button onclick="saveToDatabase()">Загрузить</button>
        </div>
    </div>
</div>