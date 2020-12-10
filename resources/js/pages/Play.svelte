<script>
  import CellContainer from "../components/CellContainer.svelte";
  let width = 10;
  let point = 0;
  const jTetromino = {
    rotation: [
      [1, width+1, width*2+1, 2],
      [width, width+1, width+2, width*2+2],
      [1, width+1, width*2+1, width*2],
      [width, width*2, width*2+1, width*2+2],
    ],
    class: "jTetromino",
  };

  const lTetromino = {
    rotation: [
      [0, 1, width*1+1, width*2+1],
      [width, width+1, width+2, width*2],
      [1, width+1, width*2+1, width*2+2],
      [width+2, width*2, width*2+1, width*2+2],
    ],
    class: "lTetromino",
  };

  const sTetromino  = {
    rotation: [
      [0, width, width+1, width*2+1],
      [width+1, width+2, width*2, width*2+1],
      [0, width, width+1, width*2+1],
      [width+1, width+2, width*2, width*2+1],
    ],
    class: "sTetromino",
  };

  const zTetromino  = {
    rotation: [
      [2, width+2, width+1, width*2+1],
      [width+1, width, width*2+2, width*2+1],
      [2, width+2, width+1, width*2+1],
      [width+1, width, width*2+2, width*2+1],
    ],
    class: "zTetromino",
  };

  const tTetromino  = {
    rotation: [
      [1, width, width+1, width+2],
      [1, width+1, width+2, width*2+1],
      [width, width+1, width+2, width*2+1],
      [1, width, width+1, width*2+1],
    ],
    class: "tTetromino",
  };

  const oTetromino  = {
    rotation: [
      [0, 1, width, width+1],
      [0, 1, width, width+1],
      [0, 1, width, width+1],
      [0, 1, width, width+1]
    ],
    class: "oTetromino",
  };

  const iTetromino  = {
    rotation: [
      [1, width+1, width*2+1, width*3+1],
      [width, width+1, width+2, width+3],
      [1, width+1, width*2+1, width*3+1],
      [width, width+1, width+2, width+3],
    ],
    class: "iTetromino",
  };
  let theTetrominoes = [ jTetromino, lTetromino, sTetromino, zTetromino, tTetromino, oTetromino, iTetromino ];
  let nextTetromino;
  function newTetromino() {
    let random = Math.floor(Math.random() * theTetrominoes.length );
    nextTetromino = [...theTetrominoes][random];
  }
  newTetromino();
</script>

<style>
  #Play {
    display: grid;
    grid-template-areas:
    "header header header"
    "sidebar-left-top main sidebar-right-top"
    "sidebar-left-down main sidebar-right-down"
    "footer footer footer";
  }

  #tetris {
    grid-area: main;
    align-self: center;
  }
  #sidebar-right-top {
    grid-area: sidebar-right-top;
    justify-self: start;
    text-align: center;
  }
  #point {
    border: 10px solid #504545;
    height: 150px;
    width: 200px;
    border-radius: 9px;
    background-color: #2D2A2A;
    color: #ffffff;
    position: relative;
  }
  #point div{
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }
  #sidebar-left-top {
    grid-area: sidebar-left-top;
    justify-self: end;
    text-align: center;
  }
  #record {
    border: 10px solid #504545;
    height: 150px;
    width: 200px;
    border-radius: 9px;
    background-color: #2D2A2A;
    color: #ffffff;
    position: relative;
  }

  #record div{
    margin: 0;
    position: absolute;
    width: 100%;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }

  #description {
    margin-top: 20px;
    border: 10px solid #504545;
    height: 200px;
    width: 200px;
    border-radius: 9px;
    background-color: #2D2A2A;
    color: #ffffff;
    position: relative;
  }
  #description div{
    margin: auto;
    width: 100%;
  }
  h1 {
    grid-area: header;
    color: #ffffff;
  }

  .reload{
    position: relative;
    width: 25px;
    height: 25px;
    border: 2.5px solid;
    border-right-color: transparent;
    border-radius: 100%;
    box-sizing: border-box;
    color:#94a4bd;
  }

  .reload:before{
    position: absolute;
    top: 4.5px;
    right: -2.5px;
    content: "";
    height: 50%;
    border: 5px solid transparent;
    border-top: 7.5px solid;
    background: transparent;
    transform-origin: left top;
    transform: rotate(-40deg);
    box-sizing: border-box;
  }

  #control {
    padding-top: 20px;
    color: #ffffff;
  }
</style>

<div id="Play">

  <h1>Тетрис</h1>
  <div id="sidebar-left-top">
    <div id="record">
      <div>Одоогийн рекорд: 200</div>
    </div>

    <div id="description">
      <div>Тоглоомын заавар</div>
      <div>&nbsp;</div>
      <div>
        <div style="padding: 2px; text-align: left; padding-left: 20px">Space: Шууд буулгах</div>
        <div style="padding: 2px; text-align: left; padding-left: 20px">Arrow Up: Эргүүлэх</div>
        <div style="padding: 2px; text-align: left; padding-left: 20px">Arrow Left: Зүүн</div>
        <div style="padding: 2px; text-align: left; padding-left: 20px">Arrow Down: Доош</div>
        <div style="padding: 2px; text-align: left; padding-left: 20px">Arrow Right: Баруун</div>
      </div>
    </div>
  </div>
  <CellContainer bind:point="{point}" currentTetromino="{nextTetromino}" width="{width}" on:newTetromino={newTetromino} id="tetris"/>

  <div id="sidebar-right-top">
    <div id="point">
      <div>Таны оноо: {point}</div>
    </div>
    <div id="description">
      <div>Онооны дүрэм</div>
      <div>&nbsp;</div>
      <div>
        <div style="padding: 2px; text-align: left; padding-left: 20px">1 шугам: 40 оноо</div>
        <div style="padding: 2px; text-align: left; padding-left: 20px">2 шугам: 100 оноо</div>
        <div style="padding: 2px; text-align: left; padding-left: 20px">3 шугам: 300 оноо</div>
        <div style="padding: 2px; text-align: left; padding-left: 20px">4+ шугам: 1200 оноо</div>
      </div>
    </div>
    <div id="control">
      <div style="display: inline-block">
        <div class="reload blue" onclick="window.location.reload();" style="float: left;"></div>
        <div style="float: left;">&nbsp;&nbsp;Дахин эхлүүлэх</div>
      </div>
    </div>
  </div>

</div>
