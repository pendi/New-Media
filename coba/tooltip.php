<style type="text/css">
	.ex-tooltip-content .tooltip-text {
		border: 1px solid #DDD;
		padding: 5px 10px 5px 10px;
		display: block;
	}
	.tooltip-text {
		position: relative;
		color: #000;
		font-weight: 300;
	}
	a {
		/*color: #13C4FF;*/
		text-decoration: none;
		line-height: inherit;
		outline: 0;
	}
	.tooltip-text .tooltip.down {
		top: 100%;
		left: 0;
	}
	.tooltip-text .tooltip {
		background: #F5F5C0;
		color: #000;
		position: absolute;
		padding: 2px 3px 2px 3px;
		display: none;
		text-align: center;
		width: 100%;
		-webkit-border-radius: 7px;
		-moz-border-radius: 7px;
		-ms-border-radius: 7px;
		-o-border-radius: 7px;
		border-radius-: 7px;
	}
	.ex-tooltip-content ul {
		margin: auto;
	}
	ul.flat {
		display: table;
		list-style: none;
		padding: 0;
	}
</style>

<div class="ex-tooltip-content">
    <ul class="flat">
        <li>
            <a href="#" class="tooltip-text">
                Tooltip Left
                <span class="tooltip left">Helloo!</span>
            </a>
        </li>
        <li>
            <a href="#" class="tooltip-text">
                Tooltip Down
                <span class="tooltip down">Helloo!</span>
            </a>
        </li>
        <li>
            <a href="#" class="tooltip-text">
                Tooltip Top
                <span class="tooltip top">Helloo!</span>
            </a>
        </li>
        <li>
            <a href="#" class="tooltip-text">
                Tooltip Right
                <span class="tooltip right">Helloo!</span>
            </a>
        </li>
    </ul>
</div>