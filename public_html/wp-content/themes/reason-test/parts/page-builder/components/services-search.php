<section class="service-search">
    <div class="service-search-inner">
        <h2><?php echo $args['title'] ?></h2>
        <div class="text-large"><?php echo $args['body'] ?></div>
        <form action="">
            <p>I am </p>
            <div class="select-wrap">
                <select name="personType" id="personType">
                    <option value="individual">an Individual</option>
                </select>
            </div>
            <p> and I want </p>
            <div class="select-wrap">
                <select name="services" id="services">
                    <option value="to-learn">to learn</option>
                </select>
            </div>
            <div class="button button-fill button-fill--red">
                <input type="submit" value="Start now">
            </div>
        </form>
    </div>
</section>