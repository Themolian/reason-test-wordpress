<?php 
//Default WordPress Search Form
?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" placeholder="Search" />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>