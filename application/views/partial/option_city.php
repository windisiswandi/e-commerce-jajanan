<?php foreach($city as $c) : ?>
    <option value="<?= $c['city_id'].",".$c['city_name'] ?>"><?= $c['city_name']; ?></option>
<?php endforeach; ?>