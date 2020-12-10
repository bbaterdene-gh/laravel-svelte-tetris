<script>
  let shown = false;
  export let point = 0;
  export function show() {
    shown = true;
  }
  export function hide() {
    shown = false;
  }
  function save(){
    document.getElementById("saveAndReplay").submit();
  }
</script>

<style>
  .modal-wrapper {
    width: 500px;
    height: 300px;
    position: absolute;
    left: 50%;
    top: 25%;
    transform: translate(-50%, -50%);
    z-index: 99;
  }

  .modal {
    background-color: #131010;
    padding: 1rem;
    margin: 15% auto;
    width: 100%;
    height: 100%;
  }

  .btn-flat-border {
    display: inline-block;
    padding: 0.3em 1em;
    text-decoration: none;
    color: #c02222;
    border: solid 2px#c02222;
    border-radius: 3px;
    transition: .4s;
  }

  .btn-flat-border:hover {
    background: #c02222;
    color: white;
  }
</style>

{#if shown}
  <div class="modal-wrapper">
    <div class="modal">
      <h1 style="color: #c02222;">Тоглоом дууслаа</h1>
      <form action="/point" method="post" id="saveAndReplay">
        <input type="hidden" name="point" value={point}>
        <a class="btn-flat-border" on:click={save}>Оноог хадгалан дахин эхлүүлэх</a>
      </form>
    </div>
  </div>
{/if}
