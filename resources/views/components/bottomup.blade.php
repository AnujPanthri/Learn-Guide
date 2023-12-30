<style>
    .bottomup_container{
        background:#61F867;
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
    .bottomup_container p{
        width:fit-content;
    }
    .bottomup_container .triangle{
        /* aspect-ratio:1; */
        /* width:40%; */
        margin-top:10px;
        fill:#fff;
    }
</style>
<div class="bottomup_container">
    <p>Bottom Up</p>
    <svg class="triangle" width=100 height=84>
        <polygon points="50 0, 100 84, 0 84"/>
    </svg>
    <svg class="triangle" width=100 height=84>
        <polygon points="50 0, 100 84, 0 84"/>
    </svg>
</div>
