<style>
    .topdown_container{
        background:#6EA1EE;
        aspect-ratio:1;
        height:200px;

        border-radius:10px;
        color:#fff;
        padding:20px;
        display:flex;
        flex-direction:column;
        align-items: center;
        justify-content: center;
    }
    .topdown_container p{
        width:fit-content;
    }
    .topdown_container .triangle{
        /* aspect-ratio:1; */
        /* width:40%; */
        margin-top:10px;
        fill:#fff;
        transform: rotate(180deg);
    }
</style>
<div class="topdown_container">
    <p>Top Down</p>
    <svg class="triangle" width=100 height=84>
        <polygon points="50 0, 100 84, 0 84"/>
    </svg>
    <svg class="triangle" width=100 height=84>
        <polygon points="50 0, 100 84, 0 84"/>
    </svg>
</div>
