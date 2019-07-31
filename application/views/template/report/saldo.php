<?php

foreach ($results as $data) {
echo "<label> Id </label>" . "<div class='input_text'>" . $data->id . "</div>"
. "<label> Name</label> " . "<div class='input_name'>" . $data->name . "</div>"
. "<label> Email </label>" . "<div class='input_email'>" . $data->email . "</div>"
. "<label> Mobile No </label>" . "<div class='input_num'>" . $data->mobile_number . "</div>"
. "<label> Country </label> " . "<div class='input_country'>" . $data->country . "</div>";
}
?>
</div>
<div id="pagination">
<ul class="tsc_pagination">

<!-- Show pagination links -->
<?php foreach ($links as $link) {
echo "<li>". $link."</li>";
} ?>
