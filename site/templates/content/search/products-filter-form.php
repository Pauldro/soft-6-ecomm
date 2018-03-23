<h4>Filter by Color:</h4>
<div class="row">
<form class="" action="" method="get">
    <input type="hidden" name="filter" value="filter">
    
    <?php foreach ($colors as $color) : ?>
        <div class="col-sm-3">
            <input type="checkbox" name="color[]" value="<?= $colors->title; ?>" >&emsp;
            <label for=""><?= $color->title; ?></label></br>
        </div>
    <?php endforeach; ?>
</div>
</br>
<div class="row">
    <div class="col-sm-4">
        <h4>Filter by Price</h4>
        <div class="input-group form-group">
            <input class="form-control form-group inline input-sm" type="text" name="price[]" value="" placeholder="From Price">
        </div>
        <div class="input-group form-group">
            <input class="form-control form-group inline input-sm" type="text" name="price[]" value="" placeholder="Through Price">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 form-group">
    </br>
        <button class="btn btn-success btn-block" type="submit">Filter</button>
    </div>
</form>
</div>
</br>
