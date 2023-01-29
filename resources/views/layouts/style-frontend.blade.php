<style>
    .tab {
        width: 100%;
        margin: auto;
        padding: 0 2em;
        border-radius: 0.5rem;
        background-color: rgb(224, 162, 28);
        line-height: 4em;
        font-weight: bold;
        font-size: 12px;
        white-space: nowrap;
        overflow: auto;
        transition: all 0.5s linear;
        box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.904);
        text-align: center;
    }

    .tab-items {
        margin: 0;
        padding: 0;
        list-style: none;
        display: inline-grid;
        grid-gap: 0em;
        transition: color 5s ease-in;
        /* line-height: 20px; */
    }

    .tab-items> :nth-child(1) {
        grid-column: 1/2;

    }

    .tab-items> :nth-child(2) {
        grid-column: 2/3;
    }

    .tab-items> :nth-child(3) {
        grid-column: 3/4;
    }


    /* .tab-items> :nth-child(4) {
        grid-column: 4/5;
    }

    .tab-items> :nth-child(5) {
        grid-column: 5/6;
    } */

    .tab-item {
        display: inline;
        grid-row: 1/2;
    }

    .tab-item.active .item-link {
        color: rgb(74, 167, 167);
    }

    .item-link {
        padding: 0 0.75em;
        color: #fff;
        text-decoration: none;
        display: inline-block;
        transition: color 256ms;
    }

    .item-link:hover {
        color: #297;
        text-decoration: underline;
    }

    .tab-indicator {
        height: 3px;
        background-color: yellow;
        border-radius: 3px 3px 0 0;
        grid-column: var(--index)/span 1 !important;
        grid-row: 1/2;
        align-self: end;
    }
</style>
