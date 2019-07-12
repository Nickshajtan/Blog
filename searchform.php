<?php
/*
    Searchform template file
*/
?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ) ?>">
				<div>
					<label class="screen-reader-text" for="s">Поиск:</label>
					<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="Найти" />
				</div>
</form>