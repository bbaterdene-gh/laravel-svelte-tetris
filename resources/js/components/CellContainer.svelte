<script>
  import Cell from './Cell.svelte'
  import { createEventDispatcher } from 'svelte';
  import Dialog from "./Dialog.svelte";
  let dialog;
  export let point;
  let prevPoint = 0;
	const dispatch = createEventDispatcher();
  export let width = 10;
  export let height = 20;
  export let cellWidth = 25;
  export let cellHeight = 25;
  export let currentTetromino;
  let cells = [];
  let currentPosition = 4;
  let currentRotation = 0;
  let prevRotation = currentRotation;
  let prevPosition = currentPosition;
  $: {
    if (currentTetromino) {
      currentPosition = 4;
      prevPosition = 4;
    }
  }
  [...Array(height*width).keys()].forEach(element => {
    cells[element] = {id: element,
                      tetrominoType: {
                        jTetromino: false,
                        lTetromino: false,
                        sTetromino: false,
                        zTetromino: false,
                        tTetromino: false,
                        oTetromino: false,
                        iTetromino: false,
                      },
                      drawable: true
    };
  });

  $: {
    currentTetromino.rotation[prevRotation].forEach(index => {
      for (const [key, _] of Object.entries(cells[prevPosition + index].tetrominoType)) {
        if (cells[prevPosition + index].drawable !== false) {
          cells[prevPosition + index].tetrominoType[key] = false;
        }
      }
    });
    currentTetromino.rotation[currentRotation].forEach(index => {
      if (cells[prevPosition + index].drawable !== false) {
        cells[currentPosition + index].tetrominoType[currentTetromino.class] = true;
      }
    });
  }


  function handleKey(e) {
    const isLeft = currentTetromino.rotation[currentRotation].some(index=> (currentPosition + index) % width === 0);
    const isRight = currentTetromino.rotation[currentRotation].some(index=> (currentPosition + index + 1) % width === 0);
    switch (e.keyCode) {
      case 37:// left
        if (!isLeft  ) {
          if(currentTetromino.rotation[currentRotation].every(index => cells[currentPosition - 1 + index].drawable === true)){  
            reset();
            prevPosition = currentPosition;
            currentPosition -=1;
          }
        }
        break;
      case 38:// rotate
        reset()
        if(isLeft) {
          currentPosition += 1;
        } else if(isRight) {
          currentPosition -= 2;
        }
        
        prevRotation = currentRotation;
        currentRotation++;
        if(currentRotation === 4) currentRotation = 0;
        break;
      case 39:// right
        if (!isRight) {
          if(currentTetromino.rotation[currentRotation].every(index => cells[currentPosition + 1 + index].drawable === true)){  
            reset();
            prevPosition = currentPosition;
            currentPosition +=1
          }
        }
        break;
      case 40:// down
        reset();
        prevPosition = currentPosition;
        currentPosition += width;
        freeze();
        break;
      case 32: //space
        while(!freeze()){
          reset();
          prevPosition = currentPosition;
          currentPosition += width;
        }
        break;
    }
  }

  function freeze() {
    const isBottom = currentTetromino.rotation[currentRotation].some(index=> (currentPosition + index)>= width*height - width);
    if(currentTetromino.rotation[currentRotation].some(index => cells[currentPosition + index + width].drawable === false || isBottom)) {
      currentTetromino.rotation[currentRotation].forEach(index => {
        cells[currentPosition + index].drawable = false;
        cells[currentPosition + index].tetrominoType[currentTetromino.class] = true;
      });
      //start a new tetromino falling
      
      addPoint();
      reset();
      gameover();
      dispatch('newTetromino');
      return true;
    }
    return false;
  }

  function addPoint() {
    prevPoint = point;
    let tmpPoint = point;
    for (let i = 0; i < 199; i +=width) {
      const row = [i, i+1, i+2, i+3, i+4, i+5, i+6, i+7, i+8, i+9];
      if(row.every(index => cells[index].drawable === false )) {
        tmpPoint +=40;
        row.forEach(index => {
          cells[index].drawable = true;
          for (const [key, _] of Object.entries(cells[index].tetrominoType)) {
            cells[index].tetrominoType[key] = false;
          }
        })
        const removedCells = cells.splice(i, width);
        cells = removedCells.concat(cells);
      }
    }
    let margin = tmpPoint - point;
    if (margin === 40 ){
      point += 40; //one line point
    }
    if (margin === 80 ){
      point += 100;//two line point
    }
    if (margin === 120 ){
      point += 300;//three line point
    }
    if (margin >= 160 ){
      point += 400;//four or more line point
    }
  }

  function reset() {
    for (let cell of cells){
      for (const [key, _] of Object.entries(cells[0].tetrominoType)) {
        if (cell.drawable === true) {
          cell.tetrominoType[key] = false;
        }
      }
    }
  }

  var timeId = setInterval(function(){
    reset();
    if(currentTetromino.rotation[currentRotation].every((index) => (currentPosition + index + width)<width*height && cells[currentPosition + index + width].drawable === true)){
      prevPosition = currentPosition;
      currentPosition += width;
    }
    freeze();
  }, 700);

  function gameover() {
    let isOver = cells.some((cell, index) => {
                    if ((index<2*width) && cell.drawable === false) {
                      return true;
                    }
                    return false;
                  });
    if (isOver) {
      dialog.show();
      clearInterval(timeId);
    }
  }

  window.onerror = function() {
    location.reload();
  }
</script>
<svelte:window on:keydown={handleKey}/>


<div class="CellContainer" style="width: {cellWidth*width}px; height: {cellHeight*height}px;" id="tetris">
  {#each cells as cell (cell.id)}
      <Cell cellWidth={cellWidth} cellHeight={cellHeight} cellState={cell}/>
  {/each}
</div>
<Dialog bind:this={dialog} point={point}>
</Dialog>
<style>
  .CellContainer {
    display: flex;
    display: flex;
    flex-wrap: wrap;
    margin: auto;
    border: 10px solid #504545;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.25);
    border-radius: 9px;
  }
</style>
