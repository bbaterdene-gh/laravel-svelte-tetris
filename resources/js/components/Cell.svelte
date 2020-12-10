<script>
  export let cellWidth;
  export let cellHeight;
  export let cellState;
</script>

<style>
  div {
    box-sizing: border-box;
    border: 1px solid #2D2A2A;
    background-color: #131010;
  }

  .jTetromino {
    background-color: #0a3555;
  }
  
  .lTetromino {
    background-color: #ec891f;
  }

  .sTetromino {
    background-color: #068206;
  }

  .zTetromino {
    background-color: #d91919;
  }

  .tTetromino {
    background-color: #a638e3;
  }

  .oTetromino {
    background-color: #ecec1f;
  }

  .iTetromino {
    background-color: #2890dd;;
  }
</style>

<div style="width: {cellWidth}px; height: {cellHeight}px" class='cell' class:lTetromino={cellState.tetrominoType.lTetromino} class:jTetromino={cellState.tetrominoType.jTetromino} class:sTetromino={cellState.tetrominoType.sTetromino} class:zTetromino={cellState.tetrominoType.zTetromino} class:tTetromino={cellState.tetrominoType.tTetromino} class:oTetromino={cellState.tetrominoType.oTetromino} class:iTetromino={cellState.tetrominoType.iTetromino} id='{cellState.id}-th-cell'>
  
</div>
